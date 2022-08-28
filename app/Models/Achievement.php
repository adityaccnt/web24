<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $dates = ['published_at'];

    protected $fillable = [
        'name',
        'description',
        'event',
        'level',
        'published_at',
        'file_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
