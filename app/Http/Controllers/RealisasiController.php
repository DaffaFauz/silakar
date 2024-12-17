<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Models\Anggaran;
use App\Models\Realisasi;
use App\Models\KodeRekening;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    //
    public function index()
    {
        $tahun = Tahun::all();
        $bulanData = Realisasi::select('bulan')->distinct()->get();
    
        // Ambil hanya kode rekening terakhir
        $realisasi = Realisasi::with(['tahun', 'anggaran.kodeRekening'])
    ->whereHas('anggaran.kodeRekening', function ($query) {
        $query->doesntHave('children'); // Hanya ambil subkode terakhir
    })->get();
    
        // Tambahkan data akumulasi untuk induk
        $indukRekening = KodeRekening::whereHas('children')->with(['childrenRecursive'])->get();
    
        return view('realisasi', compact('tahun', 'bulanData', 'realisasi', 'indukRekening'));
    }

    
    

public function filter(Request $request)
{
    $tahunId = $request->input('tahun');
    $bulan = $request->input('bulan');

    // Validasi input
    if (!$tahunId || !$bulan) {
        return redirect('/realisasi')->withErrors('Tahun dan bulan harus dipilih!');
    }

    // Filter data realisasi
    $tahun = Tahun::all();
    $realisasi = Realisasi::with(['tahun', 'anggaran.kodeRekening'])->whereHas('anggaran.KodeRekening', function ($query){
        $query->doesntHave('children');
    })
        ->where('tahun_id', $tahunId)
        ->where('bulan', $bulan)
        ->get();

    // Data bulan untuk dropdown
    $bulanData = Realisasi::select('bulan')->distinct()->get();

    // Redirect jika data tidak ditemukan
    if ($realisasi->isEmpty()) {
        return redirect('/realisasi')->withErrors('Data tidak ditemukan untuk filter yang dipilih.');
    }

    return view('realisasi', compact('tahun', 'realisasi', 'bulanData'));
}

public function generate(Request $request)
{
    $validated = $request->validate([
        'tahun' => 'required|exists:tahun,id',
        'bulan' => 'required|integer|min:1|max:12',
    ]);

    $anggaran = Anggaran::where('tahun_id', $validated['tahun'])->get();

    if ($anggaran->isEmpty()) {
        return redirect()->back()->with('error', 'Data anggaran tidak ditemukan untuk tahun ini.');
    }

    foreach ($anggaran as $item) {
        $existingRealisasi = Realisasi::where('tahun_id', $validated['tahun'])
            ->where('bulan', $validated['bulan'])
            ->where('anggaran_id', $item->id)
            ->first();

        if ($existingRealisasi) continue;

        $bulanLalu = $validated['bulan'] - 1;

        $realisasiBulanLalu = Realisasi::where('anggaran_id', $item->id)
            ->where('tahun_id', $validated['tahun'])
            ->where('bulan', '=', $bulanLalu)
            ->value('jumlah_realisasi');

        // Ambil saldo_anggaran dari bulan sebelumnya
        $saldoAnggaranBulanSebelumnya = Realisasi::where('anggaran_id', $item->id)
            ->where('tahun_id', $validated['tahun'])
            ->where('bulan', $validated['bulan'] - 1) // Ambil bulan sebelumnya
            ->value('saldo_anggaran');

        // Jika tidak ada saldo_anggaran dari bulan sebelumnya, set ke nominal
        if (is_null($saldoAnggaranBulanSebelumnya)) {
            $saldoAnggaranBulanSebelumnya = $item->nominal;
        }

        // Buat entri baru untuk bulan ini
        Realisasi::create([
            'tahun_id' => $validated['tahun'],
            'bulan' => $validated['bulan'],
            'anggaran_id' => $item->id,
            'realisasi_ls' => 0,
            'realisasi_gu' => 0,
            'jumlah_realisasi' => $realisasiBulanLalu == null ? 0 : $realisasiBulanLalu, // Ini tetap diambil dari bulan sebelumnya
            'persentase_anggaran' => 0,
            'saldo_anggaran' => $saldoAnggaranBulanSebelumnya, // Set saldo_anggaran dari bulan sebelumnya
        ]);
    }

    return redirect()->back()->with('success', 'Data berhasil di-generate.');
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'realisasi_ls' => 'required|numeric|min:0',
        'realisasi_gu' => 'required|numeric|min:0',
    ]);

    $realisasi = Realisasi::findOrFail($id);
    $anggaran = $realisasi->anggaran;

    if (!$anggaran) {
        return redirect()->back()->with('error', 'Anggaran terkait tidak ditemukan.');
    }

    $bulanLalu = $realisasi->bulan - 1;

    $realisasiBulanLalu = Realisasi::where('anggaran_id', $anggaran->id)
    ->where('tahun_id', $realisasi->tahun_id)
    ->where('bulan', '=', $bulanLalu)
    ->value('jumlah_realisasi');

    $jumlahRealisasi = $realisasiBulanLalu + $validated['realisasi_ls'] + $validated['realisasi_gu'];
    $saldoAnggaran = $anggaran->nominal - $jumlahRealisasi;
    $persentaseAnggaran = ($jumlahRealisasi / $anggaran->nominal) * 100;

    $realisasi->update([
        'realisasi_ls' => $request->realisasi_ls,
        'realisasi_gu' => $request->realisasi_gu,
        'jumlah_realisasi' => $jumlahRealisasi,
        'persentase_anggaran' => $persentaseAnggaran,
        'saldo_anggaran' => $saldoAnggaran,
    ]);

    // Update realisasi induk hanya untuk bulan yang diubah
    $this->updateParentRealisasi($anggaran->kodeRekening, $realisasi->bulan);

    return redirect()->back()->with('success', 'Data realisasi berhasil diperbarui.');
}


private function updateParentRealisasi($kodeRekening, $bulan)
{
    while ($kodeRekening->parent) {
        $parent = $kodeRekening->parent;

        // Ambil semua anggaran dari sub kode rekening
        $childAnggarans = $parent->children->map->anggarans->flatten();

        // Hitung realisasi GU dan LS hanya untuk bulan tertentu
        $realisasiGU = $childAnggarans->map(function ($anggaran) use ($bulan) {
            return $anggaran->realisasi->where('bulan', $bulan)->sum('realisasi_gu');
        })->sum();

        $realisasiLS = $childAnggarans->map(function ($anggaran) use ($bulan) {
            return $anggaran->realisasi->where('bulan',$bulan)->sum('realisasi_ls');
        })->sum();

// Tambahkan realisasiBulanLalu (akumulasi hingga bulan sebelumnya)
$realisasiBulanLalu = $childAnggarans->map(function ($anggaran) use ($bulan) {
    return $anggaran->realisasi
        ->where('bulan', '<', $bulan) // Ambil semua realisasi hingga bulan sebelumnya
        ->sum(function ($item) {
            return $item->realisasi_gu + $item->realisasi_ls; // Total GU dan LS
        });
})->sum();

        // Ambil nominal anggaran induk
        $nominalInduk = $parent->anggarans->first()->nominal;

        // Hitung jumlah realisasi, saldo anggaran, dan persentase anggaran
        $jumlahRealisasi = $realisasiBulanLalu + $realisasiGU + $realisasiLS;
        $saldoAnggaran = $nominalInduk - $jumlahRealisasi;
        $persentaseAnggaran = $jumlahRealisasi > 0
            ? ($jumlahRealisasi / $nominalInduk) * 100
            : 0;

        // Update atau buat data realisasi pada induk untuk bulan tersebut
        Realisasi::updateOrCreate(
            [
                'anggaran_id' => $parent->anggarans->first()->id,
                'tahun_id' => $childAnggarans->first()->tahun_id,
                'bulan' => $bulan,
            ],
            [
                'realisasi_gu' => $realisasiGU,
                'realisasi_ls' => $realisasiLS,
                'jumlah_realisasi' => $jumlahRealisasi,
                'persentase_anggaran' => $persentaseAnggaran,
                'saldo_anggaran' => $saldoAnggaran,
            ]
        );

        // Lanjutkan iterasi ke parent berikutnya
        $kodeRekening = $parent;
    }
}



}
