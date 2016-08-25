<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class policymodel extends Model
{
    public function selectQuery($sql_stmt) {
        return DB::select($sql_stmt);
    }
    /**
    /* Returns the list of faculties
    **/
   public function getFaculty($id = NULL)
    {
        if($id == NULL)
        {
            $query = "SELECT * FROM faculty";
        }else{
            $query = "SELECT * FROM faculty WHERE FacultyID NOT IN (select FacultyID from faculty where FacultyID = '$id')";
        }
        
        return $this->selectQuery($query);
    }
    public function getProgrammes($id = NULL)
    {
        if($id == NULL)
        {
            $query="select * from programme";
        }else{
            $query = "select * from programme where ProgrammeCode not in (select ProgrammeCode from programme where ProgrammeCode = '$id')";
        }
        
        return $this->selectQuery($query);
    }
    public function  newprogramme($pcode,$pname,$ptitle,$pfaculty){
        $query = "INSERT INTO programme (ProgrammeCode,ProgrammeName,Title,Faculty) VALUES ('$pcode','$pname','$ptitle','$pfaculty')";

        return $this->selectQuery($query);
    }
    /**
    /* Inserts faculty into the db
    **/
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
    public function  delete_faculty($check){
        
        $query = "DELETE FROM faculty WHERE FacultyID= '$check'";

        return $this->selectQuery($query);
    }
    public function  addInstitution($campus,$location,$address,$tel,$email){
        $query = "INSERT INTO campus (Campus,Location,Address,Tel,Email) VALUES ('$campus','$location','$address','$tel','$email')";

        return $this->selectQuery($query);
    }
     public function verifyinstname($inst)
    {
        return DB::table('campus')->where('Campus', $inst)->get();
    }







//Frazer's Work
    

    public function getdepartment(){
        $query = "SELECT DeptName, DeptPhysAdd, DeptHead, DeptAddress, DeptTel, DeptEmail, DeptID FROM `department`";
    return $this->selectQuery($query);
    }

    public function  adddepartment($departmentname,$Hod,$address,$paddress,$tel,$email){
        $query = "INSERT INTO department (DeptName,DeptPhysAdd,DeptAddress,DeptTel,DeptEmail,DeptHead) VALUES ('$departmentname','$paddress','$address','$tel','$email','$Hod')";

        return $this->selectQuery($query);
    }

 public function  delete_department($check){
        
        $query = "DELETE FROM department WHERE DeptID = '$check'";

        return $this->selectQuery($query);
    }

 public function  editdepartment($id){
        
        $query = "select DeptName,DeptPhysAdd,DeptAddress,DeptTel,DeptEmail,DeptHead,DeptID from department where DeptID = '$id'";

        return $this->selectQuery($query);
    }

public function  editeddepartment($departmentname,$Hod,$address,$paddress,$tel,$email,$id){
        
       $query = "UPDATE department
                SET DeptName = '$departmentname', DeptPhysAdd = '$paddress', DeptAddress = '$address', DeptTel = '$tel', DeptEmail = '$email', DeptHead = '$Hod'
                WHERE DeptID ='$id'";

        return $this->selectQuery($query);
    }


public function getcourse(){
        $query = "SELECT CourseCode, CourseName, Department, Units, Id FROM `course`";
    return $this->selectQuery($query);
    }

public function  addcourse($CourseCode,$CourseName,$Department,$Units){
   

        $query = "INSERT INTO course (CourseCode,CourseName,Department,Units) VALUES
         ('$CourseCode','$CourseName','$Department','$Units')";

        return $this->selectQuery($query);
    }

public function  delete_course($check){
        
        $query = "DELETE FROM course WHERE Id = '$check'";

        return $this->selectQuery($query);

    }

public function  editcourse($id){
        
        $query = "select CourseCode, CourseName, Department, Units, Id from course where Id = '$id'";

        return $this->selectQuery($query);
    }

public function  editedcourse($CourseCode,$CourseName,$Department,$Units,$id){
        
       $query = "UPDATE course
                SET CourseCode = '$CourseCode', CourseName = '$CourseName', Department = '$Department', Units = '$Units' 
                WHERE Id ='$id'";

        return $this->selectQuery($query);
    }    


//End Frazer's Work









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
    public function sponsors()
    {
        $query="select * from sponsors";
        return $this->selectQuery($query);
    }
    public function  addsponsor($name,$address,$comment){
        $query = "INSERT INTO sponsors (Name,Address,comment) VALUES ('$name','$address','$comment')";

        return $this->selectQuery($query);
    }
    public function  delete_sponsor($check){
        
        $query = "DELETE FROM sponsors WHERE SponsorID = '$check'";

        return $this->selectQuery($query);
    }
    public function  editsponsor($id){
        
        $query = "select * from sponsors where SponsorID = '$id'";

        return $this->selectQuery($query);
    }
    public function  editedsponsor($name,$address,$comment,$id){
        
       $query = "UPDATE sponsors
                SET Name ='$name', Address ='$address', comment ='$comment'
                WHERE SponsorID ='$id'";

        return $this->selectQuery($query);
    }

    public function scholarship()
    {
        $query="select * from scholarship";
        return $this->selectQuery($query);
    }
    public function  addscholarship($name,$period){
        $query = "INSERT INTO scholarship (s_name,s_period) VALUES ('$name','$period')";

        return $this->selectQuery($query);
    }
    public function  delete_scholarship($check){
        
        $query = "DELETE FROM scholarship WHERE s_id = '$check'";

        return $this->selectQuery($query);
    }
    public function  editscholarship($id){
        
        $query = "select * from scholarship where s_id = '$id'";

        return $this->selectQuery($query);
    }
    public function  editedscholarship($name,$period,$id){
        
       $query = "UPDATE scholarship
                SET s_name ='$name', s_period ='$period'
                WHERE s_id ='$id'";

        return $this->selectQuery($query);
    }
    /**
    * Insert into student table through excel sheet.
    */
    public function insertIntoStudentTable($name, $gender, $cand_num)
    {
        $query="insert into student (Name, Sex, IDProcess) values ('$name','$gender','$cand_num')";
        return $this->selectQuery($query);
    }
    /**
    *Inserts student details into student db from admission form.
    */
    public function enrollStudent($yearOfStudy,$admissionNumber,$campus,$regNumber,$leveOfStudy,$mannerOfEntry,$sponsor,$faculty,$graddate,$program,$lastname,$middlename,$firstname,$sex,$dateOfBirth,$homeDistrict,$ta,$homeVillage,$nationality,$studentStatus,$religion,$maritalStatus,$disability,$paddress,$phone,$email,$bankName,$bankAccount,$parentName,$relationship,$occupation,$parentAddress,$parentEmail,$parentPhone,$schoolName,$examNumber,$yearCompleted, $currentAddress, $bankbranch)
    {
        if(count($this->verifyregnumber($regNumber)) > 0){
            return false;
        }else{
            $fullname = strtoupper(trim($lastname)).', '.trim($firstname);
            $date = date("Y-m-d H:i:s");
            DB::table('student')->insert(
                [
                    'Name' => $fullname, 'RegNo' => $regNumber, 'Sex' => $sex, 'DBirth' => $dateOfBirth, 'MannerofEntry' => $mannerOfEntry,
                    'MaritalStatus' => $maritalStatus, 'Campus' => $campus, 'ProgrammeofStudy' => $program, 'Faculty' => $faculty, 
                    'Sponsor' => $sponsor, 'GradYear' => $graddate, 'Status' => $studentStatus, 'YearofStudy' => $yearOfStudy, 
                    'Nationality' => $nationality, 'District' => $homeDistrict, 'ParentOccupation' => $occupation, 'Received' => $date,
                    'Religion' => $religion, 'AdmissionNo' => $admissionNumber, 'village' => $homeVillage, 'TradAuthority' => $ta, 
                    'kin' => $parentName, 'kin_phone' => $parentPhone, 'account_number' => $bankAccount, 'bank_name' => $bankName,
                    'bank_branch_name' => $bankbranch, 'form7name' => $schoolName, 'form7no' => $examNumber, 'paddress' => $paddress,
                    'studylevel' => $leveOfStudy, 'kin_relationship' => $relationship, 'Email' => $email, 'Phone' => $phone, 
                    'f7year' => $yearCompleted, 'kin_address' => $parentAddress, 'disabilityCategory' => $disability, 
                    'currentaddress' => $currentAddress, 'kin_email' => $parentEmail
                ]
            );
            return true;
        }
        
    }
    /**
    *Returns a list of campuses from db
    */
    public function getCampus($id = NULL){
        if($id == NULL)
        {
            $query = "select * from campus";
        }else{
            $query = "select * from campus where CampusID not in (select CampusID from campus where CampusID = '$id')";
        }
        
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of sponsors from db.
    */
    public function getSponsors($id = NULL){
        if($id == NULL)
        {
            $query = "select * from sponsors";
        }else{
            $query = "select * from sponsors where SponsorID not in (select SponsorID from sponsors where SponsorID = '$id')";
        }
        
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of entry manners from db.
    */
    public function getMannerOfEntry($id = NULL){
        if($id == NULL)
        {
            $query = "select * from mannerofentry";
        }else{
            $query = "select * from mannerofentry where ID not in (select ID from mannerofentry where ID = '$id')";
        }
        
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of programme levels from db.
    */
    public function getProgrammeLevel($id = NULL)
    {
        if($id == NULL)
        {
            $query = "select * from programmelevel";
        }else{
            $query = "select * from programmelevel where Code not in (select Code from programmelevel where Code = '$id')";
        }
        
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of gender from db.
    */
    public function getSex($id = NULL){
        if($id == NULL)
        {
           $query = "select * from sex";
        }else{
            $query = "select * from sex where sexid not in (select sexid from sex where sexid = '$id')";
        }
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of student status from db.
    */
    public function getStudentStatus($id = NULL){
        if($id == NULL)
        {
            $query = "select * from studentstatus";
        }else{
            $query = "select * from studentstatus where StatusID not in (select StatusID from studentstatus where StatusID = '$id')";
        }

        return $this->selectQuery($query);
    }
    /**
    * Returns a list of disabilities from db.
    */
    public function getDisability($id = NULL){
        if($id == NULL)
        {
            $query = "select * from disability";
        }else{
            $query = "select * from disability where DisabilityCode not in (select DisabilityCode from disability where DisabilityCode = '$id')";
        }
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of Religions from db.
    */
    public function getReligion($id = NULL){
        if($id == NULL)
        {
            $query = "select * from religion";
        }else{
            $query = "select * from religion where ReligionID not in (select ReligionID from religion where ReligionID = '$id')";
        }
        
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of maritalstatus from db.
    */
    public function getMaritalStatus($id = NULL){
        if($id == NULL)
        {
            $query = "select * from maritalstatus";
        }else{
            $query = "select * from maritalstatus where intStatusID not in (select intStatusID from maritalstatus where intStatusID = '$id')";
        }
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of privileges from db.
    */
    public function getPrivilege()
    {
        $query = "select * from privilege where privilegename = 'Student'";
        return $this->selectQuery($query);
    }
    /**
    * Returns a value or null if the student exists with the param provided.
    */
    public function verifyStudent($lastname,$firstname,$dateofbirth,$regNumber){
        $fullname = strtoupper($firstname).' '.$lastname;
        $name = str_replace(' ', ', ', $fullname);
        $query = "select count('id') as count from student where Name = '$name' and DBirth = '$dateofbirth' and RegNo = '$regNumber' limit 1";
        return $this->selectQuery($query);
    }
    /**
    * Create a student user
    *Inserts its details into the db.
    */
    public function createAccount($name, $dateofbirth, $regNumber, $position, $username, $password, $email)
    {
        $date = date("Y-m-d");
        $query = "insert into security (UserName, password, FullName, RegNo, Position, Email, Registered) values ('$username','$password','$name','$regNumber','$position', '$email','$date')";
        return $this->selectQuery($query);
    }
    /**
    * Returns a list of courses using student's reg number.
    */
    public function getCourses($regNumber)
    {
        $query = "SELECT * FROM course c INNER JOIN student s ON (s.ProgrammeofStudy = c.Programme) WHERE s.RegNo = '$regNumber' and s.yearOfStudy = c.StudyLevel;";
        return $this->selectQuery($query);
    }

    /**
    / check if student is registered
    /@param reg #
    /@return count
    */
    public function checkRegistered($regNumber)
    {
        $query = "select count(*) as count from coursecandidate where RegNo = '$regNumber'";
        return $this->selectQuery($query);
    }

    /**
    / Register module
    /@param registration number
    /@param coursecode
    */
    public function moduleregister($regNumber, $coursecode)
    {
        $query ="insert into coursecandidate (RegNo, CourseCode) values ('$regNumber', '$coursecode')";
        return $this->selectQuery($query);
    }

    /**
    /get courses that as student is registered
    /@param reg #
    /@return courses
    */
    public function getRegisteredCourses($regNumber)
    {
        $query = "select * from coursecandidate s inner join course c on (c.CourseCode = s.CourseCode) where s.RegNo = '$regNumber'";
        return $this->selectQuery($query);
    }

    /**
    /Displays students list
    /@return student list
    */
    public function studentList()
    {
        $query = "select * from studentDetails";
        return $this->selectQuery($query);
    }
    /**
    *Search an item
    /@param keyword
    * Returns null or value
    */
    public function searchitem($table, $keyword)    {
        $query = "SELECT * FROM $table WHERE ";
        //$this->selectQuery($query);
        $columns = $this->selectQuery("SHOW COLUMNS FROM $table");
        $count = 1;
        $i = count($columns);
        foreach($columns as $column)
        {
            if($count == $i)
            {
                $query .= "".$column->Field." LIKE '%".$keyword."%' ";
            }else{
                $query .= "".$column->Field." LIKE '%".$keyword."%' OR ";
            }
            $count++;
            
        }
        return $this->selectQuery($query);
    }
    /**
    * Checks if a programme exists
    */
    public function verifyprogramme($programme)
    {
        // $query = "select count(ProgrammeID) as count, ProgrammeCode as code from programme where Title = '$programme'";
        // return $this->selectQuery($query);
        return DB::table('programme')->where('Title', $programme)->first();
    }
    /**
    * Returns student details by id
    */
    public function getStudentDetails($id)
    {
        return DB::table('studentDetails')->where('Id', $id)->first();
    }
    /**
    * Check if registration number already exists
    * Prevents duplication or sql violation
    */
    public function verifyregnumber($regNumber)
    {
        return DB::table('student')->where('RegNo', $regNumber)->get();
    }
    /**
    * Updates student details
    */
    public function updateStudentDetails($id,$firstname, $lastname, $regNumber, $sex, $dateOfBirth, $mannerOfEntry, $maritalStatus, $campus, $program, $faculty, $sponsor, $graddate, $studentStatus, $yearOfStudy,$nationality, $homeDistrict, $occupation, $religion, $admissionNumber, $homeVillage, $ta, $parentName, $parentPhone, $bankAccount, $bankName, $bankBranch, $schoolName, $examNumber, $paddress, $currentAddress, $leveOfStudy, $relationship, $email, $phone, $yearCompleted, $parentAddress, $disability, $parentEmail)
    {
        $name = strtoupper(trim($lastname)).', '.trim($firstname);
        if(DB::table('student')
            ->where('Id', $id)
            ->update(
                [
                    'Name' => $name, 'RegNo' => $regNumber, 'Sex' => $sex, 'DBirth' => $dateOfBirth, 'MannerofEntry' => $mannerOfEntry,
                    'MaritalStatus' => $maritalStatus, 'Campus' => $campus, 'ProgrammeofStudy' => $program, 'Faculty' => $faculty, 
                    'Sponsor' => $sponsor, 'GradYear' => $graddate, 'Status' => $studentStatus, 'YearofStudy' => $yearOfStudy, 
                    'Nationality' => $nationality, 'District' => $homeDistrict, 'ParentOccupation' => $occupation,
                    'Religion' => $religion, 'AdmissionNo' => $admissionNumber, 'village' => $homeVillage, 'TradAuthority' => $ta, 
                    'kin' => $parentName, 'kin_phone' => $parentPhone, 'account_number' => $bankAccount, 'bank_name' => $bankName,
                    'bank_branch_name' => $bankBranch, 'form7name' => $schoolName, 'form7no' => $examNumber, 'paddress' => $paddress,
                    'studylevel' => $leveOfStudy, 'kin_relationship' => $relationship, 'Email' => $email, 'Phone' => $phone, 
                    'f7year' => $yearCompleted, 'kin_address' => $parentAddress, 'disabilityCategory' => $disability, 
                    'currentaddress' => $currentAddress, 'kin_email' => $parentEmail
                ])){
            return true;
        }else{
            return false;
        }
    }
    /**
    * check if the user already exist
    */
    public function verifyuser($id)
    {
        $query = "select count(*) as count from security where UserName = '$id";
        return $this->selectQuery($query);
    }
    /**
    * Delete student
    */
    public function deletestudent($id)
    {
        if(DB::table('student')->where('Id', $id)->delete())
        {
            return true;
        }else{
            return false;
        }
        // $query = "DELETE FROM student WHERE Id = '$id'";
        // return $this->selectQuery($query);
    }

     public function verifypgname($pg)
    {
        return DB::table('programme')->where('ProgrammeName', $pg)->get(); 
    }
      public function getInstitutionDetails($id)
    {
        return DB::table('campus')->where('CampusID', $id)->first();
    }
     public function getSponsorDetails($id)
    {
        return DB::table('sponsors')->where('SponsorId', $id)->first();
    }
    public function getScholarshipDetails1($id)
    {
        return DB::table('scholarship')->where('s_id', $id)->first();
    }
    public function getFacultyDetails($id)
    {
        return DB::table('faculty')->where('FacultyID', $id)->first();
    }
    public function getProgrammeDetails($id)
    {
        return DB::table('programme')->where('ProgrammeID', $id)->first();
    }
    public function getScholarshipDetails($id)
    {
        return DB::table('scholarship')->where('s_id', $id)->first();
    }

}

