<?php


namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'prov_email' => 'required|email|unique:providers',
            'prov_password' => 'required|min:6',
            'prov_fname' => 'required|string|max:255',
            'prov_lastname' => 'required|string|max:255',
            
        ]);

        // Создание нового поставщика
        Provider::create($request->all());

        return redirect()->route('providers.index')->with('success', 'provider is created');
    }

    // Показать список всех провайдеров
public function index()
{
    $providers = Provider::all(); // Получение всех провайдеров

   // Для отладки
   foreach ($providers as $provider) {
    dd($provider->id); // Выводим ID провайдера и останавливаем выполнение
}

    return view('provider.index', compact('providers')); // Возврат представления
}

    // Показать конкретного поставщика (профиль)
    public function show($id)
    {
        // Здесь нужно использовать существующее представление
        $provider = Provider::findOrFail($id);
        return view('provider.profile.show', compact('provider')); // Изменено на правильное представление
    }

    // Показать форму для редактирования профиля поставщика
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('provider.profile.edit', compact('provider')); // Изменено на правильное представление
    }

    // Обновить профиль поставщика
    public function update(Request $request, $id)
    {
        $provider = Provider::findOrFail($id);

        $request->validate([
            'prov_email' => 'required|email|unique:providers,prov_email,' . $provider->id,
            'prov_fname' => 'required|string|max:255',
            'prov_lastname' => 'required|string|max:255',
            // добавьте другие необходимые поля
        ]);

        $provider->update($request->all());

        return redirect()->route('provider.profile.show', ['provider' => $provider->id])
                         ->with('success', 'Профиль поставщика обновлен'); // Перенаправление на страницу профиля
    }

    // Удалить профиль поставщика
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Профиль поставщика удален');
    }
}