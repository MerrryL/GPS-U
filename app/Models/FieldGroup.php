<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldGroup extends Model
{
    use HasFactory;

    public $fillable = ['name', 'type', 'logical_operator'];

    public function constatation()
    {
        return $this->belongsTo(Constatation::class);
    }
    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
