<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        return view('category.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:categories|min:3|max:40']);
        Category::create([
            'name' => $request->input('name'),
        ]);
        $response = array('message' => 'تم إضافه صنف جديد', 'success' => true);
        return back()->with($response);
    }

    public function create()
    {

    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {

    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|unique:categories|min:3|max:40']);
        Category::findOrFail($request->input('id'))->update(['name' => $request->input('name')]);
        $response = array('message' => 'تم تعديل الصنف بنجاح', 'success' => true);
        return redirect()->route('category.index')->with($response);
    }

    public function destroy(Category $category)
    {

        $category->delete();
        $response = array('message' => 'تم حذف الصنف بنجاح', 'success' => true);
        return redirect()->route('category.index')->with($response);
    }
}
