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
  <header class="panel-heading">Student admission</header> 
  <div class="row text-sm wrapper"> 
    <div class="col-sm-12 m-b-xs">
      @include('includes.uploadfile')   
    </div>   
  </div> 
  
  <!-- END heading-->
<section class="panel"> 
  <header class="panel-heading font-bold"> New Student </header> 
  <div class="panel-body"> 
    <form class="form-horizontal" action="{{route('page1')}}" method="POST">
  <fieldset>
    <legend>Study Programme Information</legend>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('feedback'))
      <div class="alert alert-success">
        {{ session('feedback') }}
      </div>
  @endif
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Year of Study</label>
      <div class="col-lg-8">
          <input type="number" class="form-control rounded" id="yearofstudy" name="yearofstudy" value="{{old('yearofstudy')}}" min="1" max="4">
      </div> 
    </div> 
      
    <div class="form-group">
      <label for="admissionnumber" class="col-lg-3 control-label">Admission Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="admissionnumber" placeholder="Admission Number" name="admissionnumber" value="{{ old('admissionnumber') }}">
      </div>
    </div>
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Campus</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="campus" name="campus">
            @foreach($campus as $camp)
              <option value="{{$camp->CampusID}}">{{$camp->Campus}}</option>
            @endforeach
        </select> 
      </div>
    </div> 
      
    <div class="form-group">
      <label for="registrationnumber" class="col-lg-3 control-label">Registration Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control rounded" id="registrationnumber" placeholder="Registration Number" name="regno" value="{{old('regno')}}">
      <span id="feedback"></span>
      </div>

    </div>
   
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Program Registered</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="program" name="program">
          @foreach($programmes as $programme)
            <option value="{{$programme->ProgrammeCode}}">{{$programme->Title}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
    
    <div class="form-group">
      <label for="graduationdate" class="col-lg-3 control-label">Graduation Date</label>
      <div class="col-lg-8">
        <input type="date" class="form-control rounded" id="graduationdate" placeholder="YYYY-MM-DD" name="graddate" value="{{old('graddate')}}">
      </div>
    </div>
    
      <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Faculty</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="faculty" name="faculty">
          @foreach($faculties as $faculty)
            <option value="{{$faculty->FacultyID}}">{{$faculty->FacultyName}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
    
     <div class="form-group">
      <label for="sponsorship" class="col-lg-3 control-label">Sponsorship</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="sponsorship" name="sponsor">
          <option value="">--none--</option>
          @foreach($sponsors as $sponsor)
            <option value="{{$sponsor->SponsorID}}">{{$sponsor->Name}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
    
     <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Level of Study</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="levelofstudy" name="levelofstudy">
          @foreach($levelofstudy as $level)
          <option value="{{$level->Code}}">{{$level->StudyLevel}}</option>
          @endforeach
        </select> 
      </div>
    </div>  
    
    <div class="form-group">
      <label for="select" class="col-lg-3 control-label">Manner of Entry</label>
      <div class="col-lg-8">
        <select class="form-control rounded" id="mannerofentry" name="mannerofentry">
          @foreach($entrymanners as $entrymanner)
            <option value="{{$entrymanner->ID}}">{{$entrymanner->MannerofEntry}}</option>
          @endforeach
        </select> 
      </div>
    </div> 
    <div class="form-group">
      <div class="col-lg-3"></div>
      <div class="col-lg-8">
        <input type="submit" name="studentinfo" value="Next" class="btn btn-primary col-sm-4"> 
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </div>
    </div>
 </fieldset>
</form>
  </div> 
</section>
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
    $('#registrationnumber').blur(function(){
      var reg = $(this).val();
      $.ajax({
        type: 'POST',
        url: "{{ route('checkregnumber') }}",
        data: {id: reg, _token: '{{ csrf_token() }}'},
        success: function(data){
          $('#feedback').html(data).css('color', 'red');
        }
      });
    });
  </script>
@endsection
