@extends('user.layouts.app')

@section('title' )

@section('content')
<body>
    <header>
        
    </header>
    <section>
        <div class="ml">
        <div class="i_1 d-flex justify-content-between flex-wrap">
              <div class="">
                <h4 class=" d-flex">
                  <span class="fw-bold">Баланс на счету</span> 
                  <span class="mx-2 fw-bolder">{{Auth::user()->balance}} руб.</span>
                </h4>  
                <h6>Обзор баланса</h6>
              </div>
              <div class="a_1 d-flex mt-3">
                <span class="fw-bold text-dark">Пополнить баланс</span> 
                <div class="plus mx-1 mt-1 fw-bold" onclick="myFuncion()">+</div>
              </div>
             </div>
            <h4 class="fw-bold">Личные данные</h4>
                      <table class="table shadow mb-5 bg-white rounded">
                      <form action="{{route('user.add_phone')}}" method="post">
                        <tr>
                          <th  class="border border-1">добавить номера</th>
                          <th  class="border border-1">подтвердить</th>

                        </tr>
                        <tr>
                          <td class=" border border-1 py-3">
                          <input type="text" class="form-control py-2 @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Номер" style="background: #EFEFEF;">
                                  @error('phone_number')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                          </td>
                          <td class=" border border-1 py-3">
                          <input type="submit" class="form-control py-2 mx-auto" id="btn" style="background: #143B57; color: #fff;" value="dabavit">
                          </td>
                        </tr>
                        </form>
                        </table>
                      <table class="table shadow mb-5 bg-white rounded">
                      
                            <tr>
                              <th  class="border border-1">#</th>
                              <th  class="border border-1">мои номера телефонов</th>
                              <th  class="border border-1">действие</th>

                            </tr>

                            @foreach(Auth::user()->phone_number as $key=> $number)
                            <tr>
                              <td class=" border border-1 py-3">
                                <span class="ml-2 ft-size-14">{{$key+1}}</span>
                              </td>
                              <td class=" border border-1 py-3">
                                <span class="ml-2 ft-size-14">{{$number['phone_number']}}</span>              
                              </td>
                              <td class=" border border-1 py-3">

                              <a href="{{route('user.delete_phone',$number->id)}}" ><button type="submit" class="form-control py-2 mx-auto" style="background: #143B57; color: #fff;">удалить</button></a>

                              </td>
                            </tr>
                            @endforeach
                      
                      </table>
                      <form action="/dashboard_blance" method="post">
                      @if(isset(Auth::user()->card))
                      @foreach(Auth::user()->card as $card)
                     <div class="row justify-content-between">
                       <div class="col-lg-6 col-md-6  col-sm-12 col-12 mb-2 p-3">
                                 <div class="card p-3" style="border-radius: 20px;">
                                   <h6>Машина - номер машины </h6>
                                 <div>
                                   <p class="text-success h4">Текущий баланс {{$card->balance}} руб.</p>
                                   <p class="text-success h4"></p>
                                 </div>
                                 <p><span id="addVar"> Добавить баланс </span> </p>
                                <input type="submit" class="alignRight" id="addVar" style="background: #143B57; color: #fff;" name="balance" value="Отправить">
                              </div>
                       </div>
                     </div>
                     @endforeach
                     @endif
                     </form><!--form-->

        </section>
</body>
<script>
        var varCount = 1;
        $(function () {
            $('#addVar').on('click', function(){
                varCount++;
                $node = '<p>'
                  + '<input class="form-control "placeholder="Card number" type="number" name="card_number[]" id="var1">';
                $(this).parent().before($node);
            });
          $('form').on('click', '.removeVar', function(){
            $(this).parent().remove();
          });
        });
    </script>

@endsection
