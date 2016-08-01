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
				<input type="text" placeholder="Search" name="searchkeyword" class="input-sm form-control" id="searchstudent"> 
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
	<form name="listform" id="listform">
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
	<div class="table-responsive"> 
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
				<tr> 
					<td><input type='checkbox' value='13' name='checkbox[]'></td> 
					<td>{{$student->RegNo}}</td> 
					<td>{{$student->Name}}</td>   
					<td>{{$student->Sex}}</td>
					<td>{{$student->ProgrammeofStudy}}</td>   
					<td>{{$student->YearofStudy}}</td> 
					<td> 
					<a class='active' href="{{ route('editstudentpage', ['id'=>$student->Id] ) }}">
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
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('scripts/jquery-1.8.2.min.js')}}"></script>
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
					url: "{{ route('searchsuggessions') }}",
					data: {key: keyword, _token: '{{ csrf_token() }}'},
					success: function(data){
						console.log(data);
						$('#result').html(data).css('color', 'red');
					}
				})
			})
		});
	</script>
@endsection