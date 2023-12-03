<!DOCTYPE html>
<html lang="en">

    <head>

      @include('layouts.headder')
      <title>Patient History</title>
        <style>
            .mainContents{
                display:none;
            }
        </style>
    </head>

    <body>


        <!-- ======= Header ======= -->
        
        <header id="header" class="header fixed-top d-flex align-items-center">
            @include('layouts.navbar')
        </header>

        <!-- End Header -->

        <!-- ======= Sidebar ======= -->

        <aside id="sidebar" class="sidebar ps-0">
            @include('layouts.sidebar')
        </aside>

        <!-- End Sidebar-->

        <main id="main" class="main">
            <div class="container-fluid">
                <h4 class="d-flex justify-content-center py-1 contitle">Patient History </h4>             
            </div>
            
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="card card-body main_card mt-2 p-3 mb-2">
                        <form class="AddForm" id="patient_history" novalidate>
                            <div class="row mx-2">
                                <div class="col-xl-3 col-lg-3 col-6">
                                    <label class="mt-3 mb-1 ">Op Number</label><br>
                                    <select class="form-select inputfield" aria-label="Default select example name"id="op_no" name="OPNo" >
                                    <option value=""> Choose OP Number</option>
                                    @foreach ($opno as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                    @endforeach    
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-6">
                                    <label class="mt-3 mb-1 ">IP Number</label><br>
                                    <select class="form-select inputfield" aria-label="Default select example name"id="ip_no" name="IPNo" >
                                        <option hidden value=""> Choose IP Number</option>
                                        @foreach ($ipno as $key )   
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->ip_no}} </option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-6 ">
                                    <label class="mt-3 mb-1 inputlabel">From Date</label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="from_date" name="FromDate">
                                </div> 
                                <div class="col-xl-3 col-lg-3 col-6 ">
                                    <label class="mt-3 mb-1 inputlabel">To Date</label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="to_date" name="ToDate">
                                </div> 
                            </div>
                            <div class="text-end mt-4 me-3">
                                <button class="btn savebtn  px-5 ">Search</button>
                            </div>
                        </form> 

                        <!-- Tab -->
                        <div class="row mt-4">
                            <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active phtab" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Medical record</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link phtab" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"> Medical Bills</button>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-content" id="pills-tabContent">
                            <!-- Cards -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row mt-4">
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-12"> 
                                        <h5>Patient Profile</h5>       
                                        <div class="card text-start patientrecCard py-3">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-4">
                                                            <img src="{{url('assets/images/patienthistor.png')}}" style="height:100px;width:100px;" class="img-fluid p-2">
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Age:</p> <p class="mb-0 ms-2 ph_age"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Gender:</p> <p class="mb-0 ms-2 ph_gender"></p>
                                                            </div>
                                                        </div> 
                                                        <div class="col-8">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="ph_name"></h5>
                                                                <button class="btn activebtn">Active</button>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <p class="mb-0 phlabel">Mob. No:</p> <p class="mb-0 ms-2 ph_mobile"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Address:</p> <p class="mb-0 ms-2 ph_address"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Email:</p> <p class="mb-0 ms-2 ph_email"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Occupation:</p> <p class="mb-0 ms-2 ph_occupation"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Marital Status:</p> <p class="mb-0 ms-2 ph_marital_status"></p>
                                                            </div>
                                                        </div> 
                                                    </div>     
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-7 col-12">   
                                        <div class="card text-start patientrecCard mt-4">
                                            <div class="card-body">
                                                        
                                                <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <h5>Case Sheet</h5>       

                                                        </div> 
                                                        <div class="col-6 text-end">
                                                            <button class="btn  activebtn"> Browse All</button>

                                                        </div> 
                                                    </div>  
                                                    <div class="row mt-3">
                                                        <div>
                                                            <table class="table table-striped" id="" style="width: 100%;">
                                                                <thead class="">
                                                                    <tr>
                                                                        <td class="text-center phlabel">Date</td>
                                                                        <td class="text-center phlabel">Treatment</td>
                                                                    </tr>                                            
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center ">01-03-2023</td>
                                                                        <td class="text-center ">KIZHI</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">02-04-2023</td>
                                                                        <td class="text-center ">Acupuncuture</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">05-05-2023</td>
                                                                        <td class="text-center ">Meditation</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>   
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12"> 
                                        <div class="card text-start patientrecCard">
                                            <div class="card-body">
                                            <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <h5>BMI</h5>       
                                                        </div> 
                                                        <div class="col-6 text-end">
                                                            <button class="btn  activebtn"> Browse All</button>

                                                        </div> 
                                                    </div>  
                                                    <div class="row mt-3">
                                                        <div>
                                                            <table class="table table-striped" id="" style="width: 100%;">
                                                                <thead class="">
                                                                    <tr>
                                                                        <td class="text-center phlabel">Date</td>
                                                                        <td class="text-center phlabel">Weight</td>
                                                                        <td class="text-center phlabel">Temperature</td>
                                                                        <td class="text-center phlabel">BP</td>
                                                                    </tr>                                            
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center ">01-03-2023</td>
                                                                        <td class="text-center ">60 </td>
                                                                        <td class="text-center ">98 </td>
                                                                        <td class="text-center ">120/80 </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">02-04-2023</td>
                                                                        <td class="text-center ">62 </td>
                                                                        <td class="text-center ">97 </td>
                                                                        <td class="text-center ">118/70 </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">05-05-2023</td>
                                                                        <td class="text-center ">64 </td>
                                                                        <td class="text-center ">100 </td>
                                                                        <td class="text-center ">140/100 </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12"> 
                                        <div class="card text-start patientrecCard">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <h5>Diet Chart</h5>       

                                                        </div> 
                                                        <div class="col-6 text-end">
                                                            <button class="btn  activebtn"> Browse All</button>

                                                        </div> 
                                                    </div>  
                                                    <div class="row mt-3">
                                                        <div>
                                                            <table class="table table-striped" id="" style="width: 100%;">
                                                                <thead class="">
                                                                    <tr>
                                                                        <td class="text-center phlabel">Date</td>
                                                                        <td class="text-center phlabel">Time</td>
                                                                        <td class="text-center phlabel">Diet</td>
                                                                    </tr>                                            
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center ">01-03-2023</td>
                                                                        <td class="text-center ">11.00 Am </td>
                                                                        <td class="text-center ">Papaya+Milk Shake</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">02-04-2023</td>
                                                                        <td class="text-center ">6.30 Am</td>
                                                                        <td class="text-center ">Chappathi</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">05-05-2023</td>
                                                                        <td class="text-center ">4.00 pm</td>
                                                                        <td class="text-center ">H.J </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>   
                                                </div>                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- medical Record End -->

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row mt-4">
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-12"> 
                                        <h5>Patient Profile</h5>       
                                        <div class="card text-start patientrecCard py-3">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row mt-3">
                                                    <div class="col-4">
                                                            <img src="{{url('assets/images/patienthistor.png')}}" style="height:100px;width:100px;" class="img-fluid p-2">
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Age:</p> <p class="mb-0 ms-2 ph_age"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Gender:</p> <p class="mb-0 ms-2 ph_gender"></p>
                                                            </div>
                                                        </div> 
                                                        <div class="col-8">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="ph_name"></h5>
                                                                <button class="btn activebtn">Active</button>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <p class="mb-0 phlabel">Mob. No:</p> <p class="mb-0 ms-2 ph_mobile"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Address:</p> <p class="mb-0 ms-2 ph_address"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Email:</p> <p class="mb-0 ms-2 ph_email"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Occupation:</p> <p class="mb-0 ms-2 ph_occupation"></p>
                                                            </div>
                                                            <div class="d-flex ">
                                                                <p class="mb-0 phlabel">Marital Status:</p> <p class="mb-0 ms-2 ph_marital_status"></p>
                                                            </div>
                                                        </div> 
                                                    </div>     
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-7 col-12 mt-4"> 
                                        <div class="card text-start patientrecCard">
                                            <div class="card-body">
                                            <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <h5>Consultation Bill</h5>       
                                                        </div> 
                                                        <div class="col-6 text-end">
                                                            <button class="btn  activebtn"> Browse All</button>

                                                        </div> 
                                                    </div>  
                                                    <div class="row mt-3">
                                                        <div>
                                                            <table class="table table-striped" id="" style="width: 100%;">
                                                                <thead class="">
                                                                    <tr>
                                                                        <td class="text-center phlabel">Date</td>
                                                                        <td class="text-center phlabel">Amount</td>
                                                                        <td class="text-center phlabel">Status</td>
                                                                    </tr>                                            
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center ">01-03-2023</td>
                                                                        <td class="text-center ">400 </td>
                                                                        <td class="text-center "><span class="badge bg-success px-4">Paid</span>  </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">02-04-2023</td>
                                                                        <td class="text-center ">450 </td>
                                                                        <td class="text-center "><span class="badge bg-success px-4">Paid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">05-05-2023</td>
                                                                        <td class="text-center ">500 </td>
                                                                        <td class="text-center "><span class="badge bg-danger">Pending</span> </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12"> 
                                        <div class="card text-start patientrecCard">
                                            <div class="card-body">
                                            <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <h5>Room Rent Bill</h5>       
                                                        </div> 
                                                        <div class="col-6 text-end">
                                                            <button class="btn  activebtn"> Browse All</button>

                                                        </div> 
                                                    </div>  
                                                    <div class="row mt-3">
                                                        <div>
                                                            <table class="table table-striped" id="" style="width: 100%;">
                                                                <thead class="">
                                                                    <tr>
                                                                        <td class="text-center phlabel">Date</td>
                                                                        <td class="text-center phlabel">Amount</td>
                                                                        <td class="text-center phlabel">Status</td>
                                                                    </tr>                                            
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center ">01-03-2023</td>
                                                                        <td class="text-center ">2500 </td>
                                                                        <td class="text-center "><span class="badge bg-success px-4">Paid</span>  </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">02-04-2023</td>
                                                                        <td class="text-center ">2600 </td>
                                                                        <td class="text-center "><span class="badge bg-danger">Pending</span> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">05-05-2023</td>
                                                                        <td class="text-center ">3000 </td>
                                                                        <td class="text-center "><span class="badge bg-danger">Pending</span> </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12"> 
                                        <div class="card text-start patientrecCard">
                                            <div class="card-body">
                                            <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <h5>Treatment Bill</h5>       
                                                        </div> 
                                                        <div class="col-6 text-end">
                                                            <button class="btn  activebtn"> Browse All</button>

                                                        </div> 
                                                    </div>  
                                                    <div class="row mt-3">
                                                        <div>
                                                            <table class="table table-striped" id="" style="width: 100%;">
                                                                <thead class="">
                                                                    <tr>
                                                                        <td class="text-center phlabel">Date</td>
                                                                        <td class="text-center phlabel">Amount</td>
                                                                        <td class="text-center phlabel">Status</td>
                                                                    </tr>                                            
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center ">01-03-2023</td>
                                                                        <td class="text-center ">600 </td>
                                                                        <td class="text-center "><span class="badge bg-success px-4">Paid</span>  </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">02-04-2023</td>
                                                                        <td class="text-center ">700 </td>
                                                                        <td class="text-center "><span class="badge bg-success px-4">Paid</span>  </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">05-05-2023</td>
                                                                        <td class="text-center ">800 </td>
                                                                        <td class="text-center "><span class="badge bg-danger">Pending</span> </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12"> 
                                        <div class="card text-start patientrecCard">
                                            <div class="card-body">
                                            <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <h5>Medicine Bill</h5>       
                                                        </div> 
                                                        <div class="col-6 text-end">
                                                            <button class="btn  activebtn"> Browse All</button>

                                                        </div> 
                                                    </div>  
                                                    <div class="row mt-3">
                                                        <div>
                                                            <table class="table table-striped" id="" style="width: 100%;">
                                                                <thead class="">
                                                                    <tr>
                                                                        <td class="text-center phlabel">Date</td>
                                                                        <td class="text-center phlabel">Amount</td>
                                                                        <td class="text-center phlabel">Status</td>
                                                                    </tr>                                            
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center ">01-03-2023</td>
                                                                        <td class="text-center ">600 </td>
                                                                        <td class="text-center "><span class="badge bg-success px-4">Paid</span>  </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">02-04-2023</td>
                                                                        <td class="text-center ">300 </td>
                                                                        <td class="text-center "><span class="badge bg-success px-4">Paid</span>  </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center ">05-05-2023</td>
                                                                        <td class="text-center ">200 </td>
                                                                        <td class="text-center "><span class="badge bg-danger">Pending</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- medical Bill End -->
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="loader">
            <div class="">
                <img class="img-fluid" src="{{url('assets/images/loading.gif')}}">
                <h4 class="text-center">LOADING</h4>
            </div>
        </div>
        </main><!-- End #main -->      

        @include('layouts.footer')

        <script type="text/javascript">
$(document).ready(function() {
    $(document).on('submit', '#patient_history', function(e) {
        e.preventDefault();
        var OPNum = $('#op_no').val();

        var settings = {
            "url": "/api/Patienthistorydata?OpNumber=" + OPNum,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Accept": "application/json"
            },
        };

        $.ajax(settings).done(function(response) {
            var PatientHistoryreports = response.PatientHistoryreports.PatientHistoryreports[0]; // Access the first object in the array
            console.log(PatientHistoryreports);

            // Update the HTML content of the elements with the response data
            $('.ph_name').text(PatientHistoryreports.name);
            $('.ph_mobile').text(PatientHistoryreports.mobile_no);
            $('.ph_address').text(PatientHistoryreports.local_address);
            $('.ph_email').text(PatientHistoryreports.email);
            $('.ph_occupation').text(PatientHistoryreports.occupation);
            $('.ph_age').text(PatientHistoryreports.age);

            // Handle gender value
            var genderText = "";
            if (PatientHistoryreports.gender === 1) {
                genderText = "Male";
            } else if (PatientHistoryreports.gender === 2) {
                genderText = "Female";
            } else if (PatientHistoryreports.gender === 3) {
                genderText = "Others";
            }
            $('.ph_gender').text(genderText);

            // Handle marital status value
            var maritalStatusText = "";
            if (PatientHistoryreports.marital_status === 1) {
                maritalStatusText = "Single";
            } else if (PatientHistoryreports.marital_status === 2) {
                maritalStatusText = "Married";
            } else if (PatientHistoryreports.marital_status === 3) {
                maritalStatusText = "Divorced";
            } else if (PatientHistoryreports.marital_status === 4) {
                maritalStatusText = "Widowed";
            } else if (PatientHistoryreports.marital_status === null) {
                maritalStatusText = "";
            }
            $('.ph_marital_status').text(maritalStatusText);
        });
    });
});




        </script>
    </body>

</html>