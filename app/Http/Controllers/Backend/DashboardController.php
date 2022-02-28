<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        if (! auth()->user()->isAdmin()) {
            return redirect(route('user.dashboard'))->withFlashDanger('You are not authorized to view admin dashboard.');
        }

        return view('backend.dashboard');
    }
}
