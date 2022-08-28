<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'file_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
