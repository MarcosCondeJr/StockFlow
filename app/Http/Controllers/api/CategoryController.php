<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
     * Saves a category record
     * 
     * @param   Request $request    data to be saved
     * 
     * @author          Marcos Conde
     * @since           18/07/2025
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        if ($category)
        {
            return $category;
        }

        return false;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
