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
				<a href={{route('newsponsor')}}>
					<button class="btn btn-sm btn-white">Add New Sponsor</button>
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
		
		
		<form name="listform"  id="listform" action="{{route('chooseaction')}}" method="POST" enctype="multipart/form-data">
		<div class="table-responsive"> 
			<table class="table table-striped b-t text-sm"> 
				<thead> 
					<tr> 
					
						<th width="20"><input type="checkbox"></th> 
						<!-- BEGIN columns -->
						<th {OPTIONS}>Sponsor Name
						</th> 
						<th {OPTIONS}>Address
						</th> 
						<th {OPTIONS}>Comment
						</th> 
						
						<!-- END columns -->
					
						<th>Edit</th> 
					</tr> 
				</thead> 
				<tbody> 
				
				 @foreach($sponsorinfo as $list)
				 <tr>
				 		<!-- BEGIN id -->
						<td><input type='checkbox' value='{{$list->SponsorID}}' name='checkbox[]'></td> 
						<!-- END id --> 
						<!-- BEGIN innercolumns -->			
							<td>
								{{$list->Name}}
							</td>
							<td>
								{{$list->Address}}
							</td>
							<td>
								{{$list->comment}}
							</td>
												
								<!-- BEGIN edit -->
						<td> 
						<a  class='active' href="{{ route('sponsor_edit', ['id'=>$list->SponsorID])}}">
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
					<!-- choose action, delete or export-->
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
	    								<label for="yearofstudy" class="col-md-8 control-label">Sponsor Name</label>
	    								<input type='checkbox' value='Name' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label for="admissionnumber" class="col-md-8 control-label">Address</label>
	    								<input type='checkbox' value='Address' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label for="campus" class="col-md-8 control-label">Comment</label>
	    								<input type='checkbox' value='comment' name='export[]'>
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


