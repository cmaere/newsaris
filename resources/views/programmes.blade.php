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
	<form name="listform" id="listform" action="{{route('chooseaction5')}}" method="POST">
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
				
				<select class="input-sm form-control input-s-sm inline" id="choose" name="choice"> 
				 	<option value="0">Bulk action</option> 
				 	<option value="1">Delete selected</option> 
					<option value="2" data-toggle="modal" data-target="#export">Export</option> 
			 	</select>
			 	<input type="hidden" name="_token" value="{{Session::token()}}">
		 	</div> 

		 	<!-- START EXPORT MODAL -->
			<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exportLabel" >
	  			<div class="modal-dialog" role="document" style="width: 60%; overflow-y: auto;">
	    			<div class="modal-content">
	      				<div class="modal-header">
	        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          					<span aria-hidden="true">&times;</span></button>
	        				<h2 class="modal-title" id="exportLabel">EXPORT</h2>
	      				</div>
	      				<div class="modal-body">
	    					<div class="row">
	    						<div class="col-md-4">
	    							<div class="form-group">
	    								<label for="scholarshipname" class="col-md-8 control-label">Program Code</label>
	    								<input type='checkbox' value='ProgrammeCode' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label for="sholarshipperiod" class="col-md-8 control-label">Degree</label>
	    								<input type='checkbox' value='ProgrammeName' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label for="sholarshipperiod" class="col-md-8 control-label">Faculty</label>
	    								<input type='checkbox' value='Faculty' name='export[]'>
	    							</div>
	    						</div>
	    					</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
							<span class="pull-right">
								<button id="exportbutton" class="btn btn-primary">EXPORT</button>
							</span>
						</div>
	    			</div>
	  			</div>
			</div>
			<!-- END EXPORT MODAL -->

			
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
<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('scripts/jquery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('scripts/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('scripts/bootbox.min.js')}}">
	<script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
  </script>
	<script type="text/javascript">
		$(document).ready(function(){
			event.preventDefault();
				$('#searchstudent').on('keyup', function(){
					var keyword = $(this).val();
					$.ajax({
						type: "POST",
						url: "{{route('searchsuggessions')}}",
						data: {key: keyword, _token: '{{ csrf_token() }}'},
						success: function(data){
							console.log(data);
							$('#result').html(data).css({'z-index': '100px', 'position': 'absolute','background':'#f2e8d5', 'border': '1px grey', 'width': '180px', 'maxHeight': '200px', 'overflow':'auto'});
						}
					});
				});

				$(".clickable-row").on('mouseover', function(e) {
        			$(this).css('cursor', 'pointer').on('click', function(){
        				if ($(e.target).closest('td:first-child').length) {
        					return;
    					}else{
    						document.location = $(this).attr('data-target'); 
    					}
        				
        			});
    			});

    			$('#choose').change(function() {
    				var choice = $(this).val();
					var total=$('form').find('input[name="checkbox[]"]:checked').length;
					if(total > 0)
    				{
    					if(choice == 1)
    					{
	    					bootbox.confirm('You are about to remove '+total+' records. Click OK to continue.', function(result) {
	        					if(result == true)
			        			{
		        					$('form').submit();
								}
							});
    					}else if(choice == 2)
    					{
    						$('#export').modal('show');
    						var exportfields=$('form').find('input[name="export[]"]:checked').length;
							$('#exportbutton').on('click', function(){
    							if(exportfields > 0){
    								$('form').submit();
    								$('#export').modal('hide');
    							}
    						});
    					}
    				}
    			});
		});
	</script>


@endsection