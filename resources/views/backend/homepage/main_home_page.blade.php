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
                    <h3>главная домашняя страница</h3>
                   
                        <form action="{{route('backend.edit_main_home')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                          
                            <label class="form-label" for="error-adajsd">изображение</label>
                            <div class="wrapper">
                                <div class="box">
                                    <div class="js--image-preview"><img  src="/assets/images/img_index/{{$Main->img_path}}" style="width: 100%; height: 100%;"></img></div>
                                    <div class="upload-options">
                                        <label>
                                            <span  style="font-size:20px">изменить изображение</span>
                                            <input name="img_path" type="file" class="image-upload"style="visibility: hidden; position: absolute";/><br>
                                            <i class="fa fa-upload" aria-hidden="true" style="font-size:25px"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="large-field-group simple">
                                <label class="form-label" for="error-adajsd">кнопка ссылка</label>
                                <input type="text" name="url" id="error-adajsd" class="form-control" value="{{$Main ->url}}" />
                            </div>
                            <br>
                            <button  class="btn btn-primary">редактировать</button>
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
