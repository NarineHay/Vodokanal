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
                        <a href="{{route('backend.create')}}"><button  type="submit" class="btn btn-primary">Добавлять</button></a>
                    </div><br>
                  
                    @foreach ( $Payment_method as $Payment_methods )
                    <form action="{{route('backend.edit_payment', $Payment_methods->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <label class="form-label" for="error-adajsd">Добавить изображение</label>

                        <div class="wrapper_new">
                            <div class="box_for_logo">
                                <div class="js--image-preview_new"><img  src="/assets/images/img_index/{{$Payment_methods->img_path}}" style="background-color:black ;"></img></div>
                                <div class="upload-options">
                                    <span style="color:red;font-size: 9px;">@error('img_path'){{$message}}@enderror</span>
                                    <label>
                                        <span  style="font-size:20px">изменить изображение</span>
                                        <input name="img_path" type="file" class="image-upload"style="visibility: hidden; position: absolute";/><br>
                                        <i class="fa fa-upload" aria-hidden="true" style="font-size:25px"></i>
                                    </label>
                                  
                                </div>
                              
                            </div>
                        </div><br>

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">Заголовок</label>
                            <input type="text" name="title" id="error-adajsd" class="form-control" value="{{$Payment_methods->title}}" />
                        </div>

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">содержание</label>
                            <input type="text" name="content" id="error-adajsd" class="form-control" value="{{$Payment_methods->content}}" />
                        </div>

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">Ссылка для кнопки</label>
                            <input type="text" name="link" id="error-adajsd" class="form-control" value="{{$Payment_methods->link}}" />
                        </div>
                        <br/>
                        <button class="btn btn-primary">Редактировать</button>
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
