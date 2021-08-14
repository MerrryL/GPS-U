<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Constatation;
use App\Models\FieldType;
use Illuminate\Database\Eloquent\Model;

class ConstatationFieldValue extends Model
{
    use HasFactory;

    public function field_type()
    {
        return $this->belongsTo(FieldType::class);
    }
}
