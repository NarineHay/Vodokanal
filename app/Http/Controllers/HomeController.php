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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Aboutus = About_us::All();
        $MainActivitie1 = MainActivitie1::All();
        $MainActivitie2 = MainActivitie2::All();
        $Main = Main::All();
        $Tarif = Tarif::All();
        $Payment_method = Payment_method::All();
        $Our_company_details = Our_company_details::All();
        return view('home',compact(
        'Aboutus',
        'MainActivitie1',
        'MainActivitie',
        'Main',
        'Tarif',
        'Payment_method',
        'Our_company_details'
        
    ));
    }
}
