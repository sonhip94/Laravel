<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'sltParent' => 'required',
            'txtName' => 'required|unique:products,name',
            'fImages' => 'required',
            'txtPrice' => 'required|numeric|min:1',

        ];
    }

    public function messages()
    {
        return [
            'sltParent.required' => 'Chưa chọn Category',

            'txtName.required' => 'Chưa nhập tên sản phẩm',
            'txtName.unique' => 'Tên sản phẩm đã trùng',

            'txtPrice.required' => 'Chưa nhập giá sản phẩm',
            'txtPrice.numeric' => 'Giá sản phẩm phải là số',
            'txtPrice.min' => 'giá sản phẩm phải lớn hơn 0',

            'fImages.required' => 'Chưa chọn ảnh',
            'fImages.mimes' => "Yêu cầu chọn ảnh"
        ];
    }
}
