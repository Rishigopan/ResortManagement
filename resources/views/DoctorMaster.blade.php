<!DOCTYPE html>
<html lang="en">

  <head>
    @include('layouts.headder')
    <title>Doctor</title>
    <style>
        .mainContents{
            display:none;
        }
      </style>
  </head>

  <body>
    <div class="modal fade addUpdateModal" id="DoctorModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Doctor</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="Doctor AddForm" id="doctor" novalidate>
                           {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="doctor_name" name="DoctorName" placeholder="Enter Doctor Name" required>
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
                                <input type="email" class="form-control mt-1 inputfield" id="email" name="Email" placeholder="Enter Your Email" required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Password<span  style="color:red"> *</span></label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="password" name="Password" placeholder="....." required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Confirm Password<span  style="color:red"> *</span></label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="confirm_password" name="ConfirmPassword" placeholder="....." required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mobile No<span  style="color:red"> *</span></label><br>
                                <input type="number" class="form-control mt-1 inputfield" min="0" id="mobile" name="Mobile" placeholder="Enter Mobile Number" required style="-webkit-appearance: none;">
                            </div>                       
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="remarks" name="Remarks" placeholder="Enter Remarks"></textarea>
                            </div>                            
                        </div>
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 ">Save</button>
                        </div>
                    </form> 
                    <form class="UpdateDoctor UpdateForm" id="update_doctor" style="display: none;" novalidate>
                         {{ csrf_field() }}
                         <input type="hidden"  id="update_doctor_id" >
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_doctor_name" name="UpdateDoctorName"  required>
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
                                    <option class="inputlabel" hidden value=""> Choose Department</option>
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
                                <input type="email" class="form-control mt-1 inputfield" id="update_email" name="UpdateEmail" required>
                            </div>
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Password</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_password" name="UpdatePassword"  required>
                            </div> -->
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Confirm Password</label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="update_confirm_password" name="UpdateConfirmPassword"  required>
                            </div> -->
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mobile No<span  style="color:red"> *</span></label><br>
                                <input type="number" class="form-control mt-1 inputfield" min="0" id="update_mobile" name="UpdateMobile"  required>
                            </div>                       
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="update_remarks" name="UpdateRemarks"></textarea>
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
    <div class="modal fade addUpdateModal" id="DoctorViewModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Doctor</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" id="view_doctor" style="display: none;" novalidate>
                         <input type="hidden" disabled id="view_doctor_id" >
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input disabled type="text" class="form-control mt-1 inputfield" id="view_doctor_name" name="viewDoctorName"  required>
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
                                <select disabled class="form-select inputfield " aria-label="Default select example name"id="view_department" name="viewDepartment">
                                    @foreach ($dept as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                     @endforeach                                        
                                </select>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                <select class="form-select inputfield "disabled aria-label="Default select example name"id="view_branch" name="ViewBranch">
                                  <option class="inputlabel" hidden value=""> Choose Branch</option>
                                    @foreach ($branch as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Email Id</label><br>
                                <input disabled type="text" class="form-control mt-1 inputfield" id="view_email" name="viewEmail" required>
                            </div>
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Password</label><br>
                                <input disabled type="text" class="form-control mt-1 inputfield" id="view_password" name="viewPassword"  required>
                            </div> -->
                            <!-- <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Confirm Password</label><br>
                                <input type="password" class="form-control mt-1 inputfield" id="view_confirm_password" name="viewConfirmPassword"  required>
                            </div> -->
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label disabled class="mt-2 mb-1 inputlabel">Mobile No</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" min="0" id="view_mobile" name="viewMobile"  required>
                            </div>                       
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea disabled  cols="30" rows="2" class="form-control mt-1 inputfield" id="view_remarks" name="viewRemarks"></textarea>
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
            <h4 class="d-flex justify-content-center py-1 contitle">Doctor </h4>         
        </div>
        
        <div class="wrapper">
            <!--CONTENTS-->
            <div class="container-fluid mainContents">
                <div class="card card-body main_card mt-2 p-3 mb-2">                 
                    <div class="main_heading d-flex justify-content-between mb-2 p-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div id="exportbtns"class="exportbtns col-3">
                                    <!-- export buttons -->
                                </div>
                                <div class="col-3">
                                    <select  class="form-select inputfield " aria-label="Default select example name"id="view_department_id" name="viewDepartment">
                                        <option class="inputlabel" value=""> Department Types </option>
                                        @foreach ($dept as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach                                        
                                    </select>
                                </div>
                                <div class="col-3">
                                    
                                </div>                                                    
                                <div class="col-3 text-end">
                                    <button class="btn btn_reset" id="filter_reset" >Reset</button> 
                                    <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#DoctorModal">+ Add</button>
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
      

        document.getElementById("mobile").addEventListener("keydown", function(e) {
            if (e.keyCode === 38 || e.keyCode === 40) {
                e.preventDefault();
            }
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
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
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
                
                ajax: "{{ route('Doctor.doctor') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',},
                    {data: 'name', name: 'name'}, 
                    {data: 'email', name: 'email'},  
                    {data: 'mobile_no', name: 'mobile_no'},
                    {data: 'depname', name: 'depname'},                              
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'depid', name: 'depid', visible: false,},                              

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


            //Add Doctor  

            $("#doctor").validate({
                rules:{
                    DoctorName:{
                        required: true,
                        minlength: 2,                      
                        maxlength: 25,
                    },
                    Department:{
                        required: true,
                    },
                    Email:{
                        required: true,
                        email: true,

                    },
                    Password:{
                        required: true,
                        minlength: 5,
                        maxlength: 25,
                    },
                    ConfirmPassword:{
                        required: true,
                        minlength: 5,
                        maxlength: 25,
                        equalTo: "#password",
                    },
                    Mobile:{
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                    }
                },
                messages: {
                    DoctorName:{
                        required: "Please Enter Doctor Name",
                        minlength:"atleast 2 character",
                        maxlength: "maximum 25 character",
                    },
                    ConfirmPassword:{
                        equalTo: "Password does not Match",
                    }

                },
                submitHandler: function(form) {
                    var DoctorName = $('#doctor_name').val();
                    var DoctorDept = $('#department').val();
                    var DoctorEmail = $('#email').val();
                    var DoctorPass = $('#password').val();
                    var DoctorCpass = $('#confirm_password').val();
                    var DoctorMobile = $('#mobile').val();
                    var DoctorRemarks = $('#remarks').val();
                    var DoctorBranch = $('#branch').val();
                    var DoctorGender = $('#gender').val();

                    $.ajax({
                        url: "/api/doctor",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: DoctorName,
                            mobile_no: DoctorMobile,
                            department_id: DoctorDept,
                            remarks: DoctorRemarks,
                            email: DoctorEmail,
                            password: DoctorPass,
                            confirm_password: DoctorCpass,
                            branch_id: DoctorBranch,
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
                        var DoctorResult = JSON.stringify(response);
                        console.log(DoctorResult);
                        var DoctorResultObj = JSON.parse(DoctorResult);
                        if (DoctorResultObj.success == true) {
                            if (DoctorResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DoctorResultObj.code == "1") {
                                $('#doctor')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#doctor_name').focus();
                                });
                            } else if (DoctorResultObj.code == "2") {
                                $('#DoctorModal').modal('hide');
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Adding Failed");
                                $('#ResponseModal').modal('show');
                            }else if (DoctorResultObj.code == "3") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Email is Alredy Registered");
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
         



            //edit Doctor

            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditDoctor = $(this).val();
                console.log(EditDoctor);
                var settings = {
                    "url": "/api/doctor/"+EditDoctor+"",
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var DoctorResult = JSON.stringify(response);
                    console.log(DoctorResult);
                    var Doctoredit = JSON.parse(DoctorResult);
                    if (Doctoredit.success == true) {
                        $('#DoctorModal').modal('show');
                        $('#doctor').hide();
                        $('#update_doctor').show();
                        var DoctorDataArray = Doctoredit.doctors;
                        for(const key in DoctorDataArray){
                            var DoctorId = DoctorDataArray['id'];
                            var DoctorName = DoctorDataArray['name'];
                            var DoctorDept = DoctorDataArray['department_id'];
                            var DoctorMail = DoctorDataArray['email'];
                            // var DoctorPass = DoctorDataArray['password'];
                            // var DoctorCpass = DoctorDataArray['confirm_password'];                           
                            var DoctorPhone = DoctorDataArray['mobile_no'];
                            var DoctorRemarks = DoctorDataArray['remarks'];
                            var DoctorBranch = DoctorDataArray['branch_id'];
                            var DoctorGender = DoctorDataArray['gender'];

                        }
                        $("#update_doctor_id").val(DoctorId);
                        $("#update_doctor_name").val(DoctorName);
                        $("#update_department").val(DoctorDept);
                        $("#update_email").val(DoctorMail);
                        // $("#update_password").val(DoctorPass);
                        // $("#update_confirm_password").val(DoctorCpass);
                        $("#update_mobile").val(DoctorPhone);
                        $("#update_remarks").val(DoctorRemarks);
                        $("#update_branch").val(DoctorBranch);
                        $("#update_gender").val(DoctorGender);


                    }
                });
                      
            });




            //Update Doctor

            $("#update_doctor").validate({
                rules:{
                    UpdateDoctorName:{
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
                    UpdateDoctorName:{
                        required: "Please Enter Doctor Name",
                        minlength:"atleast 2 character",
                        maxlength: "maximum 25 character",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_doctor_id').val();                
                    var UpdateDoctorName = $('#update_doctor_name').val();
                    var UpdateDoctorDept = $('#update_department').val();
                    var UpdateDoctorMail = $('#update_email').val();
                    // var UpdateDoctorPass = $('#update_password').val();
                    // var UpdateDoctorCpass = $('#update_password').val();
                    var UpdateDoctorPhone = $('#update_mobile').val();
                    var UpdateDoctorRemarks = $('#update_remarks').val();
                    var UpdateDoctorBranch = $('#update_branch').val();
                    var UpdateDoctorGender = $('#update_gender').val();

                    $.ajax({
                        url: "/api/doctor/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateDoctorName,
                            mobile_no: UpdateDoctorPhone,
                            department_id: UpdateDoctorDept,
                            remarks: UpdateDoctorRemarks,
                            email: UpdateDoctorMail,
                            branch_id: UpdateDoctorBranch,
                            gender: UpdateDoctorGender,

                            // password: UpdateDoctorPass,
                            // confirm_password: UpdateDoctorCpass
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#DoctorModal').modal('hide');
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
                        var DoctorUpdate = JSON.stringify(response);
                        console.log(DoctorUpdate);

                        var DoctorUpdateed = JSON.parse(DoctorUpdate);
                            if (DoctorUpdateed.success == true) {
                                if (DoctorUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DoctorUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (DoctorUpdateed.code == "2") {
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
               


            
            //Delete Doctor
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteDoctorType = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteDoctorType);
                    $.ajax({
                        url: "/api/doctor/"+DeleteDoctorType+"",
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
                        var DoctorDeleteResult = JSON.stringify(response);
                        console.log(DoctorDeleteResult); 
                        var DoctorDelObj = JSON.parse(DoctorDeleteResult);
                        if (DoctorDelObj.success == true) {  
                            if (DoctorDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(DoctorDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (DoctorDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DoctorDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (DoctorDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DoctorDelObj.message);
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



            //View Doctor

            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewDoctor = $(this).val();
                console.log(ViewDoctor);
                var settings = {
                    "url": "/api/doctor/"+ViewDoctor+"",
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var DoctorResult = JSON.stringify(response);
                    console.log(DoctorResult);
                    var DoctorView = JSON.parse(DoctorResult);
                    if (DoctorView.success == true) {
                        $('#DoctorViewModal').modal('show');
                        $('#view_doctor').show();
                        var DoctorDataArray = DoctorView.doctors;
                        for(const key in DoctorDataArray){
                            var DoctorId = DoctorDataArray['id'];
                            var DoctorName = DoctorDataArray['name'];
                            var DoctorDept = DoctorDataArray['department_id'];
                            var DoctorMail = DoctorDataArray['email'];
                            var DoctorPass = DoctorDataArray['password'];
                            // var DoctorCpass = DoctorDataArray['confirm_password'];                           
                            var DoctorPhone = DoctorDataArray['mobile_no'];
                            var DoctorRemarks = DoctorDataArray['remarks'];
                            var DoctorBranch = DoctorDataArray['branch_id'];
                            var VDoctorGender = DoctorDataArray['gender'];

                        }
                        $("#view_doctor_id").val(DoctorId);
                        $("#view_doctor_name").val(DoctorName);
                        $("#view_department").val(DoctorDept);
                        $("#view_email").val(DoctorMail);
                        $("#view_password").val(DoctorPass);
                        // $("#view_confirm_password").val(DoctorCpass);
                        $("#view_mobile").val(DoctorPhone);
                        $("#view_remarks").val(DoctorRemarks);
                        $("#view_branch").val(DoctorBranch);
                        $("#view_gender").val(VDoctorGender);

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
                $('#DoctorModal').on('shown.bs.modal', function() {
                    $('#doctor_name').focus();
                });
            });
            
        </script>

  </body>

</html>