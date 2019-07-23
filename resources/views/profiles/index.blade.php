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
          <a href="#">Add New Post</a>
        </div>
        <div class="d-flex">
          <div class="pr-3"><strong class="pr-1">188</strong>posts</div>
          <div class="pr-3"><strong class="pr-1">26.8k</strong>followers</div>
          <div class="pr-3"><strong class="pr-1">224</strong>following</div>
        </div>
        <div class="pt-4"><strong> {{$user->profile->title}} </strong> </div>
        <div> {{$user->profile->description}} </div>
        <div> <a href="#">{{$user->profile->url}}</a></div>
      </div>
    </div>

    <div class="row p-5">
      <div class="col-4">
        <img src="https://instagram.fisb6-1.fna.fbcdn.net/vp/f971710dd8d777b5bacedd6f5cdcca7a/5DB0B9C8/t51.2885-15/e35/c0.109.925.925a/s240x240/66056371_2243301639072331_4740487891029112385_n.jpg?_nc_ht=instagram.fisb6-1.fna.fbcdn.net" class="w-100">
      </div>
      <div class="col-4">
        <img src="https://instagram.fisb6-1.fna.fbcdn.net/vp/f971710dd8d777b5bacedd6f5cdcca7a/5DB0B9C8/t51.2885-15/e35/c0.109.925.925a/s240x240/66056371_2243301639072331_4740487891029112385_n.jpg?_nc_ht=instagram.fisb6-1.fna.fbcdn.net" class="w-100">
      </div>
      <div class="col-4">
        <img src="https://instagram.fisb6-1.fna.fbcdn.net/vp/f971710dd8d777b5bacedd6f5cdcca7a/5DB0B9C8/t51.2885-15/e35/c0.109.925.925a/s240x240/66056371_2243301639072331_4740487891029112385_n.jpg?_nc_ht=instagram.fisb6-1.fna.fbcdn.net" class="w-100">
      </div>
    </div>
</div>
@endsection
