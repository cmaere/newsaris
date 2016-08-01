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
	<header class="panel-heading">Course Information</header> 
	<div class="row text-sm wrapper"> 
		<div class="col-sm-5 m-b-xs">
			<a href="{{ route('newcourse') }}">
				<button class="btn btn-sm btn-white">Edit Course</button>
			</a> 
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
	<header class="panel-heading font-bold"> Edit Course </header> 
	<div class="panel-body"> 
		<form action="{{route('course_edited')}}" method="POST" name="frmInstEdit" id="frmInstEdit" class="form-horizontal"> 
		 @foreach($courseinfo as $course) 
			<div class="form-group"> <label class="col-sm-2 control-label">Course Code</label> 
				<div class="col-sm-10"> <input type="text" name="CourseCode" class="form-control rounded" value={{$course->CourseCode}}> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 

			<div class="form-group"> <label class="col-sm-2 control-label">Course Name</label> 
				<div class="col-sm-10"> <input type="text" name="CourseName" class="form-control rounded" value={{$course->CourseName}}> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 
			
			<div class="form-group"> <label class="col-sm-2 control-label">Department</label> 
				<div class="col-sm-10"> <input type="text" name="Department" class="form-control rounded" value={{$course->Department}}> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 
			
			<div class="form-group"> <label class="col-sm-2 control-label">Units</label> 
				<div class="col-sm-10"> <input type="text" name="Units" class="form-control rounded" value={{$course->Units}}>
				<input type="hidden" name="id"  value={{$course->Id}}>	 </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 
			
			
			
    		    	<div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  
	    		    <button class="btn btn-primary" type="submit" name="submit">Update Record</button> 
					 <input type="hidden" name="_token" value="{{ Session::token() }}">
    	    		</div> 
    	     @endforeach;	
    	     </div>	
		</form>  
	</div> 
</section>
</section>	
</div>
@endsection
