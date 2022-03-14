@extends('backend.layouts.app') @section('title' ) @section('content')

<style>
    .js--image-preview {
      height: 225px;
      width: 100%;
      position: relative;
      overflow: hidden;
      background-image: url('/assets/images/img_index/{{$Main->img_path}}');
      background-color: white;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    </style>

<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 25px;">
                    @if (session('message'))
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}</div>
                    @endif
                    <h3>Баннер на главной странице</h3>

                        <form action="{{route('backend.edit_main_home')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label class="form-label" for="error-adajsd">Изображения</label>
                            <div class="wrapper">
                                <div class="box">
                                    <div class="js--image-preview"></div>
                                    <div class="upload-options">
                                        <label>
                                            <input name="img_path" type="file" class="image-upload"/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="large-field-group simple">
                                <label class="form-label" for="error-adajsd">Ссылка для кнопки пополнения баланса</label>
                                <input type="text" name="url" id="error-adajsd" class="form-control" value="{{$Main ->url}}" />
                            </div>
                            <br>
                            <button  class="btn btn-primary">Редактировать</button>
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
