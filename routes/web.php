<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/main', function () {
    return view('main');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contacts', function () {
    return view('contacts');
});
 
Route::get('/blog', [BlogController::class, 'post']);

Route::get('/', function () {
    return view('index');
});