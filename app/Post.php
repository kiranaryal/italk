<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);

    }
  
  
// public function posts()
// {
//     return $this->hasMany(Post::class)->orderBy('created_at','DESC');
// }
public function comments()
{
  return $this->hasMany('App\Comment');
}
public function likes()
{
  return $this->hasMany('App\Like');
}
public function dislikes()
{
  return $this->hasMany('App\Dislike');
}
}
