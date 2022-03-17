@extends('backend.layouts.app')
@section('title' ) 
@section('content')
<link href="{{ asset('assets/css/new_contract.css') }}" rel="stylesheet">
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
                        <div class="feedback">
                          <h3>Инфо по терминалам</h3>
                          <a href="{{route('backend.add_new_terminal')}}"><button  type="submit" class="btn btn-primary">Добавить новый терминал</button></a>
                      </div><br>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">IP</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Адрес</th>
                                <th scope="col">номер</th>
                                <th scope="col">Lat</th>
                                <th scope="col">Lng</th>
                                <th scope="col">Действие</th> 
                              </tr>
                            </thead>
                            <tbody>

                              @foreach ($Terminal_location as $Terminal_locations)
                                  <tr>
                                  <td></td>
                                  <td>{{$Terminal_locations->ip}}</td>
                                  <td>{{$Terminal_locations->name}}</td>
                                  <td>{{$Terminal_locations->address}}</td>
                                  <td>{{$Terminal_locations->address}}</td>
                                  <td>{{$Terminal_locations->number}}</td>
                                  <td>{{$Terminal_locations->lng}}</td>
                                  <td>
                                      <a href=""><i style="font-size: 20px;" class="fa fa-eye" aria-hidden="true"></i></a>
                                      <a href=""><i style="font-size: 20px;" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                      <a href=""><i  style="font-size: 20px;" class="fa fa-trash-o" aria-hidden="true"></i></a>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
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
