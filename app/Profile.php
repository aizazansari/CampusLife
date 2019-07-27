<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function user(){ //looks for user_id from the Profiles model and compares to User class
      return $this->belongsTo(User::class);
    }
}
