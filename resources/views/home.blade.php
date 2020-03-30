@extends('adminlte::page')

@section('title', 'HOME')

@section('content_header')
    <h1>Página Principal</h1>
    
@stop

@section('content')
    <p>Seja Bem Vindo, {{ auth()->user()->name }}</p>
@stop

@section('css')
    
@stop

@section('js')
    
@stop