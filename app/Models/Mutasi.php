<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peserta',
        'wa_peserta',
        'nama_wali',
        'wa_wali',
        'lampiran',
    ];
}
