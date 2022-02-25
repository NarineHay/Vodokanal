@extends('user.layouts.app')

@section('title' )

@section('content')
<body>
    <header>
        
    </header>
<section>
         <div class="ml">
            <div class="i_1 d-flex justify-content-between flex-wrap"></div>
            <h4 class="fw-bold">Личные данные</h4>
                      <table class="table shadow mb-5 bg-white rounded">
                      <form action="{{route('user.add_phone')}}" method="post">
                        <tr>
                            <th  class="border border-1">Попол. счет</th>
                            <th  class="border border-1">Машина</th>
                            <th  class="border border-1">Траты</th>
                            <th  class="border border-1">Вода (кубометр)</th>
                            <th  class="border border-1">Остаток</th>

                        </tr>
                        <tr>
                          <td class=" border border-1 py-3">
                          
                          </td>
                          <td class=" border border-1 py-3">
                          
                          </td>
                          <td class=" border border-1 py-3">
                          
                          </td>
                          <td class=" border border-1 py-3">
                          
                          </td>
                          <td class=" border border-1 py-3">
                          
                          </td>
                        </tr>
                      </form>
                      </table>
 
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
        </div>

       

</section>
</body>

@endsection
