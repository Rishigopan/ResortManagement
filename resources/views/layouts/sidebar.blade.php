<ul class="sidebar-nav" id="sidebar-nav"> 
      <div class=" d-flex justify-content-center">
          <img src="{{url('assets/images/bethanylogo.png')}}" style="width:110px; height:120px;">
      </div>
      <li class="nav-item mt-4">
        <a class="nav-link " href="{{ url('/dashboard') }}">
          <i> <img src="{{url('assets/images/dashboard.png')}}" style="width:20px; height:20px;"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- OP DropDown Start -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-OP" data-bs-toggle="collapse" href="#">
          <i><img src="{{url('assets/images/op.png')}}" style="width:20px; height:20px;"></i>
          <span>Out Patient</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-OP" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/OP') }}">
                <i> <img src="{{url('assets/images/op.png')}}" style="width:20px; height:20px;"></i>
              <span>OP</span>
            </a>
          </li>    
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Consultation') }}">
                <i> <img src="{{url('assets/images/consultation.png')}}" style="width:20px; height:20px;"></i>
              <span>Consultation</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Token') }}">
                <i> <img src="{{url('assets/images/token.png')}}" style="width:20px; height:20px;"></i>
              <span>Token</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/PatientRecordView') }}">
                <i> <img src="{{url('assets/images/patientrecord.png')}}" style="width:20px; height:20px;"></i>
              <span>Patient Record</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/CaseSheet') }}">
                <i> <img src="{{url('assets/images/casesheet.png')}}" style="width:20px; height:20px;"></i>
              <span>Case Sheet  </span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/DietChart') }}">
                <i> <img src="{{url('assets/images/dietchart.png')}}" style="width:20px; height:20px;"></i>
              <span>Diet Chart</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/BmI') }}">
                <i> <img src="{{url('assets/images/bmi.png')}}" style="width:20px; height:20px;"></i>
              <span>BMI</span>
            </a>
          </li>

        </ul>
      </li>


      <!-- OP DropDown End-->


      <!-- IP DropDown Start -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-IP" data-bs-toggle="collapse" href="#">
          <i><img src="{{url('assets/images/ip.png')}}" style="width:20px; height:20px;"></i>
          <span>In Patient</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-IP" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/IP') }}">
                  <i> <img src="{{url('assets/images/ip.png')}}" style="width:20px; height:20px;"></i>
                <span>IP</span>
              </a>
            </li>     
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/IpConsultation') }}">
                  <i> <img src="{{url('assets/images/consultation.png')}}" style="width:20px; height:20px;"></i>
                <span>IP Consultation</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/IPDetails') }}">
                <i> <img src="{{url('assets/images/token.png')}}" style="width:20px; height:20px;"></i>
                <span>IP List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/IpPatientRecordView') }}">
                  <i> <img src="{{url('assets/images/patientrecord.png')}}" style="width:20px; height:20px;"></i>
                <span>IP Patient Record</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/IPcasesheet') }}">
                  <i> <img src="{{url('assets/images/casesheet.png')}}" style="width:20px; height:20px;"></i>
                <span>IP Case Sheet  </span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/IPdietchart') }}">
                  <i> <img src="{{url('assets/images/dietchart.png')}}" style="width:20px; height:20px;"></i>
                <span>IP Diet Chart</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/IPBMI') }}">
                  <i> <img src="{{url('assets/images/bmi.png')}}" style="width:20px; height:20px;"></i>
                <span>IP BMI</span>
              </a>
            </li>

          
          </ul>
      </li>


      <!-- IP DropDown End-->

      
      
      <!-- Dropdown Master Starts -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i> <img src="{{url('assets/images/master.png')}}" style="width:20px; height:20px;"></i>
        <span>Masters</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Branchtable') }}">
              <i>  <img src="{{url('assets/images/branch.png')}}" style="width:20px; height:20px;"></i>
              <span>Branch</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Department') }}">
              <i>  <img src="{{url('assets/images/department.png')}}" style="width:20px; height:20px;"></i>
              <span>Department</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Doctor') }}">
                <i> <img src="{{url('assets/images/doctor.png')}}" style="width:20px; height:20px;"></i>
              <span>Doctor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ url('/Staff') }}">
            <i><img src="{{url('assets/images/staff.png')}}" style="width:20px; height:20px;"></i>
              <span>Staff</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/DoctorFees') }}">
                <i> <img src="{{url('assets/images/dashdoctors.png')}}" style="width:20px; height:20px;"></i>
              <span>Doctor Fees</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Diagnosis') }}">
            <i><img src="{{url('assets/images/diagnosis.png')}}" style="width:20px; height:20px;"></i>
              <span>Diagnosis</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Treatment') }}">
                <i><img src="{{url('assets/images/treatment.png')}}" style="width:20px; height:20px;"></i>
              <span>Treatment</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/lab') }}">
                <i><img src="{{url('assets/images/lab.png')}}" style="width:20px; height:20px;"></i>
              <span>Lab Investigation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Diet') }}">
            <i><img src="{{url('assets/images/diet.png')}}" style="width:20px; height:20px;"></i>
              <span>Diet</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/RoomType') }}">
            <i><img src="{{url('assets/images/roomtype.png')}}" style="width:20px; height:20px;"></i>
              <span>Room Type</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Room') }}">
              <i><img src="{{url('assets/images/room.png')}}" style="width:20px; height:20px;"></i>
              <span>Room</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/ItemCategory') }}">
              <i><img src="{{url('assets/images/itemcategory.png')}}" style="width:20px; height:20px;"></i>
              <span>Item Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/Item') }}">
              <i><img src="{{url('assets/images/item.png')}}" style="width:20px; height:20px;"></i>
              <span>Item</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/units') }}">
              <i><img src="{{url('assets/images/units.png')}}" style="width:20px; height:20px;"></i>
              <span>Units</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/templates') }}">
              <i><img src="{{url('assets/images/template.png')}}" style="width:20px; height:20px;"></i>
              <span>Template</span>
            </a>
          </li>
        </ul>
      </li> 
      <!-- end dropdown Master   -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/RoomMaintenance') }}">
            <i> <img src="{{url('assets/images/dashroommaintain.png')}}" style="width:20px; height:20px;"></i>
          <span>Room Maintenance</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/RoomBooking') }}">
        <i><img src="{{url('assets/images/room.png')}}" style="width:20px; height:20px;"></i>
          <span>Room Booking</span>
        </a>
      </li>

      <!-- Reports DropDown Start -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-report" data-bs-toggle="collapse" href="#">
          <i><img src="{{url('assets/images/report.png')}}" style="width:20px; height:20px;"></i>
          <span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-report" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/collectionsummary') }}">
            <i><img src="{{url('assets/images/collectionsummary.png')}}" style="width:20px; height:20px;"></i>
              <span>Collection Summary</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/collectiondetailed') }}">
            <i><img src="{{url('assets/images/collectiondetail.png')}}" style="width:20px; height:20px;"></i>
              <span>Collection Detailed</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/patienthistory') }}">
            <i><img src="{{url('assets/images/diagnosis.png')}}" style="width:20px; height:20px;"></i>
              <span>Patient History</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/dailyopreport') }}">
            <i><img src="{{url('assets/images/consultation.png')}}" style="width:20px; height:20px;"></i>
              <span>Daily OP Report</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/TreatmentReport') }}">
            <i><img src="{{url('assets/images/treatmentreport.png')}}" style="width:20px; height:20px;"></i>
              <span>Treatment Report</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/DietReport') }}">
            <i><img src="{{url('assets/images/dietreport.png')}}" style="width:20px; height:20px;"></i>
              <span>Diet Report</span>
            </a>
          </li>
          </ul>
      </li>


      <!-- Reports DropDown End-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ '/therapist' }}">
         <i><img src="{{url('assets/images/therapist.png')}}" style="width:20px; height:20px;"></i>
          <span>Therapist</span>
        </a>
      </li><li class="nav-item">
        <a class="nav-link collapsed" href="{{ '/dietitian' }}">
         <i><img src="{{url('assets/images/dietitation.png')}}" style="width:20px; height:20px;"></i>
          <span>Dietitian</span>
        </a>
      </li>

      
      <!-- Dropdown Settings Start-->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nave" data-bs-toggle="collapse" href="#">
          <i><img src="{{url('assets/images/settings.png')}}" style="width:20px; height:20px;"></i>
          <span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nave" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/resetpw') }}">
            <i><img src="{{url('assets/images/resetpassword.png')}}" style="width:20px; height:20px;"></i>
              <span>Reset Password</span>
            </a>
          </li> -->
          </li><li class="nav-item">
            <a class="nav-link collapsed" href="{{ '/basicsettings' }}">
            <i><img src="{{url('assets/images/dietitation.png')}}" style="width:20px; height:20px;"></i>
              <span>Basic Settings</span>
            </a>
          </li>


        </ul>
      </li> 
      <!-- Dropdown Settings End-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ '/logout' }}">
         <i><img src="{{url('assets/images/logout.png')}}" style="width:20px; height:20px;"></i>
          <span>Log Out</span>
        </a>
      </li>
      <div class=" d-flex justify-content-center ps-3">
         <button class="btn version_btn px-5 py-0"> V-1.01 Beta</button>      
      </div>     
    </ul>
    