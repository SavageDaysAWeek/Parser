<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|file',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|integer|exists:brands,id',
            'in_stock' => 'required|boolean',
            'dimensions' => 'required|string'
        ];
    }
}
