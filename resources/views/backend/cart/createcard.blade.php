@extends('backend.layouts.app')

@section('title' )

@section('content')

<div class="col-md-10">
           
<div class="container shadow bg-white p-3">
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->

        <div class="row">
            <div class="col pl-5">
                <form action="/createcard" method="post">
                    @csrf
                    <div class="reg form-group my-3" style="width:100%">
                        <select class="selectpicker form-control" data-live-search="true" name="user_id">
                     @foreach($users as $user)
                        <option data-tokens="ketchup mustard" class="option" value='{{$user->id}}'>{{$user->first_name}},{{$user->email}}</option>
                       @endforeach
                        </select>
                        
                        <div class="reg form-group my-3" style="width:100%">
                            <!-- <input type="number" class="form-control py-2 @error('card_number') is-invalid @enderror" name="card_number[]" placeholder="Card number" style="background: #EFEFEF;"><a href="">click</a> -->
                            <p>
                                <input class="form-control @error('card_number') is-invalid @enderror"  placeholder="Card number" type="number" name="card_number[]" id="var1">
                                <p></p>
                                <span class="removeVar"> Удалить </span>
                                <p></p>
                                <p><span id="addVar"> Добавить новый элемент </span> </p>
                                <input type="submit" class="alignRight" id="addVar" style="background: #143B57; color: #fff;" value="Отправить">
                            </p>
                                @error('card_number[0]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
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

