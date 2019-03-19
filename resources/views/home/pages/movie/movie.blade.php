@extends('home.master')

@section('header')
    @include('home.global.header.header')
@stop

@section('body')
    @include('home.elements.movie.movie')
@stop
@section('footer')
    @include('home.global.footer.footer')
@stop