<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

class PostsController extends Controller
{

    public function __construct(){ //makes sure signed in to access all other functions
      $this->middleware('auth');
    }

    public function index(){
      $users = auth()->user()->following()->pluck('profiles.user_id');
      //paginate shows 10 posts per page
      //with makes it faster by loading it in one go
      $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(10);
      return view('posts.index',compact('posts'));
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
      $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
      $image->save();
      //link this directory with the public/storage/uploads which is accesible to user
      auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image' => $imagePath,
      ]);
      return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post){ //by doing App\Post you automatically fetch the post that id belongs to
      $attends=(auth()->user()) ? auth()->user()->attending->contains($post->id) : false;
      $attendingPaginated=$post->attendants()->paginate(15);
      return view('posts/show',compact('post','attends','attendingPaginated'));//passes post as post
    }
}
