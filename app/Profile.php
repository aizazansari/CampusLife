<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    //setting to default if no image
    public function profileImage(){
      $imagePath = ($this->image) ? $this->image : 'profile/CLtHtoCfCI0tWAMrYqNhgJjUJD8YxKPDPkz7R5qs.png';
      return '/storage/' . $imagePath;
    }

    public function followers(){
      return $this->belongsToMany(User::class);
    }

    public function user(){ //looks for user_id from the Profiles model and compares to User class
      return $this->belongsTo(User::class);
    }
}
