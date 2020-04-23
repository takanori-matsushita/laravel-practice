@php
$title = 'All users';
@endphp
@extends('layouts.layout')
@section('content')
<h1>All users</h1>

{{$users->links()}}
<ul class="users">
  @each('components.user', $users, 'user')
</ul>
{{$users->links()}}
@endsection