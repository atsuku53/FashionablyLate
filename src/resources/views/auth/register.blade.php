@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')
<nav class="header__nav">
    <a class="header__nav-link" href="/login">login</a>
</nav>
@endsection

@section('content')
<div class = "register__container">
    <div class="register__title">Register</div>
    <div class="register__content">
        <form class="register__form" action="/register" method="POST">
            @csrf
                <div class="register__form--block">
                    <div class="register__label">お名前</div>
                    <input class="register__input" type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                    <div class="register__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="register__form--block">
                    <div class="register__label">メールアドレス</div>
                    <input class="register__input" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    <div class="register__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="register__form--block">
                    <div class="register__label">パスワード</div>
                    <input class="register__input" type="password" name="password" placeholder="例: coachtech1106">
                    <div class="register__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="register__form--block">
                    <div class="register__label">パスワード確認</div>
                    <input class="register__input" type="password" name="password_confirmation" placeholder="例: coachtech1106">
                    <div class="register__error">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="register__button">
                    <button type="submit" class="register__button--submit">登録</button>
                </div>
        </form>
    </div>
</div>
@endsection