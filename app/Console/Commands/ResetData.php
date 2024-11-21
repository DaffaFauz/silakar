<?php

namespace App\Console\Commands;

use App\Models\Tahun;
use App\Models\Anggaran;
use App\Models\Realisasi;
use Illuminate\Console\Command;

class ResetData extends Command
{
    protected $signature = 'reset:data';
    protected $description = 'Reset data anggaran dan realisasi untuk tahun baru';

    public function handle()
    {
        //
        $currentYear = now()->year;

        // Cek apakah tahun baru sudah terdaftar di tabel tahun
        $tahun = Tahun::firstOrCreate(['tahun' => $currentYear], []);

        // Reset data di tabel realisasi
        Realisasi::truncate();

        // Reset data di tabel anggaran
        Anggaran::update(['nominal' => 0]);

        $this->info('Data anggaran dan realisasi telah direset untuk tahun ' . $currentYear);
    }
}
