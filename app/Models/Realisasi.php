<?php

namespace App\Models;

use App\Models\Tahun;
use App\Models\Anggaran;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    //
    protected $table ='realisasis';
    protected $fillable = [
        'tahun_id',
        'anggaran_id',
        'bulan',
        'realisasi_ls',
        'realisasi_gu',
        'jumlah_realisasi',
        'persentase_anggaran',
        'saldo_anggaran',
    ];

    // Relasi ke Tahun
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    // Relasi ke Anggaran
    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }
}
