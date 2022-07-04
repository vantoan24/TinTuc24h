<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComment extends FormRequest
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
            'content'  => 'required',
            'startus' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'content.required'  => "Vui lòng nhập tên loại tin",
            'startus.required'  => "Vui lòng trạng thái tin",
        ];
    }
}
