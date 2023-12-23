<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
     /**
     * Display the user's profile.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('profile');
    }
   /**
     * Show the form for updating the user's profile.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showUpdateForm()
    {
        return view('updateprofile');
    }
 /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
         // Retrieve the authenticated user
        $user = Auth::user();
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        // Add validation rules for additional fields
        ]);
         // Update the user's information with the validated data
        $user->update($request->all());
        // Redirect back to the profile page with a success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
