<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coach_id',
    ];

    public function walas()
    {
        return $this->belongsTo(User::class, 'coach_id', 'id');
    }

    public function student()
    {
        return $this->hasMany(StudentRombel::class, 'rombel_id', 'id');
    }
}
