<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Localization;

class Coordinate extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function localization()
    {
        return $this->belongsTo(Localization::class);
    }
}
