<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;


class AuthenticatedSessionController extends Controller
{


    public function create()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式でメールアドレスを入力してください。',
            'password.required' => 'パスワードを入力してください。',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withErrors(['error' => 'ログインに失敗しました。']);
    }
}
