<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize()
    {
        // Esto debería retornar true para permitir que la solicitud pase, normalmente aquí haces chequeo de roles
        return true; // Cambia esto según tus necesidades
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            // Añade otras reglas de validación según tu modelo
        ];
    }
}
