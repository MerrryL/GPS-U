<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageRequest extends Model
{
    use HasFactory;

    protected $fillable=['name', 'description'];

    public function observations()
    {
        return $this->belongsToMany(Observation::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
