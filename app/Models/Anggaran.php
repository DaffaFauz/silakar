<?php

namespace App\Models;

use App\Models\Tahun;
use App\Models\Realisasi;
use App\Models\KodeRekening;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    //
    protected $fillable = ['kode_rekening_id', 'tahun', 'nominal'];

    public function kodeRekening()
    {
        return $this->belongsTo(KodeRekening::class, 'kode_rekening_id');
    }

    public function tahun(){
        return $this->belongsTo(Tahun::class);
    }

    public function realisasi(){
        return $this->hasMany(Realisasi::class);
    }
}
