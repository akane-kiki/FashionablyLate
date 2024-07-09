@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('link')
<a href="/login" class="header-link">login</a>
@endsection


@section('content')
<div class="register-form">
    <div class="register-form__heading">
        <h2 class="register-form__title">Register</h2>
    </div>

    <div class="register-form__main">
        <form action="{{ route('register') }}" method="post" class="register-form__form">
            @csrf
            <div class="register-form__group">
                <label for="name" class="register-form__label">お名前</label>
                <input type="text" name="name" id="name" class="register-form__input" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                <p class="register-error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="register-form__group">
                <label for="email" class="register-form__label">メールアドレス</label>
                <input type="email" name="email" id="email" class="register-form__input" placeholder="例: test@example.com" value="{{ old('email') }}">
                <p class="register-error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="register-form__group">
                <label for="password" class="register-form__label">パスワード</label>
                <input type="password" name="password" id="password" class="register-form__input" placeholder="例: coachetech1106">
                <p class="register-error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>



            <div class="register-form__group">
                <label for="password_confirmation" class="register-form__label">パスワード確認</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="register-form__input" placeholder="例: coachetech1106">
                <p class="register-error">
                @error('password_confirmation')
                {{ $message }}
                @enderror
                </p>
            </div>

            <input type="submit" class="register-form__btn" value="登録">
        </form>
    </div>
</div>
@endsection