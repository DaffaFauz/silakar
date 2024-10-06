<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKodrek4 extends Model
{
    use HasFactory;

    protected $fillable = ['kode_rekening4', 'uraian', 'kode_rekening3'];

    public function subkodrek3(): BelongsTo
    {
        return $this->belongsTo(subkodrek3::class, 'kode_rekening3', '');
    }

    public function subkodrek5(): HasMany
    {
        return $this->hasMany(Subkodrek5::class, 'kode_rekening5', '');
    }
}
