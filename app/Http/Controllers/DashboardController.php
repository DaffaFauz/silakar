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

        $totalAnggaran = Anggaran::where('tahun_id', $tahunAktif->id)->sum('nominal');
        $totalRealisasi = Realisasi::where('tahun_id', $tahunAktif->id)->sum('jumlah_realisasi');
    
        return view('dashboard', [
            'totalAnggaran' => $totalAnggaran,
            'totalRealisasi' => $totalRealisasi,
            'persentase' => $totalAnggaran > 0 ? round(($totalRealisasi / $totalAnggaran) * 100, 2) : 0,
            'tahunAktif' => now()->year,
        ]);
    }
}
