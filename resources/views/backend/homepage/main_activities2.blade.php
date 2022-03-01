@extends('backend.layouts.app')

@section('title' )

@section('content')
<style>
    .large-field-group {
  margin-bottom: 50px;
}

</style>
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
    <div class="col">
        <div class="card" style="padding:25px">
            @if (session('message'))
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}
                </div>
            @endif
             <h3> Основные виды деятельности предприятия второй</h3>
            
               @foreach ($MainActivitie2 as $MainActivitie2)
                <form action="{{route('backend.edit_main_activities2',$MainActivitie2->id)}}" method="get">
                    @csrf
                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">заглавие</label>
                            <input  type="text" name="title" id="error-adajsd" class="form-control" value="{{$MainActivitie2->title}}">
                        </div>
                        <label class="form-label" for="error-adajsd">содержание</label>
                        <textarea id="mytextarea" name="content">
                          {!!$MainActivitie2->content!!}
                        </textarea>
                    <br>
                    <button  class="btn btn-primary">редактировать</button>
                </form>
               @endforeach
             
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
