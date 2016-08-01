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
  <header class="panel-heading font-bold"> New Student </header> 
  <div class="panel-body"> 
  <form class="form-horizontal" action="{{route('nextedit1', ['id' => $student->Id])}}" method="POST">
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
        <input type="text" class="form-control rounded" id="surname" name="lastname" value="{{$lastname}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="middlename" class="col-lg-3 control-label">Middle Name</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" name="middlename" value="">
      </div>
    </div>
    
    <div class="form-group">
      <label for="firstname" class="col-lg-3 control-label">First Name</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" name="firstname" value="{{$firstname}}">
      </div>
    </div>

    <div class="form-group">
      <label for="sex" class="col-lg-3 control-label">Sex</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="sex" name="sex">
          <option value="{{$student->sexid}}">{{$student->Sex}}</option>
          @foreach($gender as $sex)
            <option value="{{$sex->sexid}}">{{$sex->sex}}</option>
          @endforeach
        </select>
      </div>  
    </div>
    
    <div class="form-group">
      <label for="dob" class="col-lg-3 control-label">Date of Birth</label>
      <div class="col-lg-8">
        <input type="date" class="form-control rounded" id="dateofbirth" name="dateofbirth" value="{{$student->DBirth}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="homedistrict" class="col-lg-3 control-label">Home District</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="homedistrict" name="homedistrict" value="{{$student->District}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="t/a" class="col-lg-3 control-label">T/A</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" name="ta" value="{{$student->TradAuthority}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="homevillage" class="col-lg-3 control-label">Home Village</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" name="homevillage" value="{{$student->Village}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="nationality" class="col-lg-3 control-label">Nationality</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="middlename" name="nationality" value="{{$student->Nationality}}">
      </div>
    </div>

    <div class="form-group">
      <label for="studentstatus" class="col-lg-3 control-label">Student Status</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="studentstatus" name="studentstatus">
            <option value="{{$student->StatusID}}">{{$student->Status}}</option>
              @foreach($status as $stustatus)
                <option value="{{$stustatus->StatusID}}">{{$stustatus->Status}}</option>
              @endforeach
            </select>
        </div>
      </div> 

      <div class="form-group">
      <label for="religion" class="col-lg-3 control-label">Religion</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="religion" name="religion">
            <option value="{{$student->ReligionID}}">{{$student->Religion}}</option>
              @foreach($religions as $religion)
                <option value="{{$religion->ReligionID}}">{{$religion->Religion}}</option>
              @endforeach
            </select>
        </div>
      </div>

      <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Marital Status</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="maritalstatus" name="marital">
          <option value="{{$student->maritalStatusID}}">{{$student->MaritalStatus}}</option>
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
          <option value="{{$student->DisabilityCode}}">{{$student->disabilityCategory}}</option>
          @foreach($disabilities as $disability)
            <option value="{{$disability->DisabilityCode}}">{{$disability->disability}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
      
    <div class="form-group">
      <label for="permanent address" class="col-lg-3 control-label">Permanent Address</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="admissionnumber" name="permanentaddress" value="{{$student->paddress}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="currentaddress" class="col-lg-3 control-label">Current Address</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="currentaddress" name="currentaddress" value="{{$student->currentaddress}}">
      </div>
    </div>
      
   <div class="form-group">
      <label for="phone" class="col-lg-3 control-label">Phone</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="phone" name="phone" value="{{$student->Phone}}">
      </div>
    </div>
   
   <div class="form-group">
      <label for="email" class="col-lg-3 control-label">Email</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="email" name="email" value="{{$student->Email}}">
      </div>
    </div>
   
   <div class="form-group">
      <label for="bank" class="col-lg-3 control-label">Name of Bank</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="phone" name="bankname" value="{{$student->bank_name}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="bankbranch" class="col-lg-3 control-label">Bank Branch </label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="phone" name="bankbranch" value="{{$student->bank_branch_name}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="accnumber" class="col-lg-3 control-label">Account Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="accnumber" name="bankaccount" value="{{$student->account_number}}">
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

</div>
@endsection
