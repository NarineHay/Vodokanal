<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_us;
use App\Models\MainActivitie1;
use App\Models\MainActivitie2;
use App\Models\Main;

class WelcomeController extends Controller
{
    public function index()
    {
        $Aboutus = About_us::All();
        $MainActivitie1 = MainActivitie1::All();
        $MainActivitie2 = MainActivitie2::All();
        $Main = Main::All();
        return view('welcome',compact(
        'Aboutus',
        'MainActivitie1',
        'MainActivitie2',
        'Main'
    ));
    }
}
