<?php

use Illuminate\Support\Facades\Route;


/*Employees Section Route*/


Route::middleware('employee')->group(function () {

// Profile
// Route::get('/', function () {
// return view('employee.index');
// });
Route::get('/', 'EmployeeController@index');
Route::resource('profile', 'ProfileController');
Route::get('/storage/task/{file}', 'TaskController@show');
// Leave
// Route::resource('leave','LeaveController');

// Route::resource('event', 'EventController');

Route::get('attandence', 'EmployeeController@show_attan');

// Route::resource('task', 'TaskController');

// Route::resource('notice', 'noticeController');

// Route::resource('award', 'awardController');

});
