<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'organization_id',
        'thumbnail_id',
        'slug',
        'title',
        'description',
        'location',
        'status_id',
        'menu',
        'published_at',
        'is_active',
    ];

    protected $dates = ['published_at'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function thumbnail()
    {
        return $this->belongsTo(File::class, 'thumbnail_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }

    public function status()
    {
        return $this->belongsTo(PostStatus::class);
    }
}
