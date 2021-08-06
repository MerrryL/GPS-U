<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Localization;

class Address extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function getGeometryAttribute($value)
    {
        return json_decode($value);
    }

    public function localization()
    {
        return $this->hasOne(Localization::class);
    }

    public function address_components()
    {
        return $this->hasMany(AddressComponent::class);
    }
}
