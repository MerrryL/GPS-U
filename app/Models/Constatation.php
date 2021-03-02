<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Dossier;
use App\Models\Localization;
use App\Models\Action;

class Constatation extends Model
{
    use HasFactory;

    public function dossiers()
    {
        return $this->belongsToMany(Dossier::class);
    }

    public function localization()
    {
        return $this->hasOne(Localization::class);
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
