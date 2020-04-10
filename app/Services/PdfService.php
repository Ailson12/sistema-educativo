<?php

namespace App\Services;

use App\Models\Aluno;

class PdfService
{
    public static function getRelatorioData()
    {
        return Aluno::join('cursos as c', 'alunos.curso_id', '=', 'c.id')
                            ->join('professors as p', 'c.professor_id', '=','p.id')
                            ->select(
                                'alunos.nome as aluno_nome',
                                'c.nome as curso_nome',
                                'p.nome as professor_nome'
                            )
                            ->get();
    }
}