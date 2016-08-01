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
  @if($registered >0)
     <h3>{2016/2017} Academic Year</h3>
     <p>
      You are registered with the following modules for year {year} Semester {sem}
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
      @foreach($courses as $course)
        <tr>  
          <td>{{$course->CourseCode}}</td>   
          <td>{{$course->CourseName}}</td>   
          <td>{{$course->Units}}</td>   
          <td>{{$course->Hours}}</td> 
        </tr> 
        @endforeach
      </tbody> 
    </table>
  </div>
    </p>
  @else 
    Rules and regulations
    <p></p>
      <form class="form-horizontal" action="{{route('moduleregistrationform')}}" method="POST">
       <div class="form-group">
        <iframe src="{{asset('rules.txt')}}" class="" width="100%" height="400"></iframe>
       </div>
       <div class="checkbox">
        <label><input type="checkbox" name="acceptrules">I have read and accepted the rules and regulations.</label>
       </div>
        <input type="submit" id="next" class="btn" disabled="disabled" name="submit" value="Next">
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </form>
      </p>
  @endif
  </div> 
</section>
</section>  
</div>
<script type="text/javascript" src="{{asset('scripts/jquery-1.8.2.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[type=checkbox]').click(function(){
      if($(this).prop("checked") == true){
                $('#next').removeAttr('disabled').addClass('btn-primary');
            }
            else if($(this).prop("checked") == false){
                $('#next').attr('disabled', 'true').removeClass('btn-primary');
            }
    });
  });
</script>
@endsection