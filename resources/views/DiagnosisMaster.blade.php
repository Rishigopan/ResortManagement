<!DOCTYPE html>
<html lang="en">

  <head>

    @include('layouts.headder')
    <title>Diagnosis</title>
    <style>
        .mainContents{
            display:none;
        }
    </style>
  </head>

  <body>
    <div class="modal fade addUpdateModal" id="DiagnosisModal" tabindex="-1" data-bs-backdrop="static"               data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Diagnosis</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Diagnosis AddForm" id="diagnosis" novalidate>
                         {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="diagnosis_name" name="DiagnosisName" placeholder="Enter Diagnosis Name" autofocus required>
                                </div>                               
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                    <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="remarks" name="Remarks" placeholder="Enter Remarks"></textarea>
                                </div>                            
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Save</button>
                            </div>
                        </form>  
                        <!-- Update -->
                        <form class="UpdateDiagnosis UpdateForm" id="update_diagnosis" style="display: none;" novalidate>
                          {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <input type="hidden"  id="update_diagnosis_id" >
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_diagnosis_name" name="UpdateDiagnosisName" autofocus required>
                                </div>                               
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                    <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="update_remarks" name="UpdateRemarks" ></textarea>
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
        <div class="modal fade addUpdateModal" id="DiagnosisViewModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Diagnosis</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- View -->
                        <form class="UpdateDiagnosis " id="view_diagnosis" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <input type="hidden"  id="view_diagnosis_id" >
                                    <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                    <input type="text"disabled class="form-control mt-1 inputfield" id="view_diagnosis_name" name="ViewDiagnosisName" autofocus required>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Diagnosis </h4>            
            </div>
            
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="card card-body main_card mt-2 p-3 mb-2">                         
                        <div class="main_heading d-flex justify-content-between mb-2 p-2">
                            <div id="exportbtns"class="exportbtns">
                                <!-- export buttons -->
                            </div>
                            <div class="">
                                <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#DiagnosisModal">+ Add</button> 
                            </div>
                        </div>
                        <div>
                            <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">Name</th>                                   
                                        <th class="text-center">Remark</th>                        
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
                            columns: [ 0, 1, 2]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2]
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
                
                ajax: "{{ route('Diagnosis.dignosis') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'}, 
                    {data: 'remarks', name: 'remarks'},                  
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });



           

            //Searchbar
            $('#SearchBar').keyup(function() {
                    MasterTable.search($(this).val()).draw();
                });



            //Add Diagnosis  

            $("#diagnosis").validate({
                rules:{
                    DiagnosisName:{
                        required: true,
                        minlength: 2,    
                        maxlength: 25,                  
                    }                
                },
                messages: {
                    DiagnosisName:{
                        required: "Please Enter Department Name",
                        minlength:"atleast 2 charecter",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var DiagnosisName = $('#diagnosis_name').val();
                    var DiagnosisRemark = $('#remarks').val();
                    $.ajax({
                        url: "/api/diagnosis",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: DiagnosisName,
                            remarks: DiagnosisRemark
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
                        var DiagnosisResult = JSON.stringify(response);
                        console.log(DiagnosisResult);
                        var DiagnosisResultObj = JSON.parse(DiagnosisResult);
                        if (DiagnosisResultObj.success == true) {
                            if (DiagnosisResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DiagnosisResultObj.code == "1") {
                                $('#diagnosis')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#diagnosis_name').focus();
                                });
                            } else if (DiagnosisResultObj.code == "2") {
                                $('#DiagnosisModal').modal('hide');
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
                      

            //edit Diagnosis
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditDiagnosis = $(this).val();
                console.log(EditDiagnosis);

                var settings = {
                    "url": "/api/diagnosis/"+EditDiagnosis+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var DiagnosisResult = JSON.stringify(response);
                    console.log(DiagnosisResult);
                    var Diagnosisedit = JSON.parse(DiagnosisResult);
                    if (Diagnosisedit.success == true) {
                        $('#DiagnosisModal').modal('show');
                        $('#diagnosis').hide();
                        $('#update_diagnosis').show();
                        var DiagnosisDataArray = Diagnosisedit.diagnosis;
                        for(const key in DiagnosisDataArray){
                            var DiagnosisName = DiagnosisDataArray['name'];
                            var DiagnosisRemark = DiagnosisDataArray['remarks'];
                            var DiagnosisId = DiagnosisDataArray['id'];

                        }
                        $("#update_diagnosis_id").val(DiagnosisId);
                        $("#update_diagnosis_name").val(DiagnosisName);
                        $("#update_remarks").val(DiagnosisRemark);
                    }
                });
              
            });
          
            //Update Diagnosis
            $("#update_diagnosis").validate({
                rules:{
                    UpdateDiagnosisName:{
                        required: true,
                        minlength: 2,   
                        maxlength: 25,                                       
                    }                   
                },
                messages: {
                    UpdateDiagnosisName:{
                        required: "Please Enter Diagnosis Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_diagnosis_id').val();                
                    var UpdateDignosisName = $('#update_diagnosis_name').val();
                    var UpdateDiagnosisRemark = $('#update_remarks').val();
                    $.ajax({
                        url: "/api/diagnosis/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateDignosisName,
                            remarks:UpdateDiagnosisRemark
                        },beforeSend: function() {
                            $('.loader').show();
                            //$('#updatebranch_form').addClass("disable");
                            $('#DiagnosisModal').modal('hide');
                            $('.mainContents').hide();
                            // $('#ResponseImage').html("");
                            // $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response); 
                        var DiagnosisUpdate = JSON.stringify(response);
                        console.log(DiagnosisUpdate);
                        var DiagnosisUpdateed = JSON.parse(DiagnosisUpdate);
                            if (DiagnosisUpdateed.success == true) {
                                if (DiagnosisUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DiagnosisUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (DiagnosisUpdateed.code == "2") {
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

            //Delete Diagnosis
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteDiagnosisType = $(this).val();
                $('#confirmYes').click(function(){                    
                    console.log(DeleteDiagnosisType);
                    $.ajax({
                        url: "/api/diagnosis/"+DeleteDiagnosisType+"",
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
                        var DiagnosisDeleteResult = JSON.stringify(response);
                        console.log(DiagnosisDeleteResult); 
                        var DiagDelObj = JSON.parse(DiagnosisDeleteResult);
                        if (DiagDelObj.success == true) {  
                            if (DiagDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(DiagDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (DiagDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DiagDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (DiagDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DiagDelObj.message);
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

            //View Diagnosis
            
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewDiagnosis = $(this).val();
                console.log(ViewDiagnosis);

                var settings = {
                    "url": "/api/diagnosis/"+ViewDiagnosis+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var DiagnosisResult = JSON.stringify(response);
                    console.log(DiagnosisResult);
                    var DiagnosisView = JSON.parse(DiagnosisResult);
                    if (DiagnosisView.success == true) {
                        $('#DiagnosisViewModal').modal('show');
                        $('#view_diagnosis').show();
                        var DiagnosisDataArray = DiagnosisView.diagnosis;
                        for(const key in DiagnosisDataArray){
                            var DiagnosisName = DiagnosisDataArray['name'];
                            var DiagnosisRemark = DiagnosisDataArray['remarks'];
                            var DiagnosisId = DiagnosisDataArray['id'];

                        }
                        $("#view_diagnosis_id").val(DiagnosisId);
                        $("#view_diagnosis_name").val(DiagnosisName);
                        $("#view_remarks").val(DiagnosisRemark);
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
                $('#DiagnosisModal').on('shown.bs.modal', function() {
                    $('#diagnosis_name').focus();
                });
            });
             
        </script>

  </body>

</html>