<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CartRequest extends Request
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
            //
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|digits_between:10,11',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Họ tên đang bị để trống",

            'email.required' => 'Email đang bị để trống',

            'phone.required' => 'Số điện thoại đang bị để trống',
            'phone.numeric' => 'Yêu cầu nhập số',
            'phone.digits_between' => 'Số điện thoại chỉ có thể 10 hoặc 11 số',

            'address.required' => 'Địa chị đang bị để trống'

        ];
    }

}
