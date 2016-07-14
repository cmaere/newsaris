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
    	$query = "select campus,location,address,tel,Email from campus";

    	return $this->selectQuery($query);
    }
	
	public function manageacademiccalendar(){
		$query = "SELECT AYear, programmeCode,Semister_status,cohort FROM `academicyear` WHERE Status = 1" ;
        return $this->selectQuery($query);
	}
}

