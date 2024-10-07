<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Получить список всех услуг
    public function index()
    {
        return response()->json(Service::all());
    }

    // Создать новую услугу
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service = Service::create($request->all());

        return response()->json(['message' => 'Service created successfully', 'service' => $service], 201);
    }

    // Показать информацию об одной услуге
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    // Обновить услугу
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());

        return response()->json(['message' => 'Service updated successfully', 'service' => $service]);
    }

    // Удалить услугу
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully']);
    }
}