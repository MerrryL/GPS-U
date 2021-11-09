<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable=['name', 'description', 'realisation_date', 'report_date', 'report_periodicity', 'task_status_id', 'followup_id'];

    public function followup()
    {
        return $this->belongsTo(Followup::class);
    }

    public function operators()
    {
        return $this->belongsToMany(User::class, 'task_operator');
    }

    public function task_status()
    {
        return $this->belongsTo(TaskStatus::class);
    }
}
