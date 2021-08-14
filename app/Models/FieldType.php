<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConstatationFieldValue;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    use HasFactory;

    public function constatation_field_value()
    {
        return $this->hasOne(ConstatationFieldValue::class);
    }

    public function field_group()
    {
        return $this->belongsTo(FieldGroup::class);
    }
}
