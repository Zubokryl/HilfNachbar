<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class NotificationController extends Controller
{
    // Список всех уведомлений
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    // Показать конкретное уведомление
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return view('notifications.show', compact('notification'));
    }

    // Создать новое уведомление
    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        Notification::create($request->all());
        return redirect()->route('notifications.index')->with('success', 'Уведомление создано');
    }

    // Удалить уведомление
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Уведомление удалено');
    }
}