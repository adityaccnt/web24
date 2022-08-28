<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'asset_url',
        'quantity',
    ];

    public function file()
    {
        return $this->belongsTo(File::class, 'asset_url');
    }
}
