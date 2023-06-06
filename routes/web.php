<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
    //return view('welcome');
});
Route::get('/admin_regestration5865', 'App\Http\Controllers\dashBoardController@admin_reg');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //for both
    Route::group(['middleware' => ['auth']], function() {
        //dashboard
        Route::get('/dashboard', 'App\Http\Controllers\dashBoardController@index')->name('dashboard');
    });
    //for admin  hg_useruser_hg|
    Route::group(['middleware' => ['auth', 'role:administrator']], function() {
        //add customer
        Route::get('/add_prizing', 'App\Http\Controllers\dashBoardController@add_prizings');
        //Route::get('/vehicle_management', 'App\Http\Controllers\dashBoardController@manage_vehicle');
        //Route::get('/view_vehicle/{id}', 'App\Http\Controllers\VehiclesController@view_vehicle');
        //Route::get('/view_driver/{id}', 'App\Http\Controllers\VehiclesController@view_driver');
        //Route::get('/view_customer', 'App\Http\Controllers\VehiclesController@view_customers');
        //Route::get('/view_customer_profile/{$id}', 'App\Http\Controllers\dashBoardController@view_customer');
        //Route::get('/add_transport', 'App\Http\Controllers\dashBoardController@add_transport');
        //Route::get('/view_customesProfile/{id}', 'App\Http\Controllers\dashBoardController@view_customer')->name('view_customer');
        //Route::get('/view_transports', 'App\Http\Controllers\dashBoardController@view_transports');
        //Route::get('/view_transportSeperately/{id}', 'App\Http\Controllers\dashBoardController@view_transportSeperately');
        //Route::get('/view_invoices', 'App\Http\Controllers\dashBoardController@view_invoices');
        //Route::get('/view_invoicetSeperately/{id}', 'App\Http\Controllers\dashBoardController@view_invoiceSeperately');

        //deletes jnsfjsfjiosdfjiosfsfs
        //Route::get('/delete_transport/{id}', 'App\Http\Controllers\DeleteController@deleteTransport');
        //Route::get('/delete_invoice/{id}', 'App\Http\Controllers\DeleteController@deleteInvoice');






        // http://127.0.0.1:8000/view_driver/1
        // http://127.0.0.1:8000/view_customes_profile/8
    });

    //for customer admin  hg_useruser_hg|
    Route::group(['middleware' => ['auth', 'role:customer']], function() {
        //add customer
        Route::get('/view_transportscustomer', 'App\Http\Controllers\dashBoardController@view_transportscustomer');
        Route::get('/view_invoicescustomerseperately/{id}', 'App\Http\Controllers\dashBoardController@view_invoicesSeperatelyCustomer');
        Route::get('/view_transportcustomerseperately/{id}', 'App\Http\Controllers\dashBoardController@view_transportseperatelycustomer');
        //Route::get('/vehicle_management', 'App\Http\Controllers\dashBoardController@manage_vehicle');
        //Route::get('/view_vehicle/{id}', 'App\Http\Controllers\VehiclesController@view_vehicle');
        //Route::get('/view_driver/{id}', 'App\Http\Controllers\VehiclesController@view_driver');
        //Route::get('/view_customer', 'App\Http\Controllers\VehiclesController@view_customers');
        //Route::get('/view_customer_profile/{$id}', 'App\Http\Controllers\dashBoardController@view_customer');
        //Route::get('/add_transport', 'App\Http\Controllers\dashBoardController@add_transport');
        //Route::get('/view_customesProfile/{id}', 'App\Http\Controllers\dashBoardController@view_customer')->name('view_customer');
        //Route::get('/view_transports', 'App\Http\Controllers\dashBoardController@view_transports');
        //Route::get('/view_transportSeperately/{id}', 'App\Http\Controllers\dashBoardController@view_transportSeperately');
        //Route::get('/view_invoices', 'App\Http\Controllers\dashBoardController@view_invoices');
        //Route::get('/view_invoicetSeperately/{id}', 'App\Http\Controllers\dashBoardController@view_invoiceSeperately');

        //deletes jnsfjsfjiosdfjiosfsfs
        //Route::get('/delete_transport/{id}', 'App\Http\Controllers\DeleteController@deleteTransport');
        //Route::get('/delete_invoice/{id}', 'App\Http\Controllers\DeleteController@deleteInvoice');






        // http://127.0.0.1:8000/view_driver/1
        // http://127.0.0.1:8000/view_customes_profile/8
    });

    //for hg_user
    Route::group(['middleware' => ['auth', 'role:user_hg|administrator']], function() {
        //add customer
        Route::get('/add_customer', 'App\Http\Controllers\dashBoardController@add_customer');
        Route::get('/vehicle_management', 'App\Http\Controllers\dashBoardController@manage_vehicle');
        Route::get('/view_vehicle/{id}', 'App\Http\Controllers\VehiclesController@view_vehicle');
        Route::get('/view_driver/{id}', 'App\Http\Controllers\VehiclesController@view_driver');
        Route::get('/view_customer', 'App\Http\Controllers\VehiclesController@view_customers');
        Route::get('/view_customer_profile/{$id}', 'App\Http\Controllers\dashBoardController@view_customer');
        Route::get('/add_transport', 'App\Http\Controllers\dashBoardController@add_transport');
        Route::get('/view_customerSep/{id}', 'App\Http\Controllers\dashBoardController@view_customer');



        //Route::get('/view_customesProfile/{id}', 'App\Http\Controllers\dashBoardController@view_customer')->name('view_customer');
        Route::get('/view_transports', 'App\Http\Controllers\dashBoardController@view_transports');
        Route::get('/view_transportSeperately/{id}', 'App\Http\Controllers\dashBoardController@view_transportSeperately');
        Route::get('/view_invoices', 'App\Http\Controllers\dashBoardController@view_invoices');
        Route::get('/view_invoicetSeperately/{id}', 'App\Http\Controllers\dashBoardController@view_invoiceSeperately');

        //deletes jnsfjsfjiosdfjiosfsfs
        Route::get('/delete_transport/{id}', 'App\Http\Controllers\DeleteController@deleteTransport');
        Route::get('/delete_invoice/{id}', 'App\Http\Controllers\DeleteController@deleteInvoice');

        Route::get('/print_invoice/{id}', 'App\Http\Controllers\dashBoardController@print_invoiceprintinvoice');

        Route::get('/add_section', 'App\Http\Controllers\dashBoardController@add_section');
        //Route::get('owner/{id}',[\App\Http\Controllers\dashBoardController::class,'vehicle_owner']);
        Route::get('/vehicle_owner/{id}', 'App\Http\Controllers\dashBoardController@vehicle_owner');





        // http://127.0.0.1:8000/view_driver/1
        // http://127.0.0.1:8000/view_customes_profile/8
    });
});
