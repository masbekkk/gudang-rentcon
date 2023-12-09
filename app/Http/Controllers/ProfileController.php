<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.profile.profile', ['user' => $user]);
    }
    function update($id, Request $request)
    {
        // dd($request->password != null);
        $user = User::findOrFail(Auth::user()->id);
        if ($request->password != null) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password = Hash::make($request->password);
        }else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Data Profile Berhasil diperbarui!');
    }
}
