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
                                <h2>Управление ролями</h2>
                            </div>
                            <div class="pull-right">
                                @can('role-create')
                                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Создать новую роль</a>
                                @endcan
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
                            <th width="100px">No</th>
                            <th width="280px">Имя</th>
                            <th >Действие</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Показать</a>
                                @can('role-edit')
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Редактировать</a>
                                @endcan
                                @can('role-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {!! $roles->render() !!}

            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection
