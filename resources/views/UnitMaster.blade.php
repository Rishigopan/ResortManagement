<!DOCTYPE html>
<html lang="en">

  <head>
  <title>Units</title>
     @include('layouts.headder')
     <style>
        .mainContents{
            display:none;
        }
    </style>
  </head>

  <body>
    
        <div class="modal fade addUpdateModal" id="UnitModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Unit</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Unit AddForm" id="unit" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class=" col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="unit_name" name="UnitName" placeholder="Enter Unit Name" autofocus required>
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
                        <form class="UpdateUnit UpdateForm" id="update_unit" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class=" col-12">
                                    <input type="hidden"  id="update_unit_id" >
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_unit_name" name="UpdateUnitName"  autofocus required>
                                </div>                           
                                <div class=" col-12">
                                    <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                    <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_remarks" name="UpdateRemarks" ></textarea>
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
        <div class="modal fade addUpdateModal " id="unitViewModal" tabindex="-1" data-bs-backdrop="static"               data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Unit</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Viewunit " id="view_unit" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class=" col-12">
                                    <input type="hidden"  id="view_unit_id" >
                                    <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                    <input  disabled class="form-control mt-1 inputfield" id="view_unit_name" name="ViewUnitName"  autofocus required>
                                </div>                           
                                <div class=" col-12">
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
            <div class="container-fluid  ">
                <h4 class="d-flex justify-content-center py-1 contitle">Unit </h4>           
            </div>
                
                <div class="wrapper">
                    <!--CONTENTS-->
                    <div class="container-fluid mainContents">
                        <div class="card card-body main_card mt-2 p-3 mb-2">                           
                            <div class="main_heading d-flex justify-content-between mb-2  p-2 ">
                                <div id="exportbtns"class="exportbtns">
                                    <!-- export buttons -->
                                </div>
                                <div class="">
                                    <button class="btn AddBtn " data-bs-toggle="modal" data-bs-target="#UnitModal">+  Add</button> 
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
                
                ajax: "{{ route('units.unit') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'}, 
                    {data: 'remarks', name: 'remarks'},                  
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            
            });



            //Add Unit

            $("#unit").validate({
                rules:{
                    UnitName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    }     
                },
                messages: {
                    UnitName:{
                        required: "Please Enter Units Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    varUnitName = $('#unit_name').val();
                    varUnitRemark = $('#remarks').val();
                    $.ajax({
                       url: "api/unit",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: varUnitName,
                            remarks: varUnitRemark
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
                        var UnitResult = JSON.stringify(response);
                        console.log(UnitResult);
                        var UnitResultObj = JSON.parse(UnitResult);
                        if (UnitResultObj.success == true) {
                            if (UnitResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (UnitResultObj.code == "1") {
                                $('#unit')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#unit_name').focus();
                                });
                            } else if (UnitResultObj.code == "2") {
                                $('#UnitModal').modal('hide');
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

           

            //edit Unit

            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditUnit = $(this).val();
                console.log(EditUnit);
                var settings = {
                "url": "/api/unit/"+EditUnit+"",
                "method": "GET",
                "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                console.log(response);
                var UnitResult = JSON.stringify(response);
                    console.log(UnitResult);
                    var Unitedit = JSON.parse(UnitResult);
                    if (Unitedit.success == true) {
                        $('#UnitModal').modal('show');
                        $('#unit').hide();
                        $('#update_unit').show();
                        var UnitDataArray = Unitedit.units;
                        for(const key in UnitDataArray){
                            var UnitName = UnitDataArray['name'];
                            var UnitRemark = UnitDataArray['remarks'];
                            var UnitId = UnitDataArray['id'];

                        }
                        $("#update_unit_id").val(UnitId);
                        $("#update_unit_name").val(UnitName);
                        $("#update_remarks").val(UnitRemark);
                    }
                });
               
            });

            //Update Units
            $("#update_unit").validate({
                rules:{
                    UpdateUnitName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    }     
                },
                messages: {
                    UpdateUnitName:{
                        required: "Please Enter Unit Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_unit_id').val();                
                    var UpdateUnitName = $('#update_unit_name').val();
                    var UpdateUnitRemark = $('#update_remarks').val();

                    $.ajax({
                        url: "/api/unit/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateUnitName,
                            remarks: UpdateUnitRemark
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var UnitUpdate = JSON.stringify(response);
                        console.log(UnitUpdate);

                        var UnitUpdateed = JSON.parse(UnitUpdate);
                            if (UnitUpdateed.success == true) {
                                if (UnitUpdateed.code == "0") {
                                    $('#UnitModal').modal('show');
                                    $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("This Record is Already Present");  
                                    $('#ResponseModal').modal('show');
                                } else if (UnitUpdateed.code == "1") {
                                    $('#UnitModal').modal('hide');
                                    $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Record Updated Successfully");
                                    $('#ResponseModal').modal('show');
                                } else if (UnitUpdateed.code == "2") {
                                    $('#UnitModal').modal('hide');
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

             //Delete Unit
             $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteUnitType = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteUnitType);
                    $.ajax({
                        url: "/api/unit/"+DeleteUnitType+"",
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
                        var UnitDeleteResult = JSON.stringify(response);
                        console.log(UnitDeleteResult); 
                        var UnitDelObj = JSON.parse(UnitDeleteResult);
                        if (UnitDelObj.success == true) {  
                            if (UnitDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(UnitDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (UnitDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(UnitDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (UnitDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(UnitDelObj.message);
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
                
                    
           
            //View Units
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewUnit = $(this).val();
                console.log(ViewUnit);
                var settings = {
                "url": "/api/unit/"+ViewUnit+"",
                "method": "GET",
                "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                console.log(response);
                var UnitResult = JSON.stringify(response);
                    console.log(UnitResult);
                    var Unitedit = JSON.parse(UnitResult);
                    if (Unitedit.success == true) {
                        $('#unitViewModal').modal('show');                       
                        $('#view_unit').show();
                        var UnitDataArray = Unitedit.units;
                        for(const key in UnitDataArray){
                            var UnitName = UnitDataArray['name'];
                            var UnitRemark = UnitDataArray['remarks'];
                            var UnitId = UnitDataArray['id'];

                        }
                        $("#view_department_id").val(UnitId);
                        $("#view_unit_name").val(UnitName);
                        $("#view_remarks").val(UnitRemark);
                    }
                });
            });

            //Focus First Field
            $(document).ready(function() {
                $('#UnitModal').on('shown.bs.modal', function() {
                    $('#unit_name').focus();
                });
            });
            
        </script>
  </body>

</html>