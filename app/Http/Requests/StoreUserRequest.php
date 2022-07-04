<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'password' => 'required',
            'avatar' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'user_group_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên nhân viên',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'avatar.required' => 'Vui lòng nhập ảnh ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'email.required' => 'Vui lòng nhập Email ',
            'email.unique' => 'Email đã tồn tại ',
            'gender.required' => 'Vui lòng nhập giới tính',
            'user_group_id.required' => 'Vui lòng nhập nhóm nhân viên',
        ];
        
    }
}
