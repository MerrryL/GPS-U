<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Constatation extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['description'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->singleFile();
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function localization()
    {
        return $this->hasOne(Localization::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function image_requests()
    {
        return $this->belongsToMany(ImageRequest::class,'images');
    }

    public function observations()
    {
        return $this->belongsToMany(Observation::class);
    }

    public function observers()
    {
        return $this->belongsToMany(User::class, 'constatation_observer');
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class)->withPivot('value');
    }
}
