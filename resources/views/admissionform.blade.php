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
			<form action="{{ route('uploadfile')}}" method="POST" enctype="multipart/form-data">
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
		<form class="form-horizontal" action="{{route('page1')}}" method="POST">
  <fieldset>
    <legend>Study Programme Information</legend>
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Year of Study</label>
      <div class="col-lg-7">
        <select class="form-control" id="yearofstudy">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>  
    </div> 
      
    <div class="form-group">
      <label for="admissionnumber" class="col-lg-3 control-label">Admission Number</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="admissionnumber" placeholder="Admission Number">
      </div>
    </div>
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Campus</label>
      <div class="col-lg-7">
        <select class="form-control" id="campus">
          <option>Lilongwe Campus</option>
          <option>Blantyre Canpus</option>
          <option>Kameza Campus</option>
        </select> 
      </div>
    </div> 
      
    <div class="form-group">
      <label for="registrationnumber" class="col-lg-3 control-label">Registration Number</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" id="registrationnumber" placeholder="Registration Number">
  
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
    <div class="form-group">
      <div class="col-lg-3"></div>
      <div class="col-lg-7">
        <input type="submit" name="studentinfo" value="Next" class="btn btn-primary"> 
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </div>
    </div>
 </fieldset>
</form>
	</div> 
</section>
</section>	
</div>
@endsection
