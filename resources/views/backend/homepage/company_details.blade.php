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
                    <h3>Реквизиты компании</h3>
                
                    <form action="{{route('backend.edit_company_details',$Our_company_details->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf

                        <div class="large-field-group simple">
                            <label class="form-label" for="error-adajsd">содержание</label>
                            <textarea id="mytextarea" name="content">
                            {!!$Our_company_details->content !!}
                            </textarea>
                        </div>
                        <br/>
                        <button class="btn btn-primary">редактировать</button>
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
  selector: 'textarea',
  toolbarButtons: [['undo', 'redo'], ['paragraphFormat'], ['bold', 'italic'],
['alignLeft', 'alignCenter', 'alignRight', 'alignJustify'],
['formatOL', 'formatUL'], ['indent', 'outdent']]

});

</script>
@endsection
