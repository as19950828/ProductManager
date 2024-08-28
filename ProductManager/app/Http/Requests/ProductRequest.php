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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:20'],
            'description' => ['max:200'],
            'price' => ['required', 'integer', 'regex:/^[0-9]+$/'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '商品名',
            'description' => '商品説明',
            'price' => '金額',
            'category_id' => 'カテゴリ',
            'maker_id' => 'メーカー',
        ];
    }
}
