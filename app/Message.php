<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
  protected $fillable = ['message', 'user_id', 'profile_id'];
    //
    public function profile()
    {
      return $this->belongsTo('App\Profile');
    }







    public function user()
    {
      return $this->belongsTo('App\User');
    }
}