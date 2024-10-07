<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumerProfileController extends Controller
{
    public function show(Consumer $consumer)
    {
        if (Auth::guard('consumer')->user()->id === $consumer->id) {
            return view('consumers.profile.show', compact('consumer'));
        }

        return redirect()->route('login');
    }

    public function edit(Consumer $consumer)
    {
        if (Auth::guard('consumer')->user()->id === $consumer->id) {
            return view('consumers.profile.edit', compact('consumer'));
        }

        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        $user = Auth::guard('consumer')->user();

        dd($user);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $request->validate([
            'cons_fname' => 'required|string|max:255',
            'cons_email' => 'required|string|email|max:255|unique:consumers,cons_email,' . $user->id,
            'cons_phone' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('cons_email', 'cons_fname', 'cons_phone'));

        return redirect()->route('consumer.profile.show', ['consumer' => $user->id])
                         ->with('status', 'Profile updated!');
    }

    public function logout()
    {
        Auth::guard('consumer')->logout();
        return redirect('/')->with('message', 'You have been logged out.');
    }
}