<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use  \App\Http\Controllers\main;
class policy extends Controller
{
	var $main;
	
	
	
	 public function __construct() {
		 
		$this->main = new \App\Http\Controllers\main();
		
		
		
		 
	 }
	
	public function institution() {
		//page initalization
		
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
						  'welcomemessage' => $welcomemessage,
						  'currentpage' => $currentpage,
					  	  'parentpage' => $parentpage));
			
	    }

	    
   
}
