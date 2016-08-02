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

		 		$this->validate($request, [
	    		'institution' => 'required',
	    		'physical_address' => 'required',
	    		'address' => 'required',
	    		'telephone' => 'required',
	    		'email' => 'required|email'
	    	]);



	    	$campus=$request['institution'];
	    	$location=$request['physical_address'];
	    	$address=$request['address'];
	    	$tel=$request['telephone'];
	    	$email=$request['email'];

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->addInstitution($campus,$location,$address,$tel,$email);


		return redirect("Policy/Institution");	
		
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
		
		return redirect("Policy/Institution");	
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

  	    public function newdepartment() {
	    	
		$currentpage = "Add New Department";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('newdepartment', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }

		public function adddepartment(Request $request) {
	    	$departmentname=$request['departmentname'];
	    	$Hod=$request['Hod'];
	    	$address=$request['address'];
	    	$paddress=$request['paddress'];
	    	$tel=$request['tel'];
	    	$email=$request['email'];

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->adddepartment($departmentname,$Hod,$address,$paddress,$tel,$email);
		

		return redirect("Policy/Department");
	    }


 public function department_delete(Request $request) {
	    	$checkbox=$request['checkbox'];
		
	    	$model = new \App\policymodel();

	   		if(!empty($checkbox)){
	   			 foreach($checkbox as $check) {

	   				$post = $model->delete_department($check);
	  			}
    			
    		}
			 return redirect("Policy/Department");	
		
	    }



public function department_edit($id) {
	    //$id=$request['CampusID'];
		
	    $model = new \App\policymodel();
    	$data= $model->editdepartment($id);

	

		$currentpage = "edit department";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('department_edit', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'department', 'departmentinfo' => $data,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }



public function department_edited(Request $request) {
			$id=$request['id'];
	    	$departmentname=$request['departmentname'];
	    	$Hod=$request['Hod'];
	    	$address=$request['address'];
	    	$paddress=$request['paddress'];
	    	$tel=$request['tel'];
	    	$email=$request['email'];

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->editeddepartment($departmentname,$Hod,$address,$paddress,$tel,$email,$id);

		return redirect("Policy/Department");
	    }






public function course() {
        //page initalization
        
        
        $data = $this->model->getcourse();
        $currentpage = "course";
        $parentpage ="Policy";
        $welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
        
        //var_dump($this->main->data);
        //call view
        return view('course', 
                    array('page' => 'home',
                          'chasections' => $this->main->data,
                          'chasubsections' => $this->main->menulist,
                          'x' => 0,
                          'loginname' => $this->main->loginname,
                          'welcomemessage' => $welcomemessage,
                          'currentpage' => $currentpage,
                          'parentpage' => $parentpage,
                          'course' => $data));
        //return view("department", array());        
}




 public function newcourse() {
	    	
		$currentpage = "Add New Course";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('newcourse', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }

public function addcourse(Request $request) {
	    	$CourseCode=$request['CourseCode'];
	    	$CourseName=$request['CourseName'];
	    	$Department=$request['Department'];
	    	$Units=$request['Units'];
	    	

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->addcourse($CourseCode,$CourseName,$Department,$Units);
		

		return redirect("Policy/Subject");
	    }


 public function course_delete(Request $request) {
	    	$checkbox=$request['checkbox'];
		
	    	$model = new \App\policymodel();

	   		if(!empty($checkbox)){
	   			 foreach($checkbox as $check) {

	   				$post = $model->delete_course($check);
	  			}
    			
    		}
			 return redirect("Policy/Subject");	
		
	    }
 

public function course_edit($id) {
	    //$id=$request['CampusID'];
		
	    $model = new \App\policymodel();
    	$data= $model->editcourse($id);

	

		$currentpage = "edit course";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('course_edit', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'course', 'courseinfo' => $data,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }



public function course_edited(Request $request) {
			$id=$request['id'];
	    	$CourseCode=$request['CourseCode'];
	    	$CourseName = $request['CourseName'];
	    	$Department=$request['Department'];
	    	$Units=$request['Units'];
	    	

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->editedcourse($CourseCode,$CourseName,$Department,$Units,$id);

		return redirect("Policy/Subject");
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
	    public function addprogramme(Request $request) {

	    		$this->validate($request, [
	    		'programme_code' => 'required',
	    		'programme_short_name' => 'required'
	    	]);

	    	$pcode=$request['programme_code'];
	    	$pname=$request['programme_short_name'];
	    	$ptitle=$request['ptitle'];
	    	$pfaculty=$request['pfaculty'];
	    

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->newprogramme($pcode,$pname,$ptitle,$pfaculty);

    	return redirect("Policy/Programme");	
		
	    }

	    public function newprogramme() {
	    	
		$currentpage = "Add New Programme";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('newprogramme', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }
	    public function programme_delete(Request $request) {
	    	$checkbox=$request['checkbox'];
		
	    	$model = new \App\policymodel();

	   		if(!empty($checkbox)){
	   			 foreach($checkbox as $check) {

	   				$post = $model->delete_programme($check);
	  			}
    			
    		}
			 return redirect("Policy/Programme");	
		
	    }
	    public function programme_edit($id) {
	    //$id=$request['CampusID'];
		
	    $model = new \App\policymodel();
    	$data= $model->editprogramme($id);

	

		$currentpage = "edit Programmes";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('programme_edit', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'institution', 'programmeinfo' => $data,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }

	    public function programme_edited(Request $request) {
	    	$pcode=$request['pcode'];
	    	$pname=$request['pname'];
	    	$ptitle=$request['ptitle'];
	    	$pfaculty=$request['pfaculty'];
	    	$id=$request['id'];

		//page initalization
	      $model = new \App\policymodel();
    		$post = $model->editedprogramme($pcode,$pname,$ptitle,$pfaculty,$id);
    	
	    		return redirect("Policy/Programme");
	    	

		
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
	    		$this->validate($request, [
	    		'faculty' => 'required',
	    		'address' => 'required',
	    		'email' => 'required|email'
	    	]);


	    	$faculty = $request['faculty'];
	    	$address = $request['address'];
	    	$email = $request['email'];
	    	$tel = $request['tel'];
	    	$location = $request['paddress'];

	    	/*
	    	if($this->model->insertIntoFaculty($faculty,$address,$email,$tel,$location))
	    	{
	    		return redirect('Policy/Faculty');
	    	}*/
	    	$model = new \App\policymodel();
	    	$post = $model->insertIntoFaculty($faculty,$address,$email,$tel,$location);

	    	 return redirect("Policy/Faculty");	
	    	
	    	
	    }
	     public function faculty_delete(Request $request) {
	    	$checkbox=$request['checkbox'];
		
	    	$model = new \App\policymodel();

	   		if(!empty($checkbox)){
	   			 foreach($checkbox as $check) {

	   				$post = $model->delete_faculty($check);
	  			}
    			
    		}
			 return redirect("Policy/Faculty");	
		
	    }
	    public function faculty_edit($id) {	
	    $model = new \App\policymodel();
    	$data= $model->editfaculty($id);

	

		$currentpage = "edit Faculty";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('faculty_edit', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'faculty', 'faculties' => $data,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }
	    public function faculty_edited(Request $request) {
	    	$faculty=$request['faculty'];
	    	$address=$request['address'];
	    	$location=$request['location'];
	    	$tel=$request['tel'];
	    	$email=$request['email'];
	    	$id=$request['id'];

		//page initalization
	      $model = new \App\policymodel();
    	$post = $model->editedfaculty($faculty,$address,$location,$tel,$email,$id);
    	
	    		return redirect("Policy/Faculty");
	    	

		
	    }

	    public function sponsor() {

		//page initalization
		$model = new \App\policymodel();
    	$data = $model->sponsors();
		$currentpage = "Sponsor";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		

	    return view('sponsor', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'institution', 'sponsorinfo' => $data,
						   'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }
	     public function newsponsor() {

		$currentpage = "New Sponsor";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		

	    return view('newsponsor', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						   'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }
	     public function addsponsor(Request $request) {


	     	$this->validate($request, [
	    		'name_of_sponsor' => 'required',
	    		'address' => 'required',
	    		'telephone_No' => 'required'
	    	]);

	    	$name=$request['name_of_sponsor'];
	    	$address=$request['address'];
	    	$comment=$request['telephone_No'];
	    

		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->addsponsor($name,$address,$comment);
    	return redirect("Policy/Sponsor");
		
	    }
	    public function sponsor_delete(Request $request) {
	    	$checkbox=$request['checkbox'];
		
	    	$model = new \App\policymodel();

	   		if(!empty($checkbox)){
	   			 foreach($checkbox as $check) {

	   				$post = $model->delete_sponsor($check);
	  			}
    			
    		}
			 return redirect("Policy/Sponsor");	
		
	    }
	     public function sponsor_edit($id) {	
	    $model = new \App\policymodel();
    	$data= $model->editsponsor($id);

	

		$currentpage = "edit Faculty";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('sponsor_edit', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'faculty', 'sponsors' => $data,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }
	    public function sponsor_edited(Request $request) {
	    	$name=$request['name'];
	    	$address=$request['address'];
	    	$comment=$request['comment'];
	    	$id=$request['id'];


	    $model = new \App\policymodel();
    	$post = $model->editedsponsor($name,$address,$comment,$id);
    	
	    		return redirect("Policy/Sponsor");
	    	

		
	    }
	    public function scholarship() {

		//page initalization
		$model = new \App\policymodel();
    	$data = $model->scholarship();
		$currentpage = "Scholarship";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		

	    return view('scholarship', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'institution', 'scholarshipinfo' => $data,
						   'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }

	    public function newscholarship() {

		$currentpage = "New Scholarship";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		

	    return view('newscholarship', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						   'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }
	    public function addscholarship(Request $request) {
	    		$this->validate($request, [
	    		'name_of_scholarship' => 'required',
	    		'scholarship_period' => 'required'
	    	]);

	    	$name=$request['name_of_scholarship'];
	    	$period=$request['scholarship_period'];
	
		//page initalization
	    $model = new \App\policymodel();
    	$post = $model->addscholarship($name,$period);
    	return redirect("Policy/Scholarship");
		
	    }

	    public function scholarship_delete(Request $request) {
	    	$checkbox=$request['checkbox'];
		
	    	$model = new \App\policymodel();

	   		if(!empty($checkbox)){
	   			 foreach($checkbox as $check) {

	   				$post = $model->delete_scholarship($check);
	  			}
    			
    		}
			 return redirect("Policy/Scholarship");	
		
	    }
	    public function scholarship_edit($id) {	
	    $model = new \App\policymodel();
    	$data= $model->editscholarship($id);

	

		$currentpage = "Edit Scholarship";
		$parentpage ="Policy";
		$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
		
	    return view('scholarship_edit', 
					array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'faculty', 'scholarships' => $data,
						  'parentpage' => $parentpage,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
			
	    }
	    public function scholarship_edited(Request $request) {
	    	$name=$request['name'];
	    	$period=$request['period'];
	    	$id=$request['id'];
	    
	    $model = new \App\policymodel();
    	$post = $model->editedscholarship($name,$period,$id);
    	
	    return redirect("Policy/Scholarship");
	    	
		
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
						  'entrymanners' => $mannerofentry,
						  'levelofstudy' => $this->model->getProgrammeLevel()));
	    }
	    public function admissionform2(Request $request)
	    {
	    	$this->validate($request, [
	    		'admissionnumber' => 'required',
	    		'graddate' => 'required|date_format:"Y-m-d"',
	    		'program' => 'required'
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
	    			'disability' => $request['disability'],'paddress' => $request['permanentaddress'], 
	    			'curAddres' => $request['currentaddress'], 'bankbranchname' => $request['bankbranch'],
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
	    			if(($fileop[0] != "") && ($fileop[1] == ""))
		    		{
		    			$programme = ' ';
		    			$programmecode = ' ';
		    			$i = 0;
		    			preg_match('#\((.*?)\)#', $fileop[0], $match);
		    			$programme = preg_split('/\(.*?\)/',$fileop[0]);
						// print @$match[1];
						// echo "<br>";
						// print_r($programme[0]);
						$count = $this->model->verifyprogramme(strtolower($programme[0]));

						foreach ($count as $value) {
							$number = $value->count;
							$code = $value->code;
						}
						echo($number);
		    			if($number > 0)
		    			{
		    				$programme = $programme[0];
		    				$programmecode = $code;
		    				$college = 'Kcn';
		    			}
		    			

	    			}
	    			if($fileop[1] != "")
	    			{
	    				echo isset($programmecode) ? $college.'/'.$programmecode.'/'.$i.'<br>' : ' ';
	    			}
	    			$i = str_pad($i + 1, 3, 0, STR_PAD_LEFT);

	    // 			$name = str_replace(' ', ', ', $fileop[1]);
	    // 			$last_space = strrpos($name, ' ');
					// $last_word = substr($name, $last_space);
					// $lastname = substr($name, 0, $last_space);
					// $firstname = trim(strtolower($last_word));
					// $firstname = ucfirst($firstname);
					// $fullname = $lastname.' '.$firstname;

					// $pieces = explode(' ', $fileop[0]);
					// $program = @$pieces[0].' '.@$pieces[2].' '.@$pieces[3];
					
					// if($program = 'BACHELOR OF SCIENCE')
					// {
					// 	echo $program;
					// }
					
	    // 			// for($i = 0; $i < strlen($fileop[0]); $i++)
	    // 			// {
	    // 			// 	echo substr($fileop[0], $i, 1 ).'<br>';
	    // 			// }
	    // 			$name = $fileop[1];
	    			// $gender = $fileop[2];
	    			// $cand_num = $fileop[3];
	    			// if(strlen(trim($fullname)) > 0)
	    			// {
	    			// 	$insertStudentInfo = $this->model->insertIntoStudentTable($fullname, $gender, $cand_num);
	    			// }
	    			
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
	    	$paddress =session()->pull('paddress');
	    	$phone =session()->pull('phone');
	    	$email =session()->pull('email');
	    	$bankName =session()->pull('bankName');
	    	$bankAccount = session()->pull('bankAccount');
	    	$parentName = session()->pull('parentName');
	    	$relationship = session()->pull('relationship');
	    	$occupation = session()->pull('occupation');
	    	$parentAddress = session()->pull('parentAddress');
	    	$parentEmail = session()->pull('parentEmail');
	    	$parentPhone = session()->pull('parentPhone');
	    	$schoolName = session()->pull('schoolName');
	    	$examNumber = session()->pull('examNumber');
	    	$yearCompleted = session()->pull('yearCompleted');
	    	$currentaddress = session()->pull('curAddres');
	    	$bankbranchname = session()->pull('bankbranchname');
	    	
	    	$this->model->enrollStudent($yearOfStudy,$admissionNumber,$campus,$regNumber,$leveOfStudy,$mannerOfEntry,$sponsor,$faculty,$graddate,$program,$lastname,$middlename,$firstname,$sex,$dateOfBirth,$homeDistrict,$ta,$homeVillage,$nationality,$studentStatus,$religion,$maritalStatus,$disability,$paddress,$phone,$email,$bankName,$bankAccount,$parentName,$relationship,$occupation,$parentAddress,$parentEmail,$parentPhone,$schoolName,$examNumber,$yearCompleted, $currentaddress, $bankbranchname);

	    	return redirect('/Policy/EnrollStudent')->with('feedback','Student enrolled successfully!');
	    	
	    	
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
	    	$count = $this->model->verifyStudent($lastname,$firstname,$dateofbirth,$regNumber);

	    	foreach ($count as $value) {
	    		$number = $value->count;
	    	}
	    	if ($number > 0) 
	    	{
	    		if($this->model->createAccount($name, $dateofbirth, $regNumber, $position, $username, $password, $email))
	    		{
	    		 	return redirect('/Policy/CreateAccount');
	    		}
	    	}
	    	else
	    	{
	    		return redirect('/Policy/CreateAccount')->with('failure', 'User could not be verified!')
	    												->withInput();
	    	}
	    }
	     public function moduleregistration()
	    {
	    	$if_registered = $this->model->checkRegistered($this->main->regno);
	    	foreach($if_registered as $registered)
	    	{
	    		$is_registered = $registered->count;
	    	}
	    	$courses = $this->model->getRegisteredCourses($this->main->regno);
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
						  'parentpage' => $parentpage,
						  'registered' => $is_registered,
						  'courses' => $courses));
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
						  'courses' => $this->model->getCourses($this->main->regno)));
        	}
      //   return 'Is not set';
	    	//return redirect('moduleregistration')->with('submitted');
	    }
   		
   		public function registermodule(Request $request)
   		{
   			for($i=0; $i < count($this->model->getCourses($this->main->regno)); $i++)
   			{
   				$this->model->moduleregister($this->main->regno, $request['coursecode_'.$i]);
   			}
   			return redirect('/Policy/ModuleRegistration')->with('courses', $this->model->getRegisteredCourses($this->main->regno));
   		}

   		public function getstudentlist(Request $request)
   		{
	    	$currentpage = "Register Module";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";

	    	if($request['search'] && ($request['search'] != ''))
	    	{
	    		$this->validate($request,['searchkeyword' => 'required']);
	    		$keyword = $request['searchkeyword'];
	    		$students = $this->model->searchstudet($keyword);
	    	}else
	    	{
	    		$students = $this->model->studentList();
	    	}
	    	
	    	return view('studentlist',
	    				array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'students' => $students));
	    }

	    public function editstudentform(Request $request, $id)
	    {
	    	$currentpage = "Edit Student";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
			$studentdetails = $this->model->getStudentDetails($id);
			$campus = $studentdetails->CampusID;
			$faculty = $studentdetails->FacultyID;
			$programme = $studentdetails->ProgrammeofStudyID;
			$sponsor = $studentdetails->SponsorID;
			$entry = $studentdetails->MannerofEntryID;
			$level = $studentdetails->StudyLevelID;
			$status = $studentdetails->StatusID;

	    	return view('editstudent',
	    		array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'student' => $studentdetails,
						  'campus' => $this->model->getCampus($campus),
						  'faculties' => $this->model->getFaculty($faculty),
						  'programmes' => $this->model->getProgrammes($programme),
						  'sponsors' => $this->model->getSponsors($sponsor),
						  'entrymanners' => $this->model->getMannerOfEntry($entry),
						  'levelofstudy' => $this->model->getProgrammeLevel($level)));
	    }

	    public function editstudent(Request $request, $id)
	    {
	    	//General page information
	    	$currentpage = "Edit Student";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
			$studentdetails = $this->model->getStudentDetails($id);

	    	//Edit study information validation
	    	$this->validate($request, [
	    		'yearofstudy' => 'required',
	    		'campus' => 'required','graddate' => 'required|date_format:"Y-m-d"',
	    		'faculty'=> 'required', 'levelofstudy' => 'required',
	    		'program' => 'required', 'mannerofentry' => 'required'
	    	]);
	    	//store form data in session
	    	session([
	    			'editid' => $id,
	    			'edityearOfStudy' => $request['yearofstudy'],
	    			'editadmissionNumber' => $request['admissionnumber'],
	    			'editcampus' => $request['campus'],
	    			'editregNumber' => $request['regno'],
	    			'editleveOfStudy' => $request['levelofstudy'],
	    			'editmannerOfEntry' => $request['mannerofentry'],
	    			'editsponsor' => $request['sponsor'],
	    			'editfaculty' => $request['faculty'],
	    			'editgraddate' => $request['graddate'],
	    			'editprogram' => $request['program']
	    		]);

	    	$status = $studentdetails->StatusID;
	    	$religion = $studentdetails->ReligionID;
	    	$sex = $studentdetails->sexid;
	    	$maritalstatus = $studentdetails->maritalStatusID;
	    	$disability = $studentdetails->DisabilityCode;

	    	//Split name
	    	$name = explode(',', $studentdetails->Name);
	    	
	    	//returns next form 
	    	return view('editstudent1',
	    		array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'student' => $studentdetails,
						  'firstname' => $name[1],
						  'lastname' => $name[0],
						  'status' => $this->model->getStudentStatus($status),
						  'religions' => $this->model->getReligion($religion),
						  'gender' => $this->model->getSex($sex),
						  'maritalstatus' => $this->model->getMaritalStatus($maritalstatus),
						  'disabilities' => $this->model->getDisability($disability)));
	    }

	    public function editstudent1(Request $request, $id)
	    {
	    	//General page info
	    	$currentpage = "Edit Student";
			$parentpage ="Policy";
			$welcomemessage = "Welcome to ".$currentpage." Page for Student Academic Records Information System";
			$studentdetails = $this->model->getStudentDetails($id);

			// //Edit Personal Information Form validation
	    	$this->validate($request, [
	    		'lastname' => 'required|alpha'
	    	]);

	    	//store form data in session
	    	session([
	    			'editlastname' => $request['lastname'],'editmiddlename' => $request['middlename'],
	    			'editfirstname' => $request['firstname'],'editsex' => $request['sex'],
	    			'editdateOfBirth' => $request['dateofbirth'],'edithomeDistrict' => $request['homedistrict'],
	    			'editta' => $request['ta'],'edithomeVillage' => $request['homevillage'],
	    			'editnationality' => $request['nationality'],'editstudentStatus' => $request['studentstatus'],
	    			'editreligion' => $request['religion'],'editmaritalStatus' => $request['marital'],
	    			'editdisability' => $request['disability'],'editphysAddress' => $request['permanentaddress'], 
	    			'editcurAddress' => $request['currentaddress'], 'editbankbranch' => $request['bankbranch'],
	    			'editphone' => $request['phone'],'editemail' => $request['email'],
	    			'editbankName' => $request['bankname'],'editbankAccount' => $request['bankaccount']
	    		]);
	    	
	    	//returns next form
	    	return view('editstudent2',
	    		array('page' => 'home',
						  'chasections' => $this->main->data,
						  'chasubsections' => $this->main->menulist,
						  'x' => 0,
						  'loginname' => $this->main->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
						  'parentpage' => $parentpage,
						  'student' => $studentdetails));
	    }

	    /**
	    / Function to send edited student data to the updatestudent model
	    */

	    public function updateStudent(Request $request)
	    {
	    	session([
	    			'editparentName' => $request['pname'],
	    			'editrelationship' => $request['relationship'],
	    			'editoccupation' => $request['occupation'],
	    			'editparentAddress' => $request['paddress'],
	    			'editparentEmail' => $request['pemail'],
	    			'editparentPhone' => $request['parphone'],
	    			'editschoolName' => $request['schname'],
	    			'editexamNumber' => $request['examnum'],
	    			'edityearCompleted' => $request['yearcompleted']
	    		]);
	    	$id = session()->pull('editid');
	    	$yearOfStudy = session()->pull('edityearOfStudy');
	    	$admissionNumber = session()->pull('editadmissionNumber');
	    	$campus = session()->pull('editcampus');
	    	$regNumber = session()->pull('editregNumber');
	    	$leveOfStudy = session()->pull('editleveOfStudy');
	    	$mannerOfEntry = session()->pull('editmannerOfEntry');
	    	$sponsor = session()->pull('editsponsor');
	    	$faculty = session()->pull('editfaculty');
	    	$graddate = session()->pull('editgraddate');
	    	$program = session()->pull('editprogram');
	    	$lastname = session()->pull('editlastname');
	    	$middlename = session()->pull('editmiddlename');
	    	$firstname = session()->pull('editfirstname');
	    	$sex = session()->pull('editsex');
	    	$dateOfBirth = session()->pull('editdateOfBirth');
	    	$homeDistrict = session()->pull('edithomeDistrict');
	    	$ta = session()->pull('editta');
	    	$homeVillage = session()->pull('edithomeVillage');
	    	$nationality = session()->pull('editnationality');
	    	$studentStatus =session()->pull('editstudentStatus');
	    	$religion =session()->pull('editreligion');
	    	$maritalStatus = session()->pull('editmaritalStatus');
	    	$disability =session()->pull('editdisability');
	    	$physAddress =session()->pull('editphysAddress');
	    	$phone =session()->pull('editphone');
	    	$email =session()->pull('editemail');
	    	$bankName =session()->pull('editbankName');
	    	$bankAccount = session()->pull('editbankAccount');
	    	$parentName = session()->pull('editparentName');
	    	$relationship = session()->pull('editrelationship');
	    	$occupation = session()->pull('editoccupation');
	    	$parentAddress = session()->pull('editparentAddress');
	    	$parentEmail = session()->pull('editparentEmail');
	    	$parentPhone = session()->pull('editparentPhone');
	    	$schoolName = session()->pull('editschoolName');
	    	$examNumber = session()->pull('editexamNumber');
	    	$yearCompleted = session()->pull('edityearCompleted');
	    	$bankBranch = session()->pull('editbankbranch');
	    	$currentAddress = session()->pull('editcurAddress');

	    	//$name = $this->formatName($firstname, $lastname);

	    	$this->model->updateStudentDetails($id, $firstname, $lastname, $regNumber, $sex, $dateOfBirth, $mannerOfEntry, $maritalStatus, $campus, $program, $faculty, $sponsor, $graddate, $studentStatus, $yearOfStudy,$nationality, $homeDistrict,$occupation, $religion, $admissionNumber, $homeVillage, $ta, $parentName, $parentPhone, $bankAccount, $bankName, $bankBranch, $schoolName, $examNumber, $physAddress, $currentAddress, $leveOfStudy, $relationship, $email, $phone, $yearCompleted, $parentAddress, $disability, $parentEmail);


	    		$message = $regNumber.' has been updated!';
	    		return redirect('/Policy/EnrollStudent')->with('editfeedback', $message);
	    	
	    	
	    }

	    public function checkregnumber(Request $request)
	    {
	    	$regNumber = $request->id;
	    	$checkregnumber = $this->model->verifyregnumber($regNumber);
	    	if($checkregnumber){
	    		echo 'Registration Number already exist!';
	    	}
	    }

	    public function seachsuggesstions(Request $request)
	    {
	    	// if(searchstudet($request->key))
	    	// {
	    	// 	echo 'Something is here!';
	    	// }else{
	    		echo "No result found...";
	    	// }
	    }

	    public function formatName($firstname, $lastname)
	    {

	    	$fullname = strtoupper($lastname).' '.$firstname;
        	$fullname = str_replace(' ', ', ', $fullname);
        	return $fullname;
	    }
   
}
