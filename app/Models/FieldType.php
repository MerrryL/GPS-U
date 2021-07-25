<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConstatationFieldValue;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    use HasFactory;

    public function field_groups()
    {
        return $this->hasOneOrMany(ConstatationFieldValue::class);
    }
}
