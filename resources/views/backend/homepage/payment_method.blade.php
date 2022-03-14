@extends('backend.layouts.app') @section('title' ) @section('content')

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
                    <h3>Способы оплаты</h3>
                    <div class="flex_method">
                        <a href="{{route('backend.create')}}" style="color:#fff"><button class="btn btn-primary">Добавлять</button></a>
                    </div>
                    @foreach ( $Payment_method as $Payment_methods )
                    <form action="{{route('backend.edit_payment', $Payment_methods->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf

                        <label class="form-label" for="error-adajsd">Значок</label>
                        <div class="wrapper">
                            <label>
                                <input name="img_path" type="file" class="image-upload" />
                            </label>
                        </div>

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">Заголовок</label>
                            <input type="text" name="title" id="error-adajsd" class="form-control" value="{{$Payment_methods->title}}" />
                        </div>
                         <br>
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
