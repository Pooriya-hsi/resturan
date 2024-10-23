@extends('layout.master')
@section('title', 'About Page')

@section('content')
@php
    $about = App\Models\AboutUs::first();
@endphp
@include('home.about')
@endsection