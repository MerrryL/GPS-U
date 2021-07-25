<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldGroup extends Model
{
    use HasFactory;

    public function constatation_field_values()
    {
        return $this->hasMany(ConstatationFieldValue::class)->with('field_type');
    }
}
