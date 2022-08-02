<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionAdd extends FormRequest
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
            'subject_id' => 'required|exists:subject_masters,id',
            'title' => 'required',
            'description' => 'required',
            'source_type_id' => 'sometimes|exists:source_types,id',
            'device_type_id' => 'sometimes|exists:device_types,id',
            'redirection_reason_id' => 'sometimes|exists:redirection_reasons,id',
            'isQCDone' => 'sometimes',
            'comment' => 'sometimes',
            'file_url' => 'array',
        ];
    }
}
