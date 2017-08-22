<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Cate;

class CateRequest extends Request
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
        $cate = Cate::find($this->name);
        $rules = [
            'txtCateName' => 'required|unique:cates,name'
        ];
        if ($this->method() == "PATCH") {
            $rules['txtCateName'] = 'required|unique:cates,name,' . $cate->id;
        }
        return $rules;

    }

    public function messages()
    {
        return [
            'txtCateName.required' => 'Vui lòng nhập tên',
            'txtCateName.unique' => 'Tên đã bị trùng,vui lòng nhập lại'
        ];
    }

}
