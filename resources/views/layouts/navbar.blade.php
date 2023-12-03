
<div class="d-flex align-items-center justify-content-between">
  <i class="bi bi-list toggle-sidebar-btn"></i>
  <a  href="{{ url('/dashboard') }}" class="logo d-flex align-items-center">
    <span class="d-lg-block ms-3">BETHANY <br></span>
  </a> 
</div><!-- End Logo -->
<nav class="header-nav ms-auto me-auto">  
  <ul class="d-lg-flex align-items-center d-none">
    <li class="nav-item">
    <a class="nav-link collapsed navop me-4"  href="{{ url('/OP') }}">OP</a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed navop me-4" href="{{ url('/Consultation') }}">OP Consultation</a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed navop me-4" href="{{ url('/Token') }}">Token</a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed navop me-4"href="{{ url('/IP') }}">IP</a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed navop me-4" href="{{ url('/IpConsultation') }}">IP Consultation</a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed navop me-4" href="{{ url('/IPDetails') }}">IP List</a>
    </li>
  </ul>
</nav> 
<div class="dropdown me-4 text-end">
  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" >
    <img src="assets/images/doctor.png" alt="Profile" class="rounded-circle" style="width:30px; height:30px;">
    <span class="d-md-block  ps-2">{{ Auth::user()->name }}</span>
  </a>
  
  <!-- End Profile Dropdown Items -->
</div>