<footer>
    <div class="footer_first pt-4" id="section5">
        <div class="container">
            @if (session('status-feedback'))
                <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> <i class="fa fa-check" aria-hidden="true">{{ session('status-feedback') }}</i>
                </div>
            @endif
            <div class="d-flex flex-wrap justify-content-between foot_header">
                <div class="foot w-50 ">
                    <h2 class="py-3">Контакты</h2>
                    <div class="w-75 d-flex flex-wrap justify-content-between">
                        @foreach($footer as $footers)
                        <div>
                            <ul>
                                @if($footers->number)
                                <li>
                                    <i class="bi bi-telephone"></i>
                                    <span>+{{$footers->number}}</span>
                                </li>
                                @endif
                                @if($footers->number2)
                                <li>
                                    <i class="bi bi-telephone"></i>
                                    <span>+{{$footers->number2}}</span>
                                </li>
                                @endif
                                @if($footers->number3)
                                <li>
                                    <i class="bi bi-telephone"></i>
                                    <span>+{{$footers->number3}}</span>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endforeach

                        @foreach($footer as $footers)
                            <div>
                                <ul>
                                    <li>{{$footers->address}}</li>
                                    <li>{{$footers->email}}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="foot mt-3 message-cont">
                    <form action="/feedback" method="Post">
                        @csrf
                        <h2 >Обратная связь</h2>
                        <div class="form-group">
                            <input type="email" name="email1" class="form-control @error('email1') is-invalid @enderror" placeholder="Эл. адрес:" value="{{ old('email') }}">
                            <span style="color:red">@error('email1'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group my-2">
                            <textarea  name="message1" class="form-control @error('message1') is-invalid @enderror" placeholder="Сообщение:" value="{{ old('message') }}"></textarea>
                            <span style="color:red">@error('message1'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="py-1 px-4 send-message" id="msm" value="Отправить">
                        </div>
                    </form>
                </div>

            </div>
      </div>
    </div>
    <div class="foot_end">
        <div class="container">
          <div class="d-flex justify-content-between  foot_end_text">
            <p class="text-white pt-3">All right reserved</p>
            <p class="text-white pt-3">Developed By Webex Technologies</p>
          </div>
        </div>
    </div>
  </footer>
