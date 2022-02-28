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

                            @foreach($users as $key => $user)
                            <tr>
                            <td class=" border border-1 py-3">
                                <h4>{{$key+1}}</h4>
                            </td>
                            <td class=" border border-1 py-3">
                                
                                <h1>{{$user->first_name}}</h1><br> <h6>{{$user->email}}</h6>
                            </td>
                            <td class=" border border-1 py-3">
                                <h1>{{$card->card_number}}</h1>
                            </td>

                            <!-- <td class=" border border-1 py-3">
                                <h1>{{$user['balance']}}</h1>
                            </td> -->
                            <td class=" border border-1 py-3" id="box2">
                            <!-- <input type="submit" class="form-control py-2 mx-auto" id="btn2" style="background: #143B57; color: #fff;" value="active"> -->
                                    <h4 class="{{ $card->status == 'active' ? 'text-success' : 'text-danger' }}">{{ $card->status == 'active' ? 'active' : 'deactive' }}</h4>
                            </td>
                            <td class=" border border-1 py-3" id="box1 ">
                            <input type="submit" class="form-control py-2 mx-auto {{ $card->status == 'active' ? 'btn-danger' : 'btn-success' }}" id="{{ $card->status == 'active' ? 'btn2' : 'btn1' }}"  value="{{ $card->status == 'active' ? 'deactive' : 'active' }}">

                            </td>

                            </tr>
                            @endforeach
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