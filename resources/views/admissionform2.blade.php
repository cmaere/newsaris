@extends('layouts.layout')

@section('title', 'Student Academic Record Information System')
@section('welcomemessage', $welcomemessage)
@section('loginname', $loginname)

@section('sidebar')

@include('layouts.menu', array('chasections' => $chasections, 'x' => $x))

@endsection

@section('breadcrumb')

@include('layouts.breadcrumb', array('currentpage' => $currentpage))

@endsection



@section('content')
<div class="col-lg-8">  
<section class="panel"> 
  <!-- BEGIN heading-->
  <header class="panel-heading">Student admission</header> 
  <div class="row text-sm wrapper"> 
    <div class="col-sm-9 m-b-xs">
      <form action="{{ route('uploadfile')}}" method="POST" enctype="multipart/form-data" >
        <label style="font-size:16px;">Upload admission file 
        <input type="file" class="btn btn-default btn-file" name="adm_file"></label>
    </div>  
    <div class="col-sm-3"> 
      <div class="input-group"> 
        <input type="submit" name="upload" class="btn btn-default" value="Submit">
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </form> 
      </div> 
    </div> 
  </div> 
  <!-- END heading-->
<section class="panel"> 
  <header class="panel-heading font-bold"> New Student </header> 
  <div class="panel-body"> 
  <form  class="form-horizontal">
     <fieldset>
    <legend>Personal Information</legend>
     <div class="form-group">
      <label for="surname" class="col-lg-3 control-label">Surname</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="surname" placeholder="enter surname">
      </div>
    </div>
    
    <div class="form-group">
      <label for="middlename" class="col-lg-3 control-label">Middle Name</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="middlename" placeholder="enter middlename">
      </div>
    </div>
    
    <div class="form-group">
      <label for="firstname" class="col-lg-3 control-label">First Name</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="middlename" placeholder="enter first name">
      </div>
    </div>
    
    <div class="form-group">
      <label for="sex" class="col-lg-3 control-label">Sex</label>
      <div class="col-lg-7">
        <select class="form-control" id="sex">
          <option>1</option>
          <option>2</option>
        </select>
      </div>  
    </div> 
    
    <div class="form-group">
      <label for="dob" class="col-lg-3 control-label">Date of Birth</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="middlename" placeholder="">
      </div>
    </div>
    
    <div class="form-group">
      <label for="homedistrict" class="col-lg-3 control-label">Home District</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="middlename" placeholder="enter home district">
      </div>
    </div>
    
    <div class="form-group">
      <label for="t/a" class="col-lg-3 control-label">T/A</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="middlename" placeholder="enter traditional authority">
      </div>
    </div>
    
    <div class="form-group">
      <label for="homevillage" class="col-lg-3 control-label">Home Village</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="middlename" placeholder="enter home village">
      </div>
    </div>
    
    <div class="form-group">
      <label for="nationality" class="col-lg-3 control-label">Nationality</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="middlename" placeholder="enter nationality">
      </div>
    </div>
    
    <div class="form-group">
      <label for="studentstatus" class="col-lg-3 control-label">Student Status</label>
      <div class="col-lg-7">
        <select class="form-control" id="studentstatus">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div> 
    
     <div class="form-group">
      <label for="religion" class="col-lg-3 control-label">Religion</label>
      <div class="col-lg-7">
        <select class="form-control" id="religion">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div> 
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Marital Status</label>
      <div class="col-lg-7">
        <select class="form-control" id="maritalstatus">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>  
    </div> 
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Disability</label>
      <div class="col-lg-7">
        <select class="form-control" id="disability">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div> 
      
    <div class="form-group">
      <label for="permanent address" class="col-lg-3 control-label">Permanent Address</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="admissionnumber" placeholder="enter permanent address">
      </div>
    </div>
    
    <div class="form-group">
      <label for="currentaddress" class="col-lg-3 control-label">Current Address</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="currentaddress" placeholder="enter current address">
      </div>
    </div>
      
   <div class="form-group">
      <label for="phone" class="col-lg-3 control-label">Phone</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="phone" placeholder="enter phone number">
      </div>
    </div>
   
   <div class="form-group">
      <label for="email" class="col-lg-3 control-label">Email</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="email" placeholder="enter Email address">
      </div>
    </div>
   
   <div class="form-group">
      <label for="bank" class="col-lg-3 control-label">Name of Bank</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="phone" placeholder="enter name of bank">
      </div>
    </div>
    
    <div class="form-group">
      <label for="bankbranch" class="col-lg-3 control-label">Bank Branch </label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="phone" placeholder="enter branch where account held">
      </div>
    </div>
    
    <div class="form-group">
      <label for="accnumber" class="col-lg-3 control-label">Account Number</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="accnumber" placeholder="enter student's account number">
      </div>
    </div>
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Program Registered</label>
      <div class="col-lg-7">
        <select class="form-control" id="program">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div> 
    
    <div class="form-group">
      <label for="graduationdate" class="col-lg-3 control-label">Graduation Date</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="graduationdate" placeholder="Graduation Date">
  
      </div>
    </div>
    
      <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Faculty</label>
      <div class="col-lg-7">
        <select class="form-control" id="faculty">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div> 
    
     <div class="form-group">
      <label for="sponsorship" class="col-lg-3 control-label">Sponsorship</label>
      <div class="col-lg-7">
        <select class="form-control" id="sponsorship">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div> 
    
     <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Level of Study</label>
      <div class="col-lg-7">
        <select class="form-control" id="levelofstudy">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div>  
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Manner of Entry</label>
      <div class="col-lg-7">
        <select class="form-control" id="mannerofentry">
          <option>option 1</option>
          <option>option 2</option>
          <option>option 3</option>
        </select> 
      </div>
    </div> 
 </fieldset>
</form>
  </div> 
</section>
</section>  
</div>
@endsection
