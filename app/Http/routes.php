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
Route::get('Policy/EnrollStudent', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform']);
Route::post('Policy/EnrollStudent/uploadfile', ['middleware' => 'auth', 'uses' => 'policycontroller@exportexcel', 'as' => 'uploadfile']);
Route::post('Policy/EnrollStudent1', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform2', 'as' => 'page1']);
Route::post('Policy/EnrollStudent2', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform3', 'as' => 'page2']);
Route::post('Policy/Success', ['middleware' => 'auth', 'uses' => 'policycontroller@admitStudent', 'as' => 'submitAdmissionForm']);
Route::get('/Policy/Users',['middleware' => 'auth', 'uses' => 'policycontroller@users']);
Route::get('/Policy/CreateAccount',['middleware' => 'auth', 'uses' => 'policycontroller@createaccountform']);
Route::post('Policy/CreateAccount', ['middleeware' => 'auth', 'uses' => 'policycontroller@addaccount', 'as' => 'createaccount']);
Route::auth();
Route::get('/home', 'main@index');
