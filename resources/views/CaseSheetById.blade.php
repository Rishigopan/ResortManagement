<!DOCTYPE html>
<html lang="en">

    <head>

     @include('layouts.headder')
     <title>Case Sheet</title>
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

        <aside id="sidebar" class="sidebar ps-0" >
            @include('layouts.sidebar')
        </aside>

        <!-- End Sidebar-->
        <!-- Off Canvas -->
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="morningshedulecanvas" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Therapist Shedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <h4 class="ps-3" id="therapist_name"></h4>
            <div class="offcanvas-body">
                <table class="table-responsive  table-hover" id="scheduleTable" style="width: 100%;">
                    <thead class="tablehead">
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">M.S.</th>
                            <th class="text-center">E.S.</th>
                        </tr>
                    </thead>
                </table>
                <div id="alertMessage"></div>
            </div>
        </div>
        <main id="main" class="main">

            <div class="container-fluid">
                <h4 class="d-flex justify-content-center py-1 contitle">Case Sheet</h4>                                                                  
            </div>                    
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <form id="case_sheet" class="AddForm">                                                                 
                        <div class="row mx-2">
                            <div class="col-xl-4 col-lg-4 col-6 ">
                                <label class=" mb-1 inputlabel">Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="date" name="Date" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                            </div> 
                          
                            <div class="col-xl-4 col-lg-4 col-6">
                                <label class=" mb-1 inputlabel">Op Number<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="op_no" name="OPNo" disabled >
                                @foreach ($dispop as $key )   
                                    <option class="inputlabel" value="{{$key->op_id}}" data-gender="{{$key->gender}}">{{$key->op_no}} </option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6">
                                <label class=" mb-1 inputlabel">Consultation Number</label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="consult_no" name="ConsultNo" disabled>
                                @foreach ($dispop as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->consultation_no}} </option>
                                @endforeach   
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class=" mb-1 inputlabel">Morning Session</label><br>
                                <select class="inputfield CaseSheetselect multiselect" multiple aria-label="Default select example name"id="morning_session" name="MorningSession" >
                                <option value=""> Choose Treatment</option>
                                @foreach ($trect as $key ) 
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-8">
                                <label class="mt-1 mb-1 inputlabel">Therapist</label><br>
                                <select class="form-select inputfield mrng_therapist" aria-label="Default select example name" id="mrng_therapist" name="MorningTherapist">
                                    <option value=""> Choose  Therapist</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-4 mt-4 text-center">
                                <button id="MrngscheduleButton" type="button"  class="btn activebtn px-3"  data-bs-toggle="offcanvas" data-bs-target="#morningshedulecanvas" aria-controls="offcanvasWithBothOptions"> Shedule </button>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-612">
                                <label class=" mb-1 inputlabel">Afternoon Session</label><br>
                                <select class="inputfield CaseSheetselectafter multiselect" multiple aria-label="Default select example name"id="afternoon_session" name="AfternoonSession">
                                <option value=""> Choose Treatment</option>
                                @foreach ($trect as $key ) 
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-8">
                                <label class="mt-1 mb-1 inputlabel">Therapist</label><br>
                                <select class="form-select inputfield evng_therapist" aria-label="Default select example name"id="evng_therapist" name="EveningTherapist">
                                    <option value=""> Choose  Therapist</option>                                               
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-4 mt-4 text-center">
                                <button id="EvngscheduleButton" type="button"  class="btn activebtn px-3"  data-bs-toggle="offcanvas" data-bs-target="#morningshedulecanvas" aria-controls="offcanvasWithBothOptions"> Shedule </button>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class=" mb-1 inputlabel">Vital Datas</label><br>
                                <input class="form-control inputfield" id="vital_dates" name="VitalDates" list="vitaldataslist" autofocus >
                                <datalist id="vitaldataslist">
                                    @foreach ($templates as $key ) 
                                        <option value="{{$key->name}}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <p ><b>Name : </b><span class="name" id="name"></span></p>
                                    <p class="mb-0"><b>Age : </b><span class="age" id="age"></span></p>
                                </div>
                                <div class=" col-6 text-end my-3">
                                    <button type="submit" class="btn savebtn  px-5 "> Save</button>
                                </div>
                            </div> 
                        </div>                    
                    </form> 
                
                    <!-- Update -->
                    <form id="update_case_sheet" class="UpdateForm" style="display: none;">                                                                 
                        <div class="row mx-2">
                            <input type="hidden"  id="update_casesheet_id" >
                            <div class="col-xl-4 col-lg-4 col-6 ">
                                <label class=" mb-1 inputlabel">Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="update_date" name="UpdateDate">
                            </div> 
                            <div class="col-xl-4 col-lg-4 col-6">
                                <label class=" mb-1 inputlabel">Op Number<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="update_op_no" name="UpdateOPNo" disabled >
                                <option value=""> Choose OP Number</option>
                                @foreach ($dispop as $key )   
                                    <option class="inputlabel" value="{{$key->op_id}}" data-gender="{{$key->gender}}">{{$key->op_no}} </option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6">
                                <label class=" mb-1 inputlabel">Consultation Number</label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="update_consult_no" name="UpdateConsultNo" disabled>
                                <option value=""> Choose Consultation Number</option>
                                @foreach ($dispop as $key ) 
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->consultation_no}} </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class=" mb-1 inputlabel">Morning Session</label><br>
                                <select class="inputfield UCaseSheetselect multiselect" multiple aria-label="Default select example name"id="update_morning_session" name="UpdateMorningSession" >
                                <option value=""> Choose Treatment</option>
                                @foreach ($trect as $key ) 
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-8">
                                <label class="mt-1 mb-1 inputlabel">Therapist</label><br>
                                <select class="form-select inputfield mrng_therapist" aria-label="Default select example name"id="update_mrng_therapist" name="UpdateMornningTherapist">
                                    <option hidden value=""> Choose  Therapist</option>
                                    @foreach ($staff as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                 
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-4 mt-4 text-center">
                                <button id="UMrngscheduleButton" type="button"  class="btn activebtn px-3"  data-bs-toggle="offcanvas" data-bs-target="#morningshedulecanvas" aria-controls="offcanvasWithBothOptions"> Shedule </button>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class=" mb-1 inputlabel">Afternoon Session</label><br>
                                <select class="inputfield UCaseSheetselectafter multiselect" multiple aria-label="Default select example name"id="update_afternoon_session" name="UpdateAfternoonSession">
                                <option value=""> Choose Treatment</option>
                                @foreach ($trect as $key ) 
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-8">
                                <label class="mt-1 mb-1 inputlabel">Therapist</label><br>
                                <select class="form-select inputfield evng_therapist" aria-label="Default select example name"id="update_evng_therapist" name="UpdateEveningTherapist">
                                    <option hidden value=""> Choose  Therapist</option>
                                    @foreach ($staff as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                 
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-4 mt-4 text-center">
                                <button id="UEvngscheduleButton" type="button"  class="btn activebtn px-3"  data-bs-toggle="offcanvas" data-bs-target="#morningshedulecanvas" aria-controls="offcanvasWithBothOptions"> Shedule </button>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class=" mb-1 inputlabel">Vital Datas</label><br>
                                <input class="form-control inputfield vitalldata" id="update_vital_dates" name="UpdateVitalDates" list="vitaldataslist" autofocus>
                                <datalist id="vitaldataslist">
                                    @foreach ($templates as $key ) 
                                        <option value="{{$key->name}}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <p ><b>Name : </b><span class="name" id="name"></span></p>
                                    <p class="mb-0"><b>Age : </b><span class="age" id="age"></span></p>
                                </div>
                                <div class=" col-6 text-end my-3">
                                    <button type="submit" class="btn savebtn  px-5 "> Update</button>
                                </div>
                            </div> 
                        </div>                    
                    </form>
                    
                    <!-- Response Modal -->
                    @include('layouts.ResponseModals')
                       
                    <div class="card card-body main_card mt-2 p-3 mb-2">                              
                        <div class="main_heading d-flex justify-content-between mb-2 p-2">
                            <div id="exportbtns"class="exportbtns">
                                <!-- export buttons -->
                            </div>
                            <div class="">

                            </div>
                        </div>
                        <div class="">
                            <table class="table table-responsive table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">OP No</th>
                                        <th class="text-center">consultation No</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Morning Section</th>
                                        <th class="text-center">Afternoon Section</th>    
                                        <th class="text-center">Vital Datas</th>                                            
                                        <th class="text-center">Actions</th>                                
                                    </tr>                                           
                                </thead>
                                <tbody>
                                    <tr>
                                                                                  
                                    </tr>
                                </tbody>
                            </table>
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

            //Data Table

            $('.MasterTable thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('.MasterTable thead');
            var MasterTable = $('.MasterTable').DataTable({
                processing: true,
                orderCellsTop: true,
                fixedHeader: true,
                "dom": 'Blrt<"bottom"ip>',
                "pagingType": 'simple_numbers',
                "language": {
                    "paginate": {
                        "previous": "<i class='bi bi-caret-left-fill'></i>",
                        "next": "<i class='bi bi-caret-right-fill'></i>"
                    }
                },    
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6]
                        }
                    },  
                ],
                
                initComplete: function () {
                    $("#MasterTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                    var api = this.api();
                        // For each column
                    api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        if (colIdx < api.columns().nodes().length - 1) {
                            $(cell).html('<input type="text" class="text-center searchcolumn" placeholder="Search" />');
                        } else {
                            $(cell).empty();
                        }     
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
                                // var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();
    
                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    // .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
                    $('.dt-buttons').appendTo('#exportbtns');
                },
                
                ajax: "{{ route('CaseSheets.casesheets', ['id' => $id, 'op_id' => $op_id]) }}", 
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'op_no', name: 'op_no'}, 
                    {data: 'consultation_no', name: 'consultation_no'}, 
                    {data: 'date', name: 'date'},                  
                    {data: 'morningtreatment', name: 'morningtreatment'},                  
                    {data: 'afternoontreatment', name: 'afternoontreatment'}, 
                    {data: 'vital_dates', name: 'vital_dates'},                                      
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            //Onchange functions
            $(document).ready(function() {
                var opId = $('#op_no').val();
                var opGender = $('#op_no').find(':selected').data('gender');
                console.log(opGender);
                loadTherapists(opGender);
                showopdetails(opId);
            });

            function showopdetails(opId){
                console.log(opId);
                var settings = {
                    "url": "/api/op/"+opId+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var OPResult = JSON.stringify(response);
                    console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);
                    if (OPedit.success == true) {

                        var OPDataArray = OPedit.ops;
                        for(const key in OPDataArray){

                            var OPName = OPDataArray['name'];
                            var OPAge = OPDataArray['age'];
                           
                        }

                        $(".name").text(OPName);
                        $(".age").text(OPAge);

                    }
                });
            }

            //On cange OP Therapist 
            function loadTherapists(opGender,MorningTherapistId = 0,EveningTherapistId = 0) {
                $.ajax({
                    url: '/api/therapists/' + opGender,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        //Morning Therapist
                        $('.mrng_therapist').empty();
                        $('.mrng_therapist').append('<option value="0">Choose Therapist</option>');
                        $.each(data, function(key, value) {
                            $('.mrng_therapist').append('<option class="inputlabel" value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('.mrng_therapist').val(MorningTherapistId).change();

                        //Evening Therapist
                        $('.evng_therapist').empty();
                        $('.evng_therapist').append('<option value="0">Choose Therapist</option>');
                        $.each(data, function(key, value) {
                            $('.evng_therapist').append('<option class="inputlabel" value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('.evng_therapist').val(EveningTherapistId).change();
                    }
                });
            }

            //ADD
            //Shedule of Therapist Mrng
            document.getElementById('MrngscheduleButton').addEventListener('click', function() {
                let alertMessage = document.getElementById('alertMessage');
                var selectedDate = document.querySelector('#date').value;
                var selectedMrngTherapist = document.querySelector('#mrng_therapist').value;

                if (selectedMrngTherapist === "0" || selectedMrngTherapist === "") {
                    alertMessage.innerHTML = '<div class="alert alert-danger" role="alert">Please select a therapist.</div>';
                    return; 
                } else{
                    alertMessage.innerHTML = '';

                    // Send AJAX request to check therapist and date combination availability
                    $.ajax({
                        url: '/api/therapistmrngshedule',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            therapistId: selectedMrngTherapist,
                            date: selectedDate
                        },
                        success: function(response) {
                            var scheduleTable = document.getElementById('scheduleTable');
                            var selectedTherapistName = document.getElementById('therapist_name');

                            // Clear the previous table content
                            scheduleTable.innerHTML = '';

                            // Create the table header
                            var tableHeader = '<tr><th class="text-nowrap">Date</th><th>Morning Session</th><th>Afternoon Session</th></tr>';
                            scheduleTable.innerHTML += tableHeader;

                            response.schedule.forEach(function(day) {
                                var row = '<tr>';
                                var formattedDate = new Date(day.date).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric'
                                });
                                row += '<td class="text-nowrap">' + formattedDate + '</td>';
                                if (day.morningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                
                                if (day.eveningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                row += '</tr>';
                                scheduleTable.innerHTML += row;
                                selectedTherapistName.textContent = response.therapistName;
                            });
                        }
                    });
                }
            });

            //Shedule of Therapist Evng
            document.getElementById('EvngscheduleButton').addEventListener('click', function() {7
                let alertMessage = document.getElementById('alertMessage');
                var selectedDate = document.querySelector('#date').value;
                var selectedEvngTherapist = document.querySelector('#evng_therapist').value;

                if (selectedEvngTherapist === "0" || selectedEvngTherapist === "") {
                    alertMessage.innerHTML = '<div class="alert alert-danger" role="alert">Please select a therapist.</div>';
                    return; 
                } else{
                    alertMessage.innerHTML = '';
                    // Send AJAX request to check therapist and date combination availability
                    $.ajax({
                        url: '/api/therapistmrngshedule',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            therapistId: selectedEvngTherapist,
                            date: selectedDate
                        },
                        success: function(response) {
                            var scheduleTable = document.getElementById('scheduleTable');
                            var selectedTherapistName = document.getElementById('therapist_name');

                            // Clear the previous table content
                            scheduleTable.innerHTML = '';

                            // Create the table header
                            var tableHeader = '<tr><th class="text-nowrap">Date</th><th>Morning Session</th><th>Afternoon Session</th></tr>';
                            scheduleTable.innerHTML += tableHeader;

                            response.schedule.forEach(function(day) {
                                var row = '<tr>';
                                var formattedDate = new Date(day.date).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric'
                                });
                                row += '<td class="text-nowrap">' + formattedDate + '</td>';
                                if (day.morningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                
                                if (day.eveningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                row += '</tr>';
                                scheduleTable.innerHTML += row;
                                selectedTherapistName.textContent = response.therapistName;
                            });
                        }
                    });
                }
            });


            //Update 
            //Shedule of Therapist Mrng
            document.getElementById('UMrngscheduleButton').addEventListener('click', function() {
                let alertMessage = document.getElementById('alertMessage');
                var selectedDate = document.querySelector('#update_date').value;
                var selectedMrngTherapist = document.querySelector('#update_mrng_therapist').value;

                if (selectedMrngTherapist === "0" || selectedMrngTherapist === "") {
                    alertMessage.innerHTML = '<div class="alert alert-danger" role="alert">Please select a therapist.</div>';
                    return; 
                } else{
                    alertMessage.innerHTML = '';
                    // Send AJAX request to check therapist and date combination availability
                    $.ajax({
                        url: '/api/therapistmrngshedule',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            therapistId: selectedMrngTherapist, 
                            date: selectedDate
                        },
                        success: function(response) {
                            var scheduleTable = document.getElementById('scheduleTable');
                            var selectedTherapistName = document.getElementById('therapist_name');

                            // Clear the previous table content
                            scheduleTable.innerHTML = '';

                            // Create the table header
                            var tableHeader = '<tr><th class="text-nowrap">Date</th><th>Morning Session</th><th>Afternoon Session</th></tr>';
                            scheduleTable.innerHTML += tableHeader;

                            response.schedule.forEach(function(day) {
                                var row = '<tr>';
                                var formattedDate = new Date(day.date).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric'
                                });
                                row += '<td class="text-nowrap">' + formattedDate + '</td>';
                                if (day.morningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                
                                if (day.eveningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                row += '</tr>';
                                scheduleTable.innerHTML += row;
                                selectedTherapistName.textContent = response.therapistName;
                            });
                        }
                    });
                }
            });

            //Shedule of Therapist Evng
            document.getElementById('UEvngscheduleButton').addEventListener('click', function() {
                let alertMessage = document.getElementById('alertMessage');
                var selectedDate = document.querySelector('#update_date').value;
                var selectedEvngTherapist = document.querySelector('#update_evng_therapist').value;

                if (selectedEvngTherapist === "0" || selectedEvngTherapist === "") {
                    alertMessage.innerHTML = '<div class="alert alert-danger" role="alert">Please select a therapist.</div>';
                    return; 
                } else{
                    alertMessage.innerHTML = '';
                    // Send AJAX request to check therapist and date combination availability
                    $.ajax({
                        url: '/api/therapistmrngshedule',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            therapistId: selectedEvngTherapist,
                            date: selectedDate
                        },
                        success: function(response) {
                            var scheduleTable = document.getElementById('scheduleTable');
                            var selectedTherapistName = document.getElementById('therapist_name');

                            // Clear the previous table content
                            scheduleTable.innerHTML = '';

                            // Create the table header
                            var tableHeader = '<tr><th class="text-nowrap">Date</th><th>Morning Session</th><th>Afternoon Session</th></tr>';
                            scheduleTable.innerHTML += tableHeader;

                            response.schedule.forEach(function(day) {
                                var row = '<tr>';
                                var formattedDate = new Date(day.date).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric'
                                });
                                row += '<td class="text-nowrap">' + formattedDate + '</td>';
                                if (day.morningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                
                                if (day.eveningTherapist === 'available') {
                                    row += '<td><span class="badge bg-success">Available</span></td>';
                                } else {
                                    row += '<td><span class="badge bg-danger">UnAvailable</span></td>';
                                }
                                row += '</tr>';
                                scheduleTable.innerHTML += row;
                                selectedTherapistName.textContent = response.therapistName;
                            });
                        }
                    });
                }
            });

 

            //Add Case Sheet

             $("#case_sheet").validate({
                rules:{
                    OPNo:{
                        required: true,                   
                    },
                    Date:{
                        required: true,                   
                    }
                   
                },
                submitHandler: function(form) {
                    var CaseSheetDate = $('#date').val();
                    var CaseSheetOpNo = $('#op_no').val();
                    var CaseSheetConNo = $('#consult_no').val();
                    var CaseSheetMSec = $('#morning_session').val().join();
                    var CaseSheetASec = $('#afternoon_session').val().join();
                    var CaseSheetVitalDates = $('#vital_dates').val();
                    var selectize = $('.CaseSheetselect')[0].selectize;
                    var selectizeafter = $('.CaseSheetselectafter')[0].selectize;
                    var CaseSheetMrngTherapist = $('#mrng_therapist').val();
                    var CaseSheetEvngTherapist = $('#evng_therapist').val();                  

                    // Check any session is selected
                    if (CaseSheetMSec === '' && CaseSheetASec === '') {
                        toastr.error("Please select at least one session");
                        return;
                    }

                    if ((CaseSheetMrngTherapist != 0) && (CaseSheetMSec == '')) {
                        toastr.error("Please select Morning Treatment");
                        return;
                    }

                    if ((CaseSheetEvngTherapist != 0) && (CaseSheetASec == '')) {
                        toastr.error("Please select Afternoon Treatment");
                        return;
                    }

                    if ((CaseSheetMrngTherapist == 0) && (CaseSheetMSec != '')) {
                        toastr.error("Please select Morning Therapist");
                        return;
                    }

                    if ((CaseSheetEvngTherapist == 0) && (CaseSheetASec != '')) {
                        toastr.error("Please select Afternoon Therapist");
                        return;
                    }

                    $.ajax({
                        url: "/api/casesheet",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            date: CaseSheetDate,
                            op_no_id: CaseSheetOpNo,
                            consultation_id: CaseSheetConNo,
                            morning_session: CaseSheetMSec,
                            afternoon_session: CaseSheetASec,
                            vital_dates: CaseSheetVitalDates,
                            mrng_staff_id: CaseSheetMrngTherapist,
                            evng_staff_id: CaseSheetEvngTherapist
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var CaseSheetResult = JSON.stringify(response);
                        console.log(CaseSheetResult);
                        var CaseSheetResultObj = JSON.parse(CaseSheetResult);
                        if (CaseSheetResultObj.success == true) {
                            if (CaseSheetResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present"); 
                                $('#ResponseModal').modal('show');
                            } else if (CaseSheetResultObj.code == "1") {
                                $(".name").text("");
                                $(".age").text(""); 
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show');
                                $(".AddForm")[0].reset(); 
                                selectize.clear();
                                selectizeafter.clear();
                                loadOP('');
                                loadTherapists('');
                            } else if (CaseSheetResultObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Adding Failed");
                                $('#ResponseModal').modal('show');
                            }else if (CaseSheetResultObj.code == "3") {
                                toastr.warning("Morning staff Already Assigned");
                                return;
                            }else if (CaseSheetResultObj.code == "4") {
                                toastr.warning("Afternoon staff Already Assigned");
                                return;
                            }
                        } 
                        else 
                        {
                            $(".name").text("");
                            $(".age").text(""); 
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#ResponseModal').modal('show');
                            $(".AddForm")[0].reset(); 
                        }  
                    }); 
                }                
            });


            //Edit Case Sheet

            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditCaseSheet = $(this).val();
                console.log(EditCaseSheet);
                var settings = {
                "url": "/api/casesheet/"+EditCaseSheet+"",
                "method": "GET",
                "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var CaseSheetResult = JSON.stringify(response);
                    console.log(CaseSheetResult);
                    var CaseSheetedit = JSON.parse(CaseSheetResult);
                    if (CaseSheetedit.success == true) {
                        $('#case_sheet').hide();
                        $('#update_case_sheet').show();
                        var CaseSheetDataArray = CaseSheetedit.casesheets;
                        for(const key in CaseSheetDataArray){
                            var CaseSheetId = CaseSheetDataArray['id'];
                            var CaseSheetdate = CaseSheetDataArray['date'];
                            var CaseSheetopno = CaseSheetDataArray['op_no_id'];
                            var CaseSheetconno = CaseSheetDataArray['consultation_id'];
                            var CaseSheetmrngsesn = CaseSheetDataArray['morning_session'];
                            var CaseSheetevngsesn = CaseSheetDataArray['afternoon_session'];
                            var CaseSheetMrngStaff = CaseSheetDataArray['mrng_staff_id'];
                            var CaseSheetEvngStaff = CaseSheetDataArray['evng_staff_id'];
                            var CaseSheetvitaldatas = CaseSheetDataArray['vital_dates'];

                        }
                        $("#update_casesheet_id").val(CaseSheetId);
                        $("#update_date").val(CaseSheetdate);
                        $("#update_op_no").val(CaseSheetopno);
                        $("#update_consult_no").val(CaseSheetconno);
                        $("#update_morning_session").val(CaseSheetmrngsesn);
                        $("#update_afternoon_session").val(CaseSheetevngsesn);
                        $("#update_vital_dates").val(CaseSheetvitaldatas);
                        var Upmrngtreactment = $('.UCaseSheetselect')[0].selectize;
                        var Upevngtreactment = $('.UCaseSheetselectafter')[0].selectize;
                        var UpdateMrngtreactment = CaseSheetmrngsesn.split(",");
                        var UpdateEvngtreactment = CaseSheetevngsesn.split(",");
                        var opGender = $("#update_op_no option:selected").data('gender');
                        Upmrngtreactment.setValue(UpdateMrngtreactment);
                        Upevngtreactment.setValue(UpdateEvngtreactment);
                        showopdetails(CaseSheetopno);
                        loadTherapists(opGender,CaseSheetMrngStaff,CaseSheetEvngStaff) 
                    }
                });
            });

            //Update Case Sheet

            $("#update_case_sheet").validate({
                rules:{
                    UpdateOPNo:{
                        required: true,                   
                    },
                    UpdateDate:{
                        required: true,                   
                    }
                   
                },                
                submitHandler: function(form) {
                    var UCaseSheetID = $('#update_casesheet_id').val();
                    var UCaseSheetDate = $('#update_date').val();
                    var UCaseSheetOpNo = $('#update_op_no').val();
                    var UCaseSheetConNo = $('#update_consult_no').val();
                    var UCaseSheetMSec = $('#update_morning_session').val().join() || '0';
                    var UCaseSheetASec = $('#update_afternoon_session').val().join() || '0';
                    var UCaseSheetMrngtherapist = $('#update_mrng_therapist').val();
                    var UCaseSheetEvngThrapist = $('#update_evng_therapist').val();
                    var UCaseSheetVitalDates = $('#update_vital_dates').val();
                    var Uselectize = $('.UCaseSheetselect')[0].selectize;
                    var Uselectizeafter = $('.UCaseSheetselectafter')[0].selectize;

                    // Check any session is selected
                    if (UCaseSheetMSec.length === '' && UCaseSheetASec.length === '') {
                        toastr.error("Please select at least one session");
                        return;
                    }


                    if ((UCaseSheetMrngtherapist != 0) && (UCaseSheetMSec == 0)) {
                        toastr.error("Please select Morning Treatment");
                        return;
                    }

                    if ((UCaseSheetEvngThrapist != 0) && (UCaseSheetASec == 0)) {
                        toastr.error("Please select Afternoon Treatment");
                        return;
                    }

                    if ((UCaseSheetMrngtherapist == 0) && (UCaseSheetMSec != 0)) {
                        toastr.error("Please select Morning Therapist");
                        return;
                    }

                    if ((UCaseSheetEvngThrapist == 0) && (UCaseSheetASec != 0)) {
                        toastr.error("Please select Afternoon Therapist");
                        return;
                    }

                    $.ajax({
                        url: "/api/casesheet/"+UCaseSheetID+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            date: UCaseSheetDate,
                            op_no_id: UCaseSheetOpNo,
                            consultation_id: UCaseSheetConNo,
                            morning_session: UCaseSheetMSec,
                            afternoon_session: UCaseSheetASec,
                            vital_dates: UCaseSheetVitalDates,
                            mrng_staff_id: UCaseSheetMrngtherapist,
                            evng_staff_id: UCaseSheetEvngThrapist
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.loader').hide();
                        $('#update_case_sheet').hide()
                        $('#case_sheet').show();
                        MasterTable.ajax.reload();
                        loadTherapists(UCaseSheetMrngtherapist,UCaseSheetEvngThrapist) 
                        console.log(response);
                        var UCaseSheetResult = JSON.stringify(response);
                        console.log(UCaseSheetResult);
                        var UCaseSheetResultObj = JSON.parse(UCaseSheetResult);
                        if (UCaseSheetResultObj.success == true) {
                            if (UCaseSheetResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present"); 
                                $('#ResponseModal').modal('show');
                            } else if (UCaseSheetResultObj.code == "1") {
                                $(".name").text("");
                                $(".age").text(""); 
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                                $(".UpdateForm")[0].reset(); 
                                Uselectize.clear();
                                Uselectizeafter.clear();
                                var opId = $('.op_no').val();
                                var opGender = $('.op_no').find(':selected').data('gender');
                                loadOP(opId);
                                loadTherapists(opGender);
                            } else if (UCaseSheetResultObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updating Failed");
                                $('#ResponseModal').modal('show');
                            }else if (UCaseSheetResultObj.code == "3") {
                                toastr.warning("Morning staff Already Assigned");
                                return;
                            }else if (UCaseSheetResultObj.code == "4") {
                                toastr.warning("Afternoon staff Already Assigned");
                                return;
                            }
                        } 
                        else 
                        {
                            $(".name").text("");
                            $(".age").text(""); 
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#ResponseModal').modal('show');
                        }  
                    }); 
                }                
            });


             //Delete Case Sheet

             $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteCaseSheet = $(this).val();
                $('#confirmYes').click(function(){                    
                    console.log(DeleteCaseSheet);
                    $.ajax({
                        url: "/api/casesheet/"+DeleteCaseSheet+"",
                        method: "DELETE",
                        timeout: 0,
                        headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('.delModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var CaseSheetDeleteResult = JSON.stringify(response);
                        console.log(CaseSheetDeleteResult); 
                        var CaseshetDelObj = JSON.parse(CaseSheetDeleteResult);
                        if (CaseshetDelObj.success == true) {  
                            if (CaseshetDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(CaseshetDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (CaseshetDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(CaseshetDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (CaseshetDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(CaseshetDelObj.message);
                                $('#ResponseModal').modal('show');
                            }
                        } 
                        else 
                        {
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#ResponseModal').modal('show');
                        }         
                    });                                        
                })                                    
            });


            //Focus First Field
            $(document).ready(function() {
                $('#consult_no').focus();
            });
            
            

        </script>
    </body>

</html>