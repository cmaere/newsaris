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
    <div class="col-sm-12 m-b-xs">
      @include('includes.uploadfile') 
    </div> 
  </div> 
  <!-- END heading-->
<section class="panel"> 
  <header class="panel-heading font-bold"> New Student </header> 
  <div class="panel-body"> 
  <form class="form-horizontal" action="{{ route('submitAdmissionForm')}}" method="POST">
    <fieldset>
      <legend>Information About Parents/Guardian (If Applicable)</legend>
        <div class="form-group">
          <label for="parentname" class="col-lg-3 control-label">Parent Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter parent/guardian's name" name="pname" value="{{old('pname')}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="relationship" class="col-lg-3 control-label">Relationship</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter relationship to student" name="relationship" value="{{old('relationship')}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentoccupation" class="col-lg-3 control-label">Parent's Occupation</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter parent/guardian's occupation" name="occupation" value="{{old('occupation')}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentaddress" class="col-lg-3 control-label">Parent/Guardian's Address </label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter parent/guardian's address" name="paddress" value="{{old('paddress')}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentemail" class="col-lg-3 control-label">Parent/Guardian's' Email</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" placeholder="enter parent/guardian's email" name="pemail" value="{{old('pemail')}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentphone" class="col-lg-3 control-label">Parent/Guardian's Phone</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" placeholder="enter parent/guardian's phone" name="parphone" value="{{old('parphone')}}">
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>Entry Qualifications Information</legend>
      <div class="form-group">
        <label for="secschool" class="col-lg-3 control-label">Secondary School Name</label>
        <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="accnumber" placeholder="enter secondary school" name="schname" value="{{old('schname')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="examnumber" class="col-lg-3 control-label">Examination Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="accnumber" placeholder="enter student's examination number" name="examnum" value="{{old('examnum')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="seccompleted" class="col-lg-3 control-label">Year Completed</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="seccompleted" name="yearcompleted" value="{{old('yearcompleted')}}"> 
      </div>
    </div> 
    </fieldset>
    <div class="form-group">
      <div class="col-lg-3"></div>
      <div class="col-lg-8">
      <a href="" class="btn btn-white col-sm-4">Previous</a>
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