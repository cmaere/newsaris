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
  </div> 
  <!-- END heading-->
<section class="panel"> 
  <header class="panel-heading font-bold"> Edit Student </header> 
  <div class="panel-body"> 
  <form class="form-horizontal" action="{{route('updatestudent', ['id' => $student->Id])}}" method="POST">
    <fieldset>
      <legend>Information About Parents/Guardian (If Applicable)</legend>
        <div class="form-group">
          <label for="parentname" class="col-lg-3 control-label">Parent Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" name="pname" value="{{$student->kin}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="relationship" class="col-lg-3 control-label">Relationship</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" name="relationship" value="{{$student->kin_relationship}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentoccupation" class="col-lg-3 control-label">Parent's Occupation</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" name="occupation" value="{{$student->ParentOccupation}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentaddress" class="col-lg-3 control-label">Parent/Guardian's Address </label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" name="paddress" value="{{$student->kin_address}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentemail" class="col-lg-3 control-label">Parent/Guardian's' Email</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" name="pemail" value="{{$student->kin_email}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentphone" class="col-lg-3 control-label">Parent/Guardian's Phone</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" name="parphone" value="{{$student->kin_phone}}">
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>Entry Qualifications Information</legend>
      <div class="form-group">
        <label for="secschool" class="col-lg-3 control-label">Secondary School Name</label>
        <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="accnumber" name="schname" value="{{$student->form7name}}" readonly="readonly">
      </div>
    </div>
    
    <div class="form-group">
      <label for="examnumber" class="col-lg-3 control-label">Examination Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="accnumber" name="examnum" value="{{$student->form7no}}" readonly="readonly">
      </div>
    </div>
    
    <div class="form-group">
      <label for="seccompleted" class="col-lg-3 control-label">Year Completed</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="seccompleted" name="yearcompleted" value="{{$student->f7year}}" readonly="readonly"> 
      </div>
    </div> 
    </fieldset>
    <div class="form-group">
      <div class="col-lg-3"></div>
      <div class="col-lg-8">
      <a href="{{URL::previous('/Policy/EditStudent/2')}}" class="btn btn-white col-sm-4">Previous</a>
        <input type="submit" name="otherinfo" value="Submit" class="btn btn-primary col-sm-4 col-sm-offset-1"> 
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </div>
    </div>
</form>
  </div> 
</section>
</section>  
</div>
</body>
</html>
@endsection