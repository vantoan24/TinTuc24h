<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserGroupRequest extends FormRequest
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
            'name' => 'required|unique:user_groups',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên nhóm',
            'name.unique' => 'Tên nhóm đã tồn tại',
        ];
        
    }
}
