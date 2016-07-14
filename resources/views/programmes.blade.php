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
	<header class="panel-heading">Programmes Information</header> 
	<div class="row text-sm wrapper"> 
		<div class="col-sm-5 m-b-xs">
			<a href="./?page=Institution&section=Policy&new=1">
				<button class="btn btn-sm btn-white">Add New Programmes</button>
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
	<!-- END heading-->	<form name="listform" id="listform">
	<div class="table-responsive"> 
		<table class="table table-striped b-t text-sm"> 
			<thead> 
				<tr> 				
					<th width="20"><input type="checkbox"></th> 
					<th data-toggle='class' class='th-sortable'>Programme Code 
						<span class='th-sort'><i class='fa fa-sort-down text'></i> <i class='fa fa-sort-up text-active'></i> <i class='fa fa-sort'></i> </span> 
					</th> 
					<th >Degree </th> 
					
					<th >Faculty </th> 
					
					<th>Edit</th> 
				</tr> 
			</thead> 
			<tbody> 
				@foreach($programmes as $programme)
				<tr> 
					<td><input type='checkbox' value='13' name='checkbox[]'></td> 
					<td>{{$programme->ProgrammeCode}}</td> 
					<td>{{$programme->ProgrammeName}}</td>   
					<td>{{$programme->Faculty}}</td>    
					<td> 
					<a  class='active' href='./?page=Institution&section=Policy&edit=13'>
						<i class='fa fa-pencil text-success text-active'></i>
						</a> 
					</td> 
					
					
					
				</tr> 
				@endforeach 
				
			</tbody> 
		</table> 
	</div> 
	<footer class="panel-footer"> 
		<div class="row"> 
			<div class="col-sm-4 hidden-xs">
				
				 <select class="input-sm form-control input-s-sm inline"> 
				 	<option value="0">Bulk action</option> 
				 	<option value="1" onClick=" delete_records('/dev/saris_dev/index.php?page=Institution&amp;section=Policy');">Delete selected</option> 
					 <option value="3">Export</option> 
			 	</select> 
				
				
		 	</div> 
			
		 	<div class="col-sm-4 text-center"> 
			 	<small class="text-muted inline m-t-sm m-b-sm">
				 	showing 1 - 4 of 4 items
				 </small> 
		 	</div> 
			
		 	<div class="col-sm-4 text-right text-center-xs"> 
				 <ul class="pagination pagination-sm m-t-none m-b-none"> 
					
					<li class='disabled'><a href='#'><i class='fa fa-chevron-left'></i></a></li>
					
					
				       		
					
					<li class='active'><a href='#'>1</a></li>	
					
					
					
					
					
					<li class='disabled'><a href='#'><i class='fa fa-chevron-right'></i></a></li>
				 	
				 	
			 	</ul> 
			 </div> 
		 </div>
		  </form> 
 	</footer> 

</section>	
</div>

@endsection