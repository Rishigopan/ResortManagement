<!DOCTYPE html>
<html lang="en">

  <head>
    @include('layouts.headder')
    <title>Lab</title>
    <style>
            .mainContents{
                display:none;
            }
        </style>
  </head>

  <body>
        <div class="modal fade addUpdateModal" id="LabInvestModal" tabindex="-1" data-bs-backdrop="static"data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Lab Investigation </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="LabInvest AddForm" id="labinvest" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="treatment_name" name="TreatmentName" placeholder=""  required>
                                </div>                            
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                    <input type="number" min="0" class="form-control mt-1 inputfield" id="cost" name="Cost" value="0"  autofocus >
                                </div>  
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                    <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="remarks" name="Remarks" ></textarea>
                                </div>                                          
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 "> Save</button>
                            </div>
                        </form>   
                        <form class="UpdateLabInvest UpdateForm" id="update_labinvest" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="hidden"  id="update_lab_id" >
                                    <input type="text" class="form-control mt-1 inputfield" id="update_lab_name" name="UpdateLabName" autofocus required>
                                </div>                            
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                    <input type="number" min="0" class="form-control mt-1 inputfield" id="update_cost" name="UpdateCost" autofocus >
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                    <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="update_remarks" name="UpdateRemarks" ></textarea>
                                </div>                                            
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 "> Update</button>
                            </div>
                        </form>                                
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade addUpdateModal" id="LabViewModal" tabindex="-1" data-bs-backdrop="static"data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Lab Investigation </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" id="view_lab" style="display: none;" novalidate>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                    <input type="hidden"  id="view_treatment_id" >
                                    <input disabled class="form-control mt-1 inputfield" id="view_lab_name" name="ViewTreatmentName" autofocus required>
                                </div>                            
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                    <input disabled class="form-control mt-1 inputfield" id="view_cost" name="ViewCost" autofocus required>
                                </div> 
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                    <textarea  disabled cols="30" rows="2" class="form-control mt-1 inputfield" id="view_remarks" name="ViewRemarks" ></textarea>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Lab Investigation </h4>                        
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
                                <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#LabInvestModal">+ Add</button> 
                            </div>
                        </div>
                        <div>
                            <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="tablehead">
                                    <tr> 
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">Name</th>                                    
                                        <th class="text-center">Cost</th> 
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
                            columns: [ 0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3]
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
            
            ajax: "{{ route('Lab.lab') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'}, 
                {data: 'cost', name: 'cost'}, 
                {data: 'remarks', name: 'remarks'},                  
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
            });

            //Add Lab Investigation  

            $("#labinvest").validate({
                rules:{
                    TreatmentName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    }     
                },
                messages: {
                    TreatmentName:{
                        required: "Please Enter Lab Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var LabInvestName = $('#treatment_name').val();
                    var LabInvestCost = $('#cost').val();
                    var LabInvestRemark = $('#remarks').val();
                    console.log(LabInvestName+LabInvestCost+LabInvestRemark)
                    $.ajax({
                    url: "/api/lab",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: LabInvestName,
                            cost: LabInvestCost,
                            remarks: LabInvestRemark
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var LabResult = JSON.stringify(response);
                        console.log(LabResult);
                        var LabResultObj = JSON.parse(LabResult);
                        if (LabResultObj.success == true) {
                            if (LabResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (LabResultObj.code == "1") {
                                $('#labinvest')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#treatment_name').focus();
                                });
                            } else if (LabResultObj.code == "2") {
                                $('#LabInvestModal').modal('hide');
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

            //edit Lab Investigation 
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditLab = $(this).val();
                console.log(EditLab);
                var settings = {
                    "url": "/api/lab/"+EditLab+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var LabResult = JSON.stringify(response);
                    console.log(LabResult);
                    var Labedit = JSON.parse(LabResult);
                    if (Labedit.success == true) {
                        $('#LabInvestModal').modal('show');
                        $('#labinvest').hide();
                        $('#update_labinvest').show();
                        var LabArray = Labedit.labinvestigation;
                        for(const key in LabArray){
                            var LabName = LabArray['name'];
                            var LabCost = LabArray['cost'];
                            var LabRemarks = LabArray['remarks'];
                            var LabId = LabArray['id'];

                        }
                        $("#update_lab_id").val(LabId);
                        $("#update_lab_name").val(LabName);
                        $("#update_cost").val(LabCost);
                        $("#update_remarks").val(LabRemarks);
                    }
                });                                               
            });




            //Update Lab Investigation 

            $("#update_labinvest").validate({
                rules:{
                    UpdateLabName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    }     
                },
                messages: {
                    UpdateLabName:{
                        required: "Please Enter Lab Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_lab_id').val();                
                    var UpdateLabName = $('#update_lab_name').val();
                    var UpdateLabCost = $('#update_cost').val();
                    var UpdateLabRemark = $('#update_remarks').val();
                    $.ajax({
                        url: "/api/lab/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/atom+xml",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateLabName,
                            cost: UpdateLabCost,
                            remarks: UpdateLabRemark
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#LabInvestModal').modal('hide');
                            $('.mainContents').hide();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var LabUpdate = JSON.stringify(response);
                        console.log(LabUpdate);
                        var LabUpdateed = JSON.parse(LabUpdate);
                            if (LabUpdateed.success == true) {
                                if (LabUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (LabUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (LabUpdateed.code == "2") {
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

            //Delete Lab Investigation 
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteLab = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteLab);
                    $.ajax({
                        url: "/api/lab/"+DeleteLab+"",
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
                        var LabDeleteResult = JSON.stringify(response);
                        console.log(LabDeleteResult); 
                        var LabDelObj = JSON.parse(LabDeleteResult);
                        if (LabDelObj.success == true) {  
                            if (LabDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(LabDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (LabDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(LabDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (LabDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(LabDelObj.message);
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
            //View Lab Investigation 
            $('#MasterTable').on('click', '.btn_view', function () {
                var EditLab = $(this).val();
                console.log(EditLab);
                var settings = {
                    "url": "/api/lab/"+EditLab+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var LabResult = JSON.stringify(response);
                    console.log(LabResult);
                    var Labedit = JSON.parse(LabResult);
                    if (Labedit.success == true) {
                        $('#LabViewModal').modal('show');
                        $('#view_lab').show();
                        var LabArray = Labedit.labinvestigation;
                        for(const key in LabArray){
                            var LabName = LabArray['name'];
                            var LabCost = LabArray['cost'];
                            var LabRemarks = LabArray['remarks'];
                            var LabId = LabArray['id'];

                        }
                        $("#view_lab_name").val(LabName);
                        $("#view_cost").val(LabCost);
                        $("#view_remarks").val(LabRemarks);
                    }
                });                                               
            });

            //Focus First Field
            $(document).ready(function() {
                $('#LabInvestModal').on('shown.bs.modal', function() {
                    $('#treatment_name').focus();
                });
            });
            
        </script>

    </body>

</html>