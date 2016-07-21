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
Route::get('/Policy/ModuleRegistration', ['middleware'=> 'auth', 'uses' => 'policycontroller@moduleregistration']);
Route::post('/Policy/ModuleRegistrationForm', ['middleware' => 'auth', 'uses' => 'policycontroller@getmoduleregistrationform', 'as' => 'moduleregistrationform']);
Route::auth();
Route::get('/home', 'main@index');


Route::get('/home', 'HomeController@index');





Route::get('Policy/Institution/addinstitution', 'policycontroller@newinstitution')->name("newinstitution"); 
Route::post('Policy/Institution/success', 'policycontroller@addinstitution')->name("addinstitution");
Route::get('Policy/institution_edit/{id?}', 'policycontroller@institution_edit')->name("institution_edit");
Route::post('Policy/institution_edit/success', 'policycontroller@institution_edited')->name("institution_edited");
Route::post('Policy/institution_edit/delete', 'policycontroller@institution_delete')->name("institution_delete");
Route::post('Policy/Programme/addprogramme', 'policycontroller@addprogramme')->name("addprogramme"); 
Route::get('Policy/Programme/addprogramme', 'policycontroller@newprogramme')->name("newprogramme"); 
Route::post('Policy/Programme/delete', 'policycontroller@programme_delete')->name("programme_delete");
Route::get('Policy/programme_edit/{id?}', 'policycontroller@programme_edit')->name("programme_edit");
Route::post('Policy/programme/edited', 'policycontroller@programme_edited')->name("programme_edited");