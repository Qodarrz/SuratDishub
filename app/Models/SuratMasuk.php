<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';

    protected $fillable = [
        'no_surat',
        'tanggal_surat',
        'perihal',
        'is_read',
        'divisi',
    ];

    public function suratKeluar(): HasOne
    {
        return $this->hasOne(SuratKeluar::class);
    }
}
