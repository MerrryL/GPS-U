<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowupStatus extends Model
{
    use HasFactory;

    public function followups()
    {
        return $this->hasMany(Followup::class);
    }
}
