<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Constatation;

class Action extends Model
{
    use HasFactory;

    public function constatations()
    {
        return $this->belongsToMany(Constatation::class);
    }
    
}
