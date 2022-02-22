@extends('layouts.app')

@section('title')
@section('style')
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="register my-5">
    <div class="">
        <div class="d-flex justify-content-center w-100">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1 class="my-3 font-weight-bold">Логин</h1>
            <div class="mb-4">
                <input type="email" class="form-control w-100 py-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" id="email" aria-describedby="email"  placeholder="Имейл" name="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-4">
                <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" id="password"  placeholder="Пароль" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class=" d-flex flex-column align-items-center mb-3 acount">
                <a href="{{ route('password.request') }}" class="mb-3">Забыли Ваш пароль?</a>
                <button type="submit" class="btn px-5 mb-3 text-white">Войти</button>
            </div>
        </form>
      </div>

    </div>
  </div>

@endsection

