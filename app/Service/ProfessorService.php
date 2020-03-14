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
    public static function update($request, $id)
    {
        try {
            return [
                'user' => Professor::find($id)->update($request)
            ];
        } catch (Exception $erro) {
            return [
                'erro' => $erro->getMessage()
            ];
        }
    }
    public static function destroy($id)
    {
        try {
            return [
                'status' => Professor::findOrFail($id)->delete()
            ];
        } catch (Exception $erro) {
            return [
                'erro' => $erro->getMessage()
            ];
        }
    }
}