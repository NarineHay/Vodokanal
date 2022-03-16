<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment_method;

class BalanceReplenishmentController extends Controller
{
    public function index()
    {
        $payment_methods = Payment_method::all();
        return view('user.balance_replenishment.index',compact('payment_methods'));
    }
    public function show_balance()
    {
       
    }
    
}
