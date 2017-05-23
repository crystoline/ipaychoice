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


Route::group([ 'domain' => env('APP_DOMAIN')], function () {

    Auth::routes();
    Route::get('', 'HomeController@landing')->name('landing');
    //User login Required
    Route::group(['middleware' => ['auth'],['except' => 'landing']], function(){

        Route::get('/home', 'HomeController@index')->name('home');

        //Route::get('/client', 'ClientController@index');
        Route::get('/client/create', 'ClientController@create');
        Route::post('/client', 'ClientController@store');
        Route::get('/client/edit/{client}', 'ClientController@edit');
        Route::put('/client/{client}', 'ClientController@update');
        //Route::get('/client/{client}', 'ClientController@view');

        Route::get('/notfound/client',['as' =>'user.not_found.client', 'uses' => 'NotFoundController@client']);
        Route::group(['middleware' =>'UserClientDashboard'], function(){
            Route::get('/dashboard/{client}', ['as'=> 'user.client.dashboard', 'uses' => 'DashboardController@index']);
            Route::get('/dashboard/{client}/officer/', ['as'=> 'user.client.dashboard.officers', 'uses' => 'DashboardOfficerController@index']);
            Route::get('/dashboard/{client}/officer/{officer}', ['as'=> 'user.client.dashboard.officer', 'uses' => 'DashboardOfficerController@get']);
            Route::get('/dashboard/{client}/officer/edit/{officer}', ['as'=> 'user.client.dashboard.officer.edit', 'uses' => 'DashboardOfficerController@edit']);
            Route::put('/dashboard/{client}/officer/{officer}', ['as'=> 'user.client.dashboard.officer.update', 'uses' => 'DashboardOfficerController@update']);
            Route::get('/dashboard/{client}/officer/create', ['as'=> 'user.client.dashboard.officer.create', 'uses' => 'DashboardOfficerController@create']);
            Route::post('/dashboard/{client}/officer/', ['as'=> 'user.client.dashboard.officer.store', 'uses' => 'DashboardOfficerController@store']);


            //Customers
            Route::get('/dashboard/{client}/customer/', ['as'=> 'user.client.dashboard.customers', 'uses' => 'DashboardCustomerController@index']);
            Route::get('/dashboard/{client}/customer/{customer}', ['as'=> 'user.client.dashboard.customer', 'uses' => 'DashboardCustomerController@get']);
            Route::get('/dashboard/{client}/customer/create', ['as'=> 'user.client.dashboard.customer.create', 'uses' => 'DashboardCustomerController@create']);
            Route::get('/dashboard/{client}/customer/edit/{customer}', ['as'=> 'user.client.dashboard.customer.edit', 'uses' => 'DashboardCustomerController@edit']);
            Route::post('/dashboard/{client}/customer/{customer}', ['as'=> 'user.client.dashboard.customer.store', 'uses' => 'DashboardCustomerController@store']);
            Route::put('/dashboard/{client}/customer/{customer}', ['as'=> 'user.client.dashboard.customer.update', 'uses' => 'DashboardCustomerController@update']);

            //Services
            Route::get('/dashboard/{client}/service/', ['as'=> 'user.client.dashboard.services', 'uses' => 'DashboardServiceController@index']);
            Route::get('/dashboard/{client}/service/create', ['as'=> 'user.client.dashboard.service.create', 'uses' => 'DashboardServiceController@create']);
            Route::post('/dashboard/{client}/service/', ['as'=> 'user.client.dashboard.service.store', 'uses' => 'DashboardServiceController@store']);
            Route::get('/dashboard/{client}/service/{service}', ['as'=> 'user.client.dashboard.service', 'uses' => 'DashboardServiceController@get']);
            Route::get('/dashboard/{client}/service/edit/{service}', ['as'=> 'user.client.dashboard.service.edit', 'uses' => 'DashboardServiceController@edit']);
            Route::put('/dashboard/{client}/service/{service}', ['as'=> 'user.client.dashboard.service.update', 'uses' => 'DashboardServiceController@update']);

            //Invoice
            Route::get('/dashboard/{client}/invoice/', ['as'=> 'user.client.dashboard.invoices', 'uses' => 'DashboardInvoiceController@index']);
            Route::get('/dashboard/{client}/invoice/create', ['as'=> 'user.client.dashboard.invoice.create', 'uses' => 'DashboardInvoiceController@create']);
            Route::post('/dashboard/{client}/invoice/', ['as'=> 'user.client.dashboard.invoice.store', 'uses' => 'DashboardInvoiceController@store']);
            Route::get('/dashboard/{client}/invoice/{invoice}', ['as'=> 'user.client.dashboard.invoice', 'uses' => 'DashboardInvoiceController@get']);
            Route::get('/dashboard/{client}/invoice/edit/{invoice}', ['as'=> 'user.client.dashboard.invoice.edit', 'uses' => 'DashboardInvoiceController@edit']);
            Route::put('/dashboard/{client}/invoice/{invoice}', ['as'=> 'user.client.dashboard.invoice.update', 'uses' => 'DashboardInvoiceController@update']);

            //Invoice
            Route::get('/dashboard/{client}/states', ['as'=> 'user.client.dashboard.states', 'uses' => 'DashboardLocationController@states']);
           // Route::get('/dashboard/{client}/state/create', ['as'=> 'user.client.dashboard.state.create', 'uses' => 'DashboardLocationController@create']);
            Route::post('/dashboard/{client}/state/', ['as'=> 'user.client.dashboard.state.store', 'uses' => 'DashboardLocationController@store']);
          /*  Route::get('/dashboard/{client}/state/{state}', ['as'=> 'user.client.dashboard.state', 'uses' => 'DashboardLocationController@get']);
            Route::get('/dashboard/{client}/state/edit/{state}', ['as'=> 'user.client.dashboard.state.edit', 'uses' => 'DashboardLocationController@edit']);
            Route::put('/dashboard/{client}/state/{state}', ['as'=> 'user.client.dashboard.state.update', 'uses' => 'DashboardLocationController@update']);*/

        });

    });

    //Upperlink Global Admin
    Route::group(['middleware' => 'AllowUpperlink', 'prefix' => 'upperlink', 'namespace' => 'Upperlink'], function(){
        Route::get('/', function () { return 'I am Upperlink'; });
    });
    Route::get('404_domain', ['uses' => 'Client\NotFoundController@wrongDomain']);

});


Route::group(['middleware' => 'AllowClient', 'subdomain' => '{domain}',  'namespace' => 'Client'], function () {

    Route::get('/', function () {
        return 'I am client';
    });
    //All Client Admin route goes here
    Route::group(['middleware'=>'AllowClientAdmin', 'prefix' => 'admin', 'namespace' => 'Admin'], function(){

        Route::group(['middleware' => 'ClientAdminAuthorized'], function(){
            Route::get('/login', ['as'=> 'client.admin.login', 'uses'=>'AuthenticateController@login']);
            Route::post('/login', ['uses'=>'AuthenticateController@doLogin']);
        });


        Route::group(['middleware' => 'ClientAdminAuthorize'], function(){

            Route::get('/logout', ['uses'=>'AuthenticateController@logout']);
            Route::get('/', ['as'=> 'client.admin.dashboard', 'uses' => 'HomeController@index']);

            Route::get('/customers', ['as'=> 'client.admin.customers', 'uses' => 'CustomerController@index']);
            Route::get('/new_customer', ['as'=> 'client.admin.new_customer', 'uses' => 'CustomerController@create']);
            Route::post('/new_customer', ['as'=> 'client.admin.store_customer', 'uses' => 'CustomerController@store']);
        });
    });
});

