@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('header')
<nav class="header__nav">
    <a class="header__nav-link" href="/register">register</a>
</nav>
@endsection

@section('content')
<div class = "login__container">
    <div class="login__title">Login</div>
    <div class="login__content">
        <form class="login__form" action="/login" method="POST">
            @csrf
                <div class="login__form--block">
                    <div class="login__label">メールアドレス</div>
                    <input class="login__input" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    <div class="login__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class="login__form--block">
                    <div class="login__label">パスワード</div>
                    <input class="login__input" type="password" name="password" placeholder="例: coachtech1106">
                    <div class="login__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class="login__button">
                    <button type="submit" class="login__button--submit">ログイン</button>
                </div>
        </form>
    </div>
</div>
@endsection