<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConstatationFieldValue;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable= ['name', 'options', 'type', 'default_value', 'is_required'];

    public function field_type()
    {
        return $this->belongsTo(FieldType::class);
    }

    public function field_group()
    {
        return $this->belongsTo(FieldGroup::class);
    }

    public function observations()
    {
        return $this->belongsTo(Observation::class);
    }

    public function followups()
    {
        return $this->hasMany(Followup::class);
    }

    public function constatations()
    {
        return $this->hasMany(Constatation::class);
    }
}
