<?php

namespace App\Http\Requests\Cabanas;

use Illuminate\Foundation\Http\FormRequest;

class StoreCabanasHabitacionesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cabana_id',
            'nombre',
            'categoria_id',
            'especificaciones',
            'minimo_noches',
            'maximo_personas',
            'minimo_personas',
            'precio_noche_base',
            'precio_persona',
            'imagen',
        ];
    }
}
