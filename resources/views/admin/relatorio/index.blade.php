<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th {
            background: #5c5c5c;
            color: white;
        }
        table th, td {
            border:1px solid;
            padding: 5px;
            font-size: 10px;
        }
        h1 {
            text-align: center
        }
    </style>

</head>
<body>
        <h1>Relatório</h1> 
    <hr>
    <div class="table-response-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Aluno</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Professor</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($relatorioData as $relatorio)
                <tr>
                    <td>{{ $relatorio->aluno_nome }}</td>
                    <td>{{ $relatorio->curso_nome }}</td>
                    <td>{{ $relatorio->professor_nome }}</td>
                </tr>
                @empty

                <h2>Sem alunos cadastradas</h2>
                
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>