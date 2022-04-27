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
            <tbody>

                <tr>
                    <th class="border border-1">добавить номера</th>
                    <th class="border border-1">подтвердить</th>
                </tr>
                <tr>
                    <form action="{{route('user.add_phone')}}" method="post">
                    <td class="border border-1 py-3">
                        <input type="text" class="form-control py-2 @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Номер" style="background: #efefef;" />
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                    <td class="border border-1 py-3">
                        <input type="submit" class="form-control py-2 mx-auto" id="btn" style="background: #143b57; color: #fff;" value="добавить" />
                    </td>
                </form>
                </tr>

                <tr >
                    <td class="py-3 ml-auto" colspan="2">
                        <div class="text-center my-3 {{ session('result') ? 'text-success' : 'text-danger' }}">
                            {{ session('result_phone_number_message') || $errors->has('verify_token') ? session('result_phone_number_message') : '' }}
                        </div>
                        @if (session('result') || $errors->has('verify_token') || session('result_verify_phone_token'))
                            <form action="{{route('user.verify_phone_token')}}" method="post" class="mt-2 text-center">
                                <input name="verify_token" class="form-control mx-auto w-50 py-2  @error('verify_token') is-invalid @enderror">
                                <input type="hidden" name="phone_numer" value="{{ session('phone_number')  ? session('phone_number') : old('phone_numer') }}">
                                @error('verify_token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="submit" class="form-control w-50 py-2 mt-3 mx-auto" id="btn" style="background: #143b57; color: #fff;" value="Отправить код" />

                            </form>
                            <div class="mt-2 text-center {{ session('result_token') ? 'text-success' : 'text-danger' }} ">
                                {{ session('result_verify_phone_token') ? session('result_verify_phone_token') : '' }}
                            </div>
                        @endif
                    </td>
                </tr>
            </tbody>

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
        <div class="big_block">
        @if(isset(Auth::user()->card))
        @foreach(Auth::user()->card as $num => $card)
        <form class="form" action="/dashboard_blance" method="post">
            <input type="text" hidden value="{{$card->id}}" name="card_id" />
            <input type="text" hidden name="num" value="{{$num}}">
            <div class="card">
                <div class="col">
                    <div class="card p-3" style="border-radius: 20px;">
                        <span class="text-success h6">Номер карты </span><h5 class="h5">{{$card->card_number}}</h5>
                        <div>
                            <p class="text-success h6">Текущий баланс <h5 class="h5">{{$card->balance}} руб.</h5></p>

                            <p class="text-success h4"></p>
                        </div>
                        <!-- @error('balance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror -->
                        @if(intval($card['balance']) <= 300)
                        <span>
                        <p class="text-danger h5">{{$card->balance}} руб. Пожалуйста пополните баланс карты</p>
                        </span>
                        @endif

                        <div class="addSomeCl{{$num}}"></div>
                        <div class="removeCl{{$num}}">
                            <a class="aaaa" onClick="addSome('{{$num}}')"> Добавить баланс </a>
                            <?php $er = 'er' . $num ?>
                        </div>
                        <p></p>
                        @error($er)
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                           <p></p>

                        <div>
                            <input type="submit" class="alignRight" style="background: #143b57; color: #fff;" value="Отправить" />
                        </div>
                    </div>
                </div>
            </div>

        </form>
        @endforeach
         @endif
         </div>
        <!--form-->




        @endsection
    </div>
</section>
@section('pagescript')
    <script src="{{asset('assets/js/backend.js')}}"></script>
@endsection
