<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Address;

class Localization extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function constatations()
    {
        return $this->hasOne(Constatation::class);
    }

    public function coordinate()
    {
        return $this->hasOne(Coordinate::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
