<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRegisterRequest;
use App\Models\Provider;
use Illuminate\Support\Facades\Hash;


class ProviderAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('provider_register');
    }

    
    public function register(ProviderRegisterRequest $request)
    {
        $provider = Provider::create([
            'prov_fname' => $request->prov_fname,
            'prov_lastname' => $request->prov_lastname,
            'prov_email' => $request->prov_email,
            'prov_password' => Hash::make($request->prov_password), 
        ]);

        return redirect()->route('login')->with('success', 'The registration was successful. Please log in.');
    }
}