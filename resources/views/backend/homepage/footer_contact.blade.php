@extends('backend.layouts.app') @section('title' ) @section('content')

<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 25px;">
                    @if (session('message'))
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('message') }}</div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h3>Способы оплаты</h3>
                        <a href="{{route('backend.dashboard')}}"><button  type="submit" class="btn btn-primary">Контакты</button></a>
                    </div><br>  

                  @foreach ($footer as $footers)
                    <form action="{{route('backend.update_footer')}}" method="Post">
                        @csrf
                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">количество</label>
                            <input type="text" name="number" id="error-adajsd" class="form-control" value="{{$footers->number}}" />
                        </div>
                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">номер 2</label>
                            <input type="text" name="number2" id="error-adajsd" class="form-control" value="{{$footers->number2}}" />
                        </div>
                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">номер 3</label>
                            <input type="text" name="number3" id="error-adajsd" class="form-control" value="{{$footers->number3}}" />
                        </div>

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">Адрес</label>
                            <input type="text" name="address" id="error-adajsd" class="form-control" value="{{$footers->address}}" />
                        </div>

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">Эл. адрес</label>
                            <textarea class="form-control" name="email" id="exampleFormControlTextarea1" rows="3">{{$footers->email}}</textarea>
                        </div>
                        <br/>
                        <button class="btn btn-primary">Обновлять</button>
                    </form><br><hr>
                  @endforeach
                    
                  
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
