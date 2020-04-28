@extends('layouts.layout')
@section('content')
<div class="row">
  <aside class="col-md-4">
    <section class="user_info">
      <img src="{{ gravator_for($user) }}">
      <h1>{{ $user->name }}</h1>
      <span>
        <a href="{{route('users.show', $user)}}">view my profile</a>
      </span>
      <span><b>Microposts:</b> {{ $user->microposts()->count() }}</span>
    </section>
    <section class="stats">
      @include('shared.stats')
      @if(!empty($users))
      <div class="user_avatars">
        @foreach($users as $user)
        <a href="{{route('users.show', $user)}}">
          <img src="{{ gravator_for($user, ['size'=>30]) }}">
        </a>
        @endforeach
      </div>
      @endif
    </section>
  </aside>
  <div class="col-md-8">
    <h3>{{ $title }}</h3>
    @if(!empty($users))
    <ul class="users follow">
      @each('components.user', $users, 'user')
    </ul>
    {{$users->links()}}
    @endif
  </div>
</div>
@endsection