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
                    <h3>Детали тарифа</h3>

                        <form action="{{route('backend.edit_tariffss' , $tarif->id)}}" method="Post" enctype="multipart/form-data">
                            @csrf

                            <label class="form-label" for="error-adajsd">Видео</label>
                            <div class="wrapper">
                                <div class="box">
                                    <div class="js--image-preview"><video autoplay loop muted playsinline id="myVideo" controls="true" class="img-fluid" src="/assets/images/img_index/{{$tarif->img_path}}"  data-aos="fade-up-right" data-aos-duration="2000" style="width: 450px; height: 100%;"></video></div>
                                    <div class="upload-options">
                                        <span style="color:red">@error('img_path'){{$message}}@enderror</span>
                                        <label>
                                            <span  style="font-size:20px">изменить видео</span>
                                            <input name="img_path" type="file" class="image-upload"style="visibility: hidden; position: absolute";/><br>
                                            <i class="fa fa-upload" aria-hidden="true" style="font-size:25px"></i>
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
