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
  <header class="panel-heading">Module Registration</header> 
  <div class="row text-sm wrapper"> 
		<div class="col-sm-5 m-b-xs">
			<!-- <a href="{{ route('newfaculty') }}">
				<button class="btn btn-sm btn-white">Add New Faculty</button>
			</a> --> 
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
<section class="panel"> 
  <header class="panel-heading font-bold">Register for a Module</header> 
  <div class="panel-body">
     <h3>{2016/2017} Academic Year</h3>
     <p>
     	The following are the modules for year {year} Semester {sem}
    </p>
    <p>
      <div class="table-responsive"> 
    <table class="table table-striped b-t text-sm"> 
      <thead> 
        <tr>   
          <th >Course code </th> 
          <th >Course name</th> 
          <th >Units</th> 
          <th >Hours</th> 
        </tr> 
      </thead> 
      <tbody> 
        <form action="{{route('registermodule')}}" method="POST">
      <?php $i = 0; ?>
      @foreach($courses as $course)
        <tr>  
          <td>{{$course->CourseCode}}
            <input type="hidden" name="coursecode_{{$i}}" value="{{$course->CourseCode}}">
          </td>   
          <td>{{$course->CourseName}}
            <input type="hidden" name="coursename" value="{{$course->CourseName}}">
          </td>   
          <td>{{$course->Units}}
            <input type="hidden" name="courseunits" value="{{$course->Units}}">
          </td>   
          <td>{{$course->Hours}}
            <input type="hidden" name="coursehours" value="{{$course->Hours}}">
          </td> 
        <?php $i++; ?> 
        </tr> 
        @endforeach
      </tbody> 
    </table>
  </div>
  <footer class="panel-footer"> 
    <div class="row"> 
      <div class="col-sm-4 hidden-xs"></div> 
      <div class="col-sm-4 text-center"></div> 
      <div class="col-sm-4 text-right text-center-xs"> 
         <button type="submit" class="btn btn-sm btn-primary">Register</button>
         <input type="hidden" value="{{Session::token()}}" name="_token">
       </div> 
     </div>
      </form> 
  </footer>
    </p>
  </div> 
</section>
</section>  
</div>

@endsection