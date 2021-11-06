<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware('admin')->group(function () {

    Route::get('/','DashboardController@index');
    Route::get('profile','AdminProfile@index')->name('admin.profile');


    //////////// AJAX REQUEST HANDLE ROUTES ////////////////////
    Route::get('get-designation', 'AjaxController@designation');
    Route::get('/check-email', 'AjaxController@checkEmail');
    Route::get('/check-id', 'AjaxController@checkId');
    Route::post('/events/update', 'AjaxController@event');
    //----------------------------------------------------------//

    /////////////////// ALL RESOURECE ROUTES /////////////////////
    Route::resource('users','UserController');

    // SYSTEM
    Route::resource('departments','DepartmentController');
    Route::resource('countries','CountryController');

    // ATTENDANCE
    Route::resource('attendance', 'AttendanceController');

    // SALARIY
    Route::resource('salaries','SalaryController');
    Route::resource('payment', 'PaymentController');

    // REPORT
    Route::get('reports','ReportController@index');

    // Route::post('reports','ReportController@index');
 
  
    //-------------------------------------------------------------//

});
