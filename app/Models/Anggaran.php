<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $fillable = ['nominal','tahun', 'bulan', 'realisasi_gu', 'realisasi_ls', 'kode_rekening4', 'jumlah_realisasi', 'persentase_anggaran', 'saldo_anggaran'];
    use HasFactory;
}
