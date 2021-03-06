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

Route::get('/', function () {
    return view('home');
    // echo  Config::get('settings.site_name');
    // Config::set('test', 'test value');

    // dd(config()->get('settings.currency_symbol'));
    // dd(config());
});

Route::get('/register', 'RegisterCustomerController@showRegistrationForm')->name('register');
Route::post('/register', 'RegisterCustomerController@register');


Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    //All the admin routes will be defined here...
    Route::get('/','DashboardController@index')->name('dashboard');

    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login.submit');
        Route::post('/logout','LoginController@logout')->name('logout');
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });

    // Setting Routes    
    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::post('/settings', 'SettingController@update')->name('settings.update');

});

Route::prefix('/customer')->name('customer.')->namespace('Customer')->group(function(){

    //All the admin routes will be defined here...
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login.submit');
        Route::post('/logout','LoginController@logout')->name('logout');
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });

});

