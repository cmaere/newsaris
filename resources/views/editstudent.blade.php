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
    <header class="panel-heading font-bold"> Edit Student </header> 
    <div class="panel-body"> 
      <form class="form-horizontal" action="{{route('nextedit', ['id' => $student->Id])}}" method="POST">
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
          <div class="form-group">
            <label for="select" class="col-lg-3 control-label">Year of Study</label>
            <div class="col-lg-8">
              <input type="number" class="form-control rounded" id="yearofstudy" name="yearofstudy" value="{{$student->YearofStudy}}" min="1" max="4">
            </div>  
          </div> 
      
          <div class="form-group">
            <label for="admissionnumber" class="col-lg-3 control-label">Admission Number</label>
            <div class="col-lg-8">
              <input type="text" class="form-control rounded" id="admissionnumber" name="admissionnumber" value="{{$student->AdmissionNo}}"  readonly="readonly">
            </div>
          </div>
    
           <div class="form-group">
              <label for="select" class="col-lg-3 control-label">Campus</label>
              <div class="col-lg-8">
                <select class="form-control rounded" id="campus" name="campus">
                  <option value="{{$student->CampusID}}">{{$student->Campus}}</option>
                    @foreach($campus as $camp)
                      <option value="{{$camp->CampusID}}">{{$camp->Campus}}</option>
                    @endforeach
                </select> 
              </div>
            </div>  
      
          <div class="form-group">
            <label for="registrationnumber" class="col-lg-3 control-label">Registration Number</label>
            <div class="col-lg-8">
              <input type="text" class="form-control rounded" id="registrationnumber" name="regno" value="{{$student->RegNo}}" readonly="readonly">
            </div>
          </div>

          <div class="form-group">
            <label for="select" class="col-lg-3 control-label">Program Registered</label>
            <div class="col-lg-8">
              <select class="form-control rounded" id="program" name="program">
                <option value="{{$student->ProgrammeofStudyID}}">{{$student->ProgrammeofStudy}}</option>
                @foreach($programmes as $programme)
                  <option value="{{$programme->ProgrammeCode}}">{{$programme->Title}}</option>
                @endforeach
              </select> 
            </div>
          </div>
    
          <div class="form-group">
            <label for="graduationdate" class="col-lg-3 control-label">Graduation Date</label>
            <div class="col-lg-8">
              <input type="date" class="form-control rounded" id="graduationdate" name="graddate" value="{{$student->GradYear}}">
            </div>
          </div>

          <div class="form-group">
            <label for="select" class="col-lg-3 control-label">Faculty</label>
            <div class="col-lg-8">
              <select class="form-control rounded" id="faculty" name="faculty">
                <option value="{{$student->FacultyID}}">{{$student->Faculty}}</option>
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
              <option value="{{$student->SponsorID}}">{{$student->Sponsor}}</option>
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
          <option value="{{$student->StudyLevelID}}">{{$student->studylevel}}</option>
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
            <option value="{{$student->MannerofEntryID}}">{{$student->MannerofEntry}}</option>
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
  </div>
@endsection

