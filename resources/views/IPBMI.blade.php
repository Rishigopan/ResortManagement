<!DOCTYPE html>
<html lang="en">

    <head>

        @include('layouts.headder')
        <title>IP BMI</title>
        <style>
            .mainContents{
                display:none;
            }
        </style>
    </head>

    <body>
        <div class="modal fade addUpdateModal" id="BMIModel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">IP BMI</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="BMI AddForm" id="bmi" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 ">IP Number<span  style="color:red"> *</span></label><br>
                                    <select class="SearchAndSelect inputfield IP_No" aria-label="Default select example name"id="ip_no" name="IPNo" required>
                                        <option hidden value=""> Choose IP Number</option>
                                        @foreach ($ipno as $key )   
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->ip_no}} </option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 ">Consultation Number</label><br>
                                    <select class="SearchAndSelect inputfield consult_no" aria-label="Default select example name"id="consult_no" name="ConsultNo" >
                                        <option hidden value=""> Choose Consultation Number</option>
                                        @foreach ($cono as $key ) 
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->ip_consultation_no}} </option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Date<span  style="color:red"> *</span></label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="date" name="Date" value="<?php echo date('Y-m-d'); ?>"  required>
                                </div>                               
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Weight<span  style="color:red"> *</span></label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="weight" name="Weight" placeholder="Enter Weight"  >
                                </div>  
                                
                                    <h6 class="mt-3 text-center ">Temperature</h6><br>
                            
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class=" mb-1 inputlabel">Morning</label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="temp_mrng" name="TempMrng" placeholder="Morning Temperature in °F">
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class=" mb-1 inputlabel">Evening</label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="temp_evng" name="TempEvng" placeholder="Evening Temperature in  °F" >
                                </div>  

                                    <h6 class="mt-3 text-center ">Blood Pressure</h6><br>

                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Morning</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="blood_mrng" name="BloodMrng" placeholder="Morning BP (eg) 120/80"  >
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Evening</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="blood_evng" name="BloodEvng" placeholder="Evening BP (eg) 120/80"  >
                                </div>   
                                <div class=" col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="remarks" name="Remarks" placeholder="Enter Remarks"></textarea>  
                                </div>                                                  
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Save</button>
                            </div>
                        </form>
                        <form class="UpdateBMI UpdateForm" id="update_bmi" style="display: none;" novalidate>
                            {{ csrf_field() }}
                            <input type="hidden"  id="update_bmi_id" >
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 ">Ip Number<span  style="color:red"> *</span></label><br>
                                    <select class="SearchAndSelect inputfield IP_No" aria-label="Default select example name"id="update_ip_no" name="UpdateIPNo" required>
                                        @foreach ($ipno as $key )   
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->ip_no}} </option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 ">Consultation Number</label><br>
                                    <select class="SearchAndSelect inputfield consult_no" aria-label="Default select example name"id="update_consult_no" name="UpdateConsultNo" >
                                        @foreach ($cono as $key ) 
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->ip_consultation_no}} </option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Date<span  style="color:red"> *</span></label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="update_date" name="UpdateDate" required>
                                </div>                               
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Weight<span  style="color:red"> *</span></label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="update_weight" name="UpdateWeight" placeholder="Enter Weight"  >
                                </div>  
                                
                                    <h6 class="mt-3 text-center ">Temperature</h6><br>
                            
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class=" mb-1 inputlabel">Morning</label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="update_temp_mrng" name="UpdateTempMrng" placeholder="Temperature Morning"  >
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class=" mb-1 inputlabel">Evening</label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="update_temp_evng" name="UpdateTempEvng" placeholder="Temperature Evening"  >
                                </div>  

                                    <h6 class="mt-3 text-center ">Blood Pressure</h6><br>

                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Morning</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_blood_mrng" name="UpdateBloodMrng" placeholder="Blood Pressure Morning"  >
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Evening</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_blood_evng" name="UpdateBloodEvng" placeholder="Blood Pressure Evening"  >
                                </div>   
                                <div class="col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_remarks" name="UpdateRemarks" placeholder="Enter Remarks"></textarea>  
                                </div>                                                  
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade addUpdateModal" id="BMIViewModal" tabindex="-1" data-bs-backdrop="static"  data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">IP BMI Details</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="ViewBMI " id="view_bmi" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 ">Ip Number</label><br>
                                    <select class="form-select inputfield" aria-label="Default select example name"id="view_ip_no" name="ViewIPNo" disabled >
                                        @foreach ($ipno as $key )   
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->ip_no}} </option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 ">Consultation Number</label><br>
                                    <select class="form-select inputfield" aria-label="Default select example name"id="view_consult_no" name="ViewConsultNo" disabled >
                                        @foreach ($cono as $key ) 
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->ip_consultation_no}} </option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Date</label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="view_date" name="ViewDate" value="<?php echo date('Y-m-d'); ?>" disabled required>
                                </div>                               
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Weight</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_weight" name="ViewWeight" placeholder="Enter Weight" disabled >
                                </div>  
                                
                                    <h6 class="mt-3 text-center ">Temperature</h6><br>
                            
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class=" mb-1 inputlabel">Morning</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_temp_mrng" name="ViewTempMrng" placeholder="Temperature Morning" disabled >
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class=" mb-1 inputlabel">Evening</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_temp_evng" name="ViewTempEvng" placeholder="Temperature Evening" disabled >
                                </div>  

                                    <h6 class="mt-3 text-center ">Blood Pressure</h6><br>

                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Morning</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_blood_mrng" name="ViewBloodMrng" placeholder="Blood Pressure Morning" disabled >
                                </div>  
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Evening</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_blood_evng" name="ViewBloodEvng" placeholder="Blood Pressure Evening" disabled >
                                </div>   
                                <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="view_remarks" name="ViewRemarks" placeholder="Enter Remarks" disabled></textarea>  
                                </div>                                                  
                            </div>
                            <div class=" text-end mt-3">
                                <button type="button" class="btn savebtn  px-5 "data-bs-dismiss="modal" aria-label="Close">Close</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
            <div class="container-fluid">
                <h4 class=" d-flex justify-content-center py-1 contitle">IP BMI </h4>               
            </div>
                
                <div class="wrapper">
                    <!--CONTENTS-->
                    <div class="container-fluid mainContents">
                        <div class="card card-body main_card mt-2 p-3 mb-2">                           
                            <div class="main_heading d-flex justify-content-between mb-2 p-2">
                                <div id="exportbtns"class="exportbtns col-3">
                                    <!-- export buttons -->
                                </div>
                                <div class="">
                                    <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#BMIModel">+  Add</button> 
                                </div>
                            </div>
                            <div>
                                <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                    <thead class="tablehead">
                                        <tr>
                                            <th class="text-center">Sl No</th>   
                                            <th class="text-center">Date</th>   
                                            <th class="text-center">IP Number</th>                                    
                                            <th class="text-center">Consultation Number</th>                                                                   
                                            <th class="text-center">Temperature Morning</th>  
                                            <th class="text-center">Temperature Evening</th>
                                            <th class="text-center">Blood Pressure Morning</th>                                
                                            <th class="text-center">Blood Pressure Evening</th>
                                            <th class="text-center">Weight (Kg.)</th>                                    
                                            <th class="text-center">Remarks</th>
                                            <th class="text-center">Actions</th>
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
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
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
                
                ajax: "{{ route('IPBMI.ipbmi') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'date', name: 'date'}, 
                    {data: 'ip_no', name: 'ip_no'},
                    {data: 'ip_consultation_no', name: 'ip_consultation_no'}, 
                    {data: 'temp_mrng', name: 'temp_mrng'},          
                    {data: 'temp_evng', name: 'temp_evng'},                  
                    {data: 'b_P_mrng', name: 'b_P_mrng'},                  
                    {data: 'b_P_evng', name: 'b_P_evng'},                  
                    {data: 'weight', name: 'weight'},                  
                    {data: 'remarks', name: 'remarks'},              
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            //Onchange functions

            $(document).on('click','.IP_No',(function(){
                $(document).on('change','.IP_No',(function(){
                    var IpId = $(this).val();
                    loadIp(IpId);
                }));
            }));

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



            //Add BMI
            $("#bmi").validate({
                rules:{
                    Date:{
                        required: true,                    
                    },
                    IPNo:{
                        required: true,                    
                    },
                    Weight:{
                        required: true,                    
                    }      
                },
                submitHandler: function(form) {
                    var BmiIPNO = $('#ip_no').val();
                    var BmiConNo = $('#consult_no').val();
                    var BmiDate = $('#date').val();
                    var BmiWeight = $('#weight').val();
                    var BmiTempMrng = $('#temp_mrng').val();
                    var BmiTempEvng = $('#temp_evng').val();
                    var BmiBPMrng = $('#blood_mrng').val();
                    var BmiBPEvng = $('#blood_evng').val();
                    var BmiRemarks = $('#remarks').val();
                    $.ajax({
                        url: "/api/ipbmi",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            date: BmiDate,
                            ip_no_id: BmiIPNO,
                            consultation_id: BmiConNo,
                            temp_mrng: BmiTempMrng,
                            temp_evng: BmiTempEvng,
                            b_P_mrng: BmiBPMrng,
                            b_P_evng: BmiBPEvng,
                            weight: BmiWeight,
                            remarks: BmiRemarks
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                            $('#BMIModel').modal('hide');
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var BMIResult = JSON.stringify(response);
                        console.log(BMIResult);
                        var BMIResultObj = JSON.parse(BMIResult);
                        if (BMIResultObj.success == true) {
                            if (BMIResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (BMIResultObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (BMIResultObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Adding Failed");
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
                }                         
            });






            //edit BMI
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditIPBMI = $(this).val();
                console.log(EditIPBMI);
                var settings = {
                    "url": "/api/ipbmi/"+EditIPBMI+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var BMIResult = JSON.stringify(response);
                    console.log(BMIResult);
                    var BMIedit = JSON.parse(BMIResult);
                    if (BMIedit.success == true) {
                        $('#BMIModel').modal('show');
                        $('#bmi').hide();
                        $('#update_bmi').show();
                        var BMIDataArray = BMIedit.ipbmis;
                        for(const key in BMIDataArray){
                            var UpdateBMIIPNo = BMIDataArray['ip_no_id'];
                            var UpdateBMICONNo = BMIDataArray['consultation_id'];
                            var UpdateBMIDate = BMIDataArray['date'];
                            var UpdateBMIWeight = BMIDataArray['weight'];
                            var UpdateBMITempMrng = BMIDataArray['temp_mrng'];
                            var UpdateBMITempEvng = BMIDataArray['temp_evng'];
                            var UpdateBMIBPMg = BMIDataArray['b_P_mrng'];
                            var UpdateBMIBPEvng = BMIDataArray['b_P_evng'];
                            var UpdateBMIRemarks = BMIDataArray['remarks'];
                            var UpdateBMIId = BMIDataArray['id'];

                        }

                        $('#update_ip_no').data('selectize').setValue(UpdateBMIIPNo);
                        $('#update_consult_no').data('selectize').setValue(UpdateBMICONNo);
                        $("#update_date").val((UpdateBMIDate.slice(0,10)));
                        $("#update_weight").val(UpdateBMIWeight);
                        $("#update_temp_mrng").val(UpdateBMITempMrng);
                        $("#update_temp_evng").val(UpdateBMITempEvng);
                        $("#update_blood_mrng").val(UpdateBMIBPMg);
                        $("#update_blood_evng").val(UpdateBMIBPEvng);
                        $("#update_remarks").val(UpdateBMIRemarks);
                        $("#update_bmi_id").val(UpdateBMIId);

                    }
                });        
            });



            //Update BMI
            $("#update_bmi").validate({
                rules:{
                    UpdateIPNo:{
                        required: true,                    
                    },
                    UpdateDate:{
                        required: true,                    
                    },
                    UpdateWeight:{
                        required: true,                    
                    }      
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_bmi_id').val();
                    var UpdateBmiIPNO = $('#update_ip_no').val();
                    var UpdateBmiConNo = $('#update_consult_no').val();
                    var UpdateBmiDate = $('#update_date').val();
                    var UpdateBmiWeight = $('#update_weight').val();
                    var UpdateBmiTempMrng = $('#update_temp_mrng').val();
                    var UpdateBmiTempEvng = $('#update_temp_evng').val();
                    var UpdateBmiBPMrng = $('#update_blood_mrng').val();
                    var UpdateBmiBPEvng = $('#update_blood_evng').val();
                    var UpdateBmiRemarks = $('#update_remarks').val();
                    $.ajax({
                        url: "/api/ipbmi/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            date: UpdateBmiDate,
                            ip_no_id: UpdateBmiIPNO,
                            consultation_id: UpdateBmiConNo,
                            temp_mrng: UpdateBmiTempMrng,
                            temp_evng: UpdateBmiTempEvng,
                            b_P_mrng: UpdateBmiBPMrng,
                            b_P_evng: UpdateBmiBPEvng,
                            weight: UpdateBmiWeight,
                            remarks: UpdateBmiRemarks
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#BMIModel').modal('hide');
                            $('.mainContents').hide();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var BMIResult = JSON.stringify(response);
                        console.log(BMIResult);
                        var BMIResultObj = JSON.parse(BMIResult);
                        if (BMIResultObj.success == true) {
                            if (BMIResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (BMIResultObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (BMIResultObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updating Failed");
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
                }                         
            });



            //Delete BMI
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteBMIType = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteBMIType);
                    $.ajax({
                        url: "/api/ipbmi/"+DeleteBMIType+"",
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
                        var BMIDeleteResult = JSON.stringify(response);
                        console.log(BMIDeleteResult); 
                        var BMIDelObj = JSON.parse(BMIDeleteResult);
                        if (BMIDelObj.success == true) {  
                            if (BMIDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(BMIDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (BMIDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(BMIDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (BMIDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(BMIDelObj.message);
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




            //View BMI
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewBMI = $(this).val();
                console.log(ViewBMI);
                var settings = {
                    "url": "/api/ipbmi/"+ViewBMI+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var BMIResult = JSON.stringify(response);
                    console.log(BMIResult);
                    var BMIedit = JSON.parse(BMIResult);
                    if (BMIedit.success == true) {
                        $('#BMIViewModal').modal('show');
                        $('#bmi').hide();
                        $('#view_bmi').show();
                        var BMIDataArray = BMIedit.ipbmis;
                        for(const key in BMIDataArray){
                            var ViewBMIIPNo = BMIDataArray['ip_no_id'];
                            var ViewBMICONNo = BMIDataArray['consultation_id'];
                            var ViewBMIDate = BMIDataArray['date'];
                            var ViewBMIWeight = BMIDataArray['weight'];
                            var ViewBMITempMrng = BMIDataArray['temp_mrng'];
                            var ViewBMITempEvng = BMIDataArray['temp_evng'];
                            var ViewBMIBPMg = BMIDataArray['b_P_mrng'];
                            var ViewBMIBPEvng = BMIDataArray['b_P_evng'];
                            var ViewBMIRemarks = BMIDataArray['remarks'];

                        }
                        $("#view_ip_no").val(ViewBMIIPNo);
                        $("#view_consult_no").val(ViewBMICONNo);
                        $("#view_date").val((ViewBMIDate.slice(0,10)));
                        $("#view_weight").val(ViewBMIWeight);
                        $("#view_temp_mrng").val(ViewBMITempMrng);
                        $("#view_temp_evng").val(ViewBMITempEvng);
                        $("#view_blood_mrng").val(ViewBMIBPMg);
                        $("#view_blood_evng").val(ViewBMIBPEvng);
                        $("#view_remarks").val(ViewBMIRemarks);

                    }
                });        
            });

            //modal close function
            $(".addUpdateModal").on("hidden.bs.modal", function() {
                $(".UpdateForm").hide();
                $(".AddForm").show();
                $(".UpdateForm")[0].reset();
                $(".AddForm")[0].reset();
                $(".addUpdateModal").removeClass("error");
                var errorMessage = $('label.error');
                errorMessage.hide();
                var errorMessage = $('.inputfield.error');
                errorMessage.removeClass('error');
            }); 

            
            //Focus First Field
            $(document).ready(function() {
                $('#BMIModel').on('shown.bs.modal', function() {
                    $('#ip_no').focus();
                });
            });
            
        </script>
  </body>

</html>