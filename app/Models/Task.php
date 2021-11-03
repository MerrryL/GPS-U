<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable=['name', 'description', 'realisation_date', 'report_date', 'report_periodicity', 'task_status_id'];

    public function followups()
    {
        return $this->hasMany(Followup::class);
    }

    public function operators()
    {
        return $this->hasMany(User::class);
    }
}
