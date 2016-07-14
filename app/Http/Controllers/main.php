<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
class main extends Controller
{
	public $getsections;
	public $loginname;
	public $getuserprofile;
	public $category;
	public $menulist;
	public $data;
	
	 public function __construct() {
		 $usersession = Auth::user();
		 $this->regno = "kcn/admin/002";
		 $this->loginname = $usersession->name;
 		//call model called menu section
         $this->category = new \App\section();
         $this->data = $this->category->getsections($this->regno);
		
 		//format data to a list
		
 		$i=0;
 		foreach($this->data as $list)
 		{
 			$sectionpage = $list->sectionpage;
 			$this->menulist[$i] = $this->category->getsubsections($sectionpage);
 			$i++;
 		}
		 
	 }
	 
	
	public function index() {
		//page initalization
		
		$currentpage = "Home";
		$welcomemessage = "Welcome to Student Academic Record Information System";
		//call view
	    return view('home', 
					array('page' => 'home',
						  'chasections' => $this->data,
						  'chasubsections' => $this->menulist,
						  'x' => 0,
						  'loginname' => $this->loginname,
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage ));
	    }

	    
   
}
