@php
$title = '';
@endphp
@extends('layouts.layout')
@section('content')
@auth
@include('static_pages.authorize.true')
@else
@include('static_pages.authorize.false')
@endauth
@endsection