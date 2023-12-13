<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $parent_title = "Auth";

    public function login()
    {
        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Login",
            ],
            "data" => [],
        ];

        return view("velzon_auth/login", $pass);
    }

    public function login_process(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where("email", $request->email)->first();
        if (!$user) {
            return redirect()->route('login')
                ->withErrors('Email tidak terdaftar.')
                ->withInput($request->only('email', 'remember'));
        }

        if (!$user->active) {
            return redirect()->route('login')
                ->withErrors('User tidak aktif')
                ->withInput($request->only('email', 'remember'));
        }

        if ($user->role_id == null) {
            return redirect()->route('login')
                ->withErrors('User tidak mempunyai role')
                ->withInput($request->only('email', 'remember'));
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->route('login')
            ->withErrors('Password salah.')
            ->withInput($request->only('email', 'remember'));
    }
}
