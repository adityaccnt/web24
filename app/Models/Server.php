<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status_id',
        'url',
    ];

    public function status()
    {
        return $this->belongsTo(PostStatus::class);
    }
}
