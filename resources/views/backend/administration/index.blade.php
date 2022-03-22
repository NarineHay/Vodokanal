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
                            <h2>Список администраторов</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('administration.create') }}"> Создать нового администратора</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class=" table table-bordered">
                    <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Эл. адрес</th>
                    <th>Роль</th>
                    <th width="280px">Действие</th>
                    </tr>
                    @foreach ($administrators as $key => $administrator)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $administrator->first_name }}</td>
                        <td>{{ $administrator->last_name }}</td>
                        <td>{{ $administrator->email }}</td>
                        <td>{{ $administrator->roles[0]['name'] }}</td>

                        <td>
                        <a class="btn btn-info" href="{{ route('administration.show',$administrator->id) }}">Показывать</a>
                        <a class="btn btn-primary" href="{{ route('administration.edit',$administrator->id) }}">Редактировать</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['administration.destroy', $administrator->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection
