<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Followup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=['name', 'description', 'followup_status_id'];

    public function observation()
    {
        return $this->belongsTo(Observation::class);
    }

    public function supervisors()
    {
        return $this->belongsToMany(User::class, 'followup_supervisor');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function followup_status()
    {
        return $this->belongsTo(FollowupStatus::class);
    }
}
