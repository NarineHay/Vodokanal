@extends('backend.layouts.app') @section('title' ) @section('content')
@foreach ($tarif as $tarifs)
<style>
    .js--image-preview {
      height: 225px;
      width: 100%;
      position: relative;
      overflow: hidden;
      background-image: url('/assets/images/img_index/{{$tarifs->img_path}}');
      background-color: white;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    </style>
@endforeach
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
                    @foreach ($tarif as $tarifs)
                        <form action="{{route('backend.edit_tariffss' , $tarifs->id)}}" method="Post" enctype="multipart/form-data">
                            @csrf
                        
                            <label class="form-label" for="error-adajsd">видео</label>
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
                                <label class="form-label" for="error-adajsd">заглавие</label>
                                <input  type="text" name="name" id="error-adajsd" class="form-control" value="{{$tarifs->name}}">
                            </div>
                            <br>
                            <div class="large-field-group simple">
                                <label class="form-label" for="error-adajsd">кнопка ссылка</label>
                                <textarea id="mytextarea" name="detailes">
                                {!!$tarifs->detailes!!}
                                </textarea>
                            </div>
                            <br>
                            <div class="large-field-group simple">
                                <label class="form-label" for="error-adajsd">цена</label>
                                <input  type="text" name="price" id="error-adajsd" class="form-control" value="{{$tarifs->price}}">
                            </div>
                            <br>
                            <button  class="btn btn-primary">редактировать</button>
                        </form>
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

<script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script>
@endsection
