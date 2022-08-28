<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'member_id',
        'tapel_id',
        'role',
        'position_id',
        'is_active',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function member()
    {
        return $this->belongsTo(User::class);
    }
}
