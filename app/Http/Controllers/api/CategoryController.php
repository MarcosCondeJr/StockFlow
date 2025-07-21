<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     * 
     * @author  Marcos Conde
     * @since   16/07/2025
     */
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * Saves a category record.
     * 
     * @param   Request $request    data to be saved
     * 
     * @author          Marcos Conde
     * @since           18/07/2025
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    /**
     * Returns a specific category.
     * 
     * @param   string  $id     key of category
     * 
     * @author          Marcos Conde
     * @since           21/07/2025
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        return response()->json($category, 200);
    }

    /**
     * Update a specific category in storage.
     * 
     * @param   Request $request        values for update
     * @param   string  $id             key of the category specifc
     * 
     * @author          Marcos Conde
     * @since           21/07/2025
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->all());

        return response()->json(["message" => "Categoria editada com sucesso!", "Object" => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     *  
     * @param   string  $id     key of the category for to be deleted
     * 
     * @author          Marcos Conde
     * @since           21/07/2025
     */
    public function destroy(string $id)
    {
        $category = Category::destroy($id);

        return response()->json([
            'message' => "Categoria deletada com sucesso",
            'Object' => $category
        ], 200);
    }
}