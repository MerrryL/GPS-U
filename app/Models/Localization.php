<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Address;

class Localization extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function constatations()
    {
        return $this->hasOne(Constatation::class);
    }

    // public function getGeometryAttribute($value)
    // {
    //     return json_decode($value);
    // }
}
