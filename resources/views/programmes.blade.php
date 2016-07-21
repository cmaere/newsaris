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
			<a href={{route('newprogramme')}}>
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
	<!-- END heading-->	
	<form name="listform" id="listform" action="{{route('programme_delete')}}" method="POST">
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
					<td><input type='checkbox' value='{{$programme->ProgrammeID}}' name='checkbox[]'></td> 
					<td>{{$programme->ProgrammeCode}}</td> 
					<td>{{$programme->ProgrammeName}}</td>   
					<td>{{$programme->Faculty}}</td>    
					<td> 
					<a  class='active' href="{{ route('programme_edit', ['id'=>$programme->ProgrammeID])}}">
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
				
				 <select class="input-sm form-control input-s-sm inline" id="choose" > 
				 	<option value="0">Bulk action</option> 
				 	<option value="1" >Delete selected</option> 
					 <option value="3">Export</option> 
			 	</select> 
				<input type="hidden" name="_token" value="{{ Session::token() }}">
				
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('scripts/jquery-1.8.2.min.js')}}"></script>


 <script type="text/javascript">

  jQuery(function() {
    jQuery('#choose').change(function() {
        this.form.submit();
    });
});
</script>

@endsection