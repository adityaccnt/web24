<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'structure_id',
        'thumbnail_id',
        'album_id',
        'coach_id',
        'head_id',
        'head_name',
        'name',
        'description',
        'active_members',
        'logo_id',
        'instagram',
        'whatsapp',
        'slug',
        'is_active',
    ];

    public function coach()
    {
        return $this->belongsTo(User::class);
    }

    public function head()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function post_active()
    {
        return $this->post()->where('status_id', 1);
    }

    public function album()
    {
        return $this->hasMany(Album::class);
    }

    public function album_active()
    {
        return $this->album()->where('status_id', 1);
    }

    public function thumbnail()
    {
        return $this->belongsTo(File::class, 'thumbnail_id', 'id');
    }

    public function logo()
    {
        return $this->belongsTo(File::class, 'logo_id', 'id');
    }
}
