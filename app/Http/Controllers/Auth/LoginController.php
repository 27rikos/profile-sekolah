<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credential)) {

            $role = Auth::user()->role;

            $request->session()->regenerate();

            switch ($role) {
                case 'admin':
                    return redirect()->intended('dashboard');
                case 'users':
                    return redirect()->intended('/');
            }
        }

        return back()->with('error', 'Login Gagal, Password atau Email Mungkin Salah!');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try {
            $validate_data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $hashPassword = Hash::make($request->password);
            $data = User::create($validate_data);
            $data['password'] = $hashPassword;
            $data->save();
            return redirect()->route('login')->with('success', 'Berhasil Mendaftarkan Akun');
        } catch (Exception $e) {
            return redirect()->route('registration')->with('error', 'Gagal Mendaftarkan Akun');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
