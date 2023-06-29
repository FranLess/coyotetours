<?php

namespace App\Http\Requests\Hoteles;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelesHabitacionesImagenesRequest extends FormRequest
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
            'habitacion_id' => 'required',
            'nombre' => 'required',
            'imagen' => 'required',
        ];
    }
}
