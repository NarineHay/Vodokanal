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
                        <h3>Добавить новое Способы оплаты</h3>
                        <a href="{{route('backend.payment_method')}}"><button  type="submit" class="btn btn-primary">Назад</button></a>
                    </div><br>
                  
                    <form action="{{route('backend.add_new')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <label class="form-label" for="error-adajsd">Значок</label>
                        <div class="wrapper">
                            <label>
                                <span style="color:red;font-size: 9px;">@error('img_path'){{$message}}@enderror</span>
                                <input name="img_path" type="file" class="image-upload"style="visibility: hidden; position: absolute";/><br>
                                <i class="fa fa-upload" aria-hidden="true" style="font-size:30px"></i>
                            </label>
                        </div>

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">Заголовок</label>
                            <input type="text" name="title" id="error-adajsd" class="form-control"/>
                        </div>


                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">содержание</label>
                            <input type="text" name="content" id="error-adajsd" class="form-control"/>
                        </div>


                        <br>
                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">Ссылка для кнопки</label>
                            <input type="text" name="link" id="error-adajsd" class="form-control" />
                        </div>
                        <br/>
                        <button class="btn btn-primary">Добавлять</button>
                    </form>
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
