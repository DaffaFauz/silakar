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
    
        // Query hanya untuk induk kode rekening
        $realisasi = DB::table('realisasis')
            ->join('anggarans', 'realisasis.anggaran_id', '=', 'anggarans.id')
            ->join('kode_rekenings', 'anggarans.kode_rekening_id', '=', 'kode_rekenings.id')
            ->select(
                'realisasis.bulan as bulan',
                'kode_rekenings.kode_rekening as kode_rekening',
                'kode_rekenings.uraian as uraian',
                'anggarans.nominal as total_anggaran', // Ambil langsung anggaran dari induk
                'realisasis.jumlah_realisasi as total_realisasi' // Ambil langsung realisasi dari induk
            )
            ->where('realisasis.tahun_id', $tahun)
            ->whereNull('kode_rekenings.parent_id') // Hanya induk kode rekening
            ->orderBy('realisasis.bulan')
            ->get();
    
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

        $details = $realisasiData->map(function ($realisasi) use($bulan, $tahunId) {
            $bulanSebelumnya = $bulan - 1;
            $realisasiSebelumnya = ($bulan == 1) ? 0 : Realisasi::where('tahun_id', $tahunId)
            ->where('bulan', $bulanSebelumnya)
            ->where('anggaran_id', $realisasi->anggaran_id) // Cocokkan anggaran_id
            ->first();

            $realisasiBulanLalu = $realisasiSebelumnya ? $realisasiSebelumnya->jumlah_realisasi : 0;
            $realisasiSdBulanIni = $realisasiBulanLalu + $realisasi->realisasi_gu + $realisasi->realisasi_ls;

            return [
                'kode_rekening' => $realisasi->anggaran->kodeRekening->kode_rekening,
                'uraian' => $realisasi->anggaran->kodeRekening->uraian,
                'anggaran' => $realisasi->anggaran->nominal,
                'realisasi_sd_bulan_lalu' => $realisasiBulanLalu == 0 ? '-' : $realisasiBulanLalu,
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
