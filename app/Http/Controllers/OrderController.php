<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Получить все заказы
    public function index()
    {
        return response()->json(Order::with(['provider', 'consumer', 'service'])->get());
    }

    // Создать заказ
    public function store(Request $request)
    {
        $request->validate([
            'consumer_id' => 'required|exists:consumers,id',
            'provider_id' => 'required|exists:providers,id',
            'service_id' => 'required|exists:services,id',
            'order_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $order = Order::create($request->all());

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }

    // Показать один заказ
    public function show($id)
    {
        $order = Order::with(['provider', 'consumer', 'service'])->findOrFail($id);
        return response()->json($order);
    }
}