@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
  <img src="/storage/{{$post->image}}" class="w-100"/>
    </div>

    <div class="col-4">
        <div class="d-flex align-items-center">
          <div class="pr-3">
            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px;">
          </div>
          <div>
            <div class="font-weight-bold">
              <a href="/profile/{{$post->user->id}}">
                <span class="text-dark">{{$post->user->username}}</span>
              </a>
            </div>
          </div>
          <rsvp-button post="{{$post->id}}" attending="{{$attends}}"></rsvp-button>
        </div>
        <hr>
      <p>
        <span class="font-weight-bold">
          <a href="/profile/{{$post->user->id}}">
            <span class="text-dark">{{ $post->user->username}}</span>
            </a>
          </span> {{$post->caption}}
        </p>
        <hr>
        @foreach($attendingPaginated as $attendant)
          <p style="margin-bottom:0px;"><strong>{{$attendant->username}}</strong> is attending</p>
        @endforeach
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            {{$attendingPaginated->links()}}
          </div>
        </div>
  </div>
</div>
</div>
@endsection
