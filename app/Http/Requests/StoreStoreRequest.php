<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
            'name' => 'required|unique:stores|max:255|regex:/(^[A-Za-z0-9 ]+$)+/',
            'cost_shipping' => 'required|numeric|min:0',
            'vat_type' =>'required|in:percentage,value',
            'vat_value' => 'required|numeric|min:1',
            'user_id' => 'required|exists:users,id',

        ];
    }
}
