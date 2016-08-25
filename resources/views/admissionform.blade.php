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
  <header class="panel-heading font-bold">
    <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-top">Study Programme Information</a>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-top" disabled="disabled">Personal Information</a>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-top" disabled="disabled">Information About Parents/Guardian</a>
        </div>
    </div>
</div>
  </header> 
  <div class="panel-body"> 
    <form role="form" class="form-horizontal" method="POST" action="{{ route('submitAdmissionForm')}}" id="admissionform">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <p></p>
                <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Year of Study</label>
                  <div class="col-lg-8">
                      <input type="number" class="form-control rounded" id="yearofstudy" name="yearofstudy" value="{{old('yearofstudy')}}" min="1" max="4" required="required">
                  </div> 
                </div>

                <div class="form-group">
                  <label for="admissionnumber" class="col-lg-3 control-label">Admission Number</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="admissionnumber" placeholder="Admission Number" name="admissionnumber" value="{{ old('admissionnumber') }}" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Campus</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="campus" name="campus" required="required">
                      <option value="" hidden>Please select</option>
                        @foreach($campus as $camp)
                          <option value="{{$camp->CampusID}}">{{$camp->Campus}}</option>
                        @endforeach
                    </select> 
                  </div>
                </div> 
                  
                <div class="form-group">
                  <label for="registrationnumber" class="col-lg-3 control-label">Registration Number</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="registrationnumber" placeholder="Registration Number" name="regno" value="{{old('regno')}}" required="required">
                  <span id="feedback"></span>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Program Registered</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="program" name="program" required>
                        <option value="" hidden>Please select</option>
                      @foreach($programmes as $programme)
                        <option value="{{$programme->ProgrammeCode}}">{{$programme->Title}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div> 
                
                <div class="form-group">
                  <label for="graduationdate" class="col-lg-3 control-label">Graduation Date</label>
                  <div class="col-lg-8">
                    <input type="date" class="form-control rounded" id="graduationdate" placeholder="YYYY-MM-DD" name="graddate" value="{{old('graddate')}}" required="required">
                  </div>
                </div>
                
                  <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Faculty</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="faculty" name="faculty" required="required">
                      <option value="" hidden>Please select</option>
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
                      <option value="">None</option>
                      @foreach($sponsors as $sponsor)
                        <option value="{{$sponsor->SponsorID}}">{{$sponsor->Name}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div> 
                
                 <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Level of Study</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="levelofstudy" name="levelofstudy" required="required">
                      <option value="" hidden>Please select</option>
                      @foreach($levelofstudy as $level)
                      <option value="{{$level->Code}}">{{$level->StudyLevel}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div>  
                
                <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Manner of Entry</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="mannerofentry" name="mannerofentry" required="required">
                      <option value="" hidden>Please select</option>
                      @foreach($entrymanners as $entrymanner)
                        <option value="{{$entrymanner->ID}}">{{$entrymanner->MannerofEntry}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-8">
                    <button class="btn btn-primary col-sm-4 nextBtn pull-right" type="button">Next</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <p></p>
                <div class="form-group">
                  <label for="surname" class="col-lg-3 control-label">Surname</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="surname" placeholder="Enter surname" name="lastname" value="{{old('lastname')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="middlename" class="col-lg-3 control-label">Middle Name</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="middlename" placeholder="Enter middlename" name="middlename" value="{{old('middlename')}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="firstname" class="col-lg-3 control-label">First Name</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="firstname" placeholder="Enter first name" name="firstname" value="{{old('firstname')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="sex" class="col-lg-3 control-label">Sex</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="sex" name="sex" required="required">
                      <option value="" hidden>Please select</option>
                      @foreach($gender as $sex)
                        <option value="{{$sex->sexid}}">{{$sex->sex}}</option>
                      @endforeach
                    </select>
                  </div>  
                </div> 
                
                <div class="form-group">
                  <label for="dob" class="col-lg-3 control-label">Date of Birth</label>
                  <div class="col-lg-8">
                    <input type="date" class="form-control rounded" id="dateofbirth" placeholder="YYYY-MM-DD" name="dateofbirth" value="{{old('dateofbirth')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="homedistrict" class="col-lg-3 control-label">Home District</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="homedistrict" placeholder="Enter home district" name="homedistrict" value="{{old('homedistrict')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="t/a" class="col-lg-3 control-label">T/A</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="tradauthority" placeholder="Enter traditional authority" name="ta" value="{{old('ta')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="homevillage" class="col-lg-3 control-label">Home Village</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="homevillage" placeholder="Enter home village" name="homevillage" value="{{old('homedistrict')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="nationality" class="col-lg-3 control-label">Nationality</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="nationarity" placeholder="Enter nationality" name="nationality" value="{{old('nationality')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="studentstatus" class="col-lg-3 control-label">Student Status</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="studentstatus" name="studentstatus" required="required">
                      <option value="" hidden>Please select</option>
                      @foreach($studentstatus as $status)
                        <option value="{{$status->StatusID}}">{{$status->Status}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div> 
                
                 <div class="form-group">
                  <label for="religion" class="col-lg-3 control-label">Religion</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="religion" name="religion">
                      <option value="" hidden>Please select</option>
                      @foreach($religion as $relig)
                        <option value="{{$relig->ReligionID}}">{{$relig->Religion}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div> 
                
                <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Marital Status</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="maritalstatus" name="marital" required="required">
                      <option value="" hidden>Please select</option>
                      @foreach($maritalstatus as $marital)
                        <option value="{{$marital->intStatusID}}">{{$marital->szStatus}}</option>
                      @endforeach
                    </select>
                  </div>  
                </div> 
                
                <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Disability</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="disability" name="disability">
                      <option value="">None</option>
                      @foreach($disabilities as $disability)
                        <option value="{{$disability->DisabilityCode}}">{{$disability->disability}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div> 
                  
                <div class="form-group">
                  <label for="permanent address" class="col-lg-3 control-label">Permanent Address</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="admissionnumber" placeholder="Enter permanent address" name="permanentaddress" value="{{old('permanentaddress')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="currentaddress" class="col-lg-3 control-label">Current Address</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="currentaddress" placeholder="Enter current address" name="currentaddress" value="{{old('currentaddress')}}" required="required">
                  </div>
                </div>
                  
               <div class="form-group">
                  <label for="phone" class="col-lg-3 control-label">Phone</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="phone" placeholder="Enter phone number" name="phone" value="{{old('phone')}}">
                  </div>
                </div>
               
               <div class="form-group">
                  <label for="email" class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-8">
                    <input type="email" class="form-control rounded" id="email" placeholder="Enter Email address" name="email" value="{{old('email')}}" required="required">
                  </div>
                </div>
               
               <div class="form-group">
                  <label for="bank" class="col-lg-3 control-label">Name of Bank</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="bankname" placeholder="Enter name of bank" name="bankname" value="{{old('bankname')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="bankbranch" class="col-lg-3 control-label">Bank Branch </label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="bankbranch" placeholder="Enter branch where account held" name="bankbranch" value="{{old('bankbranch')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="accnumber" class="col-lg-3 control-label">Account Number</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="accnumber" placeholder="Enter student's account number" name="bankaccount" value="{{old('bankaccount')}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-8">
                    <button class="btn btn-primary col-sm-4 nextBtn pull-right" type="button">Next</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <p></p>
            <div class="form-group">
          <label for="parentname" class="col-lg-3 control-label">Parent/Guardian Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter parent/guardian's name" name="pname" value="{{old('pname')}}" required="required">
          </div>
        </div>
    
        <div class="form-group">
          <label for="relationship" class="col-lg-3 control-label">Relationship</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter relationship to student" name="relationship" value="{{old('relationship')}}" required="required">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentoccupation" class="col-lg-3 control-label">Parent's Occupation</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter parent/guardian's occupation" name="occupation" value="{{old('occupation')}}" required="required">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentaddress" class="col-lg-3 control-label">Parent/Guardian's Address </label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded rounded" id="accnumber" placeholder="enter parent/guardian's address" name="paddress" value="{{old('paddress')}}" required="required">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentemail" class="col-lg-3 control-label">Parent/Guardian's' Email</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" placeholder="enter parent/guardian's email" name="pemail" value="{{old('pemail')}}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="parentphone" class="col-lg-3 control-label">Parent/Guardian's Phone</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" placeholder="enter parent/guardian's phone" name="parphone" value="{{old('parphone')}}" required="required">
          </div>
        </div>

        <legend>Entry Qualifications Information</legend>
          <div class="form-group">
            <label for="secschool" class="col-lg-3 control-label">Secondary School Name</label>
            <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" placeholder="enter secondary school" name="schname" value="{{old('schname')}}" required="required">
          </div>
        </div>
        
        <div class="form-group">
          <label for="examnumber" class="col-lg-3 control-label">Examination Number</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="accnumber" placeholder="enter student's examination number" name="examnum" value="{{old('examnum')}}" required="required">
          </div>
        </div>
        
        <div class="form-group">
          <label for="seccompleted" class="col-lg-3 control-label">Year Completed</label>
          <div class="col-lg-8">
            <input type="text" class="form-control rounded" id="seccompleted" name="yearcompleted" value="{{old('yearcompleted')}}" required="required"> 
          </div>
        </div> 
        </fieldset>

        <div class="form-group">
            <div class="col-lg-3"></div>
            <div class="col-lg-8">
                <input class="btn btn-success btn-sm-2 pull-right" type="submit" value="Add student">
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </div>
        </div>
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
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
      if(reg != '')
      {
        $.ajax({
          type: "POST",
          url: "{{ route('checkregnumber') }}",
          data: {id: reg, _token: '{{ csrf_token() }}'},
          success: function(data){
            if(data)
            {
              $('#feedback').html(data).css('color', 'red');
              $('#registrationnumber').focus();
              return false;
            }else{
              $('#feedback').html('');

            }
            
          }
        });
      }
      
    });
  </script>
  <script type="text/javascript">
  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='number'],input[type='url'],select"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });
    $("input[type='submit']").click(function(){
      var curStep = $(this).closest(".setup-content"),
            curInputs = curStep.find("input[type='text'],input[type='number'],input[type='url'],select"),
            isValid = true;

      $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if(isValid)
          this.form.submit();
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
@endsection
