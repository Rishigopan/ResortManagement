<!DOCTYPE html>
<html lang="en">

    <head>

        @include('layouts.headder')
        <title>Treatment Report</title>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Patient Treatment Report</h4>                                  
            </div>
            <div class="row mt-4 mx-3">
                <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active phtab" id="pills-optreatment-tab" data-bs-toggle="pill" data-bs-target="#pills-optreatment" type="button" role="tab" aria-controls="pills-home" aria-selected="true">OP Treatment Report</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link phtab" id="pills-iptreatment-tab" data-bs-toggle="pill" data-bs-target="#pills-iptreatment" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">IP Treatment Report</button>
                    </li>
                </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-optreatment" role="tabpanel" aria-labelledby="pills-optreatment-tab">
                        <!-- Contents of the OP Treatment Report tab -->
                        <div class="wrapper">
                            <!--CONTENTS-->
                            <div class="container-fluid mainContents">
                                <div class="card card-body main_card mt-2 p-3 mb-2">                           
                                    <div class="main_heading  mb-2 p-2">
                                        <div class="container-fluid ">
                                        <form class="AddForm" id="treatment_teport" novalidate>
                                            <div class="row">
                                                    <div class="col-xl-2 col-lg-2 col-6">
                                                        <label class="mt-3 mb-1 inputlabel ">Op Number<span  style="color:red"> *</span></label><br>
                                                        <select class="SearchAndSelect inputfield op_no" aria-label="Default select example name"id="op_no" name="OPNo" >
                                                            <option value=""> Choose OP Number</option>
                                                            @foreach ($opno as $key )   
                                                                <option class="inputlabel" value="{{$key->id}}" data-gender="{{$key->gender}}">{{$key->op_no}} </option>
                                                            @endforeach    
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-2 col-6">
                                                        <label class="mt-3 mb-1 inputlabel ">Consultation Number</label><br>
                                                        <select class="form-select inputfield consult_no" aria-label="Default select example name"id="consult_no" name="ConsultNo" >
                                                        <option value=""> Choose Consultation Number</option>
                                                        @foreach ($cono as $key ) 
                                                            <option class="inputlabel" value="{{$key->id}}">{{$key->consultation_no}} </option>
                                                        @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="col-xl-2 col-lg-2 col-6 ">
                                                        <label class="mt-3 mb-1 inputlabel">Date</label><br>
                                                        <input type="date" class="form-control inputfield" id="date" name="Date" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-2 col-6">
                                                        <label class="mt-3 mb-1 inputlabel ">Previous History Count</label><br>
                                                        <select class="form-select inputfield " aria-label="Default select example name"id="datecount" name="Datecount" >
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15"> 15</option>
                                                        <option value="20"> 20</option>

                                                        </select> 
                                                    </div>
                                                    <div class=" col-xl-2 col-lg-2 col-6 mt-4 text-end">
                                                        <button type="submit" class="btn savebtn  px-5 mt-3"> Search</button>
                                                    </div>
                                                    
                                                </div>
                                            </form> 
                                            <div class="row mt-3 d-flex justify-content-between">
                                                <p class=""><b>Name : </b><span id="name-value"></span></p>
                                                <p class="mb-0"><b>Age : </b><span id="age-value"></span></p>
                                            </div>                
                                            <div class="col-12 text-end fs-4">
                                                <i id="PrintOpTreat" class="ri-printer-line reportprinticon"></i>
                                            </div>                   
                                        </div>
                                    </div>
                                    <div>
                                        <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                            <thead class="tablehead">
                                                <tr>
                                                    <th class="text-center">Sl No</th>
                                                    <th class="text-center">Date</th>                                    
                                                    <th class="text-center">Morning Session</th>                                    
                                                    <th class="text-center">Evening Session</th>                                    
                                                    <th class="text-center">Amount</th>                                                                      
                                                </tr>                                            
                                            </thead>
                                            <tbody>
                                                <tr>
                                                                                                                
                                                </tr> 
                                            </tbody> 
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>                                    
                                                    <th class="text-center"></th>                                    
                                                    <th class="text-center">Total Amount</th>                                    
                                                    <th class="text-center" id="total-amount"></th>                                                                      
                                                </tr> 
                                            </tfoot>                             
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="tab-pane fade" id="pills-iptreatment" role="tabpanel" aria-labelledby="pills-iptreatment-tab">
                        <!-- Contents of the IP Treatment Report tab -->
                        <div class="wrapper">
                        <!--CONTENTS-->
                        <div class="container-fluid mainContents">
                            <div class="card card-body main_card mt-2 p-3 mb-2">                           
                                <div class="main_heading  mb-2 p-2">
                                    <div class="container-fluid ">
                                    <form class="AddForm" id="ip_treatment_teport" novalidate>
                                        <div class="row">
                                                <div class="col-xl-2 col-lg-2 col-6">
                                                    <label class="mt-3 mb-1 inputlabel ">Ip Number<span  style="color:red"> *</span></label><br>
                                                    <select class="SearchAndSelect inputfield IP_No" aria-label="Default select example name"id="ip_no">
                                                        <option value=""> Choose IP Number</option>
                                                        @foreach ($ipno as $key )   
                                                            <option class="inputlabel" value="{{$key->id}}" data-gender="{{$key->gender}}">{{$key->ip_no}} </option>
                                                        @endforeach  
                                                    </select>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-6">
                                                    <label class="mt-3 mb-1 inputlabel ">IP Consultation Number</label><br>
                                                    <select class="form-select inputfield ip_consult_no" aria-label="Default select example name"id="ip_consult_no">
                                                    <option value=""> Choose IP Consultation Number</option>
                                                    @foreach ($cono as $key ) 
                                                        <option class="inputlabel" value="{{$key->id}}">{{$key->ip_consultation_no}} </option>
                                                    @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-6 ">
                                                    <label class="mt-3 mb-1 inputlabel">Date</label><br>
                                                    <input type="date" class="form-control inputfield" id="ip_date" name="ipDate" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-6">
                                                    <label class="mt-3 mb-1 inputlabel ">Previous History Count</label><br>
                                                    <select class="form-select inputfield " aria-label="Default select example name"id="ip_datecount" name="Datecount" >
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15"> 15</option>
                                                    <option value="20"> 20</option>

                                                    </select> 
                                                </div>
                                                <div class=" col-xl-2 col-lg-2 col-6 mt-4 text-end">
                                                    <button type="submit" class="btn savebtn mt-3 px-5 "> Search</button>
                                                </div>
                                            </div>
                                        </form> 
                                        <div class="row mt-3 d-flex justify-content-between">
                                            <p><b>Name : </b><span id="ip_name-value"></span></p>
                                            <p class="mb-0"><b>Age : </b><span id="ip_age-value"></span></p>
                                        </div>  
                                        <div class="col-12 text-end fs-4">
                                            <i id="PrintIpTreat" class="ri-printer-line  reportprinticon"></i>
                                        </div>                                 
                                    </div>
                                </div>
                                <div>
                                    <table class="table  table-hover IPMasterTable" id="ip_MasterTable" style="width: 100%;">
                                        <thead class="tablehead">
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">Date</th>                                    
                                                <th class="text-center">Morning Session</th>                                    
                                                <th class="text-center">Evening Session</th>                                    
                                                <th class="text-center">Amount</th>                                                                      
                                            </tr>                                            
                                        </thead>
                                        <tbody>
                                            <tr>
                                                                                                                
                                            </tr> 
                                        </tbody> 
                                        <tfoot>
                                            <tr>
                                                <th class="text-center"></th>
                                                <th class="text-center"></th>                                    
                                                <th class="text-center"></th>                                    
                                                <th class="text-center">Total Amount</th>                                    
                                                <th class="text-center" id="ip_total_amount"></th>                                                                      
                                            </tr> 
                                        </tfoot>                             
                                    </table>
                                </div>
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

            // ********************************************OP Report**********************************************************************//

            //Onchange functions
            
            $(document).on('change','.op_no',(function(){
                var opId = $(this).val();
                loadOP(opId);
            }));

            //Oncange OP Consultation
            function loadOP(OpNum) {
                if (OpNum) {
                    $.ajax({
                        url: '/api/casesheetConsultation/' + OpNum,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('.consult_no').empty();
                            $('.consult_no').append('<option value="">Choose Consultation Number</option>');
                            $.each(data, function(key, value) {
                                $('.consult_no').append('<option class="inputlabel" value="' + value.id + '">' + value.consultation_no + '</option>');
                            });
                        }
                    });
                } else {
                    $('.consult_no').empty();
                    $('.consult_no').append('<option value="">Choose Consultation Number</option>');
                    $('.mrng_therapist').empty();
                    $('.mrng_therapist').append('<option value="">Choose Therapist</option>');
                }
            }

            $(document).on('submit', '#treatment_teport', function(e) {
                e.preventDefault();
                var OpNumb = $('#op_no').val();
                var ConNum = $('#consult_no').val();
                var Date = $('#date').val();
                var Count = $('#datecount').val();

                var settings = {
                    "url": "/api/Optreatmentreportdata?OpNumber=" + OpNumb + "&ConNumber=" + ConNum + "&Date=" + Date + "&DataCount=" + Count,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json"
                    },
                };

                $.ajax(settings).done(function(response) {
                    var OPtreatmentreports = response.OPtreatmentreports;
                    OPtreatmentreports = OPtreatmentreports.OPtreatmentreports;
                    console.log(OPtreatmentreports);


                    // Display name values from the first array
                    var firstReport = OPtreatmentreports[0];
                    $('#name-value').text(firstReport.name);
                    $('#op-number-value').text(firstReport.op_no);
                    $('#age-value').text(firstReport.age);
                    $('#phone-no-value').text(firstReport.mobile_no);


                    var tableBody = $('#MasterTable tbody');
                    tableBody.empty();

                    var totalAmount = 0; // Initialize total amount

                    $.each(OPtreatmentreports, function(index, report) {
                        var row = $('<tr></tr>');
                        row.append('<td class="text-center">' + (index + 1) + '</td>');
                        row.append('<td class="text-center">' + report.date + '</td>');
                        row.append('<td class="text-center">' + report.morning_session_names + '</td>');
                        row.append('<td class="text-center">' + report.afternoon_session_names + '</td>');
                        row.append('<td class="text-center">' + report.treatment_cost + '</td>');

                        tableBody.append(row);

                        totalAmount += parseFloat(report.treatment_cost); // Accumulate treatment cost
                    });



                    // Update the table footer with the total amount
                    $('#total-amount').text(totalAmount.toFixed(2));
                });
            });


            $(document).on('click', '#PrintOpTreat', function(e) {
                var OpNumb = $('#op_no').val();
                var ConNum = $('#consult_no').val();
                var Date = $('#date').val();
                var Count = $('#datecount').val();

                var url = 'OptreatPrint?OpNumber=' + OpNumb + '&ConNumber=' + ConNum + '&Date=' + Date + '&DataCount=' + Count;
                window.open(url, '_blank');
            });



        // ***************************************IP Report**********************************************************************//


            
            //Onchange functions
            $(document).on('change','.IP_No',(function(){
                var IpId = $(this).val();
                loadIp(IpId);
            }));

            //Oncange Ip Consultation
            function loadIp(IpNum) {
                if (IpNum) {
                    $.ajax({
                        url: '/api/IpCasesheetConsultation/' + IpNum,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('.ip_consult_no').empty();
                            $('.ip_consult_no').append('<option value="">Choose Consultation Number</option>');
                            $.each(data, function(key, value) {
                                $('.ip_consult_no').append('<option class="inputlabel" value="' + value.id + '">' + value.ip_consultation_no + '</option>');
                            });
                        }
                    });
                } else {
                    $('.ip_consult_no').empty();
                    $('.ip_consult_no').append('<option value="">Choose Consultation Number</option>');
                }
            }


            $(document).on('submit', '#ip_treatment_teport', function(e) {
                e.preventDefault();
                var IpNumb = $('#ip_no').val();
                var IpConNum = $('#ip_consult_no').val();
                var IpDate = $('#ip_date').val();
                var IpCount = $('#ip_datecount').val();

                var settings = {
                    "url": "/api/Iptreatmentreportdata?IpNumber=" + IpNumb + "&ConNumber=" + IpConNum + "&Date=" + IpDate + "&DataCount=" + IpCount,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json"
                    },
                };

                $.ajax(settings).done(function(response) {
                    var Iptreatmentreports = response.Iptreatmentreports;
                    Iptreatmentreports = Iptreatmentreports.Iptreatmentreports;
                    console.log(Iptreatmentreports);


                    // Display name values from the first array
                    var firstReport = Iptreatmentreports[0];
                    $('#ip_name-value').text(firstReport.name);
                    $('#ip_op-number-value').text(firstReport.ip_no);
                    $('#ip_age-value').text(firstReport.age);
                    $('#ip_phone-no-value').text(firstReport.mobile_no);


                    var tableBody = $('#ip_MasterTable tbody');
                    tableBody.empty();

                    var totalAmount = 0; // Initialize total amount

                    $.each(Iptreatmentreports, function(index, report) {
                        var row = $('<tr></tr>');
                        row.append('<td class="text-center">' + (index + 1) + '</td>');
                        row.append('<td class="text-center">' + report.date + '</td>');
                        row.append('<td class="text-center">' + report.morning_session_names + '</td>');
                        row.append('<td class="text-center">' + report.afternoon_session_names + '</td>');
                        row.append('<td class="text-center">' + report.treatment_cost + '</td>');

                        tableBody.append(row);

                        totalAmount += parseFloat(report.treatment_cost); // Accumulate treatment cost
                    });



                    // Update the table footer with the total amount
                    $('#ip_total_amount').text(totalAmount.toFixed(2));
                });
            });


            $(document).on('click', '#PrintIpTreat', function(e) {
                var IpNumb = $('#ip_no').val();
                var IpConNum = $('#ip_consult_no').val();
                var IpDate = $('#ip_date').val();
                var IpCount = $('#ip_datecount').val();

                var url = 'IptreatPrint?IpNumber=' + IpNumb + '&ConNumber=' + IpConNum + '&Date=' + IpDate + '&DataCount=' + IpCount;
                window.open(url, '_blank');
            });

           //Search And Select
           $('.SearchAndSelect').selectize();


        </script>
    </body>

</html>