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
        <form role="form" class="form-horizontal" method="POST" action="{{ route('updatestudent', ['id' => $student->Id])}}" id="admissionform">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
              <div class="col-md-12">
                <p></p>
                <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Year of Study</label>
                  <div class="col-lg-8">
                    <input type="number" class="form-control rounded" id="yearofstudy" name="yearofstudy" value="{{$student->YearofStudy}}" min="1" max="4" required="required">
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
                    <input type="text" class="form-control rounded" id="surname" name="lastname" value="{{$lastname}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="middlename" class="col-lg-3 control-label">Middle Name</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="middlename" name="middlename" value="">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="firstname" class="col-lg-3 control-label">First Name</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="middlename" name="firstname" value="{{$firstname}}" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="sex" class="col-lg-3 control-label">Sex</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="sex" name="sex">
                      <option value="{{$student->sexid}}">{{$student->Sex}}</option>
                      @foreach($gender as $sex)
                        <option value="{{$sex->sexid}}">{{$sex->sex}}</option>
                      @endforeach
                    </select>
                  </div>  
                </div>
                
                <div class="form-group">
                  <label for="dob" class="col-lg-3 control-label">Date of Birth</label>
                  <div class="col-lg-8">
                    <input type="date" class="form-control rounded" id="dateofbirth" name="dateofbirth" value="{{$student->DBirth}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="homedistrict" class="col-lg-3 control-label">Home District</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="homedistrict" name="homedistrict" value="{{$student->District}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="t/a" class="col-lg-3 control-label">T/A</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="middlename" name="ta" value="{{$student->TradAuthority}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="homevillage" class="col-lg-3 control-label">Home Village</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="middlename" name="homevillage" value="{{$student->Village}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="nationality" class="col-lg-3 control-label">Nationality</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="middlename" name="nationality" value="{{$student->Nationality}}" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="studentstatus" class="col-lg-3 control-label">Student Status</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="studentstatus" name="studentstatus">
                        <option value="{{$student->StatusID}}">{{$student->Status}}</option>
                          @foreach($status as $stustatus)
                            <option value="{{$stustatus->StatusID}}">{{$stustatus->Status}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div> 

                  <div class="form-group">
                  <label for="religion" class="col-lg-3 control-label">Religion</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="religion" name="religion">
                        <option value="{{$student->ReligionID}}">{{$student->Religion}}</option>
                          @foreach($religions as $religion)
                            <option value="{{$religion->ReligionID}}">{{$religion->Religion}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="select" class="col-lg-3 control-label">Marital Status</label>
                  <div class="col-lg-8">
                    <select class="form-control rounded" id="maritalstatus" name="marital">
                      <option value="{{$student->maritalStatusID}}">{{$student->MaritalStatus}}</option>
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
                      <option value="{{$student->DisabilityCode}}">{{$student->disabilityCategory}}</option>
                      @foreach($disabilities as $disability)
                        <option value="{{$disability->DisabilityCode}}">{{$disability->disability}}</option>
                      @endforeach
                    </select> 
                  </div>
                </div> 
                  
                <div class="form-group">
                  <label for="permanent address" class="col-lg-3 control-label">Permanent Address</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="admissionnumber" name="permanentaddress" value="{{$student->paddress}}" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="currentaddress" class="col-lg-3 control-label">Current Address</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="currentaddress" name="currentaddress" value="{{$student->currentaddress}}" required="required">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="phone" class="col-lg-3 control-label">Phone</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="phone" name="phone" value="{{$student->Phone}}" required="required">
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="email" class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="email" name="email" value="{{$student->Email}}">
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="bank" class="col-lg-3 control-label">Name of Bank</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="phone" name="bankname" value="{{$student->bank_name}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="bankbranch" class="col-lg-3 control-label">Bank Branch </label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="phone" name="bankbranch" value="{{$student->bank_branch_name}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="accnumber" class="col-lg-3 control-label">Account Number</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control rounded" id="accnumber" name="bankaccount" value="{{$student->account_number}}">
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
                  <input type="text" class="form-control rounded rounded" id="accnumber" name="pname" value="{{$student->kin}}" required="required">
                </div>
              </div>
          
              <div class="form-group">
                <label for="relationship" class="col-lg-3 control-label">Relationship</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded rounded" id="accnumber" name="relationship" value="{{$student->kin_relationship}}" required="required">
                </div>
              </div>
          
              <div class="form-group">
                <label for="parentoccupation" class="col-lg-3 control-label">Parent's Occupation</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded rounded" id="accnumber" name="occupation" value="{{$student->ParentOccupation}}" required="required">
                </div>
              </div>
          
              <div class="form-group">
                <label for="parentaddress" class="col-lg-3 control-label">Parent/Guardian's Address </label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded rounded" id="accnumber" name="paddress" value="{{$student->kin_address}}">
                </div>
              </div>
          
              <div class="form-group">
                <label for="parentemail" class="col-lg-3 control-label">Parent/Guardian's' Email</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded" id="accnumber" name="pemail" value="{{$student->kin_email}}">
                </div>
              </div>
          
              <div class="form-group">
                <label for="parentphone" class="col-lg-3 control-label">Parent/Guardian's Phone</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded" id="accnumber" name="parphone" value="{{$student->kin_phone}}">
                </div>
              </div>

              <legend>Entry Qualifications Information</legend>

              <div class="form-group">
                <label for="secschool" class="col-lg-3 control-label">Secondary School Name</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded" id="accnumber" name="schname" value="{{$student->form7name}}" readonly="readonly">
                </div>
              </div>
            
              <div class="form-group">
                <label for="examnumber" class="col-lg-3 control-label">Examination Number</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded" id="accnumber" name="examnum" value="{{$student->form7no}}" readonly="readonly">
                </div>
              </div>
            
              <div class="form-group">
                <label for="seccompleted" class="col-lg-3 control-label">Year Completed</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control rounded" id="seccompleted" name="yearcompleted" value="{{$student->f7year}}" readonly="readonly"> 
                </div>
              </div>

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
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
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
          $("#admissionform").submit();
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
@endsection

