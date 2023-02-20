<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MealsController extends Controller
{
    public function index()
    {
        $meals = Meal::paginate(5);
        return view('meal.index', compact('meals'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('meal.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|min:3|max:500',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        $image = $request->file('image'); //$image = clinic.jpg
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        //$name_gen =4654654646 .jpg
        Image::make($image)->resize(300, 300)->save('upload/meals/' . $name_gen);
        $save_url = 'upload/meals/' . $name_gen;


        Meal::create([
            'category' => $request->post('category'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $save_url,
        ]);


        $notification = array(
            'message' => 'تم الاضافة بنجاح',
            'success' => true
        );

        return redirect()->back()->with($notification);

    }

    public function show(Meal $meal)
    {
        $meal = Meal::findOrFail($meal);

        return view('meal.details', compact('meal'));
    }

    public function edit(Meal $meal)
    {
    }

    public function update(Request $request, Meal $meal)
    {
    }

    public function destroy(Meal $meal)
    {
    }
}
