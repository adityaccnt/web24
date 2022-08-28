<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'asset_url',
        'extension',
        'size',
        'is_active',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }    
}
