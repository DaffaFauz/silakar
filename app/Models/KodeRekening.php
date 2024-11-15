<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
