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

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes([
  'register' => false, // Registration Routes...
  
]);
Route::resource('clients', 'ClientController');
Route::resource('appoinments', 'AppointmentsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
