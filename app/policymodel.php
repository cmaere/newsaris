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

    public function insertIntoStudentTable($name, $gender, $cand_num)
    {
    	$query="insert into student (Name, Sex, IDProcess) values ('$name','$gender','$cand_num')";
		return $this->selectQuery($query);
    }

    public function enrollStudent($yearOfStudy,$admissionNumber,$campus,$regNumber,$leveOfStudy,$mannerOfEntry,$sponsor,$faculty,$graddate,$program,$lastname,$middlename,$firstname,$sex,$dateOfBirth,$homeDistrict,$ta,$homeVillage,$nationality,$studentStatus,$religion,$maritalStatus,$disability,$physAddress,$phone,$email,$bankName,$bankAccount,$parentName,$relationship,$occupation,$parentAddress,$parentEmail,$parentPhone,$schoolName,$examNumber,$yearCompleted)
    {
    	// $query = "insert into student(Name, RegNo, Sex, DBirth, MannerofEntry, MaritalStatus, Campus, ProgrammeofStudy, Faculty, Sponsor, GradYear, Status, Nationality, ParentOccupation, Disability, AdmissionNo, village, kin, kin_phone, account_number, bank_name, paddress, studylevel, kin_relationship, Email, Phone, kin_address, kin_email) VALUES('$lastname', '$regNumber', '$sex', '$dateOfBirth', '$mannerOfEntry', '$maritalStatus', '$campus', '$program','$faculty','$sponsor', '$graddate','$studentStatus', '$nationality, '$occupation', '$disability', '$admissionNumber', '$homeVillage', '$parentName', '$parentPhone', '$bankAccount', '$bankName', '$physAddress', '$leveOfStudy', '$relationship', '$email', '$phone', '$parentAddress', '$parentEmail')";
    	// return $this->selectQuery($query);
    }
    


}

