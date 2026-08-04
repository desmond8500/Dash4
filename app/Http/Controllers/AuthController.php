<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    static function login(string $email, string $password)
    {
        $credentials = array(
            'email' => $email,
            'password' => $password,
        );

        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }

    static function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}
