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
		
		
		<form name="listform" id="listform" action="{{route('institution_delete')}}" method="POST">
		<div class="table-responsive"> 
			<table class="table table-striped b-t text-sm"> 
				<thead> 
					<tr> 
					
						<th width="20"><input type="checkbox"></th> 
						<!-- BEGIN columns -->
						<th {OPTIONS}>Campus
						</th> 
						<th {OPTIONS}>Location
						</th> 
						<th {OPTIONS}>Address
						</th> 
						<th {OPTIONS}>Tel
						</th> 
						<th {OPTIONS}>Email
						</th> 
						<!-- END columns -->
					
						<th>Edit</th> 
					</tr> 
				</thead> 
				<tbody> 
				
				 @foreach($campusinfo as $list)
				 <tr>
				 		<!-- BEGIN id -->
						<td><input type='checkbox' value='{{$list->CampusID}}' name='checkbox[]'></td> 
						<!-- END id --> 
						<!-- BEGIN innercolumns -->
						
						
					
					
							<td>
								{{$list->campus}}
							</td>
							<td>
								{{$list->location}}
							</td>
							<td>
								{{$list->address}}
							</td>
							<td>
								{{$list->tel}}
							</td>
							<td>
								{{$list->Email}}
							</td>


							
								
								<!-- BEGIN edit -->
						<td> 
						<a  class='active' href="{{ route('institution_edit', ['id'=>$list->CampusID])}}">
							<i class='fa fa-pencil text-success text-active'></i>
							</a> 
						</td>							
					</tr>
							@endforeach
					<!-- END row -->
				
				
				</tbody> 
			</table> 
		</div> 
		<footer class="panel-footer"> 
			<div class="row"> 
				<div class="col-sm-4 hidden-xs">
					<!-- BEGIN delete -->
					 <select class="input-sm form-control input-s-sm inline" id="choose" > 
					 	<option value="0">Bulk action</option> 
					 	<option value="1" >Delete selected</option> 
						 <option value="3">Export</option> 
				 	</select> 
				 	<input type="hidden" name="_token" value="{{ Session::token() }}">
					<!-- END delete --> 
				<!-- <input class="btn btn-primary" type="submit" value="delete selected" name="submit"> 
			   	<input type="hidden" name="_token" value="{{ Session::token() }}">
				-->
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


