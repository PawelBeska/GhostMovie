@extends('admin.master')

@section('header')
    @include('admin.global.header.header')
@stop
@section('sidebar')
    @include('admin.global.sidebar.sidebar')
@stop
@section('body')
    @include('admin.elements.index.index')
@stop
