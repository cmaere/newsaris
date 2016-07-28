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
		<header class="panel-heading">{{$currentpage}} Information</header> 
		<div class="row text-sm wrapper"> 
			<div class="col-sm-5 m-b-xs">
				<a href={{route('newcourse')}}>
					<button class="btn btn-sm btn-white">Add New Course</button>
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

		
		
	
		<form action="{{route('addcourse')}}" method="POST" name="frmInst" id="frmInst" class="form-horizontal"> 
			<div class="form-group"> <label class="col-sm-2 control-label">Course Code</label> 
				<div class="col-sm-8"> <input type="text" name="CourseCode" class="form-control rounded"> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 



			<div class="form-group"> <label class="col-sm-2 control-label">Course Name</label> 
			<div class="col-sm-8"> <input type="text" name="CourseName" class="form-control rounded"> </div> 
			 </div>
			


			<div class="form-group"> <label class="col-sm-2 control-label">Department</label> 
			<div class="col-sm-8"> <input type="text" name="Department" class="form-control rounded"> </div> 
			 </div>
	   	         <div class="line line-dashed line-lg pull-in"></div> 
			 <div class="form-group"> <label class="col-sm-2 control-label">Units</label> 
			 <div class="col-sm-8"> <input type="text" name="Units" class="form-control rounded"> </div> 

			 </div>
			 
	    	     	<div class="line line-dashed line-lg pull-in"></div> 
    		    	<div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  
	    		    <input class="btn btn-primary" type="submit" value="Add Record" name="submit"> 
			   	<input type="hidden" name="_token" value="{{ Session::token() }}">
    	    		</div> 

		</form> 
	</footer>
	</section>
</div>

@endsection
