<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('order.index', compact('orders'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Order::create([
            'meal_id' => $request->input('meal_id'),
            'user_id' => auth()->user()->id,
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'qty' => $request->input('qty'),
            'address' => $request->input('address'),
            'status' => __('order.The request is being reviewed'),
        ]);
        $notification = array(
            'message' => 'تم الطلب بنجاح',
            'success' => true
        );

        return redirect()->route('home')->with($notification);
    }

    public function show(Order $order)
    {
    }

    public function edit(Order $order)
    {
    }

    public function update(Request $request, int $id)
    {
        Order::findOrFail($id)->update(['status' => $request->input('status')]);
        return back();
    }

    public function destroy(Order $order)
    {
    }
}
