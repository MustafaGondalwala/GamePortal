<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep3 extends FormRequest
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
            'ac_name' => 'required',
            'ac_number' => 'required',
            'bank_name' => 'required',
            'ifsc' => 'required',
            'pan' => 'required',
            'pan_file' => 'required',
            'cheque_file' => 'required',
        ];
    }
}
