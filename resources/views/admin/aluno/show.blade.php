<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <title>Detalhes</title>
    <style></style>
</head>
<body>
    <div class="container">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
                <h3 class="card-title">Informações do Aluno(a): {{$aluno->nome}}</h3>
            </div>
            <div class="card-body">
                    <p> Data de Nascimento: {{ $aluno->data_nascimento }}</p>
                    <br>
                <p> CEP:  {{ $aluno->cep }}</p>
                    <br> 
                <p> Logradouro: {{ $aluno->logradouro }}</p>
                    <br>
                <p> Numero:  {{ $aluno->numero }}</p>
                    <br> 
                <p> Bairro:  {{ $aluno->bairro }}</p>
                    <br> 
                <p> Cidade:  {{ $aluno->cidade }}</p>
                    <br> 
                <p>Estado:  {{ $aluno->estado }}</p> 
                    <br> 
                    <a href="{{route('aluno.index')}}" class="btn btn-primary">Voltar a Pagina inicial</a>
            </div>
        </div>
    </div>
</body>
</html>


