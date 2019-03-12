@extends('home.master')

@section('header')
    @include('home.global.header.header')
@stop

@section('body')
    @include('home.elements.movies.movies')
@stop
@section('footer')
    @include('home.global.footer.footer')
@stop