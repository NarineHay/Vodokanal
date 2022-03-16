@extends('backend.layouts.app')

@section('title')
@section('style')
    <link href="{{ asset('assets/css/user-support.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/backend-user.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->

        <div class="row pl-4">
            <div class="col pt-2 px-4 pb-4 background-with">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Редактирование пользователя</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Назад</a>
                        </div>
                    </div>
                </div>


                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    Были некоторые проблемы с вашим вводом.<br><br>
                  </div>
                @endif

                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Имя:</strong>
                            <input type="text" class="form-control py-2 @error('first_name') is-invalid @enderror" id="nametext" placeholder="Имя" name="first_name" value="{{ $user->first_name }}">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Фамилия:</strong>
                            <input type="text" class="form-control py-2 @error('last_name') is-invalid @enderror" id="secondname" placeholder="Фамилия" name="last_name" value="{{ $user->last_name }}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Отчество:</strong>
                            <input type="text" class="form-control w-100 py-2 @error('surname') is-invalid @enderror" value="{{ $user->surname }}" id="surname" placeholder="Отчество" name="surname">
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Тип организации:</strong>
                            <select class="form-select w-100 p-2 @error('company_type') is-invalid @enderror" id="inputGroupSelect04" aria-label="Example select with button addon" name="company_type" value="">

                                @if (isset($organization_type))
                                    @foreach ($organization_type as $item)
                                        @if ($item->name == $user->company_type)
                                            <option value="{{$item->name}}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{$item->name}}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                @endif

                            </select>
                                @error('company_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Названия организации:</strong>
                            <input type="text" class="form-control w-100 py-2 @error('company_name') is-invalid @enderror" value="{{ $user->company_name }}" id="company_name" placeholder="Названия организации" name="company_name">
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Эл. адрес:</strong>
                            <input type="email" class="form-control w-100 py-2 @error('email') is-invalid @enderror" value="{{ $user->email }}" autocomplete="email" id="email" aria-describedby="email"  placeholder="Имейл" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Пароль:</strong>
                            <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" id="password"  placeholder="Создать пароль" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Подтвердить Пароль:</strong>
                            <input type="password" class="form-control py-2 @error('password_confirmation') is-invalid @enderror" id="repassword"  placeholder="Подтвердить пароль" name="password_confirmation">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Статус:</strong>
                            <input type="hidden" class="user-status" name="status" value="{{$user->status}}">
                            <div class="w-50 d-felx flex-column justify-content-start">
                                <input type="radio" class="form-control w-50 py-2" id="status1"  name="st" {{ $user->status ==1 ? 'checked' : '' }} value="1">
                                <label for="status1">Активный</label>
                            </div>
                            <div class="d-flex">
                                <input type="radio" class="form-control w-50 py-2" id="status2"  name="st" {{ $user->status ==1 ? '' : 'checked' }} value="0">
                                <label for="status2">Пассивный</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </div>

            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection
@section('pagescript')
    <script src="{{ asset('assets/js/backend/edit-user.js')}}"></script>
@endsection
