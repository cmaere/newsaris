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
		<header class="panel-heading">Department Information</header> 
		<div class="row text-sm wrapper"> 
			<div class="col-sm-5 m-b-xs">
				<a href="{LINK}">
					<button class="btn btn-sm btn-white">ADD NEW DEPARTMENT</button>
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
		
		
		<form name="listform" id="listform">
		<div class="table-responsive"> 
			<table class="table table-striped b-t text-sm"> 
				<thead> 
					<tr> 
					
						<th width="20"><input type="checkbox"></th> 
						<!-- BEGIN columns -->
						<th >Department</th> 
						<th >Location</th>
						<th >Hod</th>
						<th >Address </th>
						<th >Telephone </th>
						<th >Email Address</th>
						
						<!-- END columns -->
					
						<th>Edit</th> 
					</tr> 
					
				</thead> 
				<tbody> 
				
				@foreach($department as $list)
					
					   <tr> <td {OPTIONS}><input type='checkbox' value='{ID}' name='checkbox[]'> </td> 
					   
						    <td>{{$list->DeptName}} </td> {{$list->DeptPhysAdd}}</td>  <td>{{$list->DeptHead}} </td>  <td>{{$list->DeptAddress}} </td> <td>{{$list->DeptTel}} </td> <td>{{$list->DeptEmail}} </td></tr>
                           @endforeach
					<!-- BEGIN row -->
					<tr> 
						<!-- BEGIN id -->
						<td><input type='checkbox' value='{ID}' name='checkbox[]'></td> 
						<!-- END id --> 
						
						<!-- BEGIN innercolumns -->
						<td>{ROWDATA}</td>   
						<!-- END innercolumns --> 
						<!-- BEGIN edit -->
						<td> 
						<a  class='active' href='{ID}'>
							<i class='fa fa-pencil text-success text-active'></i>
							</a> 
						</td> 
						<!-- END edit -->
					
					
					</tr> 
					<!-- END row -->
				
				
				</tbody> 
			</table> 
		</div> 
		<footer class="panel-footer"> 
			<div class="row"> 
				<div class="col-sm-4 hidden-xs">
					<!-- BEGIN delete -->
					 <select class="input-sm form-control input-s-sm inline"> 
					 	<option value="0">Bulk action</option> 
					 	<option value="1" onClick=" delete_records('{FORM}');">Delete selected</option> 
						 <option value="3">Export</option> 
				 	</select> 
					<!-- END delete -->
				
			 	</div> 
				<!-- BEGIN pagenumstat -->
			 	<div class="col-sm-4 text-center"> 
				 	<small class="text-muted inline m-t-sm m-b-sm">
					 	{PAGENUMSTATUS}
					 </small> 
			 	</div> 
				<!-- END pagenumstat -->
			 	<div class="col-sm-4 text-right text-center-xs"> 
					 <ul class="pagination pagination-sm m-t-none m-b-none"> 
						<!-- BEGIN back -->
						<li class='{CLASS}'><a href='{LINK}'><i class='fa fa-chevron-left'></i></a></li>
						<!-- END back -->
					
					       <!-- BEGIN pages -->				       	 
					       <li><a href="{LINK}">{PAGES}</a></li>
					       	<!-- END pages -->		
						<!-- BEGIN active -->
						<li class='active'><a href='#'>{ACTIVEPAGE}</a></li>	
						<!-- END active -->
					
						<!-- BEGIN pagesfront -->
						<li><a href="{LINK}">{FRONTPAGES}</a></li>
					
						<!-- END pagesfront -->
						<!-- BEGIN front -->
					
						<li class='{CLASS}'><a href='{LINK}'><i class='fa fa-chevron-right'></i></a></li>
					 	<!-- END front -->
				 	
				 	</ul> 
				 </div> 
			 </div>
		</footer>
			 </form>
			  
			  
	</section>
	</div>

@endsection


