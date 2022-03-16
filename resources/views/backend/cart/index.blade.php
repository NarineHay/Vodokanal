@extends('backend.layouts.app')

@section('title' )

@section('content')

<body>
    <header>
    </header>
    <section>
        <div class="ml">
            <div class="i_1 d-flex justify-content-between flex-wrap">
             </div>
                <table class="table shadow mb-5 bg-white rounded">

                        <tr>
                            <h1>Cards</h1>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                            <a href="/createcard1">
                                <input  type="submit" 
                                        class="py-2 mx-auto"
                                        id="btn" 
                                        style="background: #143B57; color: #fff;" 
                                        value="create card">
                            </a>
                            </th>
                        <tr>
                          <th  class="border border-1">#</th>
                          <th  class="border border-1">имя</th>
                          <th  class="border border-1">номер карты</th>
                          <th  class="border border-1">действия</th>
                          <!-- <th  class="border border-1">balance</th> -->
                          <th  class="border border-1">номер машины</th>
                          <th  class="border border-1">активировать</th>
                        </tr>
                        <!-- @if(auth()->user())  -->
                        @foreach($cards as $key => $card)
                            <tr>
                            <td class=" border border-1 py-3">
                                <h4>{{$key+1}}</h4>
                            </td>
                            <td class=" border border-1 py-3">

                                <h2>{{$card->user->first_name}}</h2><br><h6>{{$card->user->email}}</h6>
                            </td>
                            <td class=" border border-1 py-3">
                                <h3>{{$card->card_number}}</h3>
                            </td>

                            <!-- <td class=" border border-1 py-3">

                            </td> -->
                            
                               
                                <td class=" border border-1 py-3" id="box2">
                                    @if($card->status == 'active')
                                    <h4 class="text-success">активирована</h4>
                                    @elseif( $card->status == 'deactive')
                                    <h4 class="text-danger">деактивирована</h4>
                                    @endif
                                </td>
                              
                                <td class=" border border-1 py-3" id="box1 ">
                                    <h3>{{$card->model}}</h3>
                                </td>
                                <td>
                                    <form action="{{route('backend.cart_accept',$card->id)}}" method="get">
                                    <!-- <input type="submit" class="form-control py-2 mx-auto {{ $card->status == '1' ? 'btn-danger' : 'btn-success' }}" id="{{ $card->status == '1' ? 'btn2' : 'btn1' }}"  value="{{ $card->status == '1' ? 'deactive' : 'active' }}"> -->
                                    <input type="submit" value="изменить" class="form-control py-2 mx-auto bg-dark">

                                </form>
                                </td>
                                

                            </tr>
                           
                            @endforeach


                        <!-- @endif -->

                </table>
        </section>
</body>

@endsection
