<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    // Список всех потребителей
    public function index()
    {
        $consumers = Consumer::all();
        return view('consumers.index', compact('consumers'));
    }

    // Показать форму для создания нового потребителя
    public function create()
    {
        return view('consumers.create');
    }

    // Сохранить нового потребителя
    public function store(Request $request)
    {
        $request->validate([
            'cons_email' => 'required|email|unique:consumers',
            'cons_password' => 'required|min:6',
            // добавьте другие необходимые поля
        ]);

        // Создание нового потребителя
        Consumer::create([
            'cons_email' => $request->cons_email,
            'cons_password' => bcrypt($request->cons_password), // Не забудьте зашифровать пароль
            // добавьте другие необходимые поля
        ]);

        return redirect()->route('consumers.index')->with('success', 'Потребитель создан');
    }

    // Показать конкретного потребителя
    public function show($id)
    {
        $consumer = Consumer::findOrFail($id);
        return view('consumers.show', compact('consumer'));
    }

    // Показать форму для редактирования профиля потребителя
    public function edit($id)
    {
        $consumer = Consumer::findOrFail($id);
        return view('consumers.edit', compact('consumer'));
    }

    // Обновить профиль потребителя
    public function update(Request $request, $id)
    {
        $consumer = Consumer::findOrFail($id);

        $request->validate([
            'cons_email' => 'required|email|unique:consumers,cons_email,' . $consumer->id,
            'cons_password' => 'nullable|min:6', // Сделаем пароль необязательным для обновления
            // добавьте другие необходимые поля
        ]);

        $data = $request->all();
        
        if (isset($data['cons_password'])) {
            $data['cons_password'] = bcrypt($data['cons_password']); // Зашифровываем пароль, если он указан
        } else {
            unset($data['cons_password']); // Удаляем пароль, если он не указан
        }

        $consumer->update($data);

        return redirect()->route('consumer.profile.show', ['consumer' => $consumer->id])
                         ->with('success', 'Профиль потребителя обновлен');
    }

    // Удалить профиль потребителя
    public function destroy($id)
    {
        $consumer = Consumer::findOrFail($id);
        $consumer->delete();

        return redirect()->route('consumers.index')->with('success', 'Профиль потребителя удален');
    }
}