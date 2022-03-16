@extends('backend.layouts.app') @section('title' ) @section('content')
<link href="{{ asset('assets/css/feedback.css') }}" rel="stylesheet">
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
                    <div class="text-right">
                        <a href="{{route('backend.feedback_index')}}"><button  type="submit" class="btn btn-primary">Назад</button></a>
                   </div>
                    <h3>Показать отзыв</h3><br>
                    
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">Эл. адрес</label>
                          <h4>{{$Feedback->email}}</h4>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Сообщение</label>
                             <h4>{{$Feedback->message}}</h4>
                        </div>
                        <hr>
                        <h3>Отправить сообщение</h3><br>
                    
                     
                        <div class="container card message-container ">
                            <h1 class="message-title">Отправить сообщение</h1>
                          
                            <form action="{{route('backend.send_mail_feedbeack')}}" method="post">
                          
                              <label for="subject" class="subject">Почта</label>
                              <input type="text" name="mail" value="{{$Feedback->email}}" maxlength="45">
                          
                              <label for="message" class="message">Сообщение</label>
                              <textarea name="message" cols="30" rows="7" required maxlength="500"></textarea>
                          
                              <p class="button-container">
                                <input class="button" type="submit" value="Отправлять">
                              </p>
                            </form>
                          </div>
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
