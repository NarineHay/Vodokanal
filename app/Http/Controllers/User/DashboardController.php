<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // return view('user.dashboard');
        if (! auth()->user()->isAdmin()) {
            // return redirect(route('user.dashboard'))->withFlashDanger('You are not authorized to view admin dashboard.');
            return view('user.dashboard');

        }

        return view('backend.dashboard');
        // dd(auth()->user()->isAdmin());
        // dd(auth()->user()->roles);

    }
}
