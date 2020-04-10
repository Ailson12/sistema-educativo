<?php

namespace App\Services;

use App\Models\Aluno;
use App\Models\Curso;
use Exception;

class AlunoService 
{
    public static function store($request)
    {
        try {
            return [
                'status' => true,
                'user' => Aluno::create($request)
            ];
        } catch (Exception $erro) {
           return [
                'status' => false,
                'erro' => $erro->getMessage()
           ];
        }
    }

    public static function getAlunoPorId($id)
    {
        try {
            return [
                'status' => true,
                'aluno' => Aluno::findOrFail($id),
                'curso' => Curso::all()->pluck('nome', 'id')
            ];
        } catch (Exception $erro) {
           return [
            'status' => false,
            'erro' => $erro->getMessage()
           ];
        }
    }

    public static function update($request, $id)
    {
        try {
            $user = Aluno::findOrFail($id);
            $user->update($request);
            return [
                'status' => true,
                'aluno' => $user
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
               ];
        }
    }

    public static function destroy($id)
    {
        try {
            $user = Aluno::findOrFail($id);
            $user->delete();
            return [
                'status' => true,
                'aluno' => $user
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
               ];
        }
    }
}