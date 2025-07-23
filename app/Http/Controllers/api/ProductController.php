<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * Saves a product record.
     * 
     * @param   ProductStoreRequest $request
     * 
     * @author  Marcos Conde
     * @since   23/07/2025
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
