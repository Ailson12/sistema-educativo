<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
              return [
                  'nome' => 'required',
                  'data_nascimento' => 'required',
                  'cep' => 'required',
                  'logradouro' => 'required',
                  'bairro' => 'required',
                  'cidade' => 'required',
                  'estado' => 'required',
                  'numero' => 'required',
                  'curso_id' => 'required',
              ];
            }
            case 'PUT':
              {
                return [
                    'nome' => 'required',
                    'data_nascimento' => 'required',
                    'cep' => 'required',
                    'logradouro' => 'required',
                    'bairro' => 'required',
                    'cidade' => 'required',
                    'estado' => 'required',
                    'numero' => 'required',
                    'curso_id' => 'required',
                ];
              }
        }
    }
}
