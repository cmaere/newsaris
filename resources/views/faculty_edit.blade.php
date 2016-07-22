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
	<header class="panel-heading">Faculty Information</header> 
	<div class="row text-sm wrapper"> 
		<div class="col-sm-5 m-b-xs">
			<a href="{{ route('newfaculty') }}">
				<button class="btn btn-sm btn-white">Edit Faculty</button>
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
	<header class="panel-heading font-bold"> Edit Faculty </header> 
	<div class="panel-body"> 
		<form action="{{route('faculty_edited')}}" method="POST" name="frmInst" id="frmInst" class="form-horizontal"> 
		@foreach($faculties as $faculty)
			<div class="form-group"> <label class="col-sm-2 control-label">Faculty</label> 
				<div class="col-sm-10"> <input type="text" name="faculty" class="form-control rounded" value="{{$faculty->FacultyName}}"> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div> 
			<div class="form-group"> <label class="col-sm-2 control-label">Address</label> 
			 			
<div class="col-sm-10"> 
	<div data-target="#editor" data-role="editor-toolbar" class="btn-toolbar m-b-sm btn-editor"> 
		<textarea name="address" style="overflow:scroll;height:150px;max-height:150px" class="form-control">{{$faculty->Address}} </textarea> </div>
	</div> 
			 </div>
	   	         <div class="line line-dashed line-lg pull-in"></div> 
			 <div class="form-group"> <label class="col-sm-2 control-label">Physical Address</label> 
			 			
<div class="col-sm-10"> 
	<div data-target="#editor" data-role="editor-toolbar" class="btn-toolbar m-b-sm btn-editor"> 
		<textarea name="location" style="overflow:scroll;height:150px;max-height:150px" class="form-control">{{$faculty->Location}} </textarea> </div>
	</div> 
			 </div>
			 <div class="line line-dashed line-lg pull-in"></div> 
 			<div class="form-group"> <label class="col-sm-2 control-label">Telephone</label> 
 				<div class="col-sm-10"> <input type="text" name="tel" class="form-control rounded" value="{{$faculty->Tel}}"
 				> </div> 
 			</div>
			<div class="line line-dashed line-lg pull-in"></div> 
			<div class="form-group"> <label class="col-sm-2 control-label">Email</label> 
				<div class="col-sm-10"> <input type="text" name="email" class="form-control rounded" value="{{$faculty->Email}}"> </div>
				 <input type="hidden" name="id" value="{{$faculty->FacultyID}}"> 
			</div>
	    	     	<div class="line line-dashed line-lg pull-in"></div> 
    		    	<div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  
	    		    <input class="btn btn-primary" type="submit" value="Edit Record" name="submit"> 
			    <input type="hidden" value="{{ Session::token() }}" name="_token">
    	    		</div> 
    	     @endforeach;		
		</form> 
	</div> 
</section>
</section>	
</div>
@endsection
