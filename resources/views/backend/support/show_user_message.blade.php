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
                      <h3>Показать сообщение пользователя</h3>
                      <a href="{{route('backend.feedback_index')}}"><button  type="submit" class="btn btn-primary">Назад</button></a>
                  </div><br>
                
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">Имя пользователя</label>
                          <h4>{{$Contracts['user']->first_name}}</h4>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Заголовок</label>
                             <h4>{{$Contracts->theme}}</h4>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Сообщение</label>
                             <h4>{{$Contracts->message}}</h4>
                        </div>


                        <hr>

                        <h3>Отправить сообщение</h3><br>
                    
                     
                        <div class="container_feedback card message-container ">
                            <h1 class="message-title">Пользователь Отправить сообщение</h1>
                          
                            <form action="{{route('backend.send_mail_user_message',$Contracts->id)}}" method="post">
                          
                          
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
