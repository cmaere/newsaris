<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('login', 'login@show');
Route::get('/main',['middleware' => 'auth', 'uses' => 'main@index']);
Route::get('/Policy/Institution',['middleware' => 'auth', 'uses' =>  'policycontroller@institution']);
Route::get('/Policy/Faculty', ['middleware' => 'auth', 'uses' => 'policycontroller@faculty'])->name('faculty');
Route::get('/Policy/Programme', ['middleware' => 'auth', 'uses' =>'policycontroller@programmes']);
Route::get('/Policy/Faculty/NewFaculty', ['middleware' => 'auth', 'uses' => 'policycontroller@newfaculty'])->name('newfaculty');
Route::post('/Policy/Faculty',['middleware' => 'auth', 'uses' => 'policycontroller@addfaculty'])->name('addfaculty');
Route::get('Policy/Department', ['middleware' => 'auth', 'uses' => 'policycontroller@department']);
<<<<<<< HEAD
Route::get('Policy/AdmissionForm', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform']);
Route::post('Policy/AdmissionForm/uploadfile', ['middleware' => 'auth', 'uses' => 'policycontroller@exportexcel', 'as' => 'uploadfile']);
Route::post('Policy/AdmissionForm', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform2', 'as' => 'page1']);
=======

Route::get('/Policy/Users',['middleware' => 'auth', 'uses' => 'policycontroller@users']);
>>>>>>> cf05b60333af890f384d6f16c8b6dbb2ef2a8b1c
Route::auth();
<<<<<<< HEAD
Route::get('/home', 'HomeController@index');
Route::get('Policy/ManageAcademicCalendar', ['middleware' => 'auth', 'uses' => 'policycontroller@manageacademiccalendar']);
  
=======
Route::get('/home', 'main@index');
>>>>>>> 10f7139761227139c5329ec0e9a81e1b80bd0f12
