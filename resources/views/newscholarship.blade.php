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
	<header class="panel-heading">Scholarships Information</header> 
	<div class="row text-sm wrapper"> 
		<div class="col-sm-5 m-b-xs">
			<a href={{route('newprogramme')}}>
				<button class="btn btn-sm btn-white">Add New Scholarship</button>
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
	<header class="panel-heading font-bold"> New Scholarship</header> 
	<div class="panel-body"> 
		<form action="{{route('addscholarship')}}" method="POST" id="frmInstEdit" class="form-horizontal"> 
		@if (count($errors) > 0)
   		<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </ul>
   	 	</div>
   		@endif
			<div class="form-group"> <label class="col-sm-2 control-label">Name of Scholarship</label> 
				<div class="col-sm-10"> <input type="text" name="name_of_scholarship" class="form-control rounded" value=""> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 
			<div class="form-group"> <label class="col-sm-2 control-label">Scholarship Period</label> 
					<div class="col-sm-10"> <input type="text" name="scholarship_period" class="form-control rounded" value=""> </div>
	       		</div>
	       	   	<div class="line line-dashed line-lg pull-in"></div>
	   	     
			 <div class="line line-dashed line-lg pull-in"></div> 
			
    		    	<div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  
	    		  <input class="btn btn-primary" type="submit" value="Add Record" name="submit"> 
			   	<input type="hidden" name="_token" value="{{ Session::token() }}">
    	    		</div> 

		</form> 
	</div> 
	
 	</footer> 

</section>	
</div>

@endsection