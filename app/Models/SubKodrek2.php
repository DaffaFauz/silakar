<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKodrek2 extends Model
{
    use HasFactory;

    protected $fillable = ['kode_rekening1', 'uraian', 'kode_rekening2'];

    public function subkodrek1(): BelongsTo
    {
        return $this->belongsTo(subkodrek1::class, 'kode_rekening1', '');
    }

    public function subkodrek3(): HasMany
    {
        return $this->hasMany(Subkodrek3::class, 'kode_rekening3', '');
    }
}
