<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ConsumerAuthController;
use App\Http\Controllers\Auth\ProviderAuthController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\RoleSelectionController;
use App\Http\Controllers\ConsumerProfileController;
use App\Http\Controllers\ProviderProfileController;
use App\Http\Controllers\ConsumerController; 
use App\Http\Controllers\ProviderController; 

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/role-selection', [RoleSelectionController::class, 'showRoleSelection'])->name('role.selection');


Route::get('/consumer/register', [ConsumerAuthController::class, 'showRegisterForm'])->name('consumer.register');
Route::post('/consumer/register', [ConsumerAuthController::class, 'register']);


Route::get('/provider/register', [ProviderAuthController::class, 'showRegisterForm'])->name('provider.register');
Route::post('/provider/register', [ProviderAuthController::class, 'register']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('/login/consumer', [AuthController::class, 'consumerLogin'])->name('consumer.login');


Route::post('/login/provider', [AuthController::class, 'providerLogin'])->name('provider.login');


Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index');


Route::middleware(['auth:consumer'])->group(function () {
    Route::resource('consumers', ConsumerController::class)->except(['create', 'store']);
    Route::get('/consumers/profile', [ConsumerProfileController::class, 'show'])->name('consumer.profile.show');
    Route::get('/consumers/profile/edit', [ConsumerProfileController::class, 'edit'])->name('consumer.profile.edit');
    Route::post('/consumers/profile/update', [ConsumerProfileController::class, 'update'])->name('consumer.profile.update');
});


Route::middleware(['auth:provider'])->group(function () {
    Route::resource('providers', ProviderController::class)->except(['create', 'store']);
   
    Route::get('/providers/profile', [ProviderProfileController::class, 'show'])->name('provider.profile.show');
    Route::get('/providers/profile/edit', [ProviderProfileController::class, 'edit'])->name('provider.profile.edit');
    Route::post('/providers/profile/update', [ProviderProfileController::class, 'update'])->name('provider.profile.update');
});

// Логаут
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');