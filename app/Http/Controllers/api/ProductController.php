<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     * 
     * @author  Marcos Conde
     * @since   23/07/2025
     */
    public function index()
    {
        $products = Product::all();

        if (!$products)
        {
            return response()->json(['message' => 'Não há produtos cadastrados.']);
        }
        return $products;
    }

    /**
     * Saves a product record.
     * 
     * @param   ProductStoreRequest $request
     * 
     * @author  Marcos Conde
     * @since   24/07/2025
     */
    public function store(ProductStoreRequest $request)
    {
        $inputs = $request->validated();

        $product = Product::create($inputs);

        return response()->json(
            [
                'message' => 'Produto cadastrado com sucesso',
                'object'  => $product
            ], 201);
    }

    /**
     * Returns a specific product.
     * 
     * @param   string  $id     key of product
     * 
     * @author  Marcos Conde
     * @since   24/07/2025
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product)
        {
            return response()->json(['message' => "Produto de id $id não encontrado."]);
        }

        return $product;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param   ProductUpdateRequest  $request key of product
     * @param   string                $id     key of product
     * 
     * @author  Marcos Conde
     * @since   24/07/2025
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::find($id);

        $inputs = $request->validated();

        $product->update($inputs);

        return response()->json(
            [
                'message' => 'Produto atualizado com sucesso',
                'object' => $product
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
