@extends('adminlte::page')

@section('title', 'Formulário')

@section('content_header')
    
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulário de Alunos</h3>
    </div>
    <div class="card-body">
        @if (isset($aluno))
            {!! Form::model($aluno, ['url' => route('aluno.update', $aluno), 'method' => 'put']) !!}
        @else
        {!! Form::open(['url' => route('aluno.store')]) !!}
        @endif
        
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('data_nascimento', 'Data de Nascimento') !!}
            {!! Form::date('data_nascimento',null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cep', 'CEP') !!}
            {!! Form::text('cep',null, ['class' => 'form-control', 'onfocusout' => 'buscaCep()']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('logradouro', 'Logradouro') !!}
            {!! Form::text('logradouro',null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('bairro', 'Bairro') !!}
            {!! Form::text('bairro',null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cidade', 'Cidade') !!}
            {!! Form::text('cidade',null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('estado', 'Estado') !!}
            {!! Form::text('estado',null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('numero', 'Numero') !!}
            {!! Form::number('numero',null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('curso_id', 'Curso') !!}
            {!! Form::select('curso_id',$curso,null, ['class' => 'form-control']) !!}
        </div>

            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
<script>
    function buscaCep() {
     let cep = document.getElementById('cep').value;
     let url = 'https://viacep.com.br/ws/'+ cep +'/json/';

     axios.get(url)
     .then( function(response) {
         document.getElementById('logradouro').value = response.data.logradouro
         document.getElementById('bairro').value = response.data.bairro
         document.getElementById('cidade').value = response.data.localidade
         document.getElementById('estado').value = response.data.uf
     }).catch( function(error) {
        swal.fire({
            title: 'Ops!',
            text: 'Cep não encontrado'
        })
     });
    }
</script>  
@stop