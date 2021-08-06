<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressComponentType extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function address_components()
    {
        return $this->belongsToMany(AddressComponent::class);
    }
}
