<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'title'  => 'required',
            'description'  => 'required',
            'content'  => 'required',
            'status'  => 'required',
            'puplish_date'  => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'  => 'Trường này là bắt buộc',
            'description.required'  => 'Trường này là bắt buộc',
            'content.required'  => 'Trường này là bắt buộc',
            'status.required'  => 'Trường này là bắt buộc',
            'puplish_date.required'  => 'Trường này là bắt buộc'
        ];
    }
}
