<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create() {
        $title = 'Registration page';
        return view('user.registration', compact('title'));
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'nullable|image',
        ]);

        if ($request->hasFile('avatar')) {
            $folder = date('m-Y');
            $avatar = $request->file('avatar')->store("images/{$folder}");
        }


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null,
        ]);

        return redirect()->route('registration.create');

    }



    public function loginForm() {
        $title = 'Login';
        return view('user.login', compact('title'));
    }



    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->home();
        }

        return redirect()->back()->with('error', 'Error Auth');

    }


    public function logout() {
        Auth::logout();
        return redirect()->route('login.create');
    }

}
