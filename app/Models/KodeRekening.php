<?php

namespace App\Models;

use App\Models\Anggaran;
use App\Models\Realisasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeRekening extends Model
{
    use HasFactory;
    protected $fillable = ['kode_rekening', 'uraian', 'parent_id'];

    protected static function booted()
    {
        static::deleting(function ($kodeRekening) {
            // Cek apakah kode rekening memiliki anak-anak
            if ($kodeRekening->children()->exists()) {
                // Hapus semua anak jika yang dihapus adalah induk
                $kodeRekening->children->each(function ($child) {
                    $child->delete();
                });
            }
        });
    }

    public function parent(){
        return $this->belongsTo(KodeRekening::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(KodeRekening::class, 'parent_id');
    }

    public function childrenRecursive(){
        return $this->hasMany(KodeRekening::class, 'parent_id')->with('childrenRecursive');
    }

    public function anggarans()
    {
        return $this->hasMany(Anggaran::class, 'kode_rekening_id');
    }

    public function isLeaf()
    {
        return !$this->children()->exists();
    }
}
