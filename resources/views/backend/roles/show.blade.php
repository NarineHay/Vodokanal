@extends('backend.layouts.app')

@section('title')
@section('style')
    <link href="{{ asset('assets/css/user-support.css') }}" rel="stylesheet">
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
                            <h2> Показать роль</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Назад</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Имя:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Разрешения:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection
