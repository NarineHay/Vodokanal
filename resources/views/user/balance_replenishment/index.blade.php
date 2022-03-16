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

        <div class="rowo">
            <div class="col pl-5">
                    @foreach($payment_methods as $payment_method)
                    <div class="sec" style="margin-bottom: 40px;">
                        <h4 class="">{{$payment_method->title}}</h4>
                        <h6>Обзор способов оплаты</h6>
                        <div class="cont bg-white p-3 shadow">
                            <h4 class="">{{$payment_method->content}}</h4>
                        </div>
                    </div>
                    @endforeach
            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>

@endsection

