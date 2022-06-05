<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldGroup extends Model
{
    use HasFactory;

    public $fillable = ['name', 'type'];

    public function observation()
    {
        return $this->belongsTo(Observation::class);
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
    }


}
