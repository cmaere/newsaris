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
  <form  class="form-horizontal" action="{{route('page2')}}" method="POST">
     <fieldset>
    <legend>Personal Information</legend>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </ul>
    </div>
    @endif
     <div class="form-group">
      <label for="surname" class="col-lg-3 control-label">Surname</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="surname" placeholder="Enter surname" name="lastname" value="{{old('lastname')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="middlename" class="col-lg-3 control-label">Middle Name</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" placeholder="Enter middlename" name="middlename" value="{{old('middlename')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="firstname" class="col-lg-3 control-label">First Name</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" placeholder="Enter first name" name="firstname" value="{{old('firstname')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="sex" class="col-lg-3 control-label">Sex</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="sex" name="sex">
          @foreach($gender as $sex)
            <option value="{{$sex->sexid}}">{{$sex->sex}}</option>
          @endforeach
        </select>
      </div>  
    </div> 
    
    <div class="form-group">
      <label for="dob" class="col-lg-3 control-label">Date of Birth</label>
      <div class="col-lg-8">
        <input type="date" class="form-control rounded" id="middlename" placeholder="YYYY-MM-DD" name="dateofbirth" value="{{old('dateofbirth')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="homedistrict" class="col-lg-3 control-label">Home District</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" placeholder="Enter home district" name="homedistrict" value="{{old('homedistrict')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="t/a" class="col-lg-3 control-label">T/A</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" placeholder="Enter traditional authority" name="ta" value="{{old('ta')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="homevillage" class="col-lg-3 control-label">Home Village</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" placeholder="Enter home village" name="homevillage" value="{{old('homedistrict')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="nationality" class="col-lg-3 control-label">Nationality</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" placeholder="Enter nationality" name="nationality" value="{{old('nationality')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="studentstatus" class="col-lg-3 control-label">Student Status</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="studentstatus" name="studentstatus">
          @foreach($studentstatus as $status)
            <option value="{{$status->StatusID}}">{{$status->Status}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
    
     <div class="form-group">
      <label for="religion" class="col-lg-3 control-label">Religion</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="religion" name="religion">
          @foreach($religion as $relig)
            <option value="{{$relig->ReligionID}}">{{$relig->Religion}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Marital Status</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="maritalstatus" name="marital">
          @foreach($maritalstatus as $marital)
            <option value="{{$marital->intStatusID}}">{{$marital->szStatus}}</option>
          @endforeach
        </select>
      </div>  
    </div> 
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Disability</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="disability" name="disability">
          <option>--none--</option>
          @foreach($disabilities as $disability)
            <option value="{{$disability->DisabilityCode}}">{{$disability->disability}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
      
    <div class="form-group">
      <label for="permanent address" class="col-lg-3 control-label">Permanent Address</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="admissionnumber" placeholder="Enter permanent address" name="permanentaddress" value="{{old('permanentaddress')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="currentaddress" class="col-lg-3 control-label">Current Address</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="currentaddress" placeholder="Enter current address" name="currentaddress" value="{{old('currentaddress')}}">
      </div>
    </div>
      
   <div class="form-group">
      <label for="phone" class="col-lg-3 control-label">Phone</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="phone" placeholder="Enter phone number" name="phone" value="{{old('phone')}}">
      </div>
    </div>
   
   <div class="form-group">
      <label for="email" class="col-lg-3 control-label">Email</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="email" placeholder="Enter Email address" name="email" value="{{old('email')}}">
      </div>
    </div>
   
   <div class="form-group">
      <label for="bank" class="col-lg-3 control-label">Name of Bank</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="phone" placeholder="Enter name of bank" name="bankname" value="{{old('bankname')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="bankbranch" class="col-lg-3 control-label">Bank Branch </label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="phone" placeholder="Enter branch where account held" name="bankbranch" value="{{old('bankbranch')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="accnumber" class="col-lg-3 control-label">Account Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="accnumber" placeholder="Enter student's account number" name="bankaccount" value="{{old('bankaccount')}}">
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-3"></div>
      <div class="col-lg-8">
        <a href="" class="btn btn-white col-sm-4">Previous</a>
        <input type="submit" name="personalinfo" value="Next" class="btn btn-primary col-sm-4 col-sm-offset-1"> 
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
