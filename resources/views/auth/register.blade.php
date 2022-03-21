@extends('layouts.app')

@section('title')
@section('style')
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="register my-5">
    <div class="">

        <div class="d-flex justify-content-center w-100">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1 class="my-3 font-weight-bold">Регистрация</h1>
            <div class="d-flex justify-content-between mb-4">
                <div class="" style="width:48%">
                    <input type="text" class="form-control py-2 @error('first_name') is-invalid @enderror" id="nametext" placeholder="Имя" name="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="" style="width:48%">
                    <input type="text" class="form-control py-2 @error('last_name') is-invalid @enderror" id="secondname" placeholder="Фамилия" name="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group mb-4">
                <input type="text" class="form-control w-100 py-2 @error('surname') is-invalid @enderror" value="{{ old('surname') }}" id="surname" placeholder="Отчество" name="surname">
                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="input-group mb-4">
                <select class="form-select w-100 p-2 @error('company_type') is-invalid @enderror" id="inputGroupSelect04" aria-label="Example select with button addon" name="company_type" value="">
                <option selected disabled>Тип организации</option>
                @if (isset($organization_type))

                    @foreach ($organization_type as $item)
                        <option value="{{$item->name}}">{{ $item->name }}</option>
                    @endforeach

                @endif

                </select>
                @error('company_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <input type="email" class="form-control w-100 py-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" id="email" aria-describedby="email"  placeholder="Эл. адрес" name="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-4">
                <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" id="password"  placeholder="Создать пароль" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <input type="password" class="form-control py-2 @error('password_confirmation') is-invalid @enderror" id="repassword"  placeholder="Подтвердить пароль" name="password_confirmation">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class=" d-flex flex-column align-items-center mb-3 acount">
                <a href="{{route('login')}}" class="mb-3">Уже есть аккаунт ?  логин</a>
                <button type="submit" class="btn px-4 mb-3 text-white">Создать аккаунт</button>
            </div>
        </form>
      </div>

    </div>
  </div>

@endsection
