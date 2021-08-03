<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdectRequest extends FormRequest
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
            'name' => ['required'],
            'slug' => ['required','unique:products,slug','alpha_dash'],
            'category_id' => ['required','exists:categories,id'],
            'brand_id' => ['required','exists:brands,id'],
            'price' => ['required','min:1000','integer'],
            'desc' => ['required'],
            'image' => ['required','mimes:png,jpg,jepg','max:1024']
        ];
    }
}
