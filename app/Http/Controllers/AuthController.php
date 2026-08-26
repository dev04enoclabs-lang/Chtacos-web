<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session(['login_time' => time()]);
            return redirect()->intended('/menu');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Create of the view register users
    public function create()
{
    return view('auth.register');
}

public function store(Request $request)
{
    $request->validate([
        'name'      => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email',
        'password'  => 'required|string|min:8|confirmed',
    ]);

    User::create([
        'name'      => $request->name,
        'last_name' => $request->last_name,
        'email'     => $request->email,
        'password'  => Hash::make($request->password),
        'status'    => 'Activo',
    ]);

    return redirect()->back()->with('success', '¡Usuario registrado correctamente!');
}
}
