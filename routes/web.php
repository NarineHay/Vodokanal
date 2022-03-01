<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SupportController as BackendSupportController;
use App\Http\Controllers\Mqtt\CardController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\BalanceReplenishmentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SupportController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Backend\AboutUsController;

use App\Http\Controllers\Backend\MainActivities1Controller;
use App\Http\Controllers\Backend\MainActivities2Controller;
use App\Http\Controllers\Backend\MainHomePageController;

use App\Http\Controllers\Backend\MainactivitiesController;
use App\Http\Controllers\Backend\UserController;



use App\Http\Controllers\Backend\CartController;

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
Route::post('/feedback', [FeedbackController::class, 'sendFeedback']);

Route::group(['middleware' => 'auth'], function () {
    // Route::resource('roles', RoleController::class);
    Route::group(['middleware' => ['verified']], function () {

        Route::group(['namespace' => 'User', 'as' => 'user.'], function () {//user.dashboard
            Route::get('dashboard', [DashboardController::class, 'index'])->name('infos');
            Route::get('account', [AccountController::class, 'index'])->name('account');
            Route::get('support', [SupportController::class, 'index'])->name('support');
            Route::post('support', [SupportController::class, 'support_tasks'])->name('support_create');
            Route::get('balance_replenishment', [BalanceReplenishmentController::class, 'index'])->name('balance_replenishment');
            Route::post('dashboard', [DashboardController::class, 'savenumber'])->name('add_phone');
            Route::get('mycars', [DashboardController::class, 'indexcars'])->name('mycars');
            Route::get('dashboard/{id}', [DashboardController::class, 'delete'])->name('delete_phone');
            Route::post('dashboard_blance', [DashboardController::class, 'CreateBlance'])->name('dashboard_blance');
           

        });

        // Route::group(['middleware' => ['backend']], function () {
        //     Route::group(['namespace' => 'Backend', 'as' => 'backend.'], function () {
        //         Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //     });
        // });
        Route::resource('/backend/roles', RoleController::class);
        Route::resource('/backend/users', UserController::class);

        Route::group(['namespace' => 'Backend', 'as' => 'backend.'], function () {
            // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('cart', [CartController::class, 'index'])->name('cart');
            Route::get('/backend/support', [BackendSupportController::class, 'index'])->name('support');

            Route::get('/main_home_page', [MainHomePageController::class, 'index'])->name('main_home_page');
            Route::post('/edit_main_home', [MainHomePageController::class, 'edit_main_home'])->name('edit_main_home');
            Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_as');
            Route::get('edit/{id}', [AboutUsController::class, 'edit_about_us'])->name('edit_about_as');

            Route::get('/main_activities', [MainActivities1Controller::class, 'index'])->name('main_activities');
            Route::get('main_activities_edit/{id}', [MainActivities1Controller::class, 'edit_main_activities'])->name('edit_main_activities');
            Route::get('/main_activities2', [MainActivities2Controller::class, 'index'])->name('main_activities2');
            Route::get('main_activities2_edit/{id}', [MainActivities2Controller::class, 'edit_main_activities2'])->name('edit_main_activities2');

            Route::post('createcard', [CartController::class, 'CreateCard'])->name('createcard');
            Route::get('createcard1', [CartController::class, 'index1'])->name('createcard1');


            // Route::resource('roles', RoleController::class);
    // Route::resource('/backend/roles', RoleController::class)->only([
    //     'index', 'show'
    // ]);*
            // Route::resource('users', UserController::class);

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

    return redirect('/infos');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('card11/{id}', [CardController::class, 'show']);
Route::post('supportaproved', [SupportController::class, 'show_aproved_smm']);










