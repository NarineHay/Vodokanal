@extends('backend.layouts.app')
@section('title' )
@section('content')
<div class="col-md-10">
<div class="container shadow bg-white p-3">
<h3 class="vernagir">Kонфигурация для карт и машины</h3>
@if (session('message'))
  <div class="alert alert-success" role="alert">
   {{ session('message') }}
    </div>
@endif
<div class="container-fluid">

    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col pl-5">
                <form action="{{ route('backend.createcard')}}" method="post">
                    @csrf
                    <div class="reg form-group my-3" style="width:100%">
                        <select class="selectpicker form-control mb-3"  data-live-search="true" name="user_id">
                            @foreach($users as $user)
                                <option data-tokens="ketchup mustard" class="option" value="{{$user->id}}">{{$user->first_name}},{{$user->email}}</option>
                            @endforeach
                        </select>
                        <div class="reg " style="width:100%">
                            <div class="form-group">
                                <input class="form-control @error('object.*.card_number') is-invalid @enderror"  value="{{ old('object[0][card_number]') }}" placeholder="Номер карты" type="number"  name="object[0][card_number]">
                                @error('object.*.card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('object.*.model') is-invalid @enderror" placeholder="Модель машины"  type="text" name="object[0][model]">
                                @error('object.*.model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('object.*.car_numbers') is-invalid @enderror" placeholder="Номер машины" type="text" name="object[0][car_numbers]">
                                @error('object.*.car_numbers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <span class="removeVar">Удалить</span>
                                <p></p>
                                <p><span id="addVar"> Добавить новый элемент </span> </p>
                                <input type="submit" class="alignRight" id="addVar" style="background: #143B57; color: #fff;" value="Отправить">

                        </div>
                    </div>
                </form><!--form-->
            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>
</div>
</div>

{{-- @include('frontend.includes.footer') --}}
@endsection

