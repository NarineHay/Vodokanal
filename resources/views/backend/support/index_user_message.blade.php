@extends('backend.layouts.app') @section('title' ) @section('content')
<link href="{{ asset('assets/css/feedback.css') }}" rel="stylesheet">

<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 25px;">
                    @if (session('message'))
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('message') }}</div>
                    @endif
                    @if (session('delate'))
                    <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('delate') }}</div>
                    @endif
                    <h3>Сообщение пользователя</h3><br>


                        <!--Table-->
                        <table class="table table-bordered">

                          <!--Table head-->
                          <thead>
                            <tr>
                              <th>#</th>
                              <th class="th-lg">Имя пользователя</th>
                              <th class="th-lg">Заголовок</th>
                              <th class="th-lg">Сообщение</th>
                              <th class="th-lg">Действие</th>
                            </tr>
                          </thead>
                          <!--Table head-->

                          <!--Table body-->
                          <tbody>
                            @foreach ($Contracts as $Contractss)
                            <tr>
                                <td></td>
                                <td>{{$Contractss['user']->first_name}}</td>
                                <td>{{$Contractss->theme}}</td>
                                <td>{{$Contractss->message}}</td>
                                <td>
                                    @if($Contractss->status==0)
                                    <i style="color:red; font-size:20px" class="fa fa-envelope" aria-hidden="true"></i>
                                    @elseif($Contractss->status==1)
                                    <i style="color:green; font-size:20px" class="fa fa-envelope-open" aria-hidden="true"></i>
                                    @endif

                                    <a href="{{route('backend.support_task_show',$Contractss->id)}}"><i style="font-size:20px" class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{route('backend.feedback_delate',$Contractss->id)}}"><i style="font-size:20px" class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                              </tr>
                            @endforeach



                          </tbody>
                          <!--Table body-->

                        </table>
                        <!--Table-->

                   </div>


                <!--card-body-->
            </div>
            <!--card-->
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--animated-->
@endsection
