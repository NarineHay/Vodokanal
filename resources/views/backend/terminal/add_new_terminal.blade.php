@extends('backend.layouts.app') @section('title' ) @section('content')
<link href="{{ asset('assets/css/new_contract.css') }}" rel="stylesheet">

<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 25px;">
                    @if (session('message'))
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}</div>
                    @endif
                    <div class="feedback">
                        <h3>Новый контракт</h3>
                        <a href="{{route('backend.info_terminal')}}"><button  type="submit" class="btn btn-primary">Назад</button></a>
                    </div><br>
                    
                    <form action="{{route('backend.store_new_terminal')}}" method="Post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="exampleInputPassword1">IP</label>
                          <input type="text" name="ip" class="form-control" id="exampleInputPassword1" value="{{ old('ip') }}">
                          <span style="color:red">@error('ip'){{$message}}@enderror</span>
                          
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Имя</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{ old('name') }}">
                            <span style="color:red">@error('name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Адрес</label>
                            <input type="text" name="address" class="form-control" id="exampleInputPassword1" value="{{ old('address') }}">
                            <span style="color:red">@error('address'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">номер</label>
                            <input type="text" name="number" class="form-control" id="exampleInputPassword1" value="{{ old('number') }}"onkeypress="return validateNumber(event)">
                            <span style="color:red">@error('number'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Lat</label>
                            <input type="text" name="lat" class="form-control" id="exampleInputPassword1" value="{{ old('lat') }}">
                            <span style="color:red">@error('lat'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Lng</label>
                            <input type="text" name="lng" class="form-control" id="exampleInputPassword1" value="{{ old('lng') }}">
                            <span style="color:red">@error('lng'){{$message}}@enderror</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Добавлять</button>
                      </form><br><br>
                     
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
@section('pagescript')
    <script src="{{asset('assets/js/backend.js')}}"></script>
@endsection