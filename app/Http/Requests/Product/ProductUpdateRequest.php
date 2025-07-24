<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        $productId = $this->route('product');

        return [
            'code'           => 'required|string|unique:products,code,'. $productId . '|max:10|min:3',
            'name'           => 'required|string|max:150',
            'description'    => 'nullable|string|max:200',
            'category_id'    => 'required|integer',
            'cost_price'     => 'required|numeric',
            'sale_price'     => 'required|numeric',
            'quantity_stock' => 'required|integer'
        ];
    }

    public function prepareForValidation()
    {
        $productId = $this->route('product');

        $product = Product::find($productId);

        if (!$product)
        {
            abort(response()->json(['message' => 'Produto não encoontrado.'], 404));
        }
    }
}