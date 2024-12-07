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

    public function generate(Request $request){
    $validated = $request->validate([
            'tahun' => 'required',
            'bulan' => 'required',
        ]);

        $anggaran = Anggaran::where('tahun_id', $validated['tahun'])->get();
        if ($anggaran->isEmpty()) {
            return redirect()->back()->with('error', 'Data anggaran tidak ditemukan untuk tahun ini.');
        }

        foreach ($anggaran as $item) {
            Realisasi::insert(
                [
                    'tahun_id' => $request->tahun,
                    'bulan' => $request->bulan,
                    'anggaran_id' => $item->id,
                    'realisasi_ls' => 0,
                    'realisasi_gu' => 0,
                    'jumlah_realisasi' => 0,
                    'persentase_anggaran' => 0,
                    'saldo_anggaran' => $item->nominal, // Anggaran awal
                ]
            );
        }
        

        return redirect()->back()->with('success', 'Data berhasil di-generate.');
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


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'realisasi_ls' => 'required|numeric|min:0',
        'realisasi_gu' => 'required|numeric|min:0',
    ]);

    $realisasi = Realisasi::find($id);
    $anggaran = $realisasi->anggaran;

    if (!$anggaran) {
        return redirect()->back()->with('error', 'Anggaran terkait tidak ditemukan.');
    }

    $jumlahRealisasi = $validated['realisasi_ls'] + $validated['realisasi_gu'];
    $saldoAnggaran = $anggaran->nominal - $jumlahRealisasi;
    $persentaseAnggaran = $jumlahRealisasi > 0 ? ($jumlahRealisasi / $anggaran->nominal) * 100 : 0;

    $realisasi->update([
        'realisasi_ls' => $request->realisasi_ls,
        'realisasi_gu' => $request->realisasi_gu,
        'jumlah_realisasi' => $jumlahRealisasi,
        'persentase_anggaran' => $persentaseAnggaran,
        'saldo_anggaran' => $saldoAnggaran,
    ]);


    // dd($anggaran->kodeRekening);

    $this->updateParentRealisasi($anggaran->kodeRekening);

    return redirect()->back()->with('success', 'Data realisasi berhasil diperbarui.');
}

private function updateParentRealisasi($kodeRekening)
{
    while ($kodeRekening->parent) {
        $parent = $kodeRekening->parent;

        // Ambil semua anggaran dari sub kode rekening
        $childAnggarans = $parent->children->map->anggarans->flatten();

        // Hitung total realisasi langsung (realisasi_ls) dan ganti uang (realisasi_gu) dari semua anak
        $realisasiGU = $childAnggarans->map(function ($anggaran) {
            return $anggaran->realisasi->sum('realisasi_gu');
        })->sum();

        $realisasiLS = $childAnggarans->map(function ($anggaran) {
            return $anggaran->realisasi->sum('realisasi_ls');
        })->sum();

        // Ambil nominal anggaran induk dari anggaran parent langsung
        $nominalInduk = $parent->anggarans->first()->nominal;

        // Hitung jumlah realisasi, saldo anggaran, dan persentase anggaran
        $jumlahRealisasi = $realisasiGU + $realisasiLS;
        $saldoAnggaran = $nominalInduk - $jumlahRealisasi;
        $persentaseAnggaran = $jumlahRealisasi > 0
            ? ($jumlahRealisasi / $nominalInduk) * 100
            : 0;

        // Update atau buat data realisasi pada induk
        Realisasi::updateOrCreate(
            [
                'anggaran_id' => $parent->anggarans->first()->id,
                'tahun_id' => $childAnggarans->first()->tahun_id,
                'bulan' => $childAnggarans->first()->realisasi->first()->bulan,
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
