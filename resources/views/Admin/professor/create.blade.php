@extends('adminlte::page')

@section('title', 'Formulario')

@section('content')
   <div class="card">

       <div class="card-header">
           <h3 class="card-title">Formulário de Professor</h3>
       </div>

       <div class="card-body">
        @if (isset($professor))
            {!! Form::model($professor, ['url' => route('professor.update', $professor), 'method' => 'put']) !!}
        @else
        {!! Form::open(['url' => route('professor.store')]) !!}
        @endif
       
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            {!! Form::label('data_nascimento', 'Data de Nascimento') !!}
            {!! Form::date('data_nascimento', null,['class' => 'form-control']) !!}
            @error('data_nascimento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
       </div>
   </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop