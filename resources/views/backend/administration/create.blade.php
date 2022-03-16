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
                            <h2>Создать нового администратора</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('administration.index') }}"> Назад</a>
                        </div>
                    </div>
                </div>


                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                     Были некоторые проблемы с вашим действием.<br><br>

                  </div>
                @endif



                {{-- {!! Form::open(array('route' => 'administration.store','method'=>'POST')) !!} --}}
                <form method="POST" action="{{ route('administration.store') }}">
                    @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Имя:</strong>
                            <input type="text" class="form-control py-2 @error('first_name') is-invalid @enderror" id="nametext" placeholder="Имя" name="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- {!! Form::text('first_name', null, array('placeholder' => 'Имя','class' => 'form-control')) !!} --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Фамилия:</strong>
                            <input type="text" class="form-control py-2 @error('last_name') is-invalid @enderror" id="last_name" placeholder="Фамилия" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- {!! Form::text('last_name', null, array('placeholder' => 'Фамилия','class' => 'form-control')) !!} --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Эл. адрес:</strong>
                            <input type="email" class="form-control w-100 py-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" id="email" aria-describedby="email"  placeholder="Эл. адрес" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- {!! Form::text('email', null, array('placeholder' => 'Эл. адрес','class' => 'form-control')) !!} --}}
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
                            {{-- {!! Form::password('password', array('placeholder' => 'Пароль','class' => 'form-control')) !!} --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Подтвердить Пароль:</strong>
                            <input type="password" class="form-control py-2 @error('password_confirmation') is-invalid @enderror" id="repassword"  placeholder="Подтвердить пароль" name="password_confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- {!! Form::password('confirm-password', array('placeholder' => 'Подтвердить Пароль','class' => 'form-control')) !!} --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" multiple>
                            <strong>Роль:</strong>
                            {{-- <div class="w-50 d-felx flex-column justify-content-start">
                                <input type="radio" multiple class="form-control w-50 py-2" id="status1"  name="role[]" value="111">
                                <label for="status1">111</label>
                            </div>
                            <div class="w-50 d-felx flex-column justify-content-start">
                                <input type="radio" multiple selected class="form-control w-50 py-2" id="status2"  name="role[]" value="222">
                                <label for="status2">222</label>
                            </div> --}}
                            @foreach ($roles as $key => $role)
                                <div class="w-50 d-felx flex-column justify-content-start">
                                    <input type="radio"  class="form-control w-50 py-2" id="status{{$key}}[]"  name="role[]" value="{{$role}}">
                                    <label for="status{{$key}}[]">{{$role}}</label>
                                </div>
                            @endforeach
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </form>
                {{-- {!! Form::close() !!} --}}


            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection
