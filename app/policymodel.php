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
    public function  delete_faculty($check){
        
        $query = "DELETE FROM faculty WHERE FacultyID = '$check'";

        return $this->selectQuery($query);
    }
	public function getProgrammes()
	{
		$query="select * from programme";
		return $this->selectQuery($query);
	}
    public function  newprogramme($pcode,$pname,$ptitle,$pfaculty){
        $query = "INSERT INTO programme (ProgrammeCode,ProgrammeName,Title,Faculty) VALUES ('$pcode','$pname','$ptitle','$pfaculty')";

        return $this->selectQuery($query);
    }
	public function insertIntoFaculty($faculty,$address,$email,$tel,$location){
		$query="insert into faculty (FacultyName, Address, Email, Tel, Location) values ('$faculty','$address','$email','$tel', '$location')";
		return $this->selectQuery($query);
	}
    public function  editfaculty($id){
        
        $query = "select FacultyName,Address,Email,Tel,Location,FacultyID FROM faculty WHERE FacultyID = '$id'";

        return $this->selectQuery($query);
    }
     public function  editedfaculty($faculty,$address,$location,$tel,$email,$id){
        
       $query = "UPDATE faculty
                SET FacultyName ='$faculty', Address ='$address', Location ='$location', Email ='$email', Tel='$tel'
                WHERE FacultyID ='$id'";

        return $this->selectQuery($query);
    }
    public function  addInstitution($campus,$location,$address,$tel,$email){
        $query = "INSERT INTO campus (Campus,Location,Address,Tel,Email) VALUES ('$campus','$location','$address','$tel','$email')";

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
    public function  delete_institution($check){
        
        $query = "DELETE FROM campus WHERE CampusID = '$check'";

        return $this->selectQuery($query);
    }
    public function  delete_programme($check){
        
        $query = "DELETE FROM programme WHERE ProgrammeID = '$check'";

        return $this->selectQuery($query);
    }
    public function  editprogramme($id){
        
        $query = "select ProgrammeCode,ProgrammeName,Title,Faculty,ProgrammeID FROM programme WHERE ProgrammeID = '$id'";

        return $this->selectQuery($query);
    }
    public function  editedprogramme($pcode,$pname,$ptitle,$pfaculty,$id){
        
       $query = "UPDATE programme
                SET ProgrammeCode ='$pcode', ProgrammeName ='$pname', Title ='$ptitle', Faculty ='$pfaculty'
                WHERE ProgrammeID ='$id'";

        return $this->selectQuery($query);
    }

    public function  editcampus($id){
        
        $query = "select campus,location,address,tel,Email,CampusID from campus where CampusID = '$id'";

        return $this->selectQuery($query);
    }

     public function  editedcampus($campus,$paddress,$address,$tel,$email,$id){
        
       $query = "UPDATE campus
                SET Campus ='$campus', Location ='$paddress', Address ='$address',Tel ='tel',Email ='$email'
                WHERE CampusID ='$id'";

        return $this->selectQuery($query);
    }

    public function insertIntoStudentTable($name, $gender, $cand_num)
    {
    	$query="insert into student (Name, Sex, IDProcess) values ('$name','$gender','$cand_num')";
		return $this->selectQuery($query);
    }

    public function enrollStudent($yearOfStudy,$admissionNumber,$campus,$regNumber,$leveOfStudy,$mannerOfEntry,$sponsor,$faculty,$graddate,$program,$lastname,$middlename,$firstname,$sex,$dateOfBirth,$homeDistrict,$ta,$homeVillage,$nationality,$studentStatus,$religion,$maritalStatus,$disability,$physAddress,$phone,$email,$bankName,$bankAccount,$parentName,$relationship,$occupation,$parentAddress,$parentEmail,$parentPhone,$schoolName,$examNumber,$yearCompleted)
    {
        $fullname = strtoupper($firstname).' '.$lastname;
        $fullname = str_replace(' ', ', ', $fullname);
    	$query = "insert into student(Name, RegNo, Sex, DBirth, MannerofEntry, MaritalStatus, Campus, ProgrammeofStudy,";
        $query .= "Faculty, Sponsor, GradYear, Status, Nationality, ParentOccupation, Disability, AdmissionNo, village, kin,";
        $query .= "kin_phone, account_number, bank_name, paddress, studylevel, kin_relationship, Email, Phone, kin_address, kin_email) ";
        $query .= "VALUES('$fullname','$regNumber','$sex','$dateOfBirth','$mannerOfEntry','$maritalStatus','$campus','$program',";
        $query .= "'$faculty','$sponsor','$graddate','$studentStatus','$nationality','$occupation','$disability','$admissionNumber',"; 
        $query .= "'$homeVillage','$parentName','$parentPhone','$bankAccount','$bankName','$physAddress','$leveOfStudy',";
        $query .= "'$relationship','$email','$phone','$parentAddress','$parentEmail')";
    	return $this->selectQuery($query);
    }

    public function getCampus(){
    	$query = "select * from campus";
    	return $this->selectQuery($query);
    }
    
    public function getSponsors(){
    	$query = "select * from sponsors";
    	return $this->selectQuery($query);
    }

    public function getMannerOfEntry(){
    	$query = "select * from mannerofentry";
    	return $this->selectQuery($query);
    }

    public function getSex(){
    	$query = "select * from sex";
    	return $this->selectQuery($query);
    }

    public function getStudentStatus(){
        $query = "select * from studentstatus";
        return $this->selectQuery($query);
    }

    public function getDisability(){
        $query = "select * from disability";
        return $this->selectQuery($query);
    }

    public function getReligion(){
        $query = "select * from religion";
        return $this->selectQuery($query);
    }

    public function getMaritalStatus(){
        $query = "select * from maritalstatus";
        return $this->selectQuery($query);
    }

    public function getPrivilege()
    {
        $query = "select * from privilege";
        return $this->selectQuery($query);
    }
    
    public function verifyUser($lastname,$firstname,$dateofbirth,$regNumber){
        $fullname = strtoupper($firstname).' '.$lastname;
        $name = str_replace(' ', ', ', $fullname);
        $query = "select count('id') as count from student where Name = '$name' and DBirth = '$dateofbirth' and RegNo = '$regNumber' limit 1";
        return $this->selectQuery($query);
    }
    /**
    to be updated
    */
    public function getCourses()
    {
        $query = "select * from course";
        return $this->selectQuery($query);
    }

}

