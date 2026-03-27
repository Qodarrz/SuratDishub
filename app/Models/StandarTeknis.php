<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarTeknis extends Model
{
    use HasFactory;

    protected $table = 'standar_teknis';

    protected $fillable = [
        'no_surat',
        'tanggal_surat',
        'perihal',
        'file_path',
        'cloudinary_public_id',
        'unit_kerja_id',
        'keterangan',
    ];
}
