<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Models\Anggaran;
use App\Models\Realisasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $tahunAktif = Tahun::where('tahun', now()->year)->first();

        if (!$tahunAktif) {
            return view('dashboard', [
                'totalAnggaran' => 0,
                'totalRealisasi' => 0,
                'persentase' => 0,
                'tahunAktif' => null,
            ]);
        }

        // ID Induk kode rekening pertama
        $indukKodeRekeningId = 1; // Ganti dengan ID aktual induk kode rekening

        // Ambil data anggaran langsung dari induk kode rekening
        $anggaranInduk = Anggaran::where('tahun_id', $tahunAktif->id)
            ->where('kode_rekening_id', $indukKodeRekeningId)
            ->first();

        $totalAnggaran = $anggaranInduk ? $anggaranInduk->nominal : 0;

        // Ambil data realisasi langsung dari induk kode rekening
        $realisasiInduk = Realisasi::where('tahun_id', $tahunAktif->id)
        ->where('anggaran_id', $anggaranInduk ? $anggaranInduk->id : null)
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal terbaru
        ->first();

        $totalRealisasi = $realisasiInduk ? $realisasiInduk->jumlah_realisasi : 0;

        return view('dashboard', [
            'totalAnggaran' => $totalAnggaran,
            'totalRealisasi' => $totalRealisasi,
            'persentase' => $totalAnggaran > 0 ? round(($totalRealisasi / $totalAnggaran) * 100, 2) : 0,
            'tahunAktif' => now()->year,
        ]);
    }
}
