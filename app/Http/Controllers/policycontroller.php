<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use  \App\Http\Controllers\main;
class policycontroller extends Controller
{
	var $main;
	
	
	
	 public function __construct() {
		 
		$this->main = new \App\Http\Controllers\main();
		$this->model = new \App\policymodel();
		
		
		 
	 }
	
 	public function institution() {
 		//page initalization
 		
     	$data = $this->model->getinstitution();
 		$currentpage = "Institution";
 		$parentpage ="Policy";
 		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
 		//var_dump($this->main->data);
 		//call view

 	    return view('institution', 
 					array('page' => 'home',
 						  'chasections' => $this->main->data,
 						  'chasubsections' => $this->main->menulist,
 						  'x' => 0,
 						  'loginname' => $this->main->loginname,
 						  'institution', 'campusinfo' => $data,
 						  'welcomemessage' => $welcomemessage,
						  'parentpage' => $parentpage,
 						  'currentpage' => $currentpage ));
			
 	    }
		

	  public function faculty() {
		//page initalization
		
		$currentpage = "Faculty";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";

		$faculties = $this->model->getFaculty();
		
		//var_dump($this->main->data);
		//call view
	    return view('faculty', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'faculties' => $faculties));
			
	    }
		
  	  public function department() {
  		//page initalization
		
  		
  		$data = $this->model->getdepartment();
  		$currentpage = "Department";
  		$parentpage ="Policy";
  		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
  		//var_dump($this->main->data);
  		//call view
  	    return view('department', 
  					array('page' => 'home',
  						  'chasections' => $this->main->data,
  						  'chasubsections' => $this->main->menulist,
  						  'x' => 0,
  						  'loginname' => $this->main->loginname,
  						  'welcomemessage' => $welcomemessage,
  						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
  						  'department' => $data));
  		//return view("department", array());
		
			
  	    }  

	    public function programmes()
	    {
	    	$currentpage = "Programmes";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";

			$programmes = $this->model->getProgrammes();
		
		//var_dump($this->main->data);
		//call view
	    return view('programmes', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'programmes' => $programmes));
			
	    }
	    public function newfaculty()
	    {
	    	$currentpage = "Add new Faculty";
			$parentpage ="Faculty";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    	return view('addnewfaculty', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'parentpage' => $parentpage));
	    }
	    public function addfaculty(Request $request)
	    {
	    	$faculty = $request['faculty'];
	    	$address = $request['address'];
	    	$email = $request['email'];
	    	$tel = $request['tel'];
	    	$location = $request['paddress'];

	    	
	    	if($this->model->insertIntoFaculty($faculty,$address,$email,$tel,$location))
	    	{
	    		//return redirect()->back();
	    	}

	    	//echo $faculty.' '.$address.' '.$email = $request['email'].' '.$tel = $request['tel'].' '.$location;
	    	
	    }
	    public function admissionform()
	    {
	    	$currentpage = "Admit student";
			$parentpage ="Admision";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    	return view('admissionform', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage));
	    }
	    public function admissionform2(Request $request)
	    {
	    	session([
	    			'yearOfStudy' => $request['yearofstudy'],
	    			'admissionNumber' => $request['admissionnumber'],
	    			'campus' => $request['campus'],
	    			'regNumber' => $request['regno'],
	    			'leveOfStudy' => $request['levelofstudy'],
	    			'mannerOfEntry' => $request['mannerofentry'],
	    			'sponsor' => $request['sponsor'],
	    			'faculty' => $request['faculty'],
	    			'graddate' => $request['graddate'],
	    			'program' => $request['program']
	    		]);
	    	$currentpage = "Enroll student";
			$parentpage ="Admision";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    	return view('admissionform2', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'session' => session()->get('campus')));
	    }

	    public function admissionform3(Request $request)
	    {
	    	session([
	    			'lastname' => $request['lname'],'middlename' => $request['mname'],
	    			'firstname' => $request['fname'],'sex' => $request['sex'],
	    			'dateOfBirth' => $request['dateofbirth'],'homeDistrict' => $request['hdistrict'],
	    			'ta' => $request['ta'],'homeVillage' => $request['hvillage'],
	    			'nationality' => $request['nationality'],'studentStatus' => $request['stustatus'],
	    			'religion' => $request['religion'],'maritalStatus' => $request['marital'],
	    			'disability' => $request['disability'],'physAddress' => $request['paddress'],
	    			'phone' => $request['phone'],'email' => $request['email'],
	    			'bankName' => $request['bankname'],'bankAccount' => $request['bankaccount']
	    		]);
	    	$currentpage = "Enroll student";
			$parentpage ="Admision";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    	return view('admissionform3', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'session' => session()->get('lastname')));

	    }

	    public function exportexcel(Request $request)
	    {
	    	if($request->hasFile('adm_file'))
	    	{
	    		$file = $request->file('adm_file');
	    		$files = fopen($file, 'r');
	    		while (($fileop = fgetcsv($files, 1000, ",")) !== FALSE) 
	    		{

	    			$name = $fileop[0];
	    			$gender = $fileop[1];
	    			$cand_num = $fileop[2];
	    			//echo 'name= '.$name.' gender = '.$gender.' '.$cand_num;
	    			//$center_num = $fileop[4];

	    			//$insertStudentInfo = new policymodel();
	    			$insertStudentInfo = $this->model->insertIntoStudentTable($name, $gender, $cand_num);
	    		}
	    	}
	    }

	    public function admitStudent(Request $request){
	    	session([
	    			'parentName' => $request['pname'],
	    			'relationship' => $request['relationship'],
	    			'occupation' => $request['occupation'],
	    			'parentAddress' => $request['paddress'],
	    			'parentEmail' => $request['pemail'],
	    			'parentPhone' => $request['parphone'],
	    			'schoolName' => $request['schname'],
	    			'examNumber' => $request['examnum'],
	    			'yearCompleted' => $request['yearcompleted']
	    		]);
	    	$yearOfStudy = session()->get('yearOfStudy');
	    	$admissionNumber = session()->get('admissionNumber');
	    	$campus = session()->get('campus');
	    	$regNumber = session()->get('regNumber');
	    	$leveOfStudy = session()->get('leveOfStudy');
	    	$mannerOfEntry = session()->get('mannerOfEntry');
	    	$sponsor = session()->get('sponsor');
	    	$faculty = session()->get('faculty');
	    	$graddate = session()->get('graddate');
	    	$program = session()->get('program');
	    	$lastname = session()->get('lastname');
	    	$middlename = session()->get('middlename');
	    	$firstname = session()->get('firstname');
	    	$sex = session()->get('sex');
	    	$dateOfBirth = session()->get('dateOfBirth');
	    	$homeDistrict = session()->get('homeDistrict');
	    	$ta = session()->get('ta');
	    	$homeVillage = session()->get('homeVillage');
	    	$nationality = session()->get('nationality');
	    	$studentStatus =session()->get('studentStatus');
	    	$religion =session()->get('religion');
	    	$maritalStatus = session()->get('maritalStatus');
	    	$disability =session()->get('disability');
	    	$physAddress =session()->get('physAddress');
	    	$phone =session()->get('phone');
	    	$email =session()->get('email');
	    	$bankName =session()->get('bankName');
	    	$bankAccount = session()->get('bankAccount');
	    	$parentName = session()->get('bankAccount');
	    	$relationship = session()->get('bankAccount');
	    	$occupation = session()->get('bankAccount');
	    	$parentAddress = session()->get('bankAccount');
	    	$parentEmail = session()->get('parentEmail');
	    	$parentPhone = session()->get('parentPhone');
	    	$schoolName = session()->get('schoolName');
	    	$examNumber = session()->get('examNumber');
	    	$yearCompleted = session()->get('yearCompleted');
	    	
	    	$enrollStudent = $this->model->enrollStudent($yearOfStudy,$admissionNumber,$campus,$regNumber,$leveOfStudy,$mannerOfEntry,$sponsor,$faculty,$graddate,$program,$lastname,$middlename,$firstname,$sex,$dateOfBirth,$homeDistrict,$ta,$homeVillage,$nationality,$studentStatus,$religion,$maritalStatus,$disability,$physAddress,$phone,$email,$bankName,$bankAccount,$parentName,$relationship,$occupation,$parentAddress,$parentEmail,$parentPhone,$schoolName,$examNumber,$yearCompleted);
	    	//return redirect()->route()
	    }
	    
   
}
