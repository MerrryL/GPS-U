<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'short_description', 'description', 'fine_amount', 'codex_id'];

    public function constatations()
    {
        return $this->belongsToMany(Constatation::class);
    }

    public function field_groups()
    {
        return $this->hasMany(FieldGroup::class);
    }

    public function observation_type()
    {
        return $this->belongsTo(ObservationType::class);
    }

    public function codex()
    {
        return $this->belongsTo(Codex::class);
    }

     public function image_requests()
    {
        return $this->belongsToMany (ImageRequest::class);
    }

}
