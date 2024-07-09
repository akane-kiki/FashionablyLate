@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('link')
<a href="{{ route('register') }}" class="header-link" >register</a>
@endsection

@section('content')
<div class="login-form">
    <div class="login-form__heading">
        <h2 class="login-form__title">Login</h2>
    </div>

    <div class="login-form__main">
        <form action="{{ route('login') }}" method="post" class="login-form__form">
            @csrf
            <div class="login-form__group">
                <label for="email" class="login-form__label">メールアドレス</label>
                <input type="email" name="email" id="email" class="login-form__input" placeholder="例: test@example.com" value="{{ old('email') }}">
                <p class="login-error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="login-form__group">
                <label for="password" class="login-form__password">パスワード</label>
                <input type="password" name="password" id="password" class="login-form__input" placeholder="例: coachtech1106">
                <p class="login-error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <input type="submit" class="login-form__btn" value="ログイン">
        </form>
    </div>
</div>
@endsection