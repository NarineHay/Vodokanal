@extends('backend.layouts.app')

@section('title' )

@section('content')

<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->

        <div class="row">
    <div class="col">
        <div class="card" style="padding:25px">
            @if (session('message'))
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('message') }}
                </div>
            @endif
             <h3>о нашей компании</h3>
           
               <form action="{{route('backend.edit_about_as', $about->id)}}" method="get">
                @csrf
                    <div class="large-field-group simple">
                        <label class="form-label" for="error-adajsd">заглавие</label>
                        <input  type="text" name="title" id="error-adajsd" class="form-control" value="{{$about->title}}">
                    </div>
                    <label class="form-label" for="error-adajsd">содержание</label>
                    <textarea id="mytextarea" name="content">
                        {{$about->content}}
                    </textarea>
                   <br>
                   <button  class="btn btn-primary">редактировать</button>
               </form>
             
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->
    </div>
    <!--animated-->
</div>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script>
@endsection

