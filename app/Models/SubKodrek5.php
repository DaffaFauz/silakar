<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKodrek5 extends Model
{
    use HasFactory;
    protected $fillable = ['kode_rekening5', 'uraian', 'kode_rekening4'];

    public function subkodrek4(): BelongsTo
    {
        return $this->belongsTo(subkodrek4::class, 'kode_rekening4', '');
    }
}
