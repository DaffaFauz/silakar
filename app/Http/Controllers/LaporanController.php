<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tahun;
use App\Models\Realisasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function index(Request $request)
{
    // Ambil tahun dari input (jika ada)
    $tahun = $request->input('tahun', now()->year);

    // Query realisasi berdasarkan tahun (jika dipilih), jika tidak ambil semua
    $realisasi = DB::table('realisasis')
    ->join('anggarans', 'realisasis.anggaran_id', '=', 'anggarans.id')
    ->select(
        DB::raw('realisasis.bulan as bulan'),
        DB::raw('SUM(anggarans.nominal) as total_anggaran'),
        DB::raw('SUM(realisasis.realisasi_gu + realisasis.realisasi_ls) as total_realisasi')
    )
    ->where('realisasis.tahun_id', $tahun)
    ->groupBy('realisasis.bulan')
    ->orderBy('realisasis.bulan')
    ->get();

    // dd($realisasi);

        $t = Tahun::all();

    return view('laporan', compact('realisasi', 't', 'tahun'));
}

    public function detailRealisasi($bulan, $tahunId)
    {
        $tahun = Tahun::findOrFail($tahunId);
        $realisasiData = Realisasi::where('tahun_id', $tahunId)
            ->where('bulan', $bulan)
            ->with(['anggaran.kodeRekening'])
            ->get();

        $details = $realisasiData->map(function ($realisasi) use($bulan) {
            $realisasiSdBulanLalu = ($bulan == 1) ? 0 : $realisasi->jumlah_realisasi;
            $realisasiSdBulanIni = $realisasiSdBulanLalu + $realisasi->realisasi_gu + $realisasi->realisasi_ls;

            return [
                'kode_rekening' => $realisasi->anggaran->kodeRekening->kode_rekening,
                'uraian' => $realisasi->anggaran->kodeRekening->uraian,
                'anggaran' => $realisasi->anggaran->nominal,
                'realisasi_sd_bulan_lalu' => $realisasiSdBulanLalu == 0 ? '-' : $realisasiSdBulanLalu,
                'realisasi_gu' => $realisasi->realisasi_gu,
                'realisasi_ls' => $realisasi->realisasi_ls,
                'realisasi_sd_bulan_ini' => $realisasiSdBulanIni,
                'persentase_anggaran' => $realisasi->persentase_anggaran,
                'saldo_anggaran' => $realisasi->saldo_anggaran,
            ];
        });

        $bulanIndonesia = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    
        $namaBulan = $bulanIndonesia[$bulan];

        $pdf = Pdf::loadView('detail-pdf', compact('details', 'tahun', 'namaBulan'))->setPaper('legal', 'landscape');;
        return $pdf->stream("Laporan-Detail-{$namaBulan}-{$tahun->tahun}.pdf");
    }
    

}
