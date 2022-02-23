@extends('layouts.app')

@section('title')
@section('style')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')

<section>
    @if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> <i class="fa fa-check" aria-hidden="true">{{ session('status') }}</i>
        </div>
    @endif
    
    <!-- img section start -->
      <div class="position-relative w-100">
        <img src="{{ asset('assets/images/img_index/drop-of-water-g8da463e9a_1920 1.png') }}" class="w-100 ">
        <div class=" justify-content-center position-absolute  balance_in">
            <button type="button" class="font-weight-bold balance">Пополнить баланс</button>
        </div>
      </div>
</section>
    <!----------------------------->
    <!-- line and text  section start -->
<section class="container my-5">
        <div class="d-flex justify-content-center p-3 line about-us">
            <hr >
            <div class="text-center payment">О нашей компании </div>
            <hr >
        </div>
        <div class="px-4 mt-2 mb-5 pb-4 ">
            <p style="text-align: justify;color:#000000; text-indent:5%">
                Коммунальное водопроводно-канализационное хозяйство города Казани – отрасль народного хозяйства. Наряду с теплоэнергетикой является важнейшей составной частью социальной инфраструктуры. Результаты работы МУП«Водоканал» во многом определяют здоровье и продолжительность жизни человека, санитарно-эпидемиологическую обстановку на территории города, нормальное функционирование промышленных предприятий, всей социальной сферы.
            </p>
            <p style="text-align: justify;text-indent: 5%;color:#000000;">
                Муниципальное унитарное предприятие «Водоканал» г.Казани создано в соответствии с постановлением главы Администрации г.Казани № 1366 от 30.12.1993г. Реорганизовано в форме присоединения к нему МУП «Управление по эксплуатации гидротехнических сооружений» в соответствии с Постановлением руководителя Исполнительного комитета г.Казани от 11.11.2009г. № 9619.
            </p>
        </div>
</section>
<section class="container my-5" 

>
    <div class="mb-4 d-flex align-items-center justify-content-center main-activities" >
        <hr>
        <div class="text-center payment px-1">Основные виды деятельности предприятия </div>
        <hr>
    </div>
    <ul style="text-align: justify;color:#000000;">
        <li>Снабжение питьевой водой жителей Казани, предприятий бюджетной и социальной сфер, а так же предприятий различной форм собственности</li>
        <li>Контроль качества питьевой воды, подаваемой потребителям</li>
        <li>Очистка и обработка стоков</li>
        <li>Отведение сточных до очистных сооружений</li>
        <li>Контроль качества сбрасываемых сточных вод предприятиями и организациями города в городскую систему водоотведения</li>
        <li>Эксплуатация сетей и сооружений</li>
        <li>Проведение капитального ремонта</li>
        <li>Реконструкция и строительство инженерных сетей, сооружений систем водоснабжения и водоотведения</li>
        <li>Текущее содержание объектов гидротехнических сооружений, проведение противопаводковых мероприятий, откачка поверхностных и дренажных вод.</li>
    </ul>
</section>
<section class="container my-5">
    <div class="mb-4 d-flex align-items-center justify-content-center main-activities">
        <hr>
        <div class="text-center payment px-1">Основные виды деятельности предприятия </div>
        <hr>
    </div>
    <ul  style="text-align: justify;color:#000000;">
        <li>В хозяйстве Водоканала имеется:</li>
        <li>Поверхностный водозабор на реке Волга</li>
        <li>Станция очистки воды</li>
        <li>10 грунтовых подземных водозаборов</li>
        <li>13 артезианских скважин в поселках</li>
        <li>173 очистных сооружений канализационных стоков</li>
        <li id="section1">3349 километров сетей водопровода и канализации</li>
        <li>154 водопроводных и канализационных насосных станций.</li>
    </ul>
    <p style="text-align: justify;color:#000000;text-indent:5%;" >
        На предприятии трудится 2450 человек разных профессий. В целях защиты социально-трудовых прав и профессиональных интересов каждого работника в 2018 году принят коллективный договор, сроком действия 3 года. Документ регламентирует трудовые отношения между работодателем и работником.
    </p>
</section>
<section class=" my-5"  >
    <div class="section_second_img ">
        <div class="video-container">
            <video autoplay muted loop id="myVideo">
                <source src="{{ asset('assets/images/img_index/water.mp4') }}" type="video/mp4">
            </video>
            <div class="container tarif-cont py-5">
                <div class="d-flex justify-content-center mb-4">
                    <hr>
                    <div class="tariff mx-2 text-center" >Детали тарифа</div>
                    <hr>
                </div>
                <ol >
                  <li> Нужно заключить договор</li>
                  <li> Заегистрироватся на сайте</li>
                  <li> Указать количество машин</li>
                  <li id="section3"> Получить индивидуальную карту</li>
                </ol>
                <div class="text-center pt-5 ">
                    <a class="py-2 px-5 text-white price">19.55 ₽ за куб.</a>
                </div>
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
            <div class="text-center payment mx-2">Способы оплаты</div>
            <hr>
        </div>
        <div class="container pt-5 ">
            <div class="d-flex justify-content-center water">
                <div class="d-flex flex-column  align-items-center mb-2" >
                    <div  class="icon rounded-circle text-center"  >
                        <img src="{{ asset('assets/images/img_index/Vector.png') }}">
                    </div>
                    <div class="mt-2 water_text">Онлайн платеж</div>
                </div>
                <div class="d-flex flex-column  align-items-center  mb-2">
                    <div  class="icon rounded-circle text-center">
                        <img src="{{ asset('assets/images/img_index/Frame.png') }}">
                    </div>
                    <div id="section2" class=" mt-2 water_text">Платеж в кассе</div>
                </div>
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
    <ul style="list-style-type: none;">
        <li>МУП << ВОДОКАНАЛ >></li>
        <li>ИНН 1653006666 КПП 166001001</li>
        <li>ОГРН 1021602830370</li>
        <li>ОКПО 03317648 ОКВЕД 41.00</li>
        <li>Юр. Адрес: 420087, РТ, г. Казань, ул. Родины, д.9</li>
        <li>Почт. адрес 420015, РТ. г. Казань, ул. М. Горького, д.34</li>
        <li>р/с: 40602810600000000043 в ООО КБЭП "БАНК КАЗАНИ" г. Казань</li>
        <li id="section4">к/с: 301018101000000000844</li>
        <li>БИК:049205844</li>
        <li >Первый заместитель директора С М. Н.Алахов действует на основании доверенности №34-0/29742 от 02.12.2020г.</li>
    </ul>
</section>
<section class="pt-5">
    <div class="section_fifth_terminal pt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center terminal-locations">
                <hr>
                <div class="mx-2 payment text-center">Места терминалов </div>
                <hr>
            </div>
        </div>
        <div class="mt-4">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97584.07285755496!2d44.41852743774754!3d40.15336930106129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa2dab8fc8b5b%3A0x3d1479ae87da526a!2sYerevan%2C%20Armenia!5e0!3m2!1sen!2s!4v1635705110672!5m2!1sen!2s" width="100%" height="450" style="border:1px solid blue;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection
