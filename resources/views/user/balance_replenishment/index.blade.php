@extends('user.layouts.app')

@section('title' )
@section('style')
    <link href="{{ asset('assets/css/user-support.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->

        <div class="row">
            <div class="col pl-5">
                    <div class="sec" style="margin-bottom: 10px;">
                        <h4 class=" mt-2">Оплата в кассе</h4>
                        <h6>Обзор способов оплаты</h6>
                        <div class="cont bg-white p-3 shadow">
                  <textarea  class="form-control py-2" id="message" placeholder="Сообщение" rows="6" cols="50" style="background: #EFEFEF;"></textarea>
                            
                        </div>
                    </div>
                    <div class="sec" style="margin-bottom: 300px;">
                        <h4 class="">Онлайн платеж</h4>
                        <h6>Обзор способов оплаты</h6>
                        <div class="cont bg-white p-3 shadow">
                        <textarea  class="form-control py-2" id="message" placeholder="Сообщение" rows="6" cols="50" style="background: #EFEFEF;"></textarea>

                        </div>
                    </div>
            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection
