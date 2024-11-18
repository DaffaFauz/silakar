<?php

namespace App\Models;

use App\Models\Anggaran;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    //
    protected $table = 'tahun';
    protected $fillable = ['tahun', 'bulan'];

    public function anggaran(){
        return $this->hasMany(Anggaran::class, 'tahun_id');
    }
}
