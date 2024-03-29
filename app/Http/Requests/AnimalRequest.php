<?php

namespace App\Http\Requests;

use App\Animal;
use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            'raca' => 'required',
            'sexo' => 'in:'. Animal::MACHO . ','. Animal::FEMEA,
        ];
    }
}
