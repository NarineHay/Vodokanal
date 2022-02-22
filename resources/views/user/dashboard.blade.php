@extends('user.layouts.app')

@section('title' )

@section('content')
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->

        <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Welcome Alan Whitmore!</strong>
            </div><!--card-header-->
            <div class="card-body">
                Welcome to the Dashboard
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->
    </div>
    <!--animated-->
</div>
{{-- <div class="flex-item-right pl-5 pr-2">
    <div class="i_1 d-flex justify-content-between flex-wrap">
      <div class="mt-5">
        <h4 class=" d-flex">
          <span class="fw-bold">Баланс на счету</span>
          <span class="mx-2 fw-bolder">15 руб.</span>
        </h4>
        <h6>Обзор баланса</h6>
      </div>
      <div class="a_1 d-flex mt-3">
        <span class="fw-bold text-dark">Пополнить баланс</span>
        <div class="plus mx-1 mt-1 fw-bold" onclick="myFuncion()">+</div>
      </div>
     </div>
    <hr>
    <h4 class="fw-bold">История переводов</h4>
    <table class="table shadow mb-5 bg-white rounded">
      <tr>
        <th  class="border border-1">Попол. счет</th>
        <th  class="border border-1">Машина</th>
        <th  class="border border-1">Траты</th>
        <th  class="border border-1">Вода (кубометр)</th>
        <th  class="border border-1">Остаток</th>
      </tr>
      <tr>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
      </tr>
      <tr>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
      </tr>
      <tr>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
      </tr>
      <tr>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
        <td class=" border border-1 py-3"></td>
      </tr>

    </table>

  <div class="i_2 justify-content-between d-flex flex-wrap">
    <div>
        <h4 class="fw-bold">Мои карты</h4>
        <h6 class="text-danger">+Пополнить карту</h6>
    </div>
    <div class="a_2  d-flex">
        <span class="fw-bold text-dark">Добавить</span>
        <div class="plus  mx-1 mt-1 fw-bold">+</div>
    </div>
  </div>

<div class="row justify-content-between">
<div class="col-lg-6 col-md-6  col-sm-12 col-12 mb-2 p-3">
    <div class="card p-3" style="border-radius:20px;">
      <h6>Машина - номер машины </h6>
      <p class="text-success fw-bold">Текущий баланс 3000 руб.</p>
      <div>
         <input class="w-50" placeholder="Сумма:">
         <span class="text-muted">руб.</span>
      </div>
      <button class="mt-3 text-white w-50 h-25" onclick="f1()">Сохранить</button>
    </div>
</div>
<div class="col-lg-6 col-md-6  col-sm-12 col-12 mb-2 p-3">
      <div class="card p-3" style="border-radius: 20px;">
        <h6>Машина - номер машины </h6>
      <div>
        <p class="text-success h3">Текущий баланс</p>
        <p class="text-success h3"> 3000 руб.</p>
      </div>
       <h6 class="text-danger">+Пополнить карту</h6>
   </div>
</div>
</div> --}}
@endsection
