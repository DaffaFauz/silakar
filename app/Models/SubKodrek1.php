<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKodrek1 extends Model
{
    use HasFactory;

    protected $fillable = ['kode_rekening1', 'uraian', 'kode_rekening'];

    public function kodrek(): BelongsTo
    {
        return $this->belongsTo(kodrek::class, 'kode_rekening', '');
    }

    public function subkodrek2(): HasMany
    {
        return $this->hasMany(Subkodrek2::class, 'kode_rekening2', '');
    }
}
