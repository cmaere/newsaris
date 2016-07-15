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
Route::get('Admission/AdmissionForm', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform']);
Route::post('Admission/AdmissionForm/uploadfile', ['middleware' => 'auth', 'uses' => 'policycontroller@exportexcel', 'as' => 'uploadfile']);
Route::post('Admission/AdmissionForm1', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform2', 'as' => 'page1']);
Route::post('Admission/AdmissionForm2', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform3', 'as' => 'page2']);
Route::get('/Policy/Users',['middleware' => 'auth', 'uses' => 'policycontroller@users']);
Route::auth();
Route::get('/home', 'main@index');
