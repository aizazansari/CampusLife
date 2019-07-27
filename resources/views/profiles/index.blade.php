@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-3">
      <div class="col-3">
        <img src="https://instagram.fisb6-1.fna.fbcdn.net/vp/bb0e6fe145176b6d69acbc50ee29c985/5DC8D9C8/t51.2885-19/s320x320/22709172_932712323559405_7810049005848625152_n.jpg?_nc_ht=instagram.fisb6-1.fna.fbcdn.net" class="rounded-circle" style="width: 150px; height:150px"/>
      </div>
      <div class="col-9">
        <div class="d-flex justify-content-between align-items-baseline">
          <h1>{{$user->username}}</h1>
          <a href="/post/create">Add New Post</a>
        </div>
        <div class="d-flex">
          <div class="pr-3"><strong class="pr-1">{{$user->posts->count()}}</strong>posts</div>
          <div class="pr-3"><strong class="pr-1">26.8k</strong>followers</div>
          <div class="pr-3"><strong class="pr-1">224</strong>following</div>
        </div>
        <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
        <div class="pt-4"><strong> {{$user->profile->title}} </strong> </div>
        <div> {{$user->profile->description}} </div>
        <div> <a href="#">{{$user->profile->url}}</a></div>
      </div>
    </div>

    <div class="row p-5">
      @foreach($user->posts as $post)
      <div class="col-4 pd-4">
        <a href="/post/{{$post->id}}">
          <img src="/storage/{{$post->image}}" class="w-100"/>
        </a>
      </div>
      @endforeach
    </div>
</div>
@endsection
