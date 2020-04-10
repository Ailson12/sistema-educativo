@extends('adminlte::page')

@section('title', 'Formulario')

@section('content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Formulário de Curso</h3>
        </div>

        <div class="card-body">
            @if (isset($curso))
            {!! Form::model($curso,['url' => route('curso.update', $curso), 'method' => 'PUT']) !!}
            @else
            {!! Form::open(['url' => route('curso.store')]) !!}
            @endif
    
            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                {!! Form::label('professor_id', 'Professor') !!}
                {!! Form::select('professor_id',$professor,null, ['class' => 'form-control']) !!}
                @error('professor_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>

    </div>
@stop

@section('css')
    
@stop

@section('js')

@stop