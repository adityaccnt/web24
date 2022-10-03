<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'student_id',
    ];

    public function mapel()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function guru()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

}
