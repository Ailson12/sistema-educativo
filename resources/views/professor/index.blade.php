@extends('adminlte::page')

@section('title', 'Professor')

@section('content_header')
    <h1>Professor</h1>
@stop

@section('content')
    {!! $dataTable->table() !!}
@stop

@section('css')
    
@stop

@section('js')
    {!! $dataTable->scripts() !!}
@stop