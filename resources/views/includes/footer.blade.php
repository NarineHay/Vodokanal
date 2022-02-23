<footer>
    <div class="footer_first pt-4" id="section5" id="DebugContainer">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between foot_header">
                <div class="foot w-50 ">
                    <h2 class="py-3">Контакты</h2>
                    <div class="w-75 d-flex flex-wrap justify-content-between">
                        <div>
                            <ul>
                                <li>
                                    <i class="bi bi-telephone"></i>
                                    <span>+X XXX XXX XX</span>
                                </li>
                                <li>
                                    <i class="bi bi-telephone"></i>
                                    <span>+X XXX XXX XX</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li>Address, 1 Street, 20 Building </li>
                                <li>example@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="foot mt-3 message-cont">
                    <form action="/feedback" method="Post">
                        @csrf
                        <h2 >Обратная связь</h2>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Эл. адрес:">
                            <span style="color:red">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group my-2">
                            <textarea  name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Сообщение:"></textarea>
                            <span style="color:red">@error('message'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="py-1 px-4 send-message" id="msm">
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
