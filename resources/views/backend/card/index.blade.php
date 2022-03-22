@extends('backend.layouts.app')

@section('title' )

@section('content')

<body>
    <header></header>
    <section>
        <div class="ml">
            <div class="i_1 d-flex justify-content-between flex-wrap">
            </div>
            <table class="table shadow mb-5 bg-white rounded">
                <tr>
                    <th class="h4">Карты</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <a href="/createcard_user">
                            <input  type="submit" 
                                    class="font py-2 mx-auto"
                                    id="btn" 
                                    style="background: #143B57; color: #fff;" 
                                    value="добавить карту">
                        </a>
                    </th>
                <tr>
                    <th  class="border border-1">#</th>
                    <th  class="border border-1 h5">имя</th>
                    <th  class="border border-1 h5">номер карты</th>
                    <!-- <th  class="border border-1">balance</th> -->
                    <th  class="border border-1 h5">номер машины</th>
                    <th  class="border border-1 h5">действия</th>
                    <th  class="border border-1 h5">активировать</th>
                </tr>
                @foreach($cards as $key => $card)
                    <tr>
                        <td class=" border border-1 py-3">
                            <h4>{{$key+1}}</h4>
                        </td>
                        <td class=" border border-1 py-3">
                            <h3>{{$card->user->first_name}}</h3><br>
                            <h6>{{$card->user->email}}</h6>
                        </td>
                        <td class=" border border-1 py-3">
                            <h5>{{$card->card_number}}</h5>
                        </td>                             
                        <td class=" border border-1 py-3" id="box2">
                            <h6>{{$card->car[0]['car_numbers'] ?? null}}</h6>
                        </td>
                        <td class=" border border-1 py-3" id="box1 ">
                            @if($card->status == 'active')
                                <h5 class="text-success">активирована</h5>
                            @elseif( $card->status == 'deactive')
                                <h5 class="text-danger">деактивирована</h5>
                            @endif
                        </td>
                        <td>
                            <form action="{{route('backend.cart_accept',$card->id)}}" method="get">
                                <input type="submit" value="изменить" class="form-control py-2 mx-auto bg-dark">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</body>
@endsection
