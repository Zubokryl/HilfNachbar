<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSlot;

class CalendarController extends Controller
{
    // Получить все доступные слоты
    public function index()
    {
        return response()->json(ServiceSlot::all());
    }

    // Создать новый слот
    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'service_id' => 'required|exists:services,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $slot = ServiceSlot::create($request->all());

        return response()->json(['message' => 'Slot created successfully', 'slot' => $slot], 201);
    }
}