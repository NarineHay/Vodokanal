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
                            <h2>Список зарегистрированных</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('users.create') }}"> Создать нового пользователя</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
                @endif

                <table class="table table-bordered">
                 <tr>
                   <th>#</th>
                   <th>Имя</th>
                   <th>Фамилия</th>
                   <th>Отчество</th>
                   <th>Эл. адрес</th>
                   <th>Тип организации</th>
                   <th>Название организации</th>
                   <th>Остаток средств</th>
                   <th>Статус</th>
                   <th width="280px">Действие</th>
                 </tr>
                 @foreach ($data as $key => $user)
                    @if (!$user->isAdmin())

                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->company_type }}</td>
                            <td>{{ $user->company_name }}</td>
                            <td>{{ $user->balance }}</td>
                            <td>{{ $user->status }}</td>

                            <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endif
                 @endforeach
                </table>


                {!! $data->render() !!}

            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection
