<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'name' => 'required|max:100',
            'display_name' => 'required|max:100',
            'key_code' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên quyền không được để trống',
            'name.max' => 'Tên quyền không được quá 100 ký tự',

            'display_name.required' => 'display_name không được để trống',
            'display_name.max' => 'display_name không được quá 100 ký tự',

            'key_code.required' => 'key_code không được để trống',
            'key_code.max' => 'key_code không được quá 100 ký tự',
        ];
    }
}
