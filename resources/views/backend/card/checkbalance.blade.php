@extends('backend.layouts.app')
@section('title' )
@section('content')
<div class="col-md-10">
<div class="container shadow bg-white p-3">
<h3 class="vernagir"> Проверка баланса</h3>
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
                <form action="{{ route('backend.checkbalance')}}" method="post">
                    @csrf
                    <div class="reg form-group my-3" style="width:100%">
                        <select class="selectpicker form-control"  data-live-search="true" name="user_id">
                            <option disabled selected>Выберите пользователя</option>
                     @foreach($users as $user)
                     <option data-tokens="ketchup mustard" class="option"  value="{{$user->id}}">{{$user->first_name}},{{$user->email}}</option>
                       @endforeach
                        </select>
                        <div class="reg form-group my-3" style="width:100%">
                        <div class=" user-info"></div>
                           
                           
                           
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
@endsection
@section('pagescript')
    <script src="{{asset('assets/js/backend.js')}}"></script>
@endsection

