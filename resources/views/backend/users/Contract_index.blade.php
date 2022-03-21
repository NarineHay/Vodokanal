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
                    @if (session('message'))
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('message') }}</div>
                    @endif
                    @if (session('delete'))
                    <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('delete') }}</div>
                    @endif
                    <div class="d-flex justify-content-between">
                      <h3>Договор</h3>
                      <a href="{{route('backend.add_new_contract')}}" style="color:#fff"><button class="btn btn-primary">Добавить новый контракт</button></a>
                    </div>
                    <p></p>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя пользователя</th>
                                <th scope="col">Контактный номер</th>
                                <th scope="col">Дата начала</th>
                                <th scope="col">Дата окончания</th>
                                <th scope="col">Действие</th>
                              </tr>
                            </thead>
                            <tbody>

                              @foreach ($Contracts as $Contractss)
                                  <tr>
                                  <td></td>
                                  <td>{{$Contractss['user']->first_name}}</td>
                                  <td>{{$Contractss->number}}</td>
                                  <td>{{$Contractss->date_start}}</td>
                                  <td>{{$Contractss->date_end}}</td>
                                  <td>
                                      <a href="{{route('backend.show_contract_index',$Contractss->id)}}"><i style="font-size: 20px;" class="fa fa-eye" aria-hidden="true"></i></a>
                                      <a href="{{route('backend.edit_contract',$Contractss->id)}}"><i style="font-size: 20px;" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                      <a href="{{route('backend.delate_index_contract_page',$Contractss->id)}}"><i  style="font-size: 20px;" class="fa fa-trash-o" aria-hidden="true"></i></a>
                                  </td>
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
