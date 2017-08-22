<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users,username,',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.unique'=>'Tên đã bị trùng',

            'email.required' => 'Vui lòng nhập Email',
            'email.unique' => 'Email đã được đăng ký',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'password.required' => 'Vui lòng nhập mật khẩu',

            'password_confirmation.required'=>'Không được để trống',
            'password_confirmation.same'=>'Mật khẩu không trùng khớp',
        ];
    }

}
