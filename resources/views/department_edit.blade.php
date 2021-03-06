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
	<!--			<a href={{route('newdepartment')}}>
					<button class="btn btn-sm btn-white">Edit Department</button>
				</a>    

	-->			
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

		
		
	
		<form action="{{route('department_edited')}}" method="POST" name="frmInst" id="frmInst" class="form-horizontal"> 
			
@foreach($departmentinfo as $department)
			<div class="form-group"> <label class="col-sm-2 control-label">Department Name</label> 
				<div class="col-sm-8"> <input type="text" name="departmentname" class="form-control rounded" value="{{$department->DeptName}}"> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 



			<div class="form-group"> <label class="col-sm-2 control-label">Head of Department</label> 
			<div class="col-sm-8"> <input type="text" name="Hod" class="form-control rounded" value="{{$department->DeptHead}}"> </div> 
			 </div>
			


			<div class="form-group"> <label class="col-sm-2 control-label">Address</label> 
			<div class="col-sm-8"> <input type="text" name="address" class="form-control rounded" value="{{$department->DeptAddress}}"> </div> 
			 </div>
	   	         <div class="line line-dashed line-lg pull-in"></div> 
			 <div class="form-group"> <label class="col-sm-2 control-label">Physical Address</label> 
			 <div class="col-sm-8"> <input type="text" name="paddress" class="form-control rounded" value="{{$department->DeptPhysAdd}}"> </div> 

			 </div>
			 <div class="line line-dashed line-lg pull-in"></div> 
 			<div class="form-group"> <label class="col-sm-2 control-label">Telephone</label> 
 				<div class="col-sm-8"> <input type="text" name="tel" class="form-control rounded" value="{{$department->DeptTel}}"> </div> 
 			</div>
			<div class="line line-dashed line-lg pull-in"></div> 
			<div class="form-group"> <label class="col-sm-2 control-label">Email</label> 
				<div class="col-sm-8"> <input type="text" name="email" class="form-control rounded" value="{{$department->DeptEmail}}"> </div> 
			</div>
	    	     	<div class="line line-dashed line-lg pull-in"></div> 
    		    	<div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  
	    		    <input class="btn btn-primary" type="submit" value="Update Record" name="submit"> 
	    		    <input type="hidden" name="id" class="form-control rounded" value="{{$department->DeptID}}">
			   	<input type="hidden" name="_token" value="{{ Session::token() }}">
    	    		</div> 
@endforeach;
		</form> 
	</footer>
	</section>
</div>

@endsection
