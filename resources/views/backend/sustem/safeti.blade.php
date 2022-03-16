@extends('backend.layouts.app')
@section('title' ) 
@section('content')
<style>
/* table {
  width: 50%;
  counter-reset: row-num;
} */
table tr {
  counter-increment: row-num;
}
table tr td:first-child::before {
    content: counter(row-num);
}

</style>
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 25px;">
                   
                    <h3>Система безопасности</h3>
                       

                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                
                                <th scope="col">Имя</th>
                                <th scope="col">Содержание</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Дата до</th>
                                <th scope="col">Дата после</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($sustems as $sustem)
                            <tr>
                                  <td class="h5">{{$sustem->name}}</td>
                                  <td class="h5">{{$sustem->content}}</td>
                                  <td class="h5">{{$sustem->status}}</td>
                                  <td class="h5">{{$sustem->created_at}}</td>
                                  <td class="h5">{{$sustem->updated_at}}</td>
                            </tr>
                            @endforeach



                            </tbody>
                          </table>
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
