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
 		$model = new \App\policymodel();
 		
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
		 public function addinstitution(Request $request) {
	    	$campus=$request['campus'];
	    	$location=$request['paddress'];
	    	$address=$request['address'];
	    	$tel=$request['tel'];
	    	$email=$request['email'];

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->addInstitution($campus,$location,$address,$tel,$email);
		
	    }

 	    public function newinstitution() {
	    	
		$currentpage = "Add New Institution";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('newinstitution', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }

 	    public function institution_edit($id) {
	    //$id=$request['CampusID'];
		
	    $model = new \App\policymodel();
    	$data= $model->editcampus($id);

	

		$currentpage = "edir New Institution";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('institution_edit', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'institution', 'campusinfo' => $data,
						   'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }

		public function institution_edited(Request $request) {
	    	$campus=$request['campus'];
	    	$location=$request['paddress'];
	    	$address=$request['address'];
	    	$tel=$request['tel'];
	    	$email=$request['email'];
	    	$id=$request['id'];

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->editedcampus($campus,$location,$address,$tel,$email,$id);
		
	    }

	    public function institution_delete(Request $request) {
	    	$checkbox=$request['checkbox'];
		
	    	$model = new \App\policymodel();

	   		if(!empty($checkbox)){
	   			 foreach($checkbox as $check) {

	   				$post = $model->delete_institution($check);
	  			}
    			
    		}
			 return redirect("Policy/Institution");	
		
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
	    		return redirect('/Policy/Faculty');
	    	}

	    	//echo $faculty.' '.$address.' '.$email = $request['email'].' '.$tel = $request['tel'].' '.$location;
	    	
	    }
	    public function admissionform()
	    {
	    	$currentpage = "Enroll student";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
			$campus = $this->model->getCampus();
			$programmes = $this->model->getProgrammes();
			$faculties = $this->model->getFaculty();
			$sponsors = $this->model->getSponsors();
			$mannerofentry = $this->model->getMannerOfEntry();

	    	return view('admissionform', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'campus' => $campus,
						  'programmes' => $programmes,
						  'faculties' => $faculties,
						  'sponsors' => $sponsors,
						  'entrymanners' => $mannerofentry));
	    }
	    public function admissionform2(Request $request)
	    {
	    	$this->validate($request, [
	    		'admissionnumber' => 'required',
	    		'graddate' => 'required|date_format:"Y-m-d"'
	    	]);
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
						  'gender' => $this->model->getSex(),
						  'studentstatus' => $this->model->getStudentStatus(),
						  'disabilities' => $this->model->getDisability(),
						  'religion' => $this->model->getReligion(),
						  'maritalstatus' => $this->model->getMaritalStatus()));
	    }

	    public function admissionform3(Request $request)
	    {
	    	$this->validate($request, [
	    		'lastname' => 'required|alpha',
	    		'middlename' => 'alpha',
	    		'firstname' => 'required|alpha',
	    		'sex' => 'required',
	    		'dateofbirth' => 'required|date_format:"Y-m-d"',
	    		'ta' => 'alpha',
	    		'phone' => 'numeric',
	    		'email' => 'email'
	    	]);
	    	session([
	    			'lastname' => $request['lastname'],'middlename' => $request['middlename'],
	    			'firstname' => $request['firstname'],'sex' => $request['sex'],
	    			'dateOfBirth' => $request['dateofbirth'],'homeDistrict' => $request['homedistrict'],
	    			'ta' => $request['ta'],'homeVillage' => $request['homevillage'],
	    			'nationality' => $request['nationality'],'studentStatus' => $request['studentstatus'],
	    			'religion' => $request['religion'],'maritalStatus' => $request['marital'],
	    			'disability' => $request['disability'],'physAddress' => $request['physicaladdress'], 
	    			'curAddress' => $request['currentaddress'],
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
						  
						  ));

	    }

	    public function exportexcel(Request $request)
	    {
	    	if($request->hasFile('adm_file'))
	    	{
	    		$file = $request->file('adm_file');
	    		$files = fopen($file, 'r');

	    		while (($fileop = fgetcsv($files, 1000, ",")) !== FALSE) 
	    		{
	    			// if($fileop[0] = 'BACHELOR  OF SCIENCE IN NURSING')
	    			// {
	    			// 	echo 'Ndakupeza';
	    			// 	die();
	    			// }
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
	    	$yearOfStudy = session()->pull('yearOfStudy');
	    	$admissionNumber = session()->pull('admissionNumber');
	    	$campus = session()->pull('campus');
	    	$regNumber = session()->pull('regNumber');
	    	$leveOfStudy = session()->pull('leveOfStudy');
	    	$mannerOfEntry = session()->pull('mannerOfEntry');
	    	$sponsor = session()->pull('sponsor');
	    	$faculty = session()->pull('faculty');
	    	$graddate = session()->pull('graddate');
	    	$program = session()->pull('program');
	    	$lastname = session()->pull('lastname');
	    	$middlename = session()->pull('middlename');
	    	$firstname = session()->pull('firstname');
	    	$sex = session()->pull('sex');
	    	$dateOfBirth = session()->pull('dateOfBirth');
	    	$homeDistrict = session()->pull('homeDistrict');
	    	$ta = session()->pull('ta');
	    	$homeVillage = session()->pull('homeVillage');
	    	$nationality = session()->pull('nationality');
	    	$studentStatus =session()->pull('studentStatus');
	    	$religion =session()->pull('religion');
	    	$maritalStatus = session()->pull('maritalStatus');
	    	$disability =session()->pull('disability');
	    	$physAddress =session()->pull('physAddress');
	    	$phone =session()->pull('phone');
	    	$email =session()->pull('email');
	    	$bankName =session()->pull('bankName');
	    	$bankAccount = session()->pull('bankAccount');
	    	$parentName = session()->pull('bankAccount');
	    	$relationship = session()->pull('bankAccount');
	    	$occupation = session()->pull('bankAccount');
	    	$parentAddress = session()->pull('bankAccount');
	    	$parentEmail = session()->pull('parentEmail');
	    	$parentPhone = session()->pull('parentPhone');
	    	$schoolName = session()->pull('schoolName');
	    	$examNumber = session()->pull('examNumber');
	    	$yearCompleted = session()->pull('yearCompleted');
	    	
	    	if($this->model->enrollStudent($yearOfStudy,$admissionNumber,$campus,$regNumber,$leveOfStudy,$mannerOfEntry,$sponsor,$faculty,$graddate,$program,$lastname,$middlename,$firstname,$sex,$dateOfBirth,$homeDistrict,$ta,$homeVillage,$nationality,$studentStatus,$religion,$maritalStatus,$disability,$physAddress,$phone,$email,$bankName,$bankAccount,$parentName,$relationship,$occupation,$parentAddress,$parentEmail,$parentPhone,$schoolName,$examNumber,$yearCompleted))
	    	{
	    		return redirect('/Policy/EnrollStudent')->with('feedback','Student enrolled successfully!');
	    	}
	    	else
	    	{
	    		return redirect('/Policy/EnrollStudent')->with('feedback','Student could not be enrolled!');
	    	}
	    	
	    }
	    
	    public function createaccountform(){
	    	$currentpage = "Create Account";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";

	    	return view('createaccountform',
	    		array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'positions' => $this->model->getPrivilege()
						  ));
	    }

	    public function addaccount(Request $request)
	    {
	    	$this->validate($request,[
	    		'lastname' => 'required|alpha',
	    		'firstname' => 'required|alpha',
	    		'dateofbirth' => 'required|date_format:"Y-m-d"',
	    		'registrationnumber' => 'required',
	    		'position' => 'required',
	    		'username' => 'required',
	    		'password' => 'required|alpha_num',
	    		'email' => 'email'
	    		]);

	    	$lastname = $request['lastname'];
	    	$firstname = $request['firstname'];
	    	$dateofbirth = $request['dateofbirth'];
	    	$regNumber = $request['registrationnumber'];
	    	$position = $request['position'];
	    	$username = $request['username'];
	    	$password = $request['password'];
	    	$email = $request['email'];
	    	$count = $this->model->verifyUser($lastname,$firstname,$dateofbirth,$regNumber);

	    	foreach ($count as $value) {
	    		$number = $value->count;
	    	}
	    	if ($number > 0) 
	    	{
	    		// if($this->createAccount())
	    		// {
	    		 	return redirect('/Policy/CreateAccount');
	    		// }
	    	}
	    	else
	    	{
	    		return redirect('/Policy/CreateAccount')->with('failure', 'User could not be verified!')
	    												->withInput();
	    	}
	    }
	     public function moduleregistration()
	    {
	    	$currentpage = "Register Module";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    	return view('moduleregistration',
	    		array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage
						  ));
	    }
	    public function getmoduleregistrationform(Request $request)
	    {
	    	if ($request->input('submit'))
	    	{
	    		$currentpage = "Register Module";
				$parentpage ="Policy";
				$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    		return view('moduleregistrationform',
	    		array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'courses' => $this->model->getCourses()));
        	}
      //   return 'Is not set';
	    	//return redirect('moduleregistration')->with('submitted');
	    }
   
}
