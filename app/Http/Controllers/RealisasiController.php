<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Models\Anggaran;
use App\Models\Realisasi;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    //
    public function index()
    {
        $tahun = Tahun::all(); // Untuk dropdown tahun
        $realisasi = Realisasi::with(['tahun', 'anggaran'])->get();

        return view('realisasi', compact('tahun', 'realisasi'));
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

    return redirect()->back()->with('success', 'Data realisasi berhasil diperbarui.');
}

}
