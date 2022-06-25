<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable= ['name','default_value', 'is_required'];

    public function field_group()
    {
        return $this->belongsTo(FieldGroup::class);
    }

    public function constatations()
    {
        return $this->hasMany(Constatation::class, "constatation_field");
    }
}
