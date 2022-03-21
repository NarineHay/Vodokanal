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
use App\Http\Controllers\Backend\AdministrationController;
use App\Http\Controllers\Backend\CompanyDetailsController;
use App\Http\Controllers\Backend\MainActivities1Controller;
use App\Http\Controllers\Backend\MainActivities2Controller;
use App\Http\Controllers\Backend\MainHomePageController;
use App\Http\Controllers\Backend\TariffDetailsController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\FeeddbackController;
use App\Http\Controllers\Backend\TerminalController;

use App\Http\Controllers\Backend\ContractController;
use App\Http\Controllers\Backend\SupportTaskController;

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
    Route::group(['middleware' => ['verified']], function () {

        Route::group(['namespace' => 'User', 'as' => 'user.'], function () {//user.dashboard
            Route::get('balance_repl', [DashboardController::class, 'show_balance'])->name('balance_repl');
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('account', [AccountController::class, 'index'])->name('account');
            Route::get('support', [SupportController::class, 'index'])->name('support');
            Route::post('support', [SupportController::class, 'support_tasks'])->name('support_create');
            Route::get('balance_replenishment', [BalanceReplenishmentController::class, 'index'])->name('balance_replenishment');
            Route::post('dashboard', [DashboardController::class, 'savenumber'])->name('add_phone');
            Route::get('mycars', [DashboardController::class, 'indexcars'])->name('mycars');
            Route::get('dashboard/{id}', [DashboardController::class, 'delete'])->name('delete_phone');
            Route::post('dashboard_blance', [DashboardController::class, 'CreateBlance'])->name('dashboard_blance');

        });
    // ----------------- backend routs -------------------------------------------------------------------
        Route::resource('/backend/administration', AdministrationController::class);
        Route::resource('/backend/roles', RoleController::class);
        Route::resource('/backend/users', UserController::class);

        Route::group(['namespace' => 'Backend', 'as' => 'backend.'], function () {
            Route::get('backend/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('card', [CartController::class, 'index'])->name('card');
            Route::get('cart_accept/{id}', [CartController::class, 'cart_acceptfoo'])->name('cart_accept');
            Route::get('backend/support', [BackendSupportController::class, 'index'])->name('support');
            Route::get('backend/main_home_page', [MainHomePageController::class, 'index'])->name('main_home_page');
            Route::post('edit_main_home', [MainHomePageController::class, 'edit_main_home'])->name('edit_main_home');
            Route::get('backend/about_us', [AboutUsController::class, 'index'])->name('about_as');
            Route::get('backend/edit/{id}', [AboutUsController::class, 'edit_about_us'])->name('edit_about_as');
            Route::get('backend/main_activities', [MainActivities1Controller::class, 'index'])->name('main_activities');
            Route::get('backend/main_activities_edit/{id}', [MainActivities1Controller::class, 'edit_main_activities'])->name('edit_main_activities');
            Route::get('backend/main_activities2', [MainActivities2Controller::class, 'index'])->name('main_activities2');
            Route::get('backend/main_activities2_edit/{id}', [MainActivities2Controller::class, 'edit_main_activities2'])->name('edit_main_activities2');
            Route::get('backend/tariff_details', [TariffDetailsController::class, 'index'])->name('tariff_details');
            Route::post('edit_tariff_details/{id}', [TariffDetailsController::class, 'edit_tarif'])->name('edit_tariffss');
            Route::get('backend/payment_method', [PaymentMethodController::class, 'index'])->name('payment_method');
            Route::post('edit_payment_method/{id}', [PaymentMethodController::class, 'payment_method_edit'])->name('edit_payment');
            Route::get('backend/show_new_payment_method', [PaymentMethodController::class, 'create_new'])->name('create');
            Route::post('/add_new_payment_method', [PaymentMethodController::class, 'add_new_payment_method'])->name('add_new');
            Route::get('backend/company_details', [CompanyDetailsController::class, 'index'])->name('company_details');
            Route::post('edit_company_details/{id}', [CompanyDetailsController::class, 'edit_company_details'])->name('edit_company_details');

            Route::get('backend/contract_page', [ContractController::class, 'index'])->name('contract_page');
            Route::get('backend/add_new_Contract', [ContractController::class, 'add_contract'])->name('add_new_Contract');
            Route::post('backend/store_info_Contract', [ContractController::class, 'store_contract'])->name('store_info_Contract');
            Route::get('backend/show_contract/{id}', [ContractController::class, 'show_contract'])->name('show_contract_index');
            Route::get('backend/edit_contract/{id}', [ContractController::class, 'edit_contract'])->name('edit_contract');
            Route::post('/edit_now_contract/{id}', [ContractController::class, 'update'])->name('edit_now_contract');
            Route::get('backend//{id}', [ContractController::class, 'delate_file'])->name('delate_file');
            Route::get('backend/delate_index_contract_page/{id}', [ContractController::class, 'index_contract_page'])->name('delate_index_contract_page');

            Route::get('/feedback_index', [FeeddbackController::class, 'index'])->name('feedback_index');
            Route::get('show_feedback/{id}', [FeeddbackController::class, 'show'])->name('show_feedback');
            Route::post('send_mail_feedbeack/{id}', [FeeddbackController::class, 'send_mail'])->name('send_mail_feedbeack');
            Route::get('feedback_delate_feed/{id}', [FeeddbackController::class, 'delete'])->name('feedback_delate_feed');

            Route::get('/support_task_index', [SupportTaskController::class, 'index'])->name('support_task_index');
            Route::get('support_task_show/{id}', [SupportTaskController::class, 'show'])->name('support_task_show');
            Route::post('send_mail_user_message/{id}', [SupportTaskController::class, 'sendmail'])->name('send_mail_user_message');
            Route::get('feedback_delate/{id}', [SupportTaskController::class, 'delete'])->name('feedback_delate');
            Route::get('/info_terminal', [TerminalController::class, 'index'])->name('info_terminal');
            Route::get('/add_new_terminal', [TerminalController::class, 'show_new_terminal'])->name('add_new_terminal');
            Route::post('/store_new_terminal', [TerminalController::class, 'store'])->name('store_new_terminal');



            Route::post('createcard', [CartController::class, 'CreateCard'])->name('createcard');
            Route::get('createcard_user', [CartController::class, 'index1'])->name('createcard_user');
            Route::get('addbalance', [CartController::class, 'addbalance_u'])->name('addbalance');
            Route::post('select_user', [CartController::class, 'SelectUser'])->name('select_user');
            Route::post('show_user_info', [CartController::class, 'ShowUserInfos'])->name('show_user_info');

            Route::post('adduserbalance', [CartController::class, 'addblance_user_balance'])->name('adduserbalance');
            Route::get('checkbalance', [CartController::class, 'checkbalance'])->name('checkbalance');

            Route::get('safeti', [AdministrationController::class, 'safeti_sustem'])->name('safeti');
            Route::get('map', [AdministrationController::class, 'map_page'])->name('map');

        });
    });
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('card11', [CardController::class, 'index']);



