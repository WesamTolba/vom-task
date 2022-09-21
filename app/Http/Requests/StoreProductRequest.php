<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_en'  => 'required|max:255|regex:/(^[A-Za-z0-9 ]+$)+/',
            'name_ar'  => 'required|max:255|regex:/\p{Arabic}/u',
            'desc_en'  => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'desc_ar'  => 'required|regex:/\p{Arabic}/u',
            'price'    =>'required|numeric|min:1',
            'with_vat' =>'in:0,1',

        ];
    }
}
