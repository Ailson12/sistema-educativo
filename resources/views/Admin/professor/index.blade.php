@extends('adminlte::page')

@section('title', 'Professor')

@section('content_header')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Lista de Professor</h2>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    {!! $dataTable->scripts() !!}
@stop

