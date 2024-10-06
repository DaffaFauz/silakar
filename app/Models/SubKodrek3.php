<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKodrek3 extends Model
{
    use HasFactory;

    protected $fillable = ['kode_rekening3', 'uraian', 'kode_rekening2'];

    public function subkodrek2(): BelongsTo
    {
        return $this->belongsTo(subkodrek2::class, 'kode_rekening2', '');
    }

    public function subkodrek3(): HasMany
    {
        return $this->hasMany(Subkodrek4::class, 'kode_rekening4', '');
    }
}
