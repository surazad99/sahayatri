<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'group_user');
    }

    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function agent()
    {
        return $this->belongsTo('App\User','agent_id');
    }
}
