<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Constatation;

class Localization extends Model
{
    use HasFactory;

    public function constatations()
    {
        return $this->hasMany(Constatation::class);
    }
}
