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



Route::get('/','FrontendController@index');
Route::get('logout',function(){
    Auth::logout();
    return redirect('/');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('register/user','FrontendController@register');
Route::post('register/account','FrontendController@save');


//Front End Controllers
Route::get('/contact','FrontendController@contact');
Route::get('/about','FrontendController@about');
Route::get('/hostels','FrontendController@hostels');
Route::post('save/mail','FrontendController@mail');

//Users
Route::get('list/users','UsersController@index');
Route::get('add/user','UsersController@create');
Route::post('user/save','UsersController@save');
Route::get('user/{id}','UsersController@edit');
Route::post('user/update','UsersController@update');
Route::post('delete/user','UsersController@remove');
Route::get('list/tenants','UsersController@tenants');

//hostels
Route::get('list/hostels','HostelsController@index');
Route::get('add/hostel','HostelsController@create');
Route::post('hostels/save','HostelsController@save');
Route::get('hostel/{id}','HostelsController@edit');
Route::post('hostel/update','HostelsController@update');
Route::post('delete/hostel','HostelsController@remove');
Route::post('rooms','FrontendController@room');

//Rooms
Route::get('list/rooms','RoomsController@index');
Route::get('add/room','RoomsController@create');
Route::post('room/save','RoomsController@save');
Route::get('room/{id}','RoomsController@edit');
Route::post('room/update','RoomsController@update');
Route::post('delete/room','RoomsController@remove');
Route::get('checkout','RoomsController@checkout');

//reports
Route::get('payment/report','ReportsController@getPayment');
Route::post('reports/payments','ReportsController@savePayment');


Route::get('donepayment', ['as' => 'paymentsuccess', 'uses'=>'HostelsController@paymentsuccess']);
Route::get('paymentconfirmation', 'HostelsController@paymentconfirmation');

Route::post('save/payment','HostelsController@payment');


