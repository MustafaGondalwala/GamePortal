<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep2 extends FormRequest
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
            'degree1' => 'required',
            'college1' => 'required',
            'year1' => 'required',
            'degree2' => 'required',
            'college2' => 'required',
            'year2' => 'required',
        ];
    }
}
