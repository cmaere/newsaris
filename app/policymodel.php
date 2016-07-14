<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class policymodel extends Model
{
	public function selectQuery($sql_stmt) {
        return DB::select($sql_stmt);
    }
    public function getFaculty()
	{
		$query = "SELECT * FROM faculty";
		return $this->selectQuery($query);
	}
	public function getProgrammes()
	{
		$query="select * from programme";
		return $this->selectQuery($query);
	}
	public function insertIntoFaculty($faculty,$address,$email,$tel,$location){
		$query="insert into faculty (FacultyName, Address, Email, Tel, Location) values ('$faculty','$address','$email','$tel', '$location')";
		return $this->selectQuery($query);
	}
	public function getdepartment(){
		$query = "SELECT DeptName, DeptPhysAdd, DeptHead, DeptAddress, DeptTel, DeptEmail FROM `department`";
return $this->selectQuery($query);
	}
    public function  getinstitution(){
    	$query = "select campus,location,address,tel,Email,CampusID from campus";

    	return $this->selectQuery($query);
    }

    public function  addInstitution($campus,$location,$address,$tel,$email){
    	$query = "INSERT INTO campus (Campus,Location,Address,Tel,Email) VALUES ('$campus','$location','$address','$tel','$email')";

    	return $this->selectQuery($query);
    }
     public function  editcampus($id){
     	
    	$query = "select campus,location,address,tel,Email from campus where CampusID = '$id'";

    	return $this->selectQuery($query);
    }
}

