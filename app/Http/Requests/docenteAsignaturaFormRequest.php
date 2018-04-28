<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class docenteAsignaturaFormRequest extends FormRequest
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
    public function rules() //parametros del formulario
    {
        return [
            //
            'codigo'=> 'required | max:30',
            'fechaIni'=>'required',
            'fechaFin'=>'required',
            'usuarioID'=>'requiered',
            'asignaturaID'=>'requiered',

        ];
    }
}
