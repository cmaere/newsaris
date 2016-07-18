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
  <header class="panel-heading">New Account</header> 
  <div class="row text-sm wrapper"> 
		<div class="col-sm-5 m-b-xs">
		</div> 
		<div class="col-sm-4 m-b-xs"> </div> 
		<div class="col-sm-3"> 
			<div class="input-group"> 
				<input type="text" placeholder="Search" class="input-sm form-control"> 
				<span class="input-group-btn"> 
					<button type="button" class="btn btn-sm btn-white">Go!</button> 
				</span> 
			</div> 
		</div> 
	</div>
  
  <!-- END heading-->
<section class="panel"> 
  <header class="panel-heading font-bold"> Create Account </header> 
  <div class="panel-body"> 
    <form class="form-horizontal" action="{{ route('createaccount')}}" method="POST">
  <fieldset>
    <legend>Create User Account</legend>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('failure'))
      <div class="alert alert-danger">
        {{ session('failure') }}
      </div>
  	@endif
  	@if (session('success'))
      <div class="alert alert-danger">
        {{ session('success') }}
      </div>
  	@endif
    <div class="form-group">
      <label for="lastname" class="col-lg-3 control-label">Last Name</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="lastname" placeholder="enter last name in CAPS (e.g. LASTNAME)" name="lastname" value="{{old('lastname')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="firstname" class="col-lg-3 control-label">First Name</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="firstname" placeholder="enter first name, capitalize first letter (e.g. Firstname)" name="firstname" value="{{old('firstname')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="dob" class="col-lg-3 control-label">Date of Birth</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="dob" placeholder="select your date of birth (dd-mm-yyyy)" name="dateofbirth" value="{{old('dateofbirth')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="regnum" class="col-lg-3 control-label">Registration Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="regnum" placeholder="enter registration number" name="registrationnumber" value="{{old('registrationnumber')}}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="position" class="col-lg-3 control-label">Position</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="position" name="position">
          @foreach($positions as $position)
          	<option value="{{$position->privilegeID}}">{{$position->privilegename}}</option>
          @endforeach
        </select>
      </div>
      </div>
      
      <div class="form-group">
      <label for="username" class="col-lg-3 control-label">Username</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="username" placeholder="enter your username (format: flastname)" name="username" value="{{old('usename')}}">
      </div>
    </div>   
    
    <div class="form-group">
      <label for="password" class="col-lg-3 control-label">Password</label>
      <div class="col-lg-8">
        <input type="password" class="form-control rounded" id="password" placeholder="enter password" name="password" value="{{old('password')}}">
        <span class="has_error"></span>
      </div>
    </div>
    
    <div class="form-group">
      <label for="confirmpassword" class="col-lg-3 control-label">Confirm Password</label>
      <div class="col-lg-8">
        <input type="password" class="form-control rounded" id="confirmpassword" placeholder="re-enter your password" name="confirmpassword" value="{{old('confirmpassword')}}">
        <span class="has_error""></span>
      </div>
    </div>
     

<div class="form-group">
      <label for="email" class="col-lg-3 control-label">Email</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="email" placeholder="enter email" name="email" value="{{old('email')}}">
      </div>
</div>
<div class="form-group">
      <div class="col-lg-8 col-lg-offset-3">
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </div>
</div>
  </fieldset>
</form>
  </div> 
</section>
</section>  
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('scripts/jquery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('scripts/verifypassword.js')}}"></script>
@endsection