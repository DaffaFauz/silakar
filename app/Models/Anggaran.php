<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    //
    protected $fillable = ['kode_rekening_id', 'tahun', 'nilai'];

    public function kodeRekening()
    {
        return $this->belongsTo(KodeRekening::class);
    }
}
