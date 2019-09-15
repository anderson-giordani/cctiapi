<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaFisicaRequest extends FormRequest
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
        return [
            'cpf' => [
                'required',
                'unique:pessoas_fisicas',
                'size:11',
                function ($attribute, $value, $fail) {
                    if (self::validaCPF($value) == false) {
                        return $fail('Formato de CPF inválido');
                    }
                }
            ],
            'nome' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.unique' => 'O CPF informado está sendo usado por outra pessoa',
            'nome.required'  => 'O campo nome é obrigatório',
        ];
    }

    private function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}
