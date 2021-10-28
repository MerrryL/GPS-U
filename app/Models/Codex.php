<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codex extends Model
{
    use HasFactory;

    public function observations()
    {
        return $this->hasMany(Observation::class);
    }
}
