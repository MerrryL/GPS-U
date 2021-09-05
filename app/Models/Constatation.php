<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Dossier;
use App\Models\Localization;
use App\Models\Action;
use App\Models\Image;
use App\Models\Observation;
use App\Models\Observer;
use App\Models\FieldGroup;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Constatation extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['comment'];


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

    public function dossiers()
    {
        return $this->belongsToMany(Dossier::class);
    }

    public function localization()
    {
        return $this->hasOne(Localization::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function observations()
    {
        return $this->belongsToMany(Observation::class);
    }

    public function observers()
    {
        return $this->belongsToMany(Observer::class);
    }

    public function field_groups()
    {
        return $this->hasMany(FieldGroup::class);
    }
}
