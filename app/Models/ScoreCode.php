<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'learning_id',
        'score',
        'score_code_id',
    ];
}
