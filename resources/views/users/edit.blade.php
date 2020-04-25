@php
$title = 'Edit user';
@endphp
@extends('layouts.layout')
@section('content')
<div class="row">
  <div class="col-md-6 offset-md-3">
    <form action="{{route('users.update', ['user' => $user->id])}}" method="post">
      @method('patch')
      @csrf
      @include('shared.error_messages')
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $user->name)}}">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $user->email)}}">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
      <label for="password_confirmation">Password Confirmation</label>
      <input type="password" name="password_confirmation" class="form-control">
      <input type="submit" value="Save changes" class="btn btn-primary">
    </form>
    <div class="gravatar_edit">
      <img src={{gravator_for($user)}}>
      <a href="http://gravatar.com/emails" target="_blank" rel="noopener">change</a>
    </div>
  </div>
</div>
@endsection