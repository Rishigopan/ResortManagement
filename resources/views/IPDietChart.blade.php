<!DOCTYPE html>
<html lang="en">

    <head>

        @include('layouts.headder')
        <title>IP Diet Chart</title>
        <style>
            .mainContents{
                display:none;
            }
        </style>
    </head>

    <body> 

        <!-- Response Modal -->
        @include('layouts.ResponseModals')      
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
                <h4 class="d-flex justify-content-center py-1 contitle">IP Diet Chart</h4>                                                                  
            </div>                    
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <form id="dietchart" class="AddForm"> 
                     {{ csrf_field() }}                                                     
                        <div class="row mx-2">
                        <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">Ip Number<span  style="color:red"> *</span></label><br>
                                <select class="SearchAndSelect inputfield IP_No" aria-label="Default select example name"id="ip_no" name="IPNo">
                                    <option hidden value=""> Choose IP Number</option>
                                    @foreach ($ipno as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->ip_no}} </option>
                                    @endforeach                                 
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">consultation  No</label><br>
                                <select class="SearchAndSelect inputfield consult_no" aria-label="Default select example name"id="consult_no" name="ConsultNo">
                                    <option hidden value=""> Choose Consultation Number</option>   
                                    @foreach ($cono as $key ) 
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->ip_consultation_no}} </option>
                                    @endforeach                          
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">Date<span  style="color:red"> *</span></label><br>
                                <input type="date" class="form-control inputfield" aria-label="Default select example name" id="date" name="Date" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                            </div> 
                            <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">Time<span  style="color:red"> *</span></label><br>
                                <select class=" form-select inputfield" aria-label="Default select example name" id="time" name="Time">
                                    <option hidden value=""> Choose a Time</option>
                                    <option value="06:30:00">6.30 AM</option>
                                    <option value="08:30:00">8.30 AM</option>
                                    <option value="11:00:00">11.00 AM</option>
                                    <option value="01:00:00">1.00 PM</option>
                                    <option value="04:00:00">4.00 PM</option>
                                    <option value="07:30:00">7.30 PM</option>   
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mb-1 inputlabel">Diet</label><br>
                                <select class="inputfield dietselect multiselect" multiple aria-label="Default select example name"id="diet" name="Diet">
                                <option hidden value=""> Choose Diet</option>
                                    @foreach ($diet as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 row d-flex justify-content-between">
                                <div class="col-6">
                                    <p class="mt-1"><b>Name : </b><span class="name" id="name"></span></p>
                                    <p class="mb-0"><b>Age : </b><span class="age" id="age"></span></p>
                                </div>
                                <div class=" col-6 text-end my-2">
                                    <button type="button" class="btn savebtn  px-3 mt-3" onclick="addDiets()">Add Diets</button>
                                </div>
                            </div> 
                        </div>
                        <div class="card card-body main_card mt-2  p-3 mb-2">
                            <div class="row" id="DietCardContainer">
                                <!-- Card Details From Array -->
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn savebtn px-5 py-2 mt-1" onclick="SubmitDiet()">Save </button>
                            </div>
                        </div>
                    </form> 
                    <form id="update_diet_chart" class="UpdateForm" style="display: none;">                                                       
                        {{ csrf_field() }}
                        <div class="row mx-2">
                            <input type="hidden"  id="update_diet_chart_id" >
                            <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">Ip Number<span  style="color:red"> *</span></label><br>
                                <select class="SearchAndSelect inputfield IP_No" aria-label="Default select example name"id="update_ip_no" name="UpdateIPNo">
                                    <option hidden value=""> Choose IP Number</option>
                                    @foreach ($ipno as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->ip_no}} </option>
                                    @endforeach                                 
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">consultation  No</label><br>
                                <select class="SearchAndSelect inputfield consult_no" aria-label="Default select example name"id="update_consult_no" name="UpdateConsultNo">
                                    @foreach ($cono as $key ) 
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->ip_consultation_no}} </option>
                                    @endforeach                        
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">Date<span  style="color:red"> *</span></label><br>
                                <input type="date" class="form-control inputfield" id="update_date" name="UpdateDate" autofocus required>
                            </div> 
                            <div class="col-xl-3 col-lg-3 col-12">
                                <label class="mb-1 inputlabel">Time<span  style="color:red"> *</span></label><br>
                                <select class=" form-select inputfield" aria-label="Default select example name"  id="update_time" name="UpdateTime">
                                    <option hidden value=""> Choose a Time</option>
                                    <option value="06:30:00">6.30 AM</option>
                                    <option value="08:30:00">8.30 AM</option>
                                    <option value="11:00:00">11.00 AM</option>
                                    <option value="01:00:00">1.00 PM</option>
                                    <option value="04:00:00">4.00 PM</option>
                                    <option value="07:30:00">7.30 PM</option>                                   
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mb-1 inputlabel">Diet</label><br>
                                <select class="inputfield updietselect multiselect" aria-label="Default select example name" multiple id="update_diet" name="UpdateDiet">
                                    <option hidden value=""> Choose Diet</option>
                                    @foreach ($diet as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>                
                                    @endforeach                                 
                                </select>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <p class="mb-1"><b>Name : </b><span class="name" id="name"></span></p>
                                    <p class="mb-0"><b>Age : </b><span class="age" id="age"></span></p>
                                </div>
                                <div class=" col-6 text-end my-2">
                                    <button type="submit" class="btn savebtn  px-5 ">Update</button>
                                </div>
                            </div> 
                        </div>
                    </form>                             
                    <div class="card card-body main_card mt-2 p-3 mb-2">                              
                        <div class="main_heading d-flex justify-content-between mb-2 p-2">
                            <div id="exportbtns"class="exportbtns col-3">
                                <!-- export buttons -->
                            </div>
                            <div class="">
                            </div>
                        </div>
                        <div class="">
                            <table class="table table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">IP Number</th>
                                        <th class="text-center">Consultation Number</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Diet</th>    
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
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5]
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
                ajax: "{{ route('IPdietchart.ipdietchart') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'ip_no', name: 'ip_no'}, 
                    {data: 'ip_consultation_no', name: 'ip_consultation_no'}, 
                    {data: 'date', name: 'date'}, 
                    {data: 'time', name: 'time'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            //Onchange functions
            $(document).on('click','.IP_No',(function(){
                $(document).on('change','.IP_No',(function(){
                    var IpId = $(this).val();
                    loadIp(IpId);
                    showopdetails(IpId);

                }));
            }));

            //Function  show Ip details 
            function showopdetails(IpId){
                console.log(IpId);
                var settings = {
                    "url": "/api/ip/"+IpId+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    //console.log(response);
                    var OPResult = JSON.stringify(response);
                    //console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);
                    if (OPedit.success == true) {

                        var IPDataArray = OPedit.ips;
                        for(const key in IPDataArray){

                            var IPName = IPDataArray['name'];
                            var IPAge = IPDataArray['age'];
                            
                        }

                        $(".name").text(IPName);
                        $(".age").text(IPAge);

                    }
                });
            }

            //Oncange Ip Consultation
            function loadIp(IpNum) {
                if (IpNum) {
                    $.ajax({
                        url: '/api/IpCasesheetlastConsultation/' + IpNum +"",
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('.consult_no').empty();
                            if (data && data.ip_consultation_no) {
                                var option = $('<option>', {
                                    value: data.id,
                                    text: data.ip_consultation_no
                                });
                                $('.consult_no').append(option);
                            } else {
                                $('.consult_no').append('<option value="">No consultations available</option>');
                            }
                        }

                    });
                }
            }


            //Card View
            let DietList = [];

            function addDietToCard() {
                $('#DietCardContainer').empty();
                event.preventDefault();
                for (var i = 0; i < DietList.length; i++) {
                    var Diets = DietList[i];

                    const cardHtml = `
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6 p-1" data-task-id="${Diets.id}">
                        <div class="Dietcard">
                        <div class="p-2">
                            <h6 class="Dietcharts"><b>${Diets.IPName}</b></h6> 
                            <h6 class="Dietcharts">${Diets.ConName}</h6> 
                        </div>
                        <div class="d-flex justify-content-between p-2 mb-0">
                            <p class="Dietcharts mb-0">${Diets.Date}</p> 
                            <p class="Dietcharts mb-0">${Diets.Time}</p> 
                        </div>
                        <div class="p-2">
                            <h6 class="Dietcharts py-0  ">${Diets.DietName}</h6> 
                        </div>
                        </p>
                        <hr class="my-0 py-0 "></hr>
                        <div class="p-2 d-flex justify-content-between py-0">
                            <i class="ri-delete-bin-6-line me-2" onclick="removediet(${i})"></i>
                        </div>
                        </div>
                    </div>
                    `;

                    // Append the task card HTML to the container
                    $('#DietCardContainer').append(cardHtml);
                }
            }

            function removediet(index) {
                // Remove the task from the array
                DietList.splice(index, 1);
                // Update the card display
                addDietToCard();
                console.log(DietList);
            }

            //Diet array
            function addDiets() {
                const DietChartIpname = $('#ip_no option:selected').text();
                const DietChartIpNo = $('#ip_no').val();
                const DietChartConname = $('#consult_no option:selected').text();
                const DietChartConNo = $('#consult_no').val();
                const DietChartDate = $('#date').val();
                const DietChartTime = $('#time').val();
                const DietChartDietId = $('#diet').val().join();
                const DietChartDietname = $('#diet option:selected').toArray().map(option => option.text).join();

                // Check if the time is already in the array
                const timeToCheck = DietChartTime;
                const isTimeAlreadyPresent = DietList.some(diet => diet.Time === timeToCheck);
                if (isTimeAlreadyPresent) {
                    toastr.warning('This Time Is Already Selected');
                    return;
                }

                var selectize = $('.dietselect')[0].selectize;           

                if (DietChartIpNo === '') {
                    toastr.warning('Please select a OP Number.');
                    return;
                }

                if (DietChartDate === '') {
                    toastr.warning('Please select Date.');
                    return;
                }
                if (DietChartTime === '') {
                    toastr.warning('Please Enter Time.');
                    return;
                }

                if (DietChartDietId === '') {
                    toastr.warning('Please select a Diets');
                    return;
                }


                // Add the Diet to the array
                DietList.push({
                    IPName: DietChartIpname,
                    IPNum: DietChartIpNo,
                    ConName: DietChartConname,
                    ConNum: DietChartConNo,
                    Date: DietChartDate,
                    Time: DietChartTime,
                    Diets: DietChartDietId,
                    DietName: DietChartDietname,

                });

                // Add the task to the card
                addDietToCard();

                // Reset the form inputs
                $('#time').val('');
                selectize.clear();

                console.log(DietList);
            }



            //Add Diet Chart

            function SubmitDiet() {
                event.preventDefault();

                // Check if all required fields are filled
                if (
                    $('#ip_no').val() &&
                    $('#consult_no').val() &&
                    $('#date').val() 
                
                ) {

                    if (DietList.length === 0) {
                        toastr.warning('Please Click Add Diets');
                        return;
                    }

                    var selectize = $('.dietselect')[0].selectize;
                    var Searchselectize = $('.SearchAndSelect')[0].selectize;

                    let DietArray = JSON.stringify(DietList);

                    console.log(DietArray);
                    $.ajax({
                        url: "/api/ipdietchart",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {

                            diet: DietArray

                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.loader').hide();
                        //Reset Form
                        $('#consult_no').val('');
                        $('#date').val('');
                        $('#time').val('');                 
                        $('#DietCardContainer').empty();
                        $(".name").text("");
                        $(".age").text("");
                        loadIp('');
                        DietList = []; 
                        selectize.clear();
                        Searchselectize.clear();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var DietChartResult = JSON.stringify(response);
                        console.log(DietChartResult);
                        var DietChartResultObj = JSON.parse(DietChartResult);
                        if (DietChartResultObj.success == true) {
                            if (DietChartResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DietChartResultObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (DietChartResultObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Adding Failed");
                                $('#ResponseModal').modal('show');
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

                } else {
                    //Validation error msg
                    toastr.error('Please fill out all the required fields.');
                }
            }


            //edit DietChart
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditDietChart = $(this).val();
                console.log(EditDietChart);
                var settings = {
                    "url": "/api/ipdietchart/"+EditDietChart+"",
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var DietChartResult = JSON.stringify(response);
                    console.log(DietChartResult);
                    var Dietchartedit = JSON.parse(DietChartResult);
                    if (Dietchartedit.success == true) {
                        $('#dietchart').hide();
                        $('#update_diet_chart').show();
                        var DietDataArray = Dietchartedit.ipdietchats;
                        for(const key in DietDataArray){
                            var DietIpNo = DietDataArray['ip_no_id'];
                            var DietConNo = DietDataArray['consultation_id'];
                            var DietDate = DietDataArray['date'];
                            var DietTime = DietDataArray['time'];
                            var DietId = DietDataArray['diet_id'];
                            var DietChartId = DietDataArray['id'];
                        }
                        $("#update_diet_chart_id").val(DietChartId);

                        $('#update_ip_no').data('selectize').setValue(DietIpNo);
                        $('#update_consult_no').data('selectize').setValue(DietConNo);
                        $("#update_date").val(DietDate).change();
                        $("#update_time").val(DietTime).change();
                        var Upselectize = $('.updietselect')[0].selectize;
                        var UpdateDiets = DietId.split(",");
                        Upselectize.setValue(UpdateDiets);
                        showopdetails(DietIpNo);

                    }
                });
            });


            //Update Diet Chart
            $("#update_diet_chart").validate({
                rules:{
                    UpdateIPNo:{
                        required: true,                   
                    },
                    UpdateDate:{
                        required: true,                   
                    },
                    UpdateTime:{
                        required: true,                   
                    },
                    UpdateDiet:{
                        required: true,                   
                    }     
                },                
                submitHandler: function(form) {
                    var UpdateDietChartIpNo = $('#update_ip_no').val();
                    var UpdateDietChartConNo = $('#update_consult_no').val();
                    var UpdateDietChartDate = $('#update_date').val();
                    var UpdateDietChartTime = $('#update_time').val();
                    var UpdateDietChartDietId = $('#update_diet').val().join();
                    var UpdateId = $('#update_diet_chart_id').val();
                    var Upselectize = $('.updietselect')[0].selectize;
                    var USearchselectize = $('.SearchAndSelect')[0].selectize;


                    $.ajax({
                        url: "/api/ipdietchart/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            ip_no_id: UpdateDietChartIpNo,
                            date: UpdateDietChartDate,
                            time: UpdateDietChartTime,
                            diet_id: UpdateDietChartDietId,
                            consultation_id: UpdateDietChartConNo

                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.loader').hide();
                        $(".UpdateForm")[0].reset();
                        Upselectize.clear();
                        USearchselectize.clear();

                        $('.UpdateForm').hide();
                        $('.AddForm').show();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var DietChartResult = JSON.stringify(response);
                        console.log(DietChartResult);
                        var DietChartResultObj = JSON.parse(DietChartResult);
                        if (DietChartResultObj.success == true) {
                            if (DietChartResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DietChartResultObj.code == "1") {
                                $(".name").text("");
                                $(".age").text("");
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (DietChartResultObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updating Failed");
                                $('#ResponseModal').modal('show');
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



            //Delete Diet Chart
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteDietChart = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteDietChart);
                    $.ajax({
                        url: "/api/ipdietchart/"+DeleteDietChart+"",
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
                        var DietDeleteResult = JSON.stringify(response);
                        console.log(DietDeleteResult); 
                        var DietDelObj = JSON.parse(DietDeleteResult);
                        if (DietDelObj.success == true) {  
                            if (DietDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(DietDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (DietDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DietDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (DietDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DietDelObj.message);
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
                });
            });
            
            //Focus First Field
            $(document).ready(function() {
                $('#ip_no').focus();
            });
            
        </script>

    </body>

</html>