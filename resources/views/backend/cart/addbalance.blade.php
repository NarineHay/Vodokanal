@extends('backend.layouts.app')
@section('title' )
@section('content')
<div class="col-md-10">
<div class="container shadow bg-white p-3">
<h3 class="vernagir">Пополнение баланса</h3>

<div class="container-fluid">

    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col pl-5">

                <form action="{{ route('backend.adduserbalance')}}" method="post">
                    @csrf
                    <div class="reg form-group my-3" style="width:100%">
                    <span style="color:red">@error('user_id') Выберите пользователя @enderror</span>
                    @if (session('message'))
                      <div class="alert alert-success" role="alert">
                       {{ session('message') }}
                        </div>
                    @endif
                        <select class="selectpicker form-control"  data-live-search="true" name="user_id">
                            <option disabled selected value="">Выберите пользователя</option>
                            @foreach($users as $user)
                            @if (session()->get('select_user') == $user->id)
                            <option data-tokens="ketchup mustard" selected class="option" value="{{$user->id}}">{{$user->first_name}} - {{$user->email}} </option>

                            @else
                            <option data-tokens="ketchup mustard" class="option" value="{{$user->id}}">{{$user->first_name}} - {{$user->email}} </option>

                            @endif
                            @endforeach
                        </select>
                        <div class="reg form-group my-3" style="width:100%">
                        <div class="user-info">
                        </div>

                        <span style="color:red">@error('balance')Произошло ошибка со суммой @enderror</span>
                            <input class="form-control shadow bg-white" placeholder="сумма"  onkeypress="return validateNumber(event)" type="number" name="balance" ><p></p>
                            <input type="submit" class="alignRight" style="background: #143B57; color: #fff;" value="Отправить">
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

