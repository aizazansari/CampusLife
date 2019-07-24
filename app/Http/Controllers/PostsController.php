<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct(){ //makes sure signed in to access all other functions
      $this->middleware('auth');
    }
    public function create(){
      return view('posts/create');
    }
    public function store(){
      //only caption and image validated so data only has these values.
      //can add ' another => '' ' to just pass everything else without validation
      $data = request()->validate([
        'caption' => 'required',
        'image' => 'required|image',
      ]);

      //default is some private folder which we cant access so we change path of image
      $imagePath = request('image')->store('uploads','public'); //stores in storage/app/public/uploads
      //link this directory with the public/storage/uploads which is accesible to user
      auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image' => $imagePath,
      ]);
      return redirect('/profile/' . auth()->user()->id);
    }
}
