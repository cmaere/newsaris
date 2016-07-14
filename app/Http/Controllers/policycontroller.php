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

	    
   
}
