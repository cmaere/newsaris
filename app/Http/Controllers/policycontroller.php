<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use  \App\Http\Controllers\main;

class policycontroller extends Controller
{
	var $main;
	var $model;
	
	
	
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
<<<<<<< HEAD
	    public function admissionform()
	    {
	    	$currentpage = "Admit student";
			$parentpage ="Admision";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    	return view('admissionform', 
=======
	    public function users()
	    {
	    	$currentpage = "Users";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
	    	return view('users', 
>>>>>>> cf05b60333af890f384d6f16c8b6dbb2ef2a8b1c
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
<<<<<<< HEAD
						  'parentpage' => $parentpage));
	    }
	    public function admissionform2()
	    {
	    	$currentpage = "Admit student";
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
						  'parentpage' => $parentpage));
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

<<<<<<< HEAD
       public function manageacademiccalendar() {
  		//page initalization
		
  		
  		$data = $this->model->manageacademiccalendar();
  		$currentpage = "Manage Academic Calendar";
  		$parentpage ="Policy";
  		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
		
  		//call view
  	    return view('manageacademiccalendar', 
  					array('page' => 'home',
  						  'chasections' => $this->main->data,
  						  'chasubsections' => $this->main->menulist,
  						  'x' => 0,
  						  'loginname' => $this->main->loginname,
  						  'welcomemessage' => $welcomemessage,
  						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
  						  'department' => $data));
  	
		
			
  	    }  
=======
	    			//$insertStudentInfo = new policymodel();
	    			$insertStudentInfo = $this->model->insertIntoStudentTable($name, $gender, $cand_num);
	    		}
	    	}
	    	else
	    	{
	    		echo 'Something is wrong';
	    	} 
	    }

<<<<<<< HEAD
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

  	    
	    public function institution_edit(Request $request) {
	    $id=$request['CampusID'];
		
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
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }

=======
=======
						  'parentpage' => $parentpage,
					  	   'users' => $this->model->getusers()));
	    }
>>>>>>> cf05b60333af890f384d6f16c8b6dbb2ef2a8b1c
>>>>>>> 16902b0f6d14f99cc9396b3b025675e3451a5fb0

>>>>>>> 10f7139761227139c5329ec0e9a81e1b80bd0f12

	    
   
}
