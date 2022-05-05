<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductsUpdateRequest extends FormRequest
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
        $requestRules = [
            'name' => 'required|min:10',
            'article' => [
                'required',
                'regex:/^[a-zA-Z0-9]+$/',
                Rule::unique('products', 'article')->ignore((int) $this->product->id),
            ],
            'status' => 'required',
            'data' => 'nullable',
        ];

        if (config('products.role') != 'admin') unset($requestRules['article']);

        return $requestRules;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'data' => $this->data ?? null,
        ]);
    }
}
