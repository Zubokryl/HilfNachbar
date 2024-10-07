<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Получить все отзывы
    public function index()
    {
        return response()->json(Review::with(['consumer', 'provider'])->get());
    }

    // Создать отзыв
    public function store(Request $request)
    {
        $request->validate([
            'consumer_id' => 'required|exists:consumers,id',
            'provider_id' => 'required|exists:providers,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($request->all());

        return response()->json(['message' => 'Review created successfully', 'review' => $review], 201);
    }
}