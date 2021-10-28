<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function constatations()
    {
        return $this->hasMany(Constatation::class);
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function observation_type()
    {
        return $this->belongsTo(ObservationType::class);
    }

    public function codex()
    {
        return $this->belongsTo(Codex::class);
    }
}
