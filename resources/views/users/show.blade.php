@php
$title = $user->name
@endphp
@extends('layouts.layout')
@section('content')
<div class="row">
  <aside class="col-md-4">
    <section class="user_info">
      <h1>
        <img src={{gravator_for($user)}}>
        {{$user->name}}
      </h1>
    </section>
    <section class="stats">
      @include('shared.stats')
    </section>
  </aside>
  <div class="col-md-8">
    @auth
    @include('users.follow_form')
    @endauth
    @if (!empty($user->microposts))
    <h3>Microposts ({{ $user->microposts->count() }})</h3>
    <ol class="microposts">
      @each('components.micropost', $microposts, 'micropost')
    </ol>
    {{$microposts->links()}}
    @endif
  </div>
</div>
@endsection