<?php

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


use Illuminate\Http\Request;
use Stevebauman\Translation\Facades\Translation;
if($lang  =  substr(@$_SERVER['HTTP_ACCEPT_LANGUAGE'],0, 2)){
    App::setLocale($lang);
}

Route::group(['prefix' => Translation::getRoutePrefix(), 'middleware' => ['locale']], function () {

    Route::group(['domain' => env('APP_DOMAIN')], function () {
        Route::get('/verify/{email}', ['as' => 'user.unverified', 'uses' => 'VerificationController@index']);
        Route::get('/verify/{email}/resend', ['as' => 'user.unverified.resend', 'uses' => 'VerificationController@resend']);
        Route::get('/verify/{email}/{code}', ['as' => 'user.unverified.verify', 'uses' => 'VerificationController@verify']);
        Auth::routes();
        Route::get('', 'HomeController@landing')->name('landing');
        //User login Required
        Route::group(['middleware' => ['auth'], ['except' => 'landing']], function () {
            Route::get('/verified', ['as' => 'user.verified', 'uses' => 'VerificationController@verified']);
            Route::get('/home', 'HomeController@index')->name('home');

            //Route::get('/client', 'ClientController@index');
            Route::get('/client/create', ['as' => 'user.client.create', 'uses' => 'ClientController@create']);
            Route::post('/client', 'ClientController@store');
            Route::get('/client/edit/{client}', 'ClientController@edit');
            Route::put('/client/{client}', 'ClientController@update');
            //Route::get('/client/{client}', 'ClientController@view');

            Route::get('/notfound/client', ['as' => 'user.not_found.client', 'uses' => 'NotFoundController@client']);
            Route::group(['middleware' => 'UserClientDashboard'], function () {
                Route::get('/dashboard/{client}', ['as' => 'user.client.dashboard', 'uses' => 'DashboardController@index']);

                Route::get('/dashboard/{client}/officers', ['as' => 'user.client.dashboard.officers', 'uses' => 'DashboardOfficerController@index']);
                Route::post('/dashboard/{client}/officer', ['as' => 'user.client.dashboard.officer.store', 'uses' => 'DashboardOfficerController@store']);
                Route::get('/dashboard/{client}/officer/create', ['as' => 'user.client.dashboard.officer.create', 'uses' => 'DashboardOfficerController@create']);
                Route::get('/dashboard/{client}/officer/{officer}', ['as' => 'user.client.dashboard.officer', 'uses' => 'DashboardOfficerController@get'])->where('client', '[0-9]+', 'officer', '[0-9]+');
                Route::get('/dashboard/{client}/officer/edit/{officer}', ['as' => 'user.client.dashboard.officer.edit', 'uses' => 'DashboardOfficerController@edit']);
                Route::put('/dashboard/{client}/officer/{officer}', ['as' => 'user.client.dashboard.officer.update', 'uses' => 'DashboardOfficerController@update']);
                Route::get('/dashboard/{client}/api/state/{id}/cities', ['as' => 'user.client.dashboard.api.state.cities', 'uses' => 'ClientDashboardApiController@cities']);

                //Customers
                Route::get('/dashboard/{client}/customer/', ['as' => 'user.client.dashboard.customers', 'uses' => 'DashboardCustomerController@index']);
                Route::get('/dashboard/{client}/customer/create', ['as' => 'user.client.dashboard.customer.create', 'uses' => 'DashboardCustomerController@create']);
                Route::get('/dashboard/{client}/customer/{customer}', ['as' => 'user.client.dashboard.customer', 'uses' => 'DashboardCustomerController@get']);
                Route::get('/dashboard/{client}/customer/edit/{customer}', ['as' => 'user.client.dashboard.customer.edit', 'uses' => 'DashboardCustomerController@edit']);
                Route::post('/dashboard/{client}/customer/', ['as' => 'user.client.dashboard.customer.store', 'uses' => 'DashboardCustomerController@store']);
                Route::put('/dashboard/{client}/customer/{customer}', ['as' => 'user.client.dashboard.customer.update', 'uses' => 'DashboardCustomerController@update']);

                //Services
                Route::get('/dashboard/{client}/service/', ['as' => 'user.client.dashboard.services', 'uses' => 'DashboardServiceController@index']);
                Route::get('/dashboard/{client}/service/create', ['as' => 'user.client.dashboard.service.create', 'uses' => 'DashboardServiceController@create']);
                Route::post('/dashboard/{client}/service/', ['as' => 'user.client.dashboard.service.store', 'uses' => 'DashboardServiceController@store']);
                Route::get('/dashboard/{client}/service/{service}', ['as' => 'user.client.dashboard.service', 'uses' => 'DashboardServiceController@get']);
                Route::get('/dashboard/{client}/service/edit/{service}', ['as' => 'user.client.dashboard.service.edit', 'uses' => 'DashboardServiceController@edit']);
                Route::put('/dashboard/{client}/service/{service}', ['as' => 'user.client.dashboard.service.update', 'uses' => 'DashboardServiceController@update']);
                Route::delete('/dashboard/{client}/service/{service}', ['as' => 'user.client.dashboard.service.delete', 'uses' => 'DashboardServiceController@destroy']);

                //Invoice
                Route::get('/dashboard/{client}/invoice/', ['as' => 'user.client.dashboard.invoices', 'uses' => 'DashboardInvoiceController@index']);
                Route::get('/dashboard/{client}/invoice/create', ['as' => 'user.client.dashboard.invoice.create', 'uses' => 'DashboardInvoiceController@create']);
                Route::post('/dashboard/{client}/invoice/', ['as' => 'user.client.dashboard.invoice.store', 'uses' => 'DashboardInvoiceController@store']);
                Route::get('/dashboard/{client}/invoice/{invoice}', ['as' => 'user.client.dashboard.invoice', 'uses' => 'DashboardInvoiceController@get']);
                Route::get('/dashboard/{client}/invoice/edit/{invoice}', ['as' => 'user.client.dashboard.invoice.edit', 'uses' => 'DashboardInvoiceController@edit']);
                Route::put('/dashboard/{client}/invoice/{invoice}', ['as' => 'user.client.dashboard.invoice.update', 'uses' => 'DashboardInvoiceController@update']);

                //State
                Route::get('/dashboard/{client}/states', ['as' => 'user.client.dashboard.states', 'uses' => 'DashboardLocationController@states']);
                Route::get('/dashboard/{client}/state/create', ['as' => 'user.client.dashboard.state.create', 'uses' => 'DashboardLocationController@createState']);
                Route::post('/dashboard/{client}/state/', ['as' => 'user.client.dashboard.state.store', 'uses' => 'DashboardLocationController@storeState']);
                Route::get('/dashboard/{client}/state/edit/{state}', ['as' => 'user.client.dashboard.state.edit', 'uses' => 'DashboardLocationController@editState']);
                Route::put('/dashboard/{client}/state/{state}', ['as' => 'user.client.dashboard.state.update', 'uses' => 'DashboardLocationController@updateState']);
                Route::delete('/dashboard/{client}/states/', ['as' => 'user.client.dashboard.states.delete', 'uses' => 'DashboardLocationController@destroy']);

                //Route::d()

                Route::post('/dashboard/{client}/town', ['as' => 'user.client.dashboard.town.store', 'uses' => 'DashboardLocationController@storeTown']);
                Route::get('/dashboard/{client}/town/create{state}', ['as' => 'user.client.dashboard.town.create', 'uses' => 'DashboardLocationController@createTown']);
                Route::get('/dashboard/{client}/town/edit/{town}', ['as' => 'user.client.dashboard.town.edit', 'uses' => 'DashboardLocationController@editTown']);
                Route::put('/dashboard/{client}/town/{town}', ['as' => 'user.client.dashboard.town.update', 'uses' => 'DashboardLocationController@updateTown']);


            });

        });

        //Upperlink Global Admin
        Route::group(['middleware' => 'AllowUpperlink', 'prefix' => 'upperlink', 'namespace' => 'Upperlink'], function () {
            Route::get('/', function () {
                return 'I am Upperlink';
            });
        });
        Route::get('404_domain', ['uses' => 'Client\NotFoundController@wrongDomain']);

    });


    Route::group(['middleware' => 'AllowClient', 'subdomain' => '{domain}', 'namespace' => 'Client'], function () {

        Route::get('/', function () {
            return redirect('/admin');
        });

        //All Client Admin route goes here
        Route::group(['middleware' => 'AllowClientAdmin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

            Route::group(['middleware' => 'ClientAdminAuthorized'], function () {
                Route::get('/login', ['as' => 'client.admin.login', 'uses' => 'AuthenticateController@login']);
                Route::post('/login', ['uses' => 'AuthenticateController@doLogin']);
            });


            Route::group(['middleware' => 'ClientAdminAuthorize'], function () {

                Route::get('/logout', ['uses' => 'AuthenticateController@logout']);
                Route::get('/', ['as' => 'client.admin.dashboard', 'uses' => 'HomeController@index']);

                Route::get('/customers', ['as' => 'client.admin.customers', 'uses' => 'CustomerController@index']);
                Route::get('/customers/{id}', ['as' => 'client.admin.edit_customer', 'uses' => 'CustomerController@edit']);
                Route::put('/customers/{id}', ['as' => 'client.admin.update_customer', 'uses' => 'CustomerController@update']);
                Route::get('/new_customer', ['as' => 'client.admin.new_customer', 'uses' => 'CustomerController@create']);
                Route::post('/new_customer', ['as' => 'client.admin.store_customer', 'uses' => 'CustomerController@store']);
                Route::post('/ajax_customer', ['as' => 'client.admin.ajax_customer', 'uses' => 'CustomerController@customer_ajax']);
                Route::get('/ajax_get_customer', ['as' => 'client.admin.ajax_get_customer', 'uses' => 'CustomerController@customer_get_ajax']);


                Route::get('/invoices', ['as' => 'client.admin.invoices', 'uses' => 'InvoiceController@index']);
                Route::get('/invoices/{id}', ['as' => 'client.admin.show_invoice', 'uses' => 'InvoiceController@show']);
                Route::get('/new_invoice', ['as' => 'client.admin.new_invoice', 'uses' => 'InvoiceController@create']);
                Route::post('/new_invoice', ['as' => 'client.admin.store_invoice', 'uses' => 'InvoiceController@store']);
                Route::get('/ajax_send_invoice', ['as' => 'client.admin.ajax_send_invoice', 'uses' => 'InvoiceController@send_invoice']);


                Route::get('/services', ['as' => 'client.admin.services', 'uses' => 'ServiceController@index']);
                Route::get('/services/{id}', ['as' => 'client.admin.edit_service', 'uses' => 'ServiceController@edit']);
                Route::put('/services/{id}', ['as' => 'client.admin.update_service', 'uses' => 'ServiceController@update']);
                Route::get('/new_service', ['as' => 'client.admin.new_service', 'uses' => 'ServiceController@create']);
                Route::post('/new_service', ['as' => 'client.admin.store_service', 'uses' => 'ServiceController@store']);
                Route::get('/get_service', ['as' => 'client.admin.get_service', 'uses' => 'ServiceController@getService']);
            });
        });

        Route::get('/invoice/{id}/{invoice_no}', ['uses' => 'Admin\InvoiceController@customer_view']);

        Route::group(['prefix' => 'api'], function () {
            Route::get('/invoice/{invoice_no}', ['uses' => 'ApiController@get_invoice']);
            Route::post('/invoice/{invoice_no}/update', ['uses' => 'ApiController@update_invoice']);
        });
    });
});

