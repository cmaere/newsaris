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
	<header class="panel-heading">Student list</header> 
	<div class="row text-sm wrapper"> 
		<div class="col-sm-5 m-b-xs">
			<a href="{{ route('enrollstudentform') }}">
				<button class="btn btn-sm btn-white">Enrol Student</button>
			</a> 
		</div> 
		<div class="col-sm-4 m-b-xs"> </div> 
		<div class="col-sm-3"> 
			<form action="{{route('searchstudent')}}" method="post">	
				<div class="input-group"> 
				<input type="text" placeholder="Search" name="searchkeyword" class="input-sm form-control" id="searchstudent" > 
				<span class="input-group-btn"> 
					<input type="submit" class="btn btn-sm btn-white" value="Go!" name="search" id="searchbutton"> 
					<input type="hidden" value="{{Session::token()}}" name="_token">
				</span>
			</div> 
			<span id="result"></span>
			</form>
		</div>
	</div> 
	<!-- END heading-->
	@if (session('editfeedback'))
      <div class="alert alert-success">
      	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('editfeedback') }}
      </div>
  	@endif
  	@if (session('feedback'))
      <div class="alert alert-success">
      	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('feedback') }}
      </div>
  	@endif
  	
  	<form action="{{ route('performaction')}}" method="POST" id="listform" enctype="multipart/form-data">
		<div class="table-responsive">
		@if(count($students) > 0)
			<table class="table table-striped b-t text-sm"> 
				<thead> 
					<tr> 				
						<th width="20"><input type="checkbox"></th> 
						<th data-toggle='class' class='th-sortable'>Reg Number 
							<span class='th-sort'><i class='fa fa-sort-down text'></i> <i class='fa fa-sort-up text-active'></i> <i class='fa fa-sort'></i> </span> 
						</th> 
						<th >Name</th> 
						<th >Sex</th> 
						<th >Programme</th> 
						<th >Year</th> 
						<th></th> 
					</tr> 
				</thead> 
				<tbody> 
					@foreach($students as $student)
					<tr > 
						<td class="clickable-row"><input type='checkbox' value='{{$student->Id}}' name='studentIDs[]'></td> 
						<td class="clickable-row" data-toggle="modal" data-target="#view-{{$student->Id}}">{{$student->RegNo}}</td> 
						<td class="clickable-row" data-toggle="modal" data-target="#view-{{$student->Id}}">{{$student->Name}}</td>   
						<td class="clickable-row" data-toggle="modal" data-target="#view-{{$student->Id}}">{{$student->Sex}}</td>
						<td class="clickable-row" data-toggle="modal" data-target="#view-{{$student->Id}}">{{$student->ProgrammeofStudy}}</td>
						<td class="clickable-row" data-toggle="modal" data-target="#view-{{$student->Id}}">{{$student->YearofStudy}}</td> 
						<td><a class='active' href="{{ route('editstudentpage', ['id'=>$student->Id] ) }}">
								<i class='fa fa-pencil text-success text-active'></i>
							</a>
						</td> 
					</tr>
					<!-- START STUDENT DETAILS MODAL--> 
					<div class="modal fade" id="view-{{$student->Id}}" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel" >
	  					<div class="modal-dialog" role="document" style="width: 60%; overflow-y: auto;">
	    					<div class="modal-content">
	      						<div class="modal-header">
	        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          							<span aria-hidden="true">&times;</span></button>
	        						<h2 class="modal-title" id="favoritesModalLabel">STUDENT DETAILS</h2>
	      						</div>
	      						<div class="modal-body">
	    							<legend>Study Programme Information</legend>
	    							<div class="col-lg-12">
										<label class="col-lg-3 control-label">Year of Study</label>
										 <div class="col-lg-8">{{$student->YearofStudy}}</div> 
									</div> 
	      
									<div class="col-lg-12">
										<label class="col-lg-3 control-label">Admission Number</label>
										 <div class="col-lg-8">{{$student->AdmissionNo}}</div>
									</div>
	    
									<div class="col-lg-12">
										<label for="select" class="col-lg-3 control-label">Campus</label>
										<div class="col-lg-8">{{$student->Campus}}</div>
									</div> 
										      
									<div class="col-lg-12">
										<label class="col-lg-3 control-label">Registration Number</label>
										<div class="col-lg-8">{{$student->RegNo}}</div>
									</div>
										   
									<div class="col-lg-12">
										<label class="col-lg-3 control-label">Program Registered</label>
										<div class="col-lg-8">{{$student->ProgrammeofStudy}}</div>
									</div> 
										    
									<div class="col-lg-12">
										<label class="col-lg-3 control-label">Graduation Date</label>
										<div class="col-lg-8">{{$student->GradYear}}</div>
									</div>
										    
									<div class="col-lg-12">
										<label class="col-lg-3 control-label">Faculty</label>
										<div class="col-lg-8">{{$student->Faculty}}</div>
									</div> 
										    
									<div class="col-lg-12">
										<label for="sponsorship" class="col-lg-3 control-label">Sponsorship</label>
										<div class="col-lg-8">{{$student->Sponsor}}</div>
									</div> 
										    
									<div class="col-lg-12">
										<label for="select" class="col-lg-3 control-label">Level of Study</label>
										<div class="col-lg-8">{{$student->studylevel}}</div>
									</div>  
	    
									<div class="col-lg-12">
										<label for="select" class="col-lg-3 control-label">Manner of Entry</label>
										<div class="col-lg-8">{{$student->MannerofEntry}}</div>
									 </div> 
									<legend>Personal Information</legend>
									<div class="col-lg-12">
								      <label class="col-lg-3 control-label">Name</label>
								      <div class="col-lg-8">{{$student->Name}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Sex</label>
								      <div class="col-lg-8">{{$student->Sex}}</div>  
								    </div> 
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Date of Birth</label>
								      <div class="col-lg-8">{{$student->DBirth}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Home District</label>
								      <div class="col-lg-8">{{$student->District}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">T/A</label>
								      <div class="col-lg-8">{{$student->TradAuthority}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Home Village</label>
								      <div class="col-lg-8">{{$student->Village}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Nationality</label>
								      <div class="col-lg-8">{{$student->Nationality}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Student Status</label>
								      <div class="col-lg-8">{{$student->Status}}</div>
								    </div> 
								    
								     <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Religion</label>
								      <div class="col-lg-8">{{$student->Religion}}</div>
								    </div> 
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Marital Status</label>
								      <div class="col-lg-8">{{$student->MaritalStatus}}</div>  
								    </div> 
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Disability</label>
								      <div class="col-lg-8">{{$student->disabilityCategory}}</div>
								    </div> 
								      
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Permanent Address</label>
								      <div class="col-lg-8">{{$student->paddress}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Current Address</label>
								      <div class="col-lg-8">{{$student->currentaddress}}</div>
								    </div>
								      
								   <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Phone</label>
								      <div class="col-lg-8">{{$student->Phone}}</div>
								    </div>
								   
								   <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Email</label>
								      <div class="col-lg-8">{{$student->Email}}</div>
								    </div>
								   
								   <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Name of Bank</label>
								      <div class="col-lg-8">{{$student->bank_name}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Bank Branch </label>
								      <div class="col-lg-8">{{$student->bank_branch_name}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label class="col-lg-3 control-label">Account Number</label>
								      <div class="col-lg-8">{{$student->account_number}}</div>
								    </div>
								    <legend>Information About Parents/Guardian</legend>
							        <div class="col-lg-12">
							          <label for="parentname" class="col-lg-3 control-label">Parent Name</label>
							          <div class="col-lg-8">{{$student->kin}}</div>
							        </div>
							    
							        <div class="col-lg-12">
							          <label for="relationship" class="col-lg-3 control-label">Relationship</label>
							          <div class="col-lg-8">{{$student->kin_relationship}}</div>
							        </div>
							    
							        <div class="col-lg-12">
							          <label for="parentoccupation" class="col-lg-3 control-label">Parent's Occupation</label>
							          <div class="col-lg-8">{{$student->ParentOccupation}}</div>
							        </div>
							    
							        <div class="col-lg-12">
							          <label for="parentaddress" class="col-lg-3 control-label">Parent/Guardian's Address </label>
							          <div class="col-lg-8">{{$student->kin_address}}</div>
							        </div>
							    
							        <div class="col-lg-12">
							          <label for="parentemail" class="col-lg-3 control-label">Parent/Guardian's' Email</label>
							          <div class="col-lg-8">{{$student->kin_email}}</div>
							        </div>
							    
							        <div class="col-lg-12">
							          <label for="parentphone" class="col-lg-3 control-label">Parent/Guardian's Phone</label>
							          <div class="col-lg-8">{{$student->kin_phone}}</div>
							        </div>
							        <legend>Entry Qualifications Information</legend>
								    <div class="col-lg-12">
								        <label for="secschool" class="col-lg-3 control-label">Secondary School Name</label>
								        <div class="col-lg-8">{{$student->form7name}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label for="examnumber" class="col-lg-3 control-label">Examination Number</label>
								      <div class="col-lg-8">{{$student->form7no}}</div>
								    </div>
								    
								    <div class="col-lg-12">
								      <label for="seccompleted" class="col-lg-3 control-label">Year Completed</label>
								      <div class="col-lg-8">{{$student->f7year}}</div>
								    </div> 
								    <legend></legend>
							    </div>
							    <div class="modal-footer">
							    	<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
							       	<span class="pull-right">
							        	<a href="{{ route('editstudentpage', ['id'=>$student->Id] ) }}" class="btn btn-primary">EDIT</a>
							       </span>
							    </div>
	    					</div>
	  					</div>
					</div>
					<!-- END STUDENT DETAILS MODAL -->
					@endforeach 
					
				</tbody> 
			</table>
			@else
				<div class="alert alert-info">
			      	<a href="{{ url('/Policy/EnrollStudent')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			        No records found!
			      </div>
			@endif
		</div> 
	<footer class="panel-footer"> 
		<div class="row"> 
			<div class="col-sm-4 hidden-xs">
				<select class="input-sm form-control input-s-sm inline" id="choose" name="choice"> 
				 	<option value="0">Bulk action</option> 
				 	<option value="1">Delete selected</option> 
					<option value="2">Export</option> 
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
	        				<h4 class="modal-title" id="exportLabel">SELECT WHICH FIELDS YOU WOULD LIKE TO EXPORT</h4>
	      				</div>
	      				<div class="modal-body">
	    					<div class="row">
	    						<div class="col-md-4">
	    							<div class="form-group">
	    								<label for="yearofstudy" class="col-md-8 control-label">Year of Study</label>
	    								<input type='checkbox' value='YearofStudy' name='export[]' checked="checked" onclick="return false">
	    							</div>
	    							<div class="form-group">
	    								<label for="admissionnumber" class="col-md-8 control-label">Admission Number</label>
	    								<input type='checkbox' value='AdmissionNo' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label for="campus" class="col-md-8 control-label">Campus</label>
	    								<input type='checkbox' value='Campus' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label for="regnumber" class="col-md-8 control-label">Registration Number</label>
	    								<input type='checkbox' value='RegNo' name='export[]' checked="checked" onclick="return false">
	    							</div>
	    							<div class="form-group">
	    								<label for="programme" class="col-md-8 control-label">Programme</label>
	    								<input type='checkbox' value='ProgrammeofStudy' name='export[]' checked="checked" onclick="return false">
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Graduation Date</label>
	    								<input type='checkbox' value='GradYear' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Faculty</label>
	    								<input type='checkbox' value='Faculty' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Sponsor</label>
	    								<input type='checkbox' value='Sponsor' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Level of study</label>
	    								<input type='checkbox' value='studylevel' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Manner of Entry</label>
	    								<input type='checkbox' value='MannerofEntry' name='export[]'>
	    							</div>
	    						</div>
	    						<div class="col-md-4">
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Student Name</label>
	    								<input type='checkbox' value='Name' name='export[]' checked="checked" onclick="return false">
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Student sex</label>
	    								<input type='checkbox' value='Sex' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Date of birth</label>
	    								<input type='checkbox' value='DBirth' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Home district</label>
	    								<input type='checkbox' value='District' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Nationality</label>
	    								<input type='checkbox' value='Nationality' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Student status</label>
	    								<input type='checkbox' value='Status' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Religion</label>
	    								<input type='checkbox' value='Religion' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Marital status</label>
	    								<input type='checkbox' value='MaritalStatus' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Disability</label>
	    								<input type='checkbox' value='disabilityCategory' name='export[]'>
	    							</div>
	    							<div class="form-group">
	    								<label class="col-md-8 control-label">Permanent Address</label>
	    								<input type='checkbox' value='paddress' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Current Address</label>
		    							<input type='checkbox' value='currentaddress' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Phone</label>
		    							<input type='checkbox' value='Phone' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Email</label>
		    							<input type='checkbox' value='Email' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Name of Bank</label>
		    							<input type='checkbox' value='bank_name' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Bank Branch</label>
		    							<input type='checkbox' value='bank_branch_name' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Account Number</label>
		    							<input type='checkbox' value='account_number' name='export[]'>
	    							</div>
	    						</div>
	    						<div class="col-md-4">
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Guardian Name</label>
		    							<input type='checkbox' value='kin' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Guadian Relationship</label>
		    							<input type='checkbox' value='kin_relationship' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Guardian Occupation</label>
		    							<input type='checkbox' value='ParentOccupation' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Guardian Address</label>
		    							<input type='checkbox' value='kin_address' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Guardian Email</label>
		    							<input type='checkbox' value='kin_email' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Guardian Phone</label>
		    							<input type='checkbox' value='kin_phone' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Previous School</label>
		    							<input type='checkbox' value='form7name' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Examination Number</label>
		    							<input type='checkbox' value='form7no' name='export[]'>
	    							</div>
	    							<div class="form-group">
		    							<label class="col-sm-8 control-label">Year Completed</label>
		    							<input type='checkbox' value='f7year' name='export[]'>
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
 	</footer> 
 	</form>
</section>	
</div>
	<!-- <meta http-equiv="refresh" content="0;URL= url('Policy/EnrollStudent')}}" />  -->
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
							$('#result').html(data).css({'z-index': '100px', 'position': 'absolute','background':'#FAFFBD', 'border': '1px grey', 'width': '180px', 'maxHeight': '200px', 'overflow':'auto'});
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
					var total=$('form').find('input[name="studentIDs[]"]:checked').length;
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