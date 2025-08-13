<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    /**
     * Show the edit profile form.
     */
    public function edit()
    {
        return view('admin.profile.edit', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the admin profile information.
     */
    public function update(Request $request)
    {
        $currentUser = Auth::user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $currentUser->id],
            'password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        $currentUser->fill([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        if (!empty($validatedData['password'])) {
            $currentUser->password = Hash::make($validatedData['password']);
        }

        $currentUser->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profile has been updated successfully.');
    }
}
