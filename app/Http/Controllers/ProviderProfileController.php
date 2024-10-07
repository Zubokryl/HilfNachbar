<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderProfileController extends Controller 
{


    public function __construct()
    {
        
        $this->middleware('auth:provider')->except('logout');
    }


    public function show()
    {
        $provider = Auth::guard('provider')->user(); 
        

        if (!$provider) {
            return redirect()->route('login')->withErrors([
                'auth' => 'You must be logged in to view this page.'
            ]);
        }

        return view('providers.profile.show', compact('provider'));
    }

    public function edit()
    {
        $provider = Auth::guard('provider')->user(); 
        
   
        if (!$provider) {
            return redirect()->route('login')->withErrors([
                'auth' => 'You must be logged in to edit this profile.'
            ]);
        }

        return view('providers.profile.edit', compact('provider'));
    }

    public function update(Request $request)
    {
        $provider = Auth::guard('provider')->user(); 
        
        
        if (!$provider) {
            return redirect()->route('login')->withErrors([
                'auth' => 'You must be logged in to update this profile.'
            ]);
        }

        $request->validate([
            'prov_fname' => 'required|string|max:255',
            'prov_email' => 'required|string|email|max:255|unique:providers,prov_email,' . $provider->id,
            'prov_phone' => 'nullable|string|max:20',
        ]);

        $provider->update($request->only('prov_email', 'prov_phone'));

        return redirect()->route('provider.profile.show')->with('status', 'Profile updated successfully.');
    }

    public function logout()
    {
        Auth::guard('provider')->logout();
        return redirect('/')->with('message', 'You have been logged out.');
    }
}