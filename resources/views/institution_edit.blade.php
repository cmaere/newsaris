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
				<a href={{route('newinstitution')}}>
					<button class="btn btn-sm btn-white">Add New Institution</button>
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

		
		
	
		<form action="<?php //echo $editFormAction; ?>" method="POST" name="frmInstEdit" id="frmInstEdit" class="form-horizontal">
		 @foreach($campusinfo as $list) 
			<div class="form-group"> <label class="col-sm-2 control-label">Institution</label> 
				<div class="col-sm-10"> <input type="text" name="campus" class="form-control rounded" value={{$list->campus}}> </div> 
			</div> 
			<div class="line line-dashed line-lg pull-in"></div>

			<div class="form-group"> <label class="col-sm-2 control-label">Address</label>  
				<div class="col-sm-10"> 
					<div data-target="#editor" data-role="editor-toolbar" class="btn-toolbar m-b-sm btn-editor"> 
					<textarea name="address" style="overflow:scroll;height:150px;max-height:150px" class="form-control"> {{$list->address}}</textarea> </div>
					</div> 
			</div>
	   	     <div class="line line-dashed line-lg pull-in"></div> 
			<div class="form-group"> <label class="col-sm-2 control-label">Physical Address</label>  
				<div class="col-sm-10"> 
					<div data-target="#editor" data-role="editor-toolbar" class="btn-toolbar m-b-sm btn-editor"> 
					<textarea name="paddress" style="overflow:scroll;height:150px;max-height:150px" class="form-control"> {{$list->location}}</textarea> </div>
					</div> 
			</div>
			 <div class="line line-dashed line-lg pull-in"></div> 
 			<div class="form-group"> <label class="col-sm-2 control-label">Telephone</label> 
 				<div class="col-sm-10"> <input type="text" name="tel" class="form-control rounded" value={{$list->tel}}></div> 
 			</div>
			<div class="line line-dashed line-lg pull-in"></div> 
			
			<div class="form-group"> <label class="col-sm-2 control-label">Email</label> 
				<div class="col-sm-10"> <input type="text" name="email" class="form-control rounded" value={{$list->Email}}>
				<input name="id" type="hidden" id="id" value="{{$list->CampusID}}">
				</div> 
			</div>
			
	    	     	<div class="line line-dashed line-lg pull-in"></div> 
			
    		    	<div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  
	    		    <button class="btn btn-primary" type="submit">Edit Record</button> 
			    <input type="hidden" name="MM_update" value="frmInstEdit">
    	    		</div> 
    	    		 @endforeach;
		</form> 
	</footer>
	</section>
</div>

@endsection
