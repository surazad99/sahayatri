<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public $timestamps = false;

    public function destinations()
    {
        return $this->belongsToMany('App\Destination', 'package_destination');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }
}
