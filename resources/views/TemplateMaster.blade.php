<!DOCTYPE html>
<html lang="en">

    <head>
    <title>Template</title>
        @include('layouts.headder')
        <style>
            .mainContents{
                display:none;
            }
        </style>
    </head>

    <body>
    
        <div class="modal fade addUpdateModal" id="TemplateModel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Template</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Template AddForm" id="template" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <label class="mt-2 mb-1 inputlabel">Field Name<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield " aria-label="Default select example name"id="field_name" name="FieldName">
                                        <option class="inputlabel" hidden value=""> Choose field Name</option> 
                                        <option class="inputlabel" value="VitalDatas"> Vital Datas </option>                                                                         
                                        <option class="inputlabel" value="Diet">Diet</option>                                                                         
                                        <option class="inputlabel" value="Exercise">Exercise</option>  
                                    </select>
                                </div>   
                                <div class=" col-12">
                                    <label class="mt-2 mb-1 inputlabel">Value<span  style="color:red"> *</span></label><br> 
                                    <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="Template_name" name="TemplateName" required></textarea>
                                </div>                                                       
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Save</button>
                            </div>
                        </form>    
                        <form class="UpdateTemplate UpdateForm" id="update_template" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class=" col-12">
                                    <input type="hidden"  id="update_template_id" >
                                    <input type="hidden"  id="update_status" >
                                    <div class="col-12">
                                        <label class="mt-2 mb-1 inputlabel">Field Name<span  style="color:red"> *</span></label><br>
                                        <select class="form-select inputfield " aria-label="Default select example name"id="update_field_name" name="UpdateFieldName">
                                            <option class="inputlabel" hidden value=""> Choose field Name</option> 
                                            <option class="inputlabel" value="VitalDatas"> Vital Datas </option>                                                                         
                                            <option class="inputlabel" value="Diet">Diet</option>                                                                         
                                            <option class="inputlabel" value="Exercise">Exercise</option>                                                                         
    
                                        </select>
                                    </div> 
                                    <label class="mt-2 mb-1 inputlabel">Value<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_value" name="UpdateValue" autofocus required>
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
        <div class="modal fade addUpdateModal " id="unitViewModal" tabindex="-1" data-bs-backdrop="static"data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Template</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Viewunit " id="view_unit" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <label class="mt-2 mb-1 inputlabel">Field Name<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield " aria-label="Default select example name"id="field_name" name="FieldName">
                                        <option class="inputlabel" hidden value=""> Choose field Name</option> 
                                        <option class="inputlabel" value="VitalDatas"> Vital Datas </option>                                                                         
                                        <option class="inputlabel" value="Diet">Diet</option>                                                                         
                                        <option class="inputlabel" value="Exercise">Exercise</option>                                                                         
  
                                    </select>
                                </div> 
                                <div class=" col-12">
                                    <input type="hidden"  id="view_unit_id" >
                                    <label class="mt-2 mb-1 inputlabel">Value</label><br>
                                    <input  disabled class="form-control mt-1 inputfield" id="view_unit_name" name="ViewUnitName"  autofocus required>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Template Master</h4>           
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
                                    <button class="btn AddBtn " data-bs-toggle="modal" data-bs-target="#TemplateModel">+  Add</button> 
                                </div>
                            </div>
                            <div>
                                <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                    <thead class="tablehead">
                                        <tr>
                                            <th class="text-center">Sl No</th>
                                            <th class="text-center">Field Name</th>
                                            <th class="text-center">Value</th>                                    
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
                
                ajax: "{{ route('templates.Template') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'field_name', name: 'field_name'}, 
                    {data: 'name', name: 'name'},                  
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            
            });

            //Add Template

            $("#template").validate({
                rules:{
                    FieldName:{
                        required: true,                
                    },
                    TemplateName:{
                        required: true,
                        minlength: 2,  
                    } 
                },
                messages: {
                    TemplateName:{
                        minlength:"atleast 2 characters",
                    }
                },
                submitHandler: function(form) {
                    varFieldName = $('#field_name').val();
                    varValue = $('#Template_name').val();
                    $.ajax({
                       url: "api/template",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            field_name: varFieldName,
                            name: varValue
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
                        var TemplateResult = JSON.stringify(response);
                        console.log(TemplateResult);
                        var TemplateResultObj = JSON.parse(TemplateResult);
                        if (TemplateResultObj.success == true) {
                            if (TemplateResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");
                                $('#ResponseModal').modal('show');
                            } else if (TemplateResultObj.code == "1") {
                                $('#department')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#field_name').focus();
                                });
                            } else if (TemplateResultObj.code == "2") {
                                $('#TemplateModel').modal('hide');
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

            //edit Template

            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditTemplate = $(this).val();
                console.log(EditTemplate);
                var settings = {
                    "url": "/api/template/"+EditTemplate+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                console.log(response);
                var TemplateResult = JSON.stringify(response);
                    console.log(TemplateResult);
                    var Templateedit = JSON.parse(TemplateResult);
                    if (Templateedit.success == true) {
                        $('#TemplateModel').modal('show');
                        $('#template').hide();
                        $('#update_template').show();
                        var TemplateDataArray = Templateedit.templates;
                        for(const key in TemplateDataArray){
                            var FieldName = TemplateDataArray['field_name'];
                            var Value = TemplateDataArray['name'];
                            var TemplateId = TemplateDataArray['id'];
                            var TemplateStatus = TemplateDataArray['status'];
                        }
                        $("#update_template_id").val(TemplateId);
                        $("#update_field_name").val(FieldName).change();
                        $("#update_value").val(Value);
                        $("#update_status").val(TemplateStatus);
                    }
                });
               
            });

            //Update Template
            $("#update_template").validate({
                rules:{
                    UpdateFieldName:{
                        required: true,                
                    },
                    UpdateValue:{
                        required: true,
                        minlength: 2,  
                    } 
                },
                messages: {
                    UpdateValue:{
                        minlength:"atleast 2 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_template_id').val();                
                    var UpdateFieldName = $('#update_field_name').val();
                    var UpdateValue = $('#update_value').val();
                    var UpdateStatus = $('#update_status').val();
                    console.log(UpdateStatus);
                    $.ajax({
                        url: "/api/template/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            field_name: UpdateFieldName,
                            name: UpdateValue,
                            status:UpdateStatus
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
                        var TemplateUpdate = JSON.stringify(response);
                        console.log(TemplateUpdate);

                        var TemplateUpdateed = JSON.parse(TemplateUpdate);
                            if (TemplateUpdateed.success == true) {
                                if (TemplateUpdateed.code == "0") {
                                    $('#TemplateModel').modal('show');
                                    $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Template is Already Present");
                                    $('#ResponseModal').modal('show');
                            } else if (TemplateUpdateed.code == "1") {
                                $('#TemplateModel').modal('hide');
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (TemplateUpdateed.code == "2") {
                                $('#TemplateModel').modal('hide');
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

             //Delete Department
             $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteTemplate = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteTemplate);
                    $.ajax({
                        url: "/api/template/"+DeleteTemplate+"",
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
                
                    
           
            //View Department
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
                $('#TemplateModel').on('shown.bs.modal', function() {
                    $('#field_name').focus();
                });
            });
            
        </script>
    </body>

</html>