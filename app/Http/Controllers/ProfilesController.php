<?php

namespace App\Http\Controllers;
use App\User; //since this imported just User instead of App\User

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
  public function index($user)
  {
      $user = User::findorFail($user); //finding using ID
      return view('profiles/index', [
        'user' => $user,
      ]);
  }

  public function edit(User $user){ //another method to find using ID
    return view('profiles/edit',compact('user')); //compact does the same job as in the above method
  }

  public function update(){
    $data = request()->validate([
      'title' => 'required',
      'description' => 'required',
      'url' => 'url',
      'image' => 'image',
    ]);
  }
}
