<!DOCTYPE html>
<html lang="en">

    <head>
        @include('layouts.headder')
    </head>

    <body>

    <!-- Morning Treatment Modal -->

        <div class="modal fade addUpdateModal " id="mrngtreatmentModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Treatments</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-12">
                                <input type="hidden"  id="view_department_id" >
                                <label class="mt-2 mb-1 inputlabel">Treatments</label><br>
                                <input class="form-control mt-1 inputfield" id="view_treatments" name="ViewTreatments">
                            </div>                           
                            <div class=" col-12">
                                <label class="mt-3 mb-1 inputlabel">Vital Datas </label><br>
                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield" id="view_vital_datas" name="ViewVitalDatas" ></textarea>
                            </div>                            
                        </div>  
                        <div class=" text-end mt-3">
                            <button type="button" class="btn savebtn  px-5 "data-bs-dismiss="modal" aria-label="Close">Close</button>
                        </div>                              
                    </div>
                </div>
            </div>
        </div>

        <!-- Afternoon Treatment Modal -->

        <div class="modal fade addUpdateModal " id="afternoontreatmentModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Treatments</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-12">
                                <input type="hidden"  id="view_department_id" >
                                <label class="mt-2 mb-1 inputlabel">Treatments</label><br>
                                <input class="form-control mt-1 inputfield" id="view_evn_treatments" name="ViewTreatments">
                            </div>                           
                            <div class=" col-12">
                                <label class="mt-3 mb-1 inputlabel">Vital Datas </label><br>
                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield" id="view_evng_vital_datas" name="ViewVitalDatas" ></textarea>
                            </div>                            
                        </div>  
                        <div class=" text-end mt-3">
                            <button type="button" class="btn savebtn  px-5 "data-bs-dismiss="modal" aria-label="Close">Close</button>
                        </div>                              
                    </div>
                </div>
            </div>
        </div>
         <!--IP Morning Treatment Modal -->

         <div class="modal fade addUpdateModal " id="ip_mrngtreatmentModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Treatments</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-12">
                                <input type="hidden"  id="view_department_id" >
                                <label class="mt-2 mb-1 inputlabel">Treatments</label><br>
                                <input class="form-control mt-1 inputfield" id="ip_view_treatments" name="ViewTreatments">
                            </div>                           
                            <div class=" col-12">
                                <label class="mt-3 mb-1 inputlabel">Vital Datas </label><br>
                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield" id="ip_view_vital_datas" name="ViewVitalDatas" ></textarea>
                            </div>                            
                        </div>  
                        <div class=" text-end mt-3">
                            <button type="button" class="btn savebtn  px-5 "data-bs-dismiss="modal" aria-label="Close">Close</button>
                        </div>                              
                    </div>
                </div>
            </div>
        </div>

        <!-- IP Afternoon Treatment Modal -->

        <div class="modal fade addUpdateModal " id="ip_afternoontreatmentModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Treatments</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-12">
                                <input type="hidden"  id="view_department_id" >
                                <label class="mt-2 mb-1 inputlabel">Treatments</label><br>
                                <input class="form-control mt-1 inputfield" id="ip_view_evn_treatments" name="ViewTreatments">
                            </div>                           
                            <div class=" col-12">
                                <label class="mt-3 mb-1 inputlabel">Vital Datas </label><br>
                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield" id="ip_view_evng_vital_datas" name="ViewVitalDatas" ></textarea>
                            </div>                            
                        </div>  
                        <div class=" text-end mt-3">
                            <button type="button" class="btn savebtn  px-5 "data-bs-dismiss="modal" aria-label="Close">Close</button>
                        </div>                              
                    </div>
                </div>
            </div>
        </div>

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

            <div class="container-fluid ">
                <h4 class="mt-4 d-flex justify-content-center py-1 contitle">Treatment Schedule</h4>                                                                  
            </div>                    
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="container-fluid">
                        <form class="Token AddForm" id="therapist_schedule" novalidate>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-6">
                                    <label class="mt-3 mb-1 inputlabel">Therapist<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield mt-1" aria-label="Default select example name"id="therapist" name="Therapist">
                                        <option hidden value=""> Choose a Therapist</option>
                                        @foreach ($therapist as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6">
                                    <label class="mt-3 mb-1 inputlabel"> Date<span  style="color:red"> *</span></label><br>
                                    <input type="date"  class="form-control mt-1 inputfield" id="date" name="Date"   value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 text-start mt-4">
                                    <button type="submit" id="schedulesubmit" class="btn savebtn  mt-3 px-4">Submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <div class="card card-body main_card mt-2 shadow-lg p-3 mb-2">
                            <h4 class="mt-1 d-flex justify-content-center py-1" >OP</h4>                                                                                            
                        <div class="main_heading mb-2 shadow p-2 subheading">
                            <div class="container-fluid ">
                                <h4 class="mt-1 d-flex justify-content-center py-1 contitle" data-bs-toggle="collapse" href="#morningcollapse"><i class="ri-arrow-drop-down-line"></i>Morning Session</h4>                                                                  
                            </div> 
                            <div class="collapse clpse" id="morningcollapse">
                                <div class="table-responsive">
                                    <table class="table  table-hover " id="mrng_table" style="width: 100%;">
                                        <thead class="  tablehead">
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">OP No</th>
                                                <th class="text-center">Consultation No</th>
                                                <th class="text-center">Patient Name</th>
                                                <th class="text-center">Age</th>                                                
                                                <th class="text-center">Doctor Name</th>
                                                <th class="text-center">Treatment</th>
                                            </tr>                                           
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="main_heading mb-2 shadow p-2 subheading">
                            <div class="container-fluid ">
                                <h4 class="mt-1 d-flex justify-content-center py-1 contitle" data-bs-toggle="collapse" href="#afternooncollapse"><i class="ri-arrow-drop-down-line"></i>Afternoon Session</h4>                                                                  
                            </div> 
                            <div class="collapse clpse" id="afternooncollapse">
                                <div class="table-responsive">
                                    <table class="table  table-hover" id="evng_table" style="width: 100%;">
                                        <thead class="tablehead">
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">OP No</th>
                                                <th class="text-center">Consultation No</th>
                                                <th class="text-center">Patient Name</th>
                                                <th class="text-center">Age</th>                                                
                                                <th class="text-center">Doctor Name</th>
                                                <th class="text-center">Treatment</th>
                                            </tr>                                           
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- IP Schedule -->
                        <h4 class="mt-1 d-flex justify-content-center py-1" >IP</h4>                                                                                            
                        <div class="main_heading mb-2 shadow p-2 subheading">
                            <div class="container-fluid ">
                                <h4 class="mt-1 d-flex justify-content-center py-1 contitle" data-bs-toggle="collapse" href="#IPmorningcollapse"><i class="ri-arrow-drop-down-line"></i>Morning Session</h4>                                                                  
                            </div> 
                            <div class="collapse clpse" id="IPmorningcollapse">
                                <div class="table-responsive">
                                    <table class="table  table-hover " id="ip_mrng_table" style="width: 100%;">
                                        <thead class="  tablehead">
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">IP No</th>
                                                <th class="text-center">IP Consultation No</th>
                                                <th class="text-center">Patient Name</th>
                                                <th class="text-center">Age</th>                                                
                                                <th class="text-center">Doctor Name</th>
                                                <th class="text-center">Treatment</th>
                                            </tr>                                           
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="main_heading mb-2 shadow p-2 subheading">
                            <div class="container-fluid ">
                                <h4 class="mt-1 d-flex justify-content-center py-1 contitle" data-bs-toggle="collapse" href="#IPafternooncollapse"><i class="ri-arrow-drop-down-line"></i>Afternoon Session</h4>                                                                  
                            </div> 
                            <div class="collapse clpse" id="IPafternooncollapse">
                                <div class="table-responsive">
                                    <table class="table  table-hover" id="ip_evng_table" style="width: 100%;">
                                        <thead class="tablehead">
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">IP No</th>
                                                <th class="text-center">IP Consultation No</th>
                                                <th class="text-center">Patient Name</th>
                                                <th class="text-center">Age</th>                                                
                                                <th class="text-center">Doctor Name</th>
                                                <th class="text-center">Treatment</th>
                                            </tr>                                           
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </main><!-- End #main -->
        @include('layouts.footer')
        <script>
            $(document).on('submit', '#therapist_schedule', function (e) {
                e.preventDefault();
                var therapistId = $('#therapist').val();
                var date = $('#date').val();
                var settings = {
                    "url": "/api/gettherapistschedule?date=" + date + "&therapistid=" + therapistId,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                    "Accept": "application/json"
                    },
                };
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var morningData = response.case_sheets.data.morning_session;
                    var eveningData = response.case_sheets.data.afternoon_session;
                    var ipmorningData = response.case_sheets.data.ipmorning_session;
                    var ipeveningData = response.case_sheets.data.ipafternoon_session;

                    // Update the morning session table
                    var morningTable = $('#mrng_table');
                    morningTable.find('tbody').empty(); // Clear previous data

                    $.each(morningData, function (index, item) {
                    var row = $('<tr>');
                    row.append('<td class="text-center">' + (index + 1) + '</td>');
                    row.append('<td class="text-center">' + item.op_no + '</td>');
                    row.append('<td class="text-center">' + item.consultation_no + '</td>');
                    row.append('<td class="text-center">' + item.name + '</td>');
                    row.append('<td class="text-center">' + item.age + '</td>');
                    row.append('<td class="text-center">' + item.StaffName + '</td>');
                    row.append('<td class="text-center"><button class="btn activebtn mrngtreatment-btn" data-vital-data="' + item.vital_dates + '" data-treatment-names="' + item.TreatmentName + '" data-bs-toggle="modal" data-bs-target="#mrngtreatmentModal">Treatment</button></td>');

                    morningTable.append(row);
                    });
                    if (morningData.length > 0) {
                        $('#morningcollapse').collapse('show');
                    } else {
                        $('#morningcollapse').collapse('hide');
                    }


                    // Update the afternoon session table
                    var eveningTable = $('#evng_table');
                    eveningTable.find('tbody').empty(); // Clear previous data

                    $.each(eveningData, function (index, item) {
                    var row = $('<tr>');
                    row.append('<td class="text-center">' + (index + 1) + '</td>');
                    row.append('<td class="text-center">' + item.op_no + '</td>');
                    row.append('<td class="text-center">' + item.consultation_no + '</td>');
                    row.append('<td class="text-center">' + item.name + '</td>');
                    row.append('<td class="text-center">' + item.age + '</td>');
                    row.append('<td class="text-center">' + item.StaffName + '</td>');
                    row.append('<td class="text-center"><button class="btn activebtn afternoontreatment-btn" data-vital-data="' + item.vital_dates + '" data-treatment-names="' + item.TreatmentName + '" data-bs-toggle="modal" data-bs-target="#afternoontreatmentModal">Treatment</button></td>');

                    eveningTable.append(row);
                    });
                    if (eveningData.length > 0) {
                        $('#afternooncollapse').collapse('show');
                    } else {
                        $('#afternooncollapse').collapse('hide');
                    }

                    // Update the IP morning session table
                    var ipmorningTable = $('#ip_mrng_table');
                    ipmorningTable.find('tbody').empty(); // Clear previous data

                    $.each(ipmorningData, function (index, item) {
                    var row = $('<tr>');
                    row.append('<td class="text-center">' + (index + 1) + '</td>');
                    row.append('<td class="text-center">' + item.ip_no + '</td>');
                    row.append('<td class="text-center">' + item.ip_consultation_no + '</td>');
                    row.append('<td class="text-center">' + item.name + '</td>');
                    row.append('<td class="text-center">' + item.age + '</td>');
                    row.append('<td class="text-center">' + item.StaffName + '</td>');
                    row.append('<td class="text-center"><button class="btn activebtn ip_mrngtreatment-btn" data-vital-data="' + item.vital_dates + '" data-treatment-names="' + item.TreatmentName + '" data-bs-toggle="modal" data-bs-target="#ip_mrngtreatmentModal">Treatment</button></td>');

                    ipmorningTable.append(row);
                    });
                    if (ipmorningData.length > 0) {
                        $('#IPmorningcollapse').collapse('show');
                    } else {
                        $('#IPmorningcollapse').collapse('hide');
                    }

                    // Update the IP afternoon session table
                    var ipeveningTable = $('#ip_evng_table');
                    ipeveningTable.find('tbody').empty(); // Clear previous data

                    $.each(ipeveningData, function (index, item) {
                    var row = $('<tr>');
                    row.append('<td class="text-center">' + (index + 1) + '</td>');
                    row.append('<td class="text-center">' + item.ip_no + '</td>');
                    row.append('<td class="text-center">' + item.ip_consultation_no + '</td>');
                    row.append('<td class="text-center">' + item.name + '</td>');
                    row.append('<td class="text-center">' + item.age + '</td>');
                    row.append('<td class="text-center">' + item.StaffName + '</td>');
                    row.append('<td class="text-center"><button class="btn activebtn ip_afternoontreatment-btn" data-vital-data="' + item.vital_dates + '" data-treatment-names="' + item.TreatmentName + '" data-bs-toggle="modal" data-bs-target="#ip_afternoontreatmentModal">Treatment</button></td>');

                    ipeveningTable.append(row);
                    });
                    if (ipeveningData.length > 0) {
                        $('#IPafternooncollapse').collapse('show');
                    } else {
                        $('#IPafternooncollapse').collapse('hide');
                    }

                });
            });

            $(document).on('click', '.mrngtreatment-btn', function() {
                var treatmentNames = $(this).data('treatment-names');
                var treatmentNamesString = treatmentNames.split(',').join(', ');
                var vitalData = $(this).data('vital-data');

                $('#view_vital_datas').val(vitalData);
                $('#view_treatments').val(treatmentNamesString);
            });


            $(document).on('click', '.afternoontreatment-btn', function() {
                var treatmentNames = $(this).data('treatment-names');
                var treatmentNamesString = treatmentNames.split(',').join(', ');
                var vitalData = $(this).data('vital-data');

                $('#view_evng_vital_datas').val(vitalData);
                $('#view_evn_treatments').val(treatmentNamesString);
            });

            $(document).on('click', '.ip_mrngtreatment-btn', function() {
                var treatmentNames = $(this).data('treatment-names');
                var treatmentNamesString = treatmentNames.split(',').join(', ');
                var vitalData = $(this).data('vital-data');

                $('#ip_view_vital_datas').val(vitalData);
                $('#ip_view_treatments').val(treatmentNamesString);
            });


            $(document).on('click', '.ip_afternoontreatment-btn', function() {
                var treatmentNames = $(this).data('treatment-names');
                var treatmentNamesString = treatmentNames.split(',').join(', ');
                var vitalData = $(this).data('vital-data');
                
                $('#ip_view_evng_vital_datas').val(vitalData);
                $('#ip_view_evn_treatments').val(treatmentNamesString);
            });


           // Focus First Field
            $(document).ready(function() {
                $('#therapist').focus();
              
            });
            
        </script> 
    </body>
</html>