<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdate extends FormRequest
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
            'name' => 'required|string',
            'whatsapp_number' => 'sometimes|string|min:10',
            'university' => 'sometimes|string',
            'degree' => 'sometimes|string',
            'specialization' => 'sometimes|string',
        ];
    }
}
