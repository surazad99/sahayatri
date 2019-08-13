<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
   protected $fillable = ['user_id','group_id'];

   public function details()
   {
       return $this->hasOne('App\BidDetails');
   }

   public function agency()
   {
       return $this->belongsTo('App\User','user_id');
   }

   public function group()
   {
       return $this->belongsTo('App\Group');
   }
}
