@extends('user.layouts.app')

@section('title' )
@section('style')
    <link href="{{ asset('assets/css/user-support.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="supp col">
            <h3 style="color:#143B57;" class=" fw-bold">Служба поддержки</h3>
             <h6 class="mb-4">Пожалуйста сообщите нам если есть проблемы</h6>
<div class="container shadow bg-white p-3">
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->

        <div class="row">
            <div class="col pl-5">
                <form action="/support" method="post">
                    @csrf

                    <div class="reg form-group my-3" style="width:100%">

                        @if (session('message'))
                         <div class="alert alert-success" role="alert">
                          {{ session('message') }}
                           </div>
                        @endif

                       <input type="text" class="form-control py-2 @error('theme') is-invalid @enderror" name="theme" placeholder="Тема" style="background: #EFEFEF;">
                        @error('theme')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group my-3" style="width:100%">
                        <textarea  class="form-control py-2  @error('message') is-invalid @enderror" name="message" placeholder="Сообщение" rows="6" cols="50" style="background: #EFEFEF;"></textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="form-group my-3">
                            <input type="submit" class="form-control py-2 mx-auto" id="btn" style="background: #143B57; color: #fff;" value="Отправить">
                        </div>
                    </div>
                </form>
            </div><!--col-->
        </div><!--row-->
    </div>
    <!--animated-->
</div>
</div>
</div>
{{-- @include('frontend.includes.footer') --}}
@endsection

