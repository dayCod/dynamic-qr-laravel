<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private function rules()
    {
        return [
            'email' => ['required', 'exists:users,email', 'email'],
            'password' => ['required'],
        ];
    }

    private function message()
    {
        return [
            'required' => ':attribute Tidak Boleh Kosong',
            'exists' => ':attribute Belum terdaftar dalam database',
            'email' => ':attribute Harus Berformat Email'
        ];
    }

    private function attribute()
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function index()
    {
        return view('auth.page.login.index');
    }

    public function authenticate(Request $request)
    {
        // Validation
        $data = $request->validate(self::rules(), self::message(), self::attribute());

        if(Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors('Email / Password Salah')->onlyInput('email');
    }
}
