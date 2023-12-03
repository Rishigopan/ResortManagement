<!DOCTYPE html>
<html lang="en">

  <head>

     @include('layouts.headder')
     <title>Department</title>
     <style>
        .mainContents{
            display:none;
        }
    </style>
  </head>

    <body>
    
        <div class="modal fade addUpdateModal" id="DepartmentModal" tabindex="-1" data-bs-keyboard="true" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Department</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Department AddForm" id="department" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class=" col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="department_name" name="DepartmentName" placeholder="Enter Department Name" autofocus required>
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
                        <form class="UpdateDepartment UpdateForm" id="update_department" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class=" col-12">
                                    <input type="hidden"  id="update_department_id" >
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_department_name" name="UpdateDepartmentName"  autofocus required>
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
        <div class="modal fade addUpdateModal " id="DepartmentViewModal" tabindex="-1"  data-bs-keyboard="true" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Department</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="ViewDepartment " id="view_department" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class=" col-12">
                                    <input type="hidden"  id="view_department_id" >
                                    <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                    <input  disabled class="form-control mt-1 inputfield" id="view_department_name" name="ViewDepartmentName"  autofocus required>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Department </h4>           
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
                                    <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#DepartmentModal">+  Add</button> 
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

            $(document).ready(function() {
                $('#DepartmentModal').on('shown.bs.modal', function() {
                    $('#department_name').focus();
                });
            });

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
                
                ajax: "{{ route('Department.dept') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'}, 
                    {data: 'remarks', name: 'remarks'},                  
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            
            });



            //Add Department

            $("#department").validate({
                rules:{
                    DepartmentName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    } 
                },
                messages: {
                    DepartmentName:{
                        required: "Please Enter Department Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var DeptName = $('#department_name').val();
                    var DeptRemark = $('#remarks').val();
                    $.ajax({
                        url: "/api/department",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: DeptName,
                            remarks: DeptRemark,
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
                        var DeptResult = JSON.stringify(response);
                        console.log(DeptResult);
                        var DeptResultObj = JSON.parse(DeptResult);
                        if (DeptResultObj.success == true) {
                            if (DeptResultObj.code == "0") {
                                $('#DepartmentModal').modal('show');
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DeptResultObj.code == "1") {
                                $('#department')[0].reset();
                                $('#DepartmentModal').modal('show');
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#department_name').focus();
                                });                            } else if (DeptResultObj.code == "2") {
                                $('#DepartmentModal').modal('show');
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

           

            //edit Department
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditDept = $(this).val();
                console.log(EditDept);
                var settings = {
                "url": "/api/department/"+EditDept+"",
                "method": "GET",
                "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                console.log(response);
                var DeptResult = JSON.stringify(response);
                    console.log(DeptResult);
                    var Deptedit = JSON.parse(DeptResult);
                    if (Deptedit.success == true) {
                        $('#DepartmentModal').modal('show');
                        $('#department').hide();
                        $('#update_department').show();
                        var DeptDataArray = Deptedit.department;
                        for(const key in DeptDataArray){
                            var DeptName = DeptDataArray['name'];
                            var DeptRemark = DeptDataArray['remarks'];
                            var DeptId = DeptDataArray['id'];

                        }
                        $("#update_department_id").val(DeptId);
                        $("#update_department_name").val(DeptName);
                        $("#update_remarks").val(DeptRemark);
                    }
                });
               
            });

            //Update Department
            $("#update_department").validate({
                rules:{
                    UpdateDepartmentName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    }     
                },
                messages: {
                    UpdateDepartmentName:{
                        required: "Please Enter Department Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_department_id').val();                
                    var UpdateDeptName = $('#update_department_name').val();
                    var UpdateDeptRemark = $('#update_remarks').val();

                    $.ajax({
                        url: "/api/department/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateDeptName,
                            remarks: UpdateDeptRemark
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#DepartmentModal').modal('hide');
                            $('.mainContents').hide();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var DeptUpdate = JSON.stringify(response);
                        console.log(DeptUpdate);

                        var DeptUpdateed = JSON.parse(DeptUpdate);
                            if (DeptUpdateed.success == true) {
                                if (DeptUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");       
                                $('#ResponseModal').modal('show');
                            } else if (DeptUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (DeptUpdateed.code == "2") {
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
                $('#delete_id').val($(this).val());
                var deleteId = $('#delete_id').val();
            });


            $('#delete_data').submit(function(e){
                e.preventDefault();
                var deleteId = $('#delete_id').val();
                if (deleteId != 0) {
                    console.log(" not null.");
                    $.ajax({
                        url: "/api/department/"+deleteId+"",
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
                        $(".deletedata")[0].reset();
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var DeptDeleteResult = JSON.stringify(response);
                        console.log(DeptDeleteResult); 
                        var DeptDelObj = JSON.parse(DeptDeleteResult);
                        if (DeptDelObj.success == true) {  
                            if (DeptDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(DeptDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (DeptDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DeptDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (DeptDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DeptDelObj.message);
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



                } else {
                    console.log("null.");

                }
            });
                
                    
           
            //View Department
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewDept = $(this).val();
                console.log(ViewDept);
                var settings = {
                "url": "/api/department/"+ViewDept+"",
                "method": "GET",
                "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                console.log(response);
                var DeptResult = JSON.stringify(response);
                    console.log(DeptResult);
                    var Deptedit = JSON.parse(DeptResult);
                    if (Deptedit.success == true) {
                        $('#DepartmentViewModal').modal('show');                       
                        $('#view_department').show();
                        var DeptDataArray = Deptedit.department;
                        for(const key in DeptDataArray){
                            var DeptName = DeptDataArray['name'];
                            var DeptRemark = DeptDataArray['remarks'];
                            var DeptId = DeptDataArray['id'];

                        }
                        $("#view_department_id").val(DeptId);
                        $("#view_department_name").val(DeptName);
                        $("#view_remarks").val(DeptRemark);
                    }
                });
               
            });

            //Focus First Field
            $(document).ready(function() {
                $('#DepartmentModal').on('shown.bs.modal', function() {
                    $('#department_name').focus();
                });
            });
            
        </script>
  </body>

</html>