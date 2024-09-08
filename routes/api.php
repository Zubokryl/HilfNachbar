<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});