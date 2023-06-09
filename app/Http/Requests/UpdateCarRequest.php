<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'registration_number' => 'required_if:is_registered,true',
            'is_registered' => 'boolean',
            'name' => 'sometimes|string',
        ];
    }
}
