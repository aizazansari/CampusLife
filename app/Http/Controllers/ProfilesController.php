<?php

namespace App\Http\Controllers;
use App\User; //since this imported just User instead of App\User

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
    $this->authorize('update',$user->profile);
    return view('profiles/edit',compact('user')); //compact does the same job as in the above method
  }

  public function update(User $user){
    $this->authorize('update',$user->profile);
    $data = request()->validate([
      'title' => 'required',
      'description' => 'required',
      'url' => 'url',
      'image' => 'image',
    ]);
    //auth ensures we only edit authenticated user
    
    if (request('image')){
      $imagePath = request('image')->store('profile','public'); //stores in storage/app/public/uploads
      $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
      $image->save();
    }
    auth()->user()->profile->update(array_merge(
      $data,
      ['image => $imagePath']
    ));
    return redirect("/profile/{$user->id}");
  }
}
