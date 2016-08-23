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
Route::get('Policy/EnrollStudentForm', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform', 'as' => 'enrollstudentform']);
Route::post('Policy/EnrollStudent/uploadfile', ['middleware' => 'auth', 'uses' => 'policycontroller@exportexcel', 'as' => 'uploadfile']);
Route::post('Policy/EnrollStudent/1', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform2', 'as' => 'page1']);
Route::post('Policy/EnrollStudent/2', ['middleware' => 'auth', 'uses' => 'policycontroller@admissionform3', 'as' => 'page2']);
Route::post('Policy/Success', ['middleware' => 'auth', 'uses' => 'policycontroller@admitStudent', 'as' => 'submitAdmissionForm']);
Route::get('/Policy/Users',['middleware' => 'auth', 'uses' => 'policycontroller@users']);
Route::get('/Policy/CreateAccount',['middleware' => 'auth', 'uses' => 'policycontroller@createaccountform']);
Route::post('Policy/CreateAccount', ['middleeware' => 'auth', 'uses' => 'policycontroller@addaccount', 'as' => 'createaccount']);
Route::get('/Policy/ModuleRegistration', ['middleware'=> 'auth', 'uses' => 'policycontroller@moduleregistration']);
Route::post('/Policy/ModuleRegistrationForm', ['middleware' => 'auth', 'uses' => 'policycontroller@getmoduleregistrationform', 'as' => 'moduleregistrationform']);
Route::post('/Policy/ModuleRegistration', ['middleware' => 'auth', 'uses' => 'policycontroller@registermodule', 'as' => 'registermodule']);
Route::get('/Policy/EnrollStudent', ['middleware' => 'auth', 'uses' => 'policycontroller@getstudentlist']);
Route::post('/Policy/Students/Search', ['middleware' => 'auth', 'uses' => 'policycontroller@getstudentlist', 'as' => 'searchstudent']);
Route::get('Policy/EditStudent/{id?}', ['middleware' => 'auth', 'uses' => 'policycontroller@editstudentform', 'as' => 'editstudentpage']);
Route::post('Policy/EditStudent/2/{id?}', ['middleware' => 'auth', 'uses' => 'policycontroller@editstudent', 'as' => 'nextedit']);
Route::post('Policy/EditStudent/3/{id?}', ['middleware' => 'auth', 'uses' => 'policycontroller@editstudent1', 'as' => 'nextedit1']);
Route::post('/Policy/EnrollStudent', ['middleware' => 'auth', 'uses' => 'policycontroller@updateStudent', 'as' => 'updatestudent']);
Route::post('Policy/EnrollStudentForm/{id?}', ['middleware' => 'auth', 'uses' => 'policycontroller@checkregnumber', 'as' => 'checkregnumber']);
Route::post('Policy/SearchStudent/{key?}', ['middleware' =>'auth', 'uses' => 'policycontroller@seachsuggesstions', 'as' => 'searchsuggessions']);
Route::post('Policy/CreateAccount/{userID?}', ['middleware' => 'auth', 'uses' => 'policycontroller@verifyuserID', 'as' => 'verifyusername']);
Route::post('/Policy/action', ['middleware' => 'auth', 'uses' => 'policycontroller@actionOnstudents', 'as' => 'performaction']);
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
//Route::post('Policy/programme/{id?}', 'policycontroller@checkprogramme')->name("checkprogramme");
Route::post('Policy/programme/edited', 'policycontroller@programme_edited')->name("programme_edited");
Route::post('Policy/Faculty/delete', 'policycontroller@faculty_delete')->name("faculty_delete");
Route::get('Policy/Faculty/{id?}', 'policycontroller@faculty_edit')->name("faculty_edit");
Route::post('Policy/Faculty/success', 'policycontroller@faculty_edited')->name("faculty_edited");
Route::get('Policy/Sponsor', 'policycontroller@Sponsor')->name("Sponsor"); 
Route::post('Policy/Sponsor/action', 'policycontroller@actionOnsponsor')->name("chooseaction"); 
Route::post('Policy/Scholarship/action', 'policycontroller@actionOnscholarship')->name("chooseaction2"); 
Route::post('Policy/Institution/action', 'policycontroller@actionOninstitution')->name("chooseaction3");
Route::post('Policy/Faculty/action', 'policycontroller@actionOnfaculty')->name("chooseaction4");
Route::post('Policy/programme/action', 'policycontroller@actionOnprogramme')->name("chooseaction5");
Route::get('Policy/Sponsor/addsponsor', 'policycontroller@newsponsor')->name("newsponsor"); 
Route::post('Policy/Sponsor/addsponsor', 'policycontroller@addsponsor')->name("addsponsor"); 
Route::post('Policy/Sponsor/delete', 'policycontroller@sponsor_delete')->name("sponsor_delete");
Route::get('Policy/sponsor_edit/{id?}', 'policycontroller@sponsor_edit')->name("sponsor_edit");
Route::post('Policy/sponsor_edit/success', 'policycontroller@sponsor_edited')->name("sponsor_edited");
Route::get('Policy/Scholarship', 'policycontroller@Scholarship')->name("Scholarship"); 
Route::get('Policy/Scholarship/addscholarship', 'policycontroller@newscholarship')->name("newscholarship"); 
Route::post('Policy/Scholarship/addsponsor', 'policycontroller@addscholarship')->name("addscholarship"); 
Route::post('Policy/Scholarship/delete', 'policycontroller@scholarship_delete')->name("scholarship_delete");
Route::get('Policy/Scholarship/{id?}', 'policycontroller@scholarship_edit')->name("scholarship_edit");
Route::post('Policy/Scholarship_edit/success', 'policycontroller@scholarship_edited')->name("scholarship_edited");
Route::post('Policy/Institution/{id?}', ['middleware' => 'auth', 'uses' => 'policycontroller@checkinstitution', 'as' => 'checkinstitution']);
Route::post('/Policy/Institution/search',['middleware' => 'auth', 'uses' =>  'policycontroller@institution','as' => 'searchinstitution']);





//Frazer's Work
Route::get('Policy/Department', ['middleware' => 'auth', 'uses' => 'policycontroller@department']);
Route::get('Policy/Department/adddepartment', 'policycontroller@newdepartment')->name("newdepartment");
Route::post('Policy/Department/success', 'policycontroller@adddepartment')->name("adddepartment"); 
Route::post('Policy/Department/delete', 'policycontroller@department_delete')->name("department_delete");
Route::get('Policy/department_edit/{id?}', 'policycontroller@department_edit')->name("department_edit");
Route::post('Policy/department/success', 'policycontroller@department_edited')->name("department_edited");


Route::get('Policy/Subject', ['middleware' => 'auth', 'uses' => 'policycontroller@course']);
Route::get('Policy/course/addcourse', 'policycontroller@newcourse')->name("newcourse");
Route::post('Policy/course/success1', 'policycontroller@addcourse')->name("addcourse");
Route::post('Policy/course/delete', 'policycontroller@course_delete')->name("course_delete");
Route::get('Policy/course_edit/{id?}', 'policycontroller@course_edit')->name("course_edit");
Route::post('Policy/course/delete', 'policycontroller@course_delete')->name("course_delete");
Route::get('Policy/course_edit/{id?}', 'policycontroller@course_edit')->name("course_edit");
Route::post('Policy/course/success', 'policycontroller@course_edited')->name("course_edited");
//End Frazer's Work



