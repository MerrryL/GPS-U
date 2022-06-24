<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Address;

class Localization extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];
    protected $attributes = [
        'formatted_address' => '',
    ];


    public function constatations()
    {
        return $this->hasOne(Constatation::class);
    }
}
