<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('', [ 'uses' => 'ExportController@welcome', 'as' => 'home'] );
Route::get('viewUsers', [ 'uses' => 'ExportController@viewStudents', 'as' => 'viewUsers'] );
Route::get('exportUsers', [ 'uses' => 'ExportController@exportStudentsToCSV', 'as' => 'exportUsers'] );
Route::get('viewCourses', [ 'uses' => 'ExportController@viewCourses', 'as' => 'viewCourses'] );
Route::get('exportCourses', [ 'uses' => 'ExportController@exportCourseAttendenceToCSV', 'as' => 'exportCourses'] );