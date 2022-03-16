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
                    <div class="feedback">
                        <h3>Показать отзыв</h3>
                        <a href="{{route('backend.feedback_index')}}"><button  type="submit" class="btn btn-primary">Назад</button></a>

                    </div><br>
                  

                        <div class="form-group">
                          <label for="exampleInputPassword1">Эл. адрес</label>
                          <h6>{{$Feedback->email}}</h6>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Сообщение</label>
                             <h6>{{$Feedback->message}}</h6>
                        </div>
                        <hr>

                        <h5>Отправить сообщение</h5><br>
                    
                     
                        <div class="container_feedback card message-container ">
                            <h5 class="message-title">Отправить сообщение</h5>
                          
                            <form action="{{route('backend.send_mail_feedbeack',$Feedback->id)}}" method="post">
                              @csrf
                              

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
