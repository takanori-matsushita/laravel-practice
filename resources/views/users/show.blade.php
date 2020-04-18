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
  </aside>
</div>
@endsection