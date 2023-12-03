<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Staff</title>
    @include('layouts.headder')
    <style>
        .mainContents{
            display:none;
        }
      </style>
  </head>

  <body>
  <div class="modal fade addUpdateModal" id="StaffModal" tabindex="-1" data-bs-backdrop="static"               data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Staff</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="Staff AddForm" id="add_staff" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="staff_name" name="StaffName" placeholder="Enter Staff Name" autofocus required>
                            </div>   
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Gender<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="gender" name="Gender" required>
                                    <option hidden value=""> Select Gender</option>
                                    <option value="1"> Male</option>
                                    <option value="2"> Female</option>
                                    <option value="3"> Others</option>
                                </select>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Department<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="department" name="Department">
                                <option class="inputlabel" hidden value=""> Choose Department</option>
                                     @foreach ($dept as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                          
                                </select>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="branch" name="Branch">
                                  <option class="inputlabel" hidden value=""> Choose Branch</option>
                                    @foreach ($branch as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Email Id<span  style="color:red"> *</span></label><br>
                                <input type="email" class="form-control mt-1 inputfield" id="email" name="Email" placeholder="Enter Your Email" autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Password<span  style="color:red"> *</span></label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="staff_password" name="StaffPassword" placeholder="....." autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Confirm Password<span  style="color:red"> *</span></label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="confirm_password" name="ConfirmPassword" placeholder="....." autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mobile No<span  style="color:red"> *</span></label><br>
                                <input type="number" class="form-control mt-1 inputfield" min="0" id="mobile" name="Mobile" placeholder="Enter Mobile Number" autofocus required>
                            </div>                       
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="remarks" name="Remarks" placeholder="Enter Remarks"></textarea>
                            </div>                            
                        </div>
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 "> Save</button>
                        </div>
                    </form>  
                    <form class="UpdateStaff UpdateForm" id="update_add_staff" style="display: none;" novalidate>
                       {{ csrf_field() }}
                        <div class="row">
                            <input type="hidden" class="form-control mt-1 inputfield" id="update_id" name="UpdateId" autofocus required>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_staff_name" name="UpdateStaffName" autofocus required>
                            </div>   
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Gender<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="update_gender" name="UpdateGender" required>
                                    <option value="1"> Male</option>
                                    <option value="2"> Female</option>
                                    <option value="3"> Others</option>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Department<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="update_department" name="UpdateDepartment">
                                    @foreach ($dept as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                    
                                </select>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="update_branch" name="UpdateBranch">
                                  <option class="inputlabel" hidden value=""> Choose Branch</option>
                                    @foreach ($branch as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Email Id<span  style="color:red"> *</span></label><br>
                                <input type="email" class="form-control mt-1 inputfield" id="update_email" name="UpdateEmail" autofocus required>
                            </div>
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Password</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_staff_password" name="UpdateStaffPassword"  autofocus required>
                            </div> -->
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Confirm Password</label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="update_confirm_password" name="UpdateConfirmPassword"  autofocus required>
                            </div> -->
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mobile No<span  style="color:red"> *</span></label><br>
                                <input type="number" class="form-control mt-1 inputfield" min="0" id="update_mobile" name="UpdateMobile" autofocus required>
                            </div>                       
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_remarks" name="UpdateRemarks" ></textarea>
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
    <div class="modal fade addUpdateModal" id="StaffViewModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Staff Details</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" id="view_add_staff" style="display: none;" novalidate>
                        <div class="row">
                            <input type="hidden" class="form-control mt-1 inputfield" id="view_id" name="viewId" autofocus required>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_staff_name" name="viewStaffName" autofocus required>
                            </div>   
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Gender</label><br>
                                <select class="form-select inputfield" disabled aria-label="Default select example name"id="view_gender" name="ViewGender" required>
                                <option value="1"> Male</option>
                                <option value="2"> Female</option>
                                <option value="3"> Others</option>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Department</label><br>
                                <select class="form-select dropbdr " disabled aria-label="Default select example name"id="view_department" name="viewDepartment">
                                    @foreach ($dept as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                    
                                </select>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                <select class="form-select inputfield " disabled aria-label="Default select example name"id="view_branch" name="ViewBranch">
                                  <option class="inputlabel" hidden value=""> Choose Branch</option>
                                    @foreach ($branch as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Email Id</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_email" name="viewEmail" autofocus required>
                            </div>
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Password</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_staff_password" name="viewStaffPassword"  autofocus required>
                            </div> -->
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Confirm Password</label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="view_confirm_password" name="viewConfirmPassword"  autofocus required>
                            </div> -->
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mobile No</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_mobile" name="viewMobile" autofocus required>
                            </div>                       
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea  disabled cols="30" rows="2" class="form-control mt-1 inputfield" id="view_remarks" name="viewRemarks" ></textarea>
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
            <h4 class="d-flex justify-content-center py-1 contitle">Staff </h4>
            <!-- <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">OP</li>
            </ol> --> 
                                
        </div>
        
        <div class="wrapper">
            <!--CONTENTS-->
            <div class="container-fluid mainContents">
                <div class="card card-body main_card mt-2 shadow-lg p-3 mb-2">
                    <div class="main_heading d-flex justify-content-between mb-2 shadow p-2 subheading">
                        <div class="container-fluid">
                            <div class="row">
                                <div id="exportbtns"class="exportbtns col-3">
                                    <!-- export buttons -->
                                </div>
                                <div class="col-3">
                                    <select class="form-select inputfield "  aria-label="Default select example name"id="view_department_id" name="viewDepartment">
                                        <option class="inputlabel" value="">  Department Type</option>
                                        @foreach ($dept as $key )   
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach                                    
                                    </select>
                                </div>
                                <div class="col-3">
                                    
                                </div>                                                    
                                <div class="col-3 text-end">
                                    <button class="btn btn_reset" id="filter_reset" >Reset</button> 
                                    <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#StaffModal">+ Add</button>
                                </div>       
                            </div>
                        </div>     
                    </div>
                    <div>
                        <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                            <thead class="tablehead">
                                <tr>
                                    <th class="text-center">Sl No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">EMail Id</th>       
                                    <th class="text-center">Mobile No</th>   
                                    <th class="text-center">Department</th>                        
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
        <div class="loader">
            <div class="">
                <img class="img-fluid" src="{{url('assets/images/loading.gif')}}">
                <h4 class="text-center">LOADING</h4>
            </div>
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
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4]
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
                
                ajax: "{{ route('Staff.staff') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'}, 
                    {data: 'email', name: 'email'},  
                    {data: 'mobile_no', name: 'mobile_no'},
                    {data: 'deptname', name: 'deptname'},                              
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'deptid', name: 'deptid', visible: false},                              

                ]
            });

            //reset form function
            $('#filter_reset').click(function() {
                MasterTable.search('').draw();
                MasterTable.column(6).search('').draw();
                $('#SearchBar').val('');
                $('#view_department_id').val('').change();
            });



            $('#view_department_id').change(function() {
                var VoucherFilter = $(this).val();
                // //console.log(VoucherFilter);
                MasterTable.column(6).search(VoucherFilter).draw();
            });

 
            //Add Staff  

            $("#add_staff").validate({
                rules:{
                    StaffName:{
                        required: true,
                        minlength: 2,                      
                        maxlength: 25,
                    },
                    Department:{
                        required: true,
                    },
                    Email:{
                        required: true,
                        email: true
                    },
                    StaffPassword:{
                        required: true,
                        minlength: 5,
                    },
                    ConfirmPassword:{
                        required: true,
                        minlength: 5,
                        equalTo: "#staff_password",
                    },
                    Mobile:{
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                    }
                   
                },
                messages: {
                        StaffName:{
                            required: "Please Enter Staff Name",
                            minlength:"atleast 2 character",
                            maxlength: "maximum 25 character",
                            },
                        ConfirmPassword:{
                            equalTo: "Password does not Match",
                        }
                        },
                submitHandler: function(form) {

                    var StaffName = $('#staff_name').val();
                    var StaffDept = $('#department').val();
                    var StaffEmail = $('#email').val();
                    var StaffPass = $('#staff_password').val();
                    var StaffCpass = $('#confirm_password').val();
                    var StaffMobile = $('#mobile').val();
                    var StaffRemarks = $('#remarks').val();
                    var StaffBranch = $('#branch').val();
                    var DoctorGender = $('#gender').val();

                    $.ajax({
                        url: "/api/staff",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: StaffName,
                            department_id: StaffDept,
                            email: StaffEmail,
                            password: StaffPass,
                            confirm_password: StaffCpass,
                            mobile_no: StaffMobile,
                            remarks: StaffRemarks,
                            branch_id: StaffBranch,
                            gender: DoctorGender

                        },beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);           
                        var StaffResult = JSON.stringify(response);
                        console.log(StaffResult);
                        var StaffResultObj = JSON.parse(StaffResult);
                        if (StaffResultObj.success == true) {
                            if (StaffResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (StaffResultObj.code == "1") {
                                $('#add_staff')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#staff_name').focus();
                                });
                            } else if (StaffResultObj.code == "2") {
                                $('#StaffModal').modal('hide');
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Adding Failed");
                                $('#ResponseModal').modal('show');
                            }
                            else if (StaffResultObj.code == "3") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Email Already Registered");
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
         
            //edit Staff

            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditStaff = $(this).val();
                console.log(EditStaff);
                var settings = {
                    "url": "/api/staff/"+EditStaff+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                 console.log(response);
                 var StaffResult = JSON.stringify(response);
                    console.log(StaffResult);
                    var Staffedit = JSON.parse(StaffResult);
                    if (Staffedit.success == true) {
                        $('#StaffModal').modal('show');
                        $('#add_staff').hide();
                        $('#update_add_staff').show();
                        var StaffDataArray = Staffedit.staffs;
                        for(const key in StaffDataArray){
                            var StaffId = StaffDataArray['id'];
                            var UStaffName = StaffDataArray['name'];
                            var StaffDept = StaffDataArray['department_id'];
                            var StaffMail = StaffDataArray['email'];
                            var StaffPass = StaffDataArray['password'];
                            // var StaffCpass = StaffDataArray['confirm_password'];                           
                            var StaffPhone = StaffDataArray['mobile_no'];
                            var StaffRemarks = StaffDataArray['remarks'];
                            var StaffBranch = StaffDataArray['branch_id'];
                            var UDoctorGender = StaffDataArray['gender'];

                        }
                        $("#update_id").val(StaffId);
                        $("#update_staff_name").val(UStaffName);
                        $("#update_department").val(StaffDept);
                        $("#update_email").val(StaffMail);
                        $("#update_staff_password").val(StaffPass);
                        // $("#update_confirm_password").val(StaffCpass);
                        $("#update_mobile").val(StaffPhone);
                        $("#update_remarks").val(StaffRemarks);
                        $("#update_branch").val(StaffBranch);
                        $("#update_gender").val(UDoctorGender);


                    }
                });
                                      
            });




            //Update Staff

            $("#update_add_staff").validate({
                rules:{
                    UpdateStaffName:{
                        required: true,
                        minlength:2,
                        maxlength: 25,
                    },
                    UpdateDepartment:{
                        required: true,
                    },
                    UpdateEmail:{
                        required: true,
                        email: true,
                    },
                    UpdateMobile:{
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                    }
                },
                messages: {
                    UpdateStaffName:{
                        required: "Please Enter Staff Name",
                        minlength:"atleast 2 character",
                        maxlength: "maximum 25 character",
                        }
                    },
                submitHandler: function(form) {
    
                    var UpdateId = $('#update_id').val();                
                    var UpdateStaffName = $('#update_staff_name').val();
                    var UpdateStaffDept = $('#update_department').val();
                    var UpdateStaffMail = $('#update_email').val();
                    // var UpdateStaffPass = $('#update_staff_password').val();
                    // var UpdateStaffCpass = $('#update_staff_password').val();
                    var UpdateStaffPhone = $('#update_mobile').val();
                    var UpdateStaffRemarks = $('#update_remarks').val();
                    var UpdateStaffBranch = $('#update_branch').val();
                    var UpdateDoctorGender = $('#update_gender').val();

                    $.ajax({
                        url: "/api/staff/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateStaffName,
                            email: UpdateStaffMail,
                            // password: UpdateStaffPass,
                            // confirm_password: UpdateStaffCpass,
                            mobile_no: UpdateStaffPhone,
                            remarks: UpdateStaffRemarks,
                            department_id: UpdateStaffDept,
                            branch_id: UpdateStaffBranch,
                            gender: UpdateDoctorGender,

                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#StaffModal').modal('hide');
                            $('.mainContents').hide();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    })
                    .done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var StaffUpdate = JSON.stringify(response);
                        console.log(StaffUpdate);

                        var StaffUpdateed = JSON.parse(StaffUpdate);
                            if (StaffUpdateed.success == true) {
                                if (StaffUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (StaffUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (StaffUpdateed.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updating Failed");
                                $('#ResponseModal').modal('show');
                            }
                        } else {
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#ResponseModal').modal('show');
                        }  
                    });
                }
            });
           
                


             //Delete Staff
             $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteStaffType = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteStaffType);
                    $.ajax({
                        url: "/api/staff/"+DeleteStaffType+"",
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
                        var StaffDeleteResult = JSON.stringify(response);
                        console.log(StaffDeleteResult); 
                        var StaffDelObj = JSON.parse(StaffDeleteResult);
                        if (StaffDelObj.success == true) {  
                            if (StaffDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(StaffDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (StaffDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(StaffDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (StaffDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(StaffDelObj.message);
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
            //View Staff

            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewStaff = $(this).val();
                console.log(ViewStaff);
                var settings = {
                    "url": "/api/staff/"+ViewStaff+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                 console.log(response);
                 var StaffResult = JSON.stringify(response);
                    console.log(StaffResult);
                    var StaffView = JSON.parse(StaffResult);
                    if (StaffView.success == true) {
                        $('#StaffViewModal').modal('show');
                        $('#view_add_staff').show();
                        var StaffDataArray = StaffView.staffs;
                        for(const key in StaffDataArray){
                            var StaffId = StaffDataArray['id'];
                            var StaffName = StaffDataArray['name'];
                            var StaffDept = StaffDataArray['department_id'];
                            var StaffMail = StaffDataArray['email'];
                            var StaffPass = StaffDataArray['password'];
                            // var StaffCpass = StaffDataArray['confirm_password'];                           
                            var StaffPhone = StaffDataArray['mobile_no'];
                            var StaffRemarks = StaffDataArray['remarks'];
                            var StaffBranch = StaffDataArray['branch_id'];
                            var StaffGender = StaffDataArray['gender'];

                        }
                        $("#view_id").val(StaffId);
                        $("#view_staff_name").val(StaffName);
                        $("#view_department").val(StaffDept);
                        $("#view_email").val(StaffMail);
                        $("#view_staff_password").val(StaffPass);
                        // $("#view_confirm_password").val(StaffCpass);
                        $("#view_mobile").val(StaffPhone);
                        $("#view_remarks").val(StaffRemarks);
                        $("#view_branch").val(StaffBranch);
                        $("#view_gender").val(StaffGender);

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
                $('#StaffModal').on('shown.bs.modal', function() {
                    $('#staff_name').focus();
                });
            });
            
        </script>


  </body>

</html>