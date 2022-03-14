@extends('backend.layouts.app') @section('title' ) @section('content')

<style>
    .js--image-preview {
      height: 225px;
      width: 100%;
      position: relative;
      overflow: hidden;
      background-image: url('/assets/images/img_index/{{$tarif->img_path}}');
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
                    <h3>Детали тарифа</h3>

                        <form action="{{route('backend.edit_tariffss' , $tarif->id)}}" method="Post" enctype="multipart/form-data">
                            @csrf

                            <label class="form-label" for="error-adajsd">Видео</label>
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
                                <label class="form-label" for="error-adajsd">Заголовок</label>
                                <input  type="text" name="name" id="error-adajsd" class="form-control" value="{{$tarif->name}}">
                            </div>
                            <br>
                            <div class="large-field-group simple">
                                <label class="form-label" for="error-adajsd">Ссылка для кнопки пополнения баланса</label>
                                <textarea id="mytextarea" name="detailes">
                                {!!$tarif->detailes!!}
                                </textarea>
                            </div>
                            <br>
                            <div class="large-field-group simple">
                                <label class="form-label" for="error-adajsd">Цена жидкости за 1 куб</label>
                                <input  type="text" name="price" id="error-adajsd" class="form-control" value="{{$tarif->price}}">
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

<script>
    tinymce.init({
      selector: '#mytextarea',
      plugins: 'lists',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent',
    });
</script>
@endsection
