<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldGroup extends Model
{
    use HasFactory;

    public function constatation()
    {
        return $this->belongsTo(Constatation::class);
    }
    public function field_types()
    {
        return $this->hasMany(FieldType::class);
    }
}
