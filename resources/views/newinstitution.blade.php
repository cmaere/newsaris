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
	
		<form action="{{route('addinstitution')}}" method="POST" name="frmInst" id="frmInst" class="form-horizontal"> 
		@if (count($errors) > 0)
   		<div class="alert alert-danger">
        	<ul>
            	@foreach ($errors->all() as $error)
               	 {{ $error }}<br>
            	@endforeach
        	</ul>
   	 	</div>
   		@endif
			<div class="form-group"> <label class="col-sm-2 control-label">Institution</label> 
				<div class="col-sm-8"> <input type="text" id='institution' name="institution" class="form-control rounded"> </div>
				  
			</div> 
			 <span id="feedback"></span>
			<div class="line line-dashed line-lg pull-in"></div> 
			<div class="form-group"> <label class="col-sm-2 control-label">Address</label> 
			<div class="col-sm-8"> <input type="text" name="address" class="form-control rounded"> </div> 
			 	
			 </div>
	   	         <div class="line line-dashed line-lg pull-in"></div> 
			 <div class="form-group"> <label class="col-sm-2 control-label">Physical Address</label> 
			 <div class="col-sm-8"> <input type="text" name="physical_address" class="form-control rounded"> </div> 

			 </div>
			 <div class="line line-dashed line-lg pull-in"></div> 
 			<div class="form-group"> <label class="col-sm-2 control-label">Telephone</label> 
 				<div class="col-sm-8"> <input type="text" name="telephone" class="form-control rounded"> </div> 
 			</div>
			<div class="line line-dashed line-lg pull-in"></div> 
			<div class="form-group"> <label class="col-sm-2 control-label">Email</label> 
				<div class="col-sm-8"> <input type="text" name="email" class="form-control rounded"> </div> 
			</div>
	    	     	<div class="line line-dashed line-lg pull-in"></div> 
    		    	<div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  
	    		    <input class="btn btn-primary" type="submit" value="Add Record" name="submit"> 
			   	<input type="hidden" name="_token" value="{{ Session::token() }}">
    	    		</div> 

		</form> 
	</footer>
	</section>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <script type="text/javascript" src="{{asset('scripts/jquery-1.8.2.min.js')}}"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
  </script>
 <script type="text/javascript">
    $('#institution').blur(function(){
      var reg = $(this).val();
      $.ajax({
        type: 'POST',
        url: "{{ route('checkinstitution') }}",
        data: {id: reg, _token: '{{ csrf_token() }}'},
        success: function(data){

          $('#feedback').html(data).css('color', 'red');
        }
      });
    });
  </script>

@endsection
