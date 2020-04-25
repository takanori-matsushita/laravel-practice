@php
$title = '';
$feed_items = $current_user->microposts()->where('user_id', $current_user->id)->paginate(30);

@endphp
@extends('layouts.layout')
@section('content')
@auth
@include('static_pages.authorize.true')
@else
@include('static_pages.authorize.false')
@endauth
@endsection