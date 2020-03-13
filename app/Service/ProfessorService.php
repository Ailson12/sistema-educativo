<?php

namespace App\Service;

use App\Models\Professor;
use Exception;

class ProfessorService 
{
    public static function store($request)
    {
        try {
            return [
                'user' => Professor::create($request)
            ];
        } catch (Exception $erro) {
            return [
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function edit($id)
    {
        $professor = Professor::FindOrFail($id);
        try {
            return [
                'user' => $professor
            ];
        } catch (Exception $erro) {
            return [
                'erro' => $erro->getMessage()
            ];
        }
    }
}