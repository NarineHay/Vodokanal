@extends('user.layouts.app')

@section('title' )

@section('content')
<body>
    <header>

    </header>
<section>
         <div class="ml">
            <div class="i_1 d-flex justify-content-between flex-wrap"></div>
            <h4 class="fw-bold">Машины </h4>
                      <table class="table shadow mb-5 bg-white rounded">

                        <tr>
                            <th  class="border border-1">Mодель</th>
                            <th  class="border border-1">Номер машины</th>
                            <th  class="border border-1">Траты</th>
                            <th  class="border border-1">Вода (кубометр)</th>
                            <th  class="border border-1">Остаток</th>

                        </tr>
                        @foreach($Cars as $car)
                        <tr>
                          <td class=" border border-1 py-3">
                              {{$car->model}}
                          </td>
                          <td class=" border border-1 py-3">
                              {{$car->car_numbers}}
                          </td>
                          <td class=" border border-1 py-3">
                              {{ $car->card->card_job->last() != null && $car->card->card_job->last()->status != "start" ? $car->card->card_job->last()->price : "---" }}
                          </td>
                          <td class=" border border-1 py-3">
                            {{ $car->card->card_job->last() != null && $car->card->card_job->last()->status != 'start' ? $car->card->card_job->last()->volume : "---" }}
                          </td>
                          <td class=" border border-1 py-3">
                            {{ $car->card->balance }}

                          </td>
                        </tr>
                        @endforeach

                      </table>


        </div>



</section>
</body>

@endsection
