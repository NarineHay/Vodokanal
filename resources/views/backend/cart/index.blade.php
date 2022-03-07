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


             <a href="/createcard1"><input type="submit" class="py-2 mx-auto" id="btn" style="background: #143B57; color: #fff;" value="create card"></a>

                <table class="table shadow mb-5 bg-white rounded">


                        <tr>
                          <th  class="border border-1">#</th>
                          <th  class="border border-1">name</th>
                          <th  class="border border-1">card number</th>
                          <!-- <th  class="border border-1">balance</th> -->
                          <th  class="border border-1">active</th>
                          <th  class="border border-1">deactive</th>
                        </tr>
                        <!-- @if(auth()->user())  -->
                        @foreach($cards as $key => $card)

                           
                            <tr>
                            <td class=" border border-1 py-3">
                                <h4>{{$key+1}}</h4>
                            </td>
                            <td class=" border border-1 py-3">

                                <h1>{{$card->user->first_name}}</h1><br><h6>{{$card->user->email}}</h6>
                            </td>
                            <td class=" border border-1 py-3">
                                <h1>{{$card->card_number}}</h1>
                            </td>

                            <!-- <td class=" border border-1 py-3">

                            </td> -->
                            
                               
                                <td class=" border border-1 py-3" id="box2">
                                    @if($card->status == 'active')
                                    <h4 class="text-success">active</h4>
                                    @elseif( $card->status == 'deactive')
                                    <h4 class="text-danger">deactive</h4>
                                    @endif
                                </td>
                               
                                <td class=" border border-1 py-3" id="box1 ">
                                <form action="{{route('backend.cart_accept',$card->id)}}" method="get">
                                    <!-- <input type="submit" class="form-control py-2 mx-auto {{ $card->status == '1' ? 'btn-danger' : 'btn-success' }}" id="{{ $card->status == '1' ? 'btn2' : 'btn1' }}"  value="{{ $card->status == '1' ? 'deactive' : 'active' }}"> -->
                                    <input type="submit" class="form-control py-2 mx-auto bg-dark">

                                </form>
                                </td>
                            

                            </tr>
                           
                            @endforeach


                        <!-- @endif -->

                </table>
        </section>

        <style>
    .ml{
        margin-left: 100px;
        margin-top: 40px
    }


        </style>
</body>

@endsection
