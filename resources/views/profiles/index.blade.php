@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-3">
      <div class="col-3">
        <img src="{{$user->profile->profileImage()}}" class=" w-100 rounded-circle"/>
      </div>
      <div class="col-9">
        <div class="d-flex justify-content-between align-items-baseline">
          <div class="d-flex align-items-baseline pb-3">
            <div class="h4">{{$user->username}}</div>
            <follow-button></follow-button>
          </div>
          @can('update',$user->profile)
            <a href="/post/create">Add New Post</a>
          @endcan
        </div>
        <div class="d-flex">
          <div class="pr-3"><strong class="pr-1">{{$user->posts->count()}}</strong>posts</div>
          <div class="pr-3"><strong class="pr-1">26.8k</strong>followers</div>
          <div class="pr-3"><strong class="pr-1">224</strong>following</div>
        </div>
        @can('update',$user->profile)
          <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
        @endcan
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
