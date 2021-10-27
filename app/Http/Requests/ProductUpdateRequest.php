<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique('products')->ignore($this->product, 'name')],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'category_id' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama produk',
            'price' => 'Harga',
            'description' => 'Deskripsi',
            'category_id' => 'Kategori produk',
        ];
    }
}
