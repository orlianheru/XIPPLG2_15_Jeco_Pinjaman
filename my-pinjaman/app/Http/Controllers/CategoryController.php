<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'status' => 200,
            'message'=> 'Category retrived successfully.',
            'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $category = Category::create($request->all());

        return respon()->json([
            'status' => 201,
            'messege' => 'Category created successfully.',
        ], 201);
    }

    public function show($id)
    {
    $category = Category::find($id);

    if (!$category) {
        return response()->json([
            'status' => 404,
            'message' => 'Category not found.',
            'data' => null
        ], 404);
    }

    return response()->json([
        'status' => 200,
        'message' => 'Category retrieved successfully.',
        'data' => $category
     ], 200);
    }

    public function update(Request $request, $id)
    {
    $category = Category::find($id);

    if (!$category) {
        return response()->json([
            'status' => 404,
            'message' => 'Category not found.',
            'data' => null
        ], 404);
    }

    $request->validate(['name' => 'string|max:255']);
    $category->update($request->all());

    return response()->json([
        'status' => 200,
        'message' => 'Category updated successfully.',
        'data' => $category
     ], 200);
    }


}
