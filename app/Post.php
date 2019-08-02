<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // tells laravel we're checking the data thats coming so you dont need to guard
    protected $guarded = [];

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function attendants(){
      return $this->belongsToMany(User::class);
    }
}
