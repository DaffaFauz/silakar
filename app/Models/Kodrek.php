<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kodrek extends Model
{
    use HasFactory;

    protected $fillable = ['kode_rekening', 'uraian'];

    public function subkodrek1(): HasMany
    {
        return $this->hasMany(Subkodrek1::class);
    }
}
