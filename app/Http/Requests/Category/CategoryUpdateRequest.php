<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // gets the id of the parameter to ignore in validation
        $categoryId = $this->route('category');

        return [
            'code' => 'required|unique:categories,code, '. $categoryId .'|max:10|min:3',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:200'
        ];
    }
}