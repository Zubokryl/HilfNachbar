<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsumerRegisterRequest;
use App\Models\Consumer;
use Illuminate\Support\Facades\Hash;


class ConsumerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('consumer_register');
    }

    public function register(ConsumerRegisterRequest $request)
    {
        $consumer = Consumer::create([
            'cons_fname' => $request->cons_fname,
            'cons_lastname' => $request->cons_lastname,
            'cons_email' => $request->cons_email,
            'cons_password' => Hash::make($request->cons_password), 
        ]);

        return redirect()->route('login')->with('success', 'The registration was successful. Please log in.');
    }
}