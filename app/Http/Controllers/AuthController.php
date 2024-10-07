<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConsumerLoginRequest;
use App\Http\Requests\ProviderLoginRequest; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); 
    }

    public function consumerLogin(ConsumerLoginRequest $request): RedirectResponse
{
    $credentials = $request->validate([
        'cons_email' => 'required|email',
        'cons_password' => 'required|string',
    ]);

    $credentials['password'] = $credentials['cons_password'];
    unset($credentials['cons_password']); 

    if (Auth::guard('consumer')->attempt($credentials)) {
        $consumer = Auth::guard('consumer')->user();
        return redirect()->route('consumer.profile.show', ['consumer' => $consumer->id])
                         ->with('message', 'Successfully logged in as Consumer.');
    }

    return redirect()->back()->withErrors(['cons_email' => 'The provided credentials are incorrect.'])->withInput();
}



public function providerLogin(ProviderLoginRequest $request): RedirectResponse
{

    $credentials = $request->validate([
        'prov_email' => 'required|email',
        'prov_password' => 'required|string',
    ]);

   
    $credentials['password'] = $credentials['prov_password'];
    unset($credentials['prov_password']); 

    
    if (Auth::guard('provider')->attempt($credentials)) {
        $provider = Auth::guard('provider')->user();
        return redirect()->route('provider.profile.show', ['provider' => $provider->id])
                         ->with('message', 'Successfully logged in as Provider.');
    } else {
        
   
        return redirect()->back()->withErrors(['prov_email' => 'The provided credentials are incorrect.'])->withInput();
    }
}


public function logout(Request $request)
{
    if (Auth::guard('consumer')->check()) {
        Auth::guard('consumer')->logout();
    } elseif (Auth::guard('provider')->check()) {
        Auth::guard('provider')->logout();
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'Вы вышли из системы.');
}
}