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
                        <select class="selectpicker form-control"  data-live-search="true" name="user_id">
                     @foreach($users as $user)
                        <option data-tokens="ketchup mustard" class="option" value="{{$user->id}}">{{$user->first_name}},{{$user->email}}</option>
                       @endforeach
                        </select>
                        <div class="reg form-group my-3" style="width:100%">
                            <p>

                               
                                <input class="form-control @error('[card_number]') is-invalid @enderror"  value="{{ old('[card_number]') }}" placeholder="Номер карты" type="number"  name="object[0][card_number]">
                                <p></p>
                                @if($errors->has('[card_number]'))
                                    <span class="error">{{ $errors->first('[card_number]') }}</span>
                                @endif
                               
                                <input class="form-control "placeholder="Номер машины"  type="text" name="object[0][model]">
                                <p></p>
                                
                                <input class="form-control "placeholder="Модель машины" type="text" name="object[0][car_numbers]">

                                <p></p>
                                <span class="removeVar">Удалить</span>
                                <p></p>
                                <p><span id="addVar">Добавить новый элемент</span></p>
                                <input type="submit" class="alignRight" id="addVar" style="background: #143B57; color: #fff;" value="Отправить">
                            </p>
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
@section('pagescript')
    <script src="{{asset('assets/js/backend.js')}}"></script>
@endsection

