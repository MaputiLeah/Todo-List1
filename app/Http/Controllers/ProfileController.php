<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function showUpdateForm()
    {
        return view('updateprofile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            // Add validation rules for additional fields
        ]);

        $user->update($request->all());

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
