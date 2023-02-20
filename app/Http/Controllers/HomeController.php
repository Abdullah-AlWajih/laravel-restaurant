<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
     * public function __construct()
     * {
     * $this->middleware('auth');
     * }
     *
     */

    /**
     * Show the application dashboard.
     *
     * //     * @return Renderable
     */

    public function index(Request $request)
    {
        $categories = Category::all();
        $category_name = $request->get('category');
        if ($category_name) {
            $meals = Meal::where('category', $category_name)->get();
        } else {
            $meals = Meal::all();
            $category_name = 'الصفحة الرئيسية';
        }
        if (auth()->user() != null && auth()->user()->is_admin == 1) {
            $orders = Order::orderBy('updated_at')->get();
            return view('admin', compact('orders'));
        } else {
            return view('home', compact('categories', 'meals', 'category_name'));
        }
    }
}
