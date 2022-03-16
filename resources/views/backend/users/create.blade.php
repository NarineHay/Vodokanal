@extends('backend.layouts.app')

@section('title')
@section('style')
    <link href="{{ asset('assets/css/user-support.css') }}" rel="stylesheet">
@endsection
@section('content')
<style>
    .invalid-feedback{
        display: block !important
    }
    .form-select.is-invalid, .was-validated .form-select:invalid {
    border-color: #dc3545;
}
</style>
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->

        <div class="row pl-4">
            <div class="col pt-2 px-4 pb-4 background-with">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Создать нового пользователя</h2>
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

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    {{-- @method('PATCH') --}}
                {{-- {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!} --}}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Имя:</strong>
                            {{-- {!! Form::text('name', null, array('placeholder' => 'Имя','class' => 'form-control')) !!} --}}
                            <input type="text" class="form-control py-2 @error('first_name') is-invalid @enderror" id="nametext" placeholder="Имя" name="first_name" value="{{ old('first_name') }}">
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
                            {{-- {!! Form::text('last_name', null, array('placeholder' => 'Фамилия','class' => 'form-control')) !!} --}}
                            <input type="text" class="form-control py-2 @error('last_name') is-invalid @enderror" id="last_name" placeholder="Фамилия" name="last_name" value="{{ old('last_name') }}">
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
                            {{-- {!! Form::text('last_name', null, array('placeholder' => 'Фамилия','class' => 'form-control')) !!} --}}
                            <input type="text" class="form-control py-2 @error('surname') is-invalid @enderror" id="surname" placeholder="Отчество" name="surname" value="{{ old('surname') }}">
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
                            <select class="form-select w-100 p-2 @error('company_type') is-invalid @enderror" id="company_type" name="company_type" value="">

                                @if (isset($organization_type))
                                <option selected disabled>Тип организации</option>
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
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Названия организации:</strong>
                            <input type="text" class="form-control w-100 py-2 @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" id="company_name" placeholder="Названия организации" name="company_name">
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
                            {{-- {!! Form::text('email', null, array('placeholder' => 'Эл. адрес','class' => 'form-control @error("email") is-invalid @enderror')) !!} --}}
                            <input type="email" class="form-control w-100 py-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" id="email" aria-describedby="email"  placeholder="Эл. адрес" name="email">
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
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
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
