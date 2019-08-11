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

   public function user()
   {
       return $this->belongsTo('App\User');
   }
}
