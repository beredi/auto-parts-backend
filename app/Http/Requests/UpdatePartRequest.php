<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_id' => 'nullable|exists:cars,id',
            'name' => 'sometimes|string',
            'serial_number' => 'sometimes|string',
        ];
    }
}
