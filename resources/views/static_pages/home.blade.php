@php
$title = ''
@endphp
@extends('layouts.layout')
@section('content')
<div class="center jumbotron">
  <h1>Welcome to the Sample App</h1>

  <h2>
    This is the home page for the
    <a href="https://railstutorial.jp/">Ruby on Rails Tutorial</a>
    sample application.
  </h2>

  <a href={{route('users.signup')}} class="btn btn-lg btn-primary">Sign up now!</a>
</div>

<a href="http://rubyonrails.org/'"><img src="/images/rails.png" alt="Rails logo"></a>
{{-- <img src="/images/kitten.jpg" alt="cat"> --}}
@endsection