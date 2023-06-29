<?php

namespace App\Http\Requests\Cabanas;

use Illuminate\Foundation\Http\FormRequest;

class StoreCabanasRequest extends FormRequest
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
            'nombre' => 'required',
            'imagen' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'link_pagina' => 'required',
        ];
    }
}
