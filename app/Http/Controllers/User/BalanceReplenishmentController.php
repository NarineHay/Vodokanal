<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceReplenishmentController extends Controller
{
    public function index()
    {
        return view('user.balance_replenishment.index');

    }
}
