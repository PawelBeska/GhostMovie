@extends('home.master')

@section('header')
    @include('home.global.header.header')
@stop

@section('body')
    @include('home.elements.series.series')
@stop
@section('footer')
    @include('home.global.footer.footer')
@stop