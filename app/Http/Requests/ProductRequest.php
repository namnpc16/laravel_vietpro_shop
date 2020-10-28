<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'code' => 'required|unique:products',
            'name' => 'required|max:255',
            'price' => 'required|max:50',
            'featured' => 'required',
            'state' => 'required',
            'img' => 'required|mimes:jpeg,jpg,png',
            'info' => 'required',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Danh mục không được để trống',

            'code.required' => 'Mã sản phẩm không được để trống',
            'code.unique' => 'Mã sản phẩm đã tồn tại',

            'name.required' => 'Tên sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự',

            'price.required' => 'Giá sản phẩm không được để trống',
            'price.max' => 'Giá sản phẩm không được quá 50 ký tự',

            'featured.required' => 'featured sản phẩm không được để trống',
            'state.required' => 'Trạng thái sản phẩm không được để trống',
            'img.required' => 'Bạn chưa chọn ảnh',
            'img.mimes' => 'Vui lòng chọn file ảnh',

            'info.required' => 'Info sản phẩm không được để trống',
            'description.required' => 'Mô tả sản phẩm không được để trống',
        ];
    }
}
