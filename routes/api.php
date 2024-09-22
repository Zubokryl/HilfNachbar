<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/cors', function () {
    return response()->json(['message' => 'CORS работает!']);
});