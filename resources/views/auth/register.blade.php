@php
$title = 'Sign up';
@endphp
@extends('layouts.layout')

@section('content')
<h1>Sign up</h1>
<div class="row">
  <div class="col-md-6 offset-md-3">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      @include('shared.error_messages')
      <label for="name">Name</label>
      <input type="text" id="user_name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
      <label for="email">Email</label>
      <input type="email" id="user_email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
      <label for="password">Password</label>
      <input type="password" id="user_password" name="password" class="form-control @error('password') is-invalid @enderror">
      <label for="password_confirmation">Confirmation</label>
      <input type="password" id="user_password_confirmation" name="password_confirmation" class="form-control">
      <input type="submit" class="btn btn-primary" value="Create my account">
    </form>
  </div>
</div>
@endsection