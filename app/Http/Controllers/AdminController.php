<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Список всех пользователей
    public function usersIndex()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Удалить пользователя
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь удален');
    }

    // Список всех услуг
    public function servicesIndex()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    // Список всех заказов
    public function ordersIndex()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    // Список всех отзывов
    public function reviewsIndex()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    // Управление услугами, заказами и отзывами могут быть добавлены здесь по аналогии
}