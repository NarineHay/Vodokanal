@extends('layouts.app')

@section('title')
@section('style')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')

<section >
    <!-- img section start -->
      <div class="position-relative w-100">
        @foreach ($Main as $Mains)
               <img src="/assets/images/img_index/{{$Mains->img_path}}" class="w-100 ">
          @endforeach
        <div  class=" justify-content-center position-absolute  balance_in">
         @foreach ($Main as $Mains)
           <button type="button" class="font-weight-bold balance"><a href="{{$Mains->url}}" style="text-decoration:unset;">Пополнить баланс</a></button>
         @endforeach
        </div>
      </div>
</section>
    <!----------------------------->
    <!-- line and text  section start -->
<section id="section2" class="container my-5">
        <div class="d-flex justify-content-center p-3 line about-us">
            <hr>
            @foreach ($Aboutus as $About_us )
                 <div  class="text-center payment">{{$About_us->title}}</div>
            @endforeach
            <hr>
        </div>

        <div class="px-4 mt-2 mb-5 pb-4 ">
            @foreach ($Aboutus as $About_us)
                {!!$About_us->content!!}
            @endforeach
        </div>

</section>
<section class="container my-5">
    <div class="mb-4 d-flex align-items-center justify-content-center main-activities" >
        @foreach ($MainActivitie1 as $MainActivitie1s)
            <hr>
            <div class="text-center payment px-1">{{$MainActivitie1s->title}}</div>
            <hr>
        @endforeach

    </div>
    @foreach ($MainActivitie1 as $MainActivitie1s )
      {!!$MainActivitie1s->content!!}
    @endforeach
</section>
<section class="container my-5">
    <div class="mb-4 d-flex align-items-center justify-content-center main-activities" >
        @foreach ($MainActivitie2 as $MainActivitie2s)
            <hr>
            <div class="text-center payment px-1">{{$MainActivitie2s->title}}</div>
            <hr>
        @endforeach

    </div>
    @foreach ($MainActivitie2 as $MainActivitie2s)
      {!!$MainActivitie2s->content!!}
    @endforeach
</section>
<section class=" my-5"  >
    <div class="section_second_img ">
        <div class="video-container">
            @foreach ($Tarif as $Tarifs )
             <video autoplay muted loop id="myVideo">
               <source src="/assets/images/img_index/{{$Tarifs->img_path}}" type="video/mp4">
             </video>
            @endforeach

            <div class="container tarif-cont py-5">
                @foreach ($Tarif as $Tarifs )
                 <div class="d-flex justify-content-center mb-4">
                    <hr>
                    <div class="tariff mx-2 text-center" >{{$Tarifs->name}}</div>
                    <hr>
                  </div>
                @endforeach
                @foreach ($Tarif as $Tarifs )
                    {!!$Tarifs->detailes!!}
                @endforeach
                @foreach ($Tarif as $Tarifs )
                    <div class="text-center pt-5 ">
                        <a  class="py-2 px-5 text-white price">{{$Tarifs->price}} ₽ за куб.</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!---------------------------------------------------------->
<!-- payment section start --------------------------------->
<section class="container my-5">
    <div class="section_third_payment">

            <div class="d-flex align-items-center justify-content-center payment-methods">
            <hr>
            <div id="section3" class="text-center payment mx-2">Способы оплаты</div>
            <hr>
        </div>

        <div class="container pt-5 ">
            <div class="d-flex justify-content-center water">
                @foreach ($Payment_method as $Payment_methods)
                    <div class="d-flex flex-column  align-items-center mb-2" >
                        <div  class="icon rounded-circle text-center"  >
                           <a href="{{$Payment_methods->link}}"><img src="/assets/images/img_index/{{$Payment_methods->img_path}}"></a>
                        </div>
                        <div class="mt-2 water_text">{{$Payment_methods->title}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-------------------------------------------------------------->
<section class="container">

    <div class="p-3 align-items-center d-flex justify-content-center company-details">
        <hr>
        <div class="mx-2 payment text-center">Реквизиты компании</div>
        <hr>
    </div>
    @foreach ($Our_company_details as $Our_company_detailss)
        {!! $Our_company_detailss->content !!}
    @endforeach
</section>
<section id="section4" class="pt-5">
    <div class="section_fifth_terminal pt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center terminal-locations">
                <hr>
                <div class="mx-2 payment text-center">Места терминалов </div>
                <hr>
            </div>
        </div>
        <div class="mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d143544.06825773718!2d48.93321046869669!3d55.79538989095889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead2b7caccd99%3A0x7fcb77b9b5ad8c65!2z0JrQsNC30LDQvdGMLCDQoNC10YHQvy4g0KLQsNGC0LDRgNGB0YLQsNC9LCDQoNC-0YHRgdC40Y8!5e0!3m2!1sru!2s!4v1651006438832!5m2!1sru!2s" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</section>
@endsection
@section('footer')
    @include('includes.footer')
@endsection
