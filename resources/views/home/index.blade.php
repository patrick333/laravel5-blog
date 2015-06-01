@extends('home.layout')

@section('title')
{{env('site_name').' | '.env('site_description')}}
@endsection

@section('header')
    @include('home.partials.header')
@endsection

@section('content')
    @include('home.partials.main')
@endsection

@section('side')
    @include('home.partials.side')
@endsection

@section('footer')
    @include('home.partials.footer')
@endsection