<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Backend\SupportController as BackendSupportController;
use App\Http\Controllers\Mqtt\CardController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\BalanceReplenishmentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SupportController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------s------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify'=>true]);

Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'index'])->name('contact');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('roles', RoleController::class);
    Route::group(['middleware' => ['verified']], function () {

        Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::get('account', [AccountController::class, 'index'])->name('account');
            Route::get('support', [SupportController::class, 'index'])->name('support');
            Route::get('balance_replenishment', [BalanceReplenishmentController::class, 'index'])->name('balance_replenishment');

        });

        // Route::group(['middleware' => ['backend']], function () {
        //     Route::group(['namespace' => 'Backend', 'as' => 'backend.'], function () {
        //         Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //     });
        // });
        Route::group(['namespace' => 'Backend', 'as' => 'backend.'], function () {
            Route::get('/backend/support', [BackendSupportController::class, 'index'])->name('support');

        });

    });
});

// Route::group(['middleware' => 'guest'], function () {

// });
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('card11/{id}', [CardController::class, 'show']);
