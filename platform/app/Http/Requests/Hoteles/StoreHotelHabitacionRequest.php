<?php

namespace App\Http\Requests\Hoteles;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelHabitacionRequest extends FormRequest
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
            'hotel_id' => 'required',
            'nombre' => 'required',
            'categoria_id' => 'required',
            'especificaciones' => 'required',
            'precio_noche' => 'required',
            'minimo_noches' => 'required',
            'minimo_personas' => 'required',
            'maximo_personas' => 'required',
            'imagen' => 'required',
        ];
    }
}
