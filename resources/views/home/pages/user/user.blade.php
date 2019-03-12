@extends('home.master')

@section('header')
    @include('home.global.header.header')
@stop

@section('body')
    @include('home.elements.user.user')
@stop
@section('footer')
    @include('home.global.footer.footer')
@stop