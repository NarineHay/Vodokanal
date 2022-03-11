@extends('user.layouts.app')
@section('title' )
@section('content')
<header></header>
<section>
    <div class="ml">
        <div class="i_1 d-flex justify-content-between flex-wrap">
            <div class="">
                <h4 class="d-flex">
                    <span class="fw-bold">Баланс на счету</span>
                    <span class="mx-2 fw-bolder">{{Auth::user()->balance}} руб.</span>
                </h4>
                <h6>Обзор баланса</h6>
            </div>
            <div class="a_1 d-flex mt-3">
            </div>
        </div>
        <h4 class="fw-bold">Личные данные</h4>
        <table class="table shadow mb-5 bg-white rounded">
            <form action="{{route('user.add_phone')}}" method="post">
                <tr>
                    <th class="border border-1">добавить номера</th>
                    <th class="border border-1">подтвердить</th>
                </tr>
                <tr>
                    <td class="border border-1 py-3">
                        <input type="text" class="form-control py-2 @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Номер" style="background: #efefef;" />
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                    <td class="border border-1 py-3">
                        <input type="submit" class="form-control py-2 mx-auto" id="btn" style="background: #143b57; color: #fff;" value="dabavit" />
                    </td>
                </tr>
            </form>
        </table>
        <table class="table shadow mb-5 bg-white rounded">
            <tr>
                <th class="border border-1">#</th>
                <th class="border border-1">мои номера телефонов</th>
                <th class="border border-1">действие</th>
            </tr>
            @foreach(Auth::user()->phone_number as $key=> $number)
            <tr>
                <td class="border border-1 py-3">
                    <span class="ml-2 ft-size-14">{{$key+1}}</span>
                </td>
                <td class="border border-1 py-3">
                    <span class="ml-2 ft-size-14">{{$number['phone_number']}}</span>
                </td>
                <td class="border border-1 py-3">
                    <a href="{{route('user.delete_phone',$number->id)}}"><button type="submit" class="form-control py-2 mx-auto" style="background: #143b57; color: #fff;">удалить</button></a>
                </td>
            </tr>
            @endforeach
        </table>
        @if(isset(Auth::user()->card)) 
        @foreach(Auth::user()->card as $num => $card)
        <form action="/dashboard_blance" method="post">
            <input type="text" hidden value="{{$card->id}}" name="card_id" />
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-2 p-3">
                    <div class="card p-3" style="border-radius: 20px;">
                        <h6 class="text-success h4">Номер карты </h6><h5 class="h1">{{$card->card_number}}</h5>
                        <div>
                            <p class="text-success h4">Текущий баланс {{$card->balance}} руб.</p>
                            <p class="text-success h4"></p>
                        </div><p></p>
                        @error('balance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if(intval($card['balance']) <= 300)
                        <span>
                        <p class="text-danger h4">{{$card->balance}} руб. Пожалуйста пополните баланс карты</p>
                        </span>
                        @endif

                        <div class="addSomeCl{{$num}}"></div>
                        <div class="removeCl{{$num}}">
                            <a onClick="addSome('{{$num}}')"> Добавить баланс </a>
                            
                        </div><p></p>
                       
                        <div>
                            <input type="submit" class="alignRight" style="background: #143b57; color: #fff;" value="Отправить" />
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
        @endforeach
         @endif
        <!--form-->

        <script>
            function addSome(numI) {
                $(".addSomeCl" + numI).append('<input class="form-control "placeholder="Card number" type="number" name="balance">');
                $(".removeCl" + numI).empty();
            }
        </script>

        @endsection
    </div>
</section>
