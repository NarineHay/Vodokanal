<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_us;
use App\Models\MainActivitie1;
use App\Models\MainActivitie2;
use App\Models\Main;
use App\Models\Tarif;
use App\Models\Payment_method;
use App\Models\Our_company_details;
use App\Models\footer;

class WelcomeController extends Controller
{
    public function index()
    {
        $footer = footer::All();
        $Aboutus = About_us::All();
        $MainActivitie1 = MainActivitie1::All();
        $MainActivitie2 = MainActivitie2::All();
        $Tarif = Tarif::All();
        $Main = Main::All();
        $Payment_method = Payment_method::All();
        $Our_company_details = Our_company_details::All();
        return view('welcome',compact(
        'Aboutus',
        'MainActivitie1',
        'MainActivitie2',
        'Main',
        'Tarif',
        'Payment_method',
        'Our_company_details',
        'footer'
    ));
    }
}
