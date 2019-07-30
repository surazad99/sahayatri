<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public $timestamps = false;

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function packages()
    {
        return $this->belongsToMany('App\Package', 'package_destination');
    }
}
