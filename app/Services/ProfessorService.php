<?php

namespace App\Services;

use App\Models\Professor;
use Exception;

class ProfessorService 
{
    public static function store($request)
    {
        try {
            return [
                'status' => true,
                'user' => Professor::create($request)
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function edit($id)
    {
        $professor = Professor::FindOrFail($id);
        try {
            return [
                'status' => true,
                'user' => $professor
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
            return [
                'status' => true,
                'user' => Professor::find($id)->update($request)
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
            return [
                'status' => true,
                'user' => Professor::findOrFail($id)->delete()
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }
}