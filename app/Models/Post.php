<?php

namespace App\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $dates = ['published_at'];

    protected $fillable = [
        'thumbnail_id',
        'author_id',
        'organization_id',
        'title',
        'content',
        'excerpt',
        'slug',
        'status',
        'published_at'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function post_status()
    {
        return $this->belongsTo(PostStatus::class, 'status_id', 'id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function thumbnail()
    {
        return $this->belongsTo(File::class, 'thumbnail_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(PostStatus::class);
    }
}
