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
    return redirect(route('login'));
});
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('classgroup/create', ['as' => 'classgroup.create', 'uses' => 'ClassgroupController@create']);
Route::post('classgroup/store', ['as' => 'classgroup.store', 'uses' => 'ClassgroupController@store']);
Route::get('classgroup/{hashid}/view', ['as' => 'classgroup.view', 'uses' => 'ClassgroupController@view']);
Route::get('classgroup/{hashid}/edit', ['as' => 'classgroup.edit', 'uses' => 'ClassgroupController@edit']);
Route::put('classgroup/{hashid}/update', ['as' => 'classgroup.update', 'uses' => 'ClassgroupController@update']);

Route::get('student/create', ['as' => 'student.add', 'uses' => 'StudentController@create']);
Route::post('student/store', ['as' => 'student.store', 'uses' => 'StudentController@store']);
Route::get('student/{hashid}/view', ['as' => 'student.view', 'uses' => 'StudentController@view']);
Route::get('student/{hashid}/edit', ['as' => 'student.edit', 'uses' => 'StudentController@edit']);
Route::put('student/{hashid}/update', ['as' => 'student.update', 'uses' => 'StudentController@update']);

Route::get('lesson/create', ['as' => 'lesson.add', 'uses' => 'LessonController@create']);
Route::post('lesson/store', ['as' => 'lesson.store', 'uses' => 'LessonController@store']);
Route::get('lesson/{hashid}/view', ['as' => 'lesson.view', 'uses' => 'LessonController@view']);
Route::get('lesson/{hashid}/edit', ['as' => 'lesson.edit', 'uses' => 'LessonController@edit']);
Route::put('lesson/{hashid}/update', ['as' => 'lesson.update', 'uses' => 'LessonController@update']);
