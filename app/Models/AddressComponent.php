<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressComponent extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function types()
    {
        return $this->belongsToMany(AddressComponentType::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
