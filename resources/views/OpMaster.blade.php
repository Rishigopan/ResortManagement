<!DOCTYPE html>
<html lang="en">

    <head>
        <title>OP Master</title>
        @include('layouts.headder')
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

        <aside id="sidebar" class="sidebar ps-0">
            @include('layouts.sidebar')
        </aside>

        <!-- End Sidebar-->

        <main id="main" class="main">

        <div class="modal fade addUpdateModal" id="OpModal" tabindex="-1" data-bs-backdrop="static"  data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">OP</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="formslist">
                            <form class="AddOp AddForm" id="add_op" novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Registration No<span  style="color:red"> *</span></label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="reg_no" name="RegNo" disabled autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Op No<span  style="color:red"> *</span></label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="op_no" name="OpNo"  disabled autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Op Date<span  style="color:red"> *</span></label><br>
                                        <input type="date" class="form-control mt-1 inputfield" id="op_date" name="OpDate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date("Y-m-d"); ?>" autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="name" name="Name" placeholder="Enter Name" autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="occupation" name="Occupation" placeholder="Enter Occupation" autofocus >
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Age<span  style="color:red"> *</span></label><br>
                                        <input type="number" min="1" class="form-control mt-1 inputfield" id="age" name="Age" placeholder="Enter Age" autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Marital Status</label><br>
                                        <select class="form-select inputfield " aria-label="Default select example name"id="marital_status" name="MaritalStatus" >
                                            <option hidden value="0"> Select Marital Status</option>
                                            <option value="1"> Single</option>
                                            <option value="2"> Married</option>
                                            <option value="3"> Divorced</option>
                                            <option value="4"> Widowed</option>                                           
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Gender<span  style="color:red"> *</span></label><br>
                                        <select class="form-select inputfield" aria-label="Default select example name"id="gender" name="Gender" required>
                                            <option hidden value=""> Select Gender</option>
                                            <option value="1"> Male</option>
                                            <option value="2"> Female</option>
                                            <option value="3"> Others</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Email Id</label><br>
                                        <input type="email" class="form-control mt-1 inputfield" id="email" name="Email" placeholder="Enter Email Id" autofocus >
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                        <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="local_address" name="LocalAddress" placeholder="Enter Local Address"></textarea>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                        <textarea   cols="30" rows="2" class="form-control mt-1 inputfield" id="full_address" name="FullAddress" placeholder="Enter Full Address"></textarea>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Primary Mobile Number<span  style="color:red"> *</span></label><br>
                                        <input type="number" min="0" class="form-control mt-1 inputfield" id="mobile_number" name="MobileNumber" placeholder="Enter Mobile Number" autofocus required>
                                    </div>                                
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                        <input type="number" min="0" class="form-control mt-1 inputfield" id="phone_number" name="PhoneNumber" placeholder="Enter Mobile number" autofocus >
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                        <select class="form-select inputfield " aria-label="Default select example name"id="branch" name="Branch">
                                            <option class="inputlabel" hidden value=""> Choose Branch</option>
                                            @foreach ($branch as $key )   
                                                <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                            @endforeach                                                                           
                                        </select>
                                    </div>
                                </div>
                                <div class=" text-end mt-3">
                                    <button type="submit" class="btn savebtn  px-5 ">Save</button>
                                </div>
                            </form>
                            <form class="UpdateAddOp UpdateForm" id="update_add_op" style="display: none;" novalidate>
                            {{ csrf_field() }}
                                <div class="row">
                                    <input type="hidden"  id="update_op_id" >
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Registration No<span  style="color:red"> *</span></label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="update_reg_no" name="UpdateRegNo" disabled >
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Op No<span  style="color:red"> *</span></label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="update_op_no" name="UpdateOpNo" disabled >
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Op Date<span  style="color:red"> *</span></label><br>
                                        <input type="date" class="form-control mt-1 inputfield" id="update_op_date" name="UpdateOpDate" autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="update_name" name="UpdateName"  autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                        <input type="text" class="form-control mt-1 inputfield" id="update_occupation" name="UpdateOccupation"  autofocus >
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Age<span  style="color:red"> *</span></label><br>
                                        <input type="number "min="1" class="form-control mt-1 inputfield" id="update_age" name="UpdateAge"  autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Marital Status</label><br>
                                        <select class="form-select inputfield " aria-label="Default select example name"id="update_marital_status" name="UpdateMaritalStatus">
                                        <option value="1"> Single</option>
                                        <option value="2"> Married</option>
                                        <option value="3"> Divorced</option>
                                        <option value="4"> Widowed</option>                                           
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Gender<span  style="color:red"> *</span></label><br>
                                        <select class="form-select inputfield" aria-label="Default select example name"id="update_gender" name="UpdateGender" required>
                                        <option value="1"> Male</option>
                                        <option value="2"> Female</option>
                                        <option value="3"> Others</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Email Id</label><br>
                                        <input type="email" class="form-control mt-1 inputfield" id="update_mail" name="UpdateMail" autofocus>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                        <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_local_address" name="UpdateLocalAddress"></textarea>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                        <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_full_address" name="UpdateFullAddress" ></textarea>
                                    </div>          
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel"> Primary Mobile Number<span  style="color:red"> *</span></label><br>
                                        <input type="number" min="0" class="form-control mt-1 inputfield" id="update_mobile_number" name="UpdateMobileNumber"autofocus required>
                                    </div>                      
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                        <input type="number" min="0" class="form-control mt-1 inputfield" id="update_phone_number" name="UpdatePhoneNumber" autofocus >
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                        <select class="form-select inputfield " aria-label="Default select example name"id="update_branch" name="UpdateBranch">
                                            <option class="inputlabel" hidden value=""> Choose Branch</option>
                                            @foreach ($branch as $key )   
                                                <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                            @endforeach                                                                           
                                        </select>
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
        </div>
        <div class="modal fade addUpdateModal" id="OPViewModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">OP</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="UpdateAddOp ViewForm" id="view_add_op" style="display: none;" novalidate>
                            <div class="row">
                                <input type="hidden"  id="view_op_id" >
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Registration No</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_reg_no" name="UpdateRegNo" autofocus disabled >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Op No</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_op_no" name="UpdateOpNo" autofocus disabled >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Op Date</label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="view_op_date" name="UpdateOpDate" autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_name" name="UpdateName"  autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_occupation" name="UpdateOccupation"  autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Age</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_age" name="UpdateAge"  autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Marital Status</label><br>
                                    <select class="form-select inputfield " disabled aria-label="Default select example name"id="view_marital_status" name="UpdateMaritalStatus">
                                    <option value="1"> Single</option>
                                    <option value="2"> Married</option>
                                    <option value="3"> Divorced</option>
                                    <option value="4"> Widowed</option>                                           
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Gender</label><br>
                                    <select class="form-select inputfield" disabled aria-label="Default select example name"id="view_gender" name="UpdateGender" required>
                                    <option value="1"> Male</option>
                                    <option value="2"> Female</option>
                                    <option value="3"> Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Email Id</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_mail" name="UpdateMail" autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                    <textarea  cols="30" rows="2" disabled class="form-control mt-1 inputfield" id="view_local_address" name="UpdateLocalAddress"></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                    <textarea  cols="30" rows="2" disabled class="form-control mt-1 inputfield" id="view_full_address" name="UpdateFullAddress" ></textarea>
                                </div>    
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Primary Mobile Number</label><br>
                                    <input type="text" disabled class="form-control mt-1 inputfield" id="view_mobile_number" name="UpdateMobileNumber"autofocus required>
                                </div>                            
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                    <input type="text" disabled class="form-control mt-1 inputfield" id="view_phone_number" name="UpdatePhoneNumber" autofocus required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                    <select class="form-select inputfield " aria-label="Default select example name"id="view_branch" name="ViewBranch" disabled>
                                    <option class="inputlabel" hidden value=""> Choose Branch</option>
                                        @foreach ($branch as $key )   
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                        @endforeach                                                                           
                                    </select>
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
        
            <div class="container-fluid">
                <h4 class="d-flex justify-content-center py-1 contitle">OP</h4>
                            
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
                                <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#OpModal">+Add </button> 
                            </div>
                        </div>
                        <div >
                            <table class="table text-nowrap table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">Registration Number</th>
                                        <th class="text-center">OP Number</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Age</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Mobile</th>
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
                
                ajax: "{{ route('OP.op') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', },
                    {data: 'reg_no', name: 'reg_no'}, 
                    {data: 'op_no', name: 'op_no'}, 
                    {data: 'name', name: 'name'},
                    {data: 'age', name: 'age'},
                    {data: 'gender', name: 'gender'},
                    {data: 'mobile_no', name: 'mobile_no'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]
            });

            //Searchbar
            $('#SearchBar').keyup(function() {
                    MasterTable.search($(this).val()).draw();
                });

                
            //Add OP  
            
            $("#add_op").validate({
                rules:{
                    MobileNumber:{
                        required: true,
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    PhoneNumber:{
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    Age:{
                        required: true,
                        maxlength: 3,                    
                    } 

                },
                submitHandler: function(form) {

                    var OPDate = $('#op_date').val();
                    var OPName = $('#name').val();
                    var OPOccupation= $('#occupation').val();
                    var OPAge = $('#age').val();
                    var OPMaritalStatus = $('#marital_status').val();
                    var OPGender = $('#gender').val();
                    var OPmail = $('#email').val();
                    var OPLocalAddress = $('#local_address').val();
                    var OPFullAddress = $('#full_address').val();
                    var OPPhoneNumber = $('#phone_number').val();
                    var OPMobileNumber = $('#mobile_number').val();
                    var OPBranch = $('#branch').val();

                    $.ajax({
                        url: "/api/op",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            op_date: OPDate,
                            name: OPName,
                            age: OPAge,
                            gender: OPGender,
                            full_address: OPFullAddress,
                            phone_no: OPPhoneNumber,
                            mobile_no: OPMobileNumber,
                            occupation: OPOccupation,
                            marital_status: OPMaritalStatus,
                            local_address: OPLocalAddress,
                            email: OPmail,
                            branch_id: OPBranch 

                        },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#OpModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var OPResult = JSON.stringify(response);
                        console.log(OPResult);
                        var OPResultObj = JSON.parse(OPResult);
                        if (OPResultObj.success == true) {
                            if (OPResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (OPResultObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (OPResultObj.code == "2") {
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

            

            //edit OP 
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditOP = $(this).val();
                console.log(EditOP);
                var settings = {
                    "url": "/api/op/"+EditOP+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var OPResult = JSON.stringify(response);
                    console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);
                    if (OPedit.success == true) {
                        $('#OpModal').modal('show');
                        $('#add_op').hide();
                        $('#update_add_op').show();
                        var OPDataArray = OPedit.ops;
                        for(const key in OPDataArray){
                            var OPId = OPDataArray['id'];
                            var RegNum = OPDataArray['reg_no'];
                            var OPNum = OPDataArray['op_no'];
                            var OPDate = OPDataArray['op_date'];
                            var OPName = OPDataArray['name'];
                            var OPMail = OPDataArray['email'];
                            var OPOccupation = OPDataArray['occupation'];
                            var OPAge = OPDataArray['age'];
                            var OPMaritalStatus = OPDataArray['marital_status'];
                            var OPGender = OPDataArray['gender'];
                            var OPLocalAddress = OPDataArray['local_address'];
                            var OPFullAddress = OPDataArray['full_address'];
                            var OPPhoneNumber = OPDataArray['phone_no'];
                            var OPMobileNumber = OPDataArray['mobile_no'];
                            var IPBranch = OPDataArray['branch_id'];


                        }
                        $("#update_op_id").val(OPId);
                        $("#update_reg_no").val(RegNum);
                        $("#update_op_no").val(OPNum);
                        $("#update_op_date").val((OPDate.slice(0,10)));
                        $("#update_name").val(OPName);
                        $("#update_mail").val(OPMail);
                        $("#update_occupation").val(OPOccupation);
                        $("#update_age").val(OPAge);
                        $("#update_marital_status").val(OPMaritalStatus);
                        $("#update_gender").val(OPGender).change();
                        $("#update_local_address").val(OPLocalAddress);
                        $("#update_full_address").val(OPFullAddress);
                        $("#update_phone_number").val(OPPhoneNumber);
                        $("#update_mobile_number").val(OPMobileNumber);
                        $("#update_branch").val(IPBranch);
                        console.log(OPDate.slice(0,9));

                    }
                });
            });


            //Update OP 

            $("#update_add_op").validate({
                rules:{
                    UpdateMobileNumber:{
                        required: true,
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    UpdatePhoneNumber:{
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    UpdateAge:{
                        required: true,
                        maxlength: 3,                    
                    } 

                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_op_id').val();
                    var RegistrationNum = $('#update_reg_no').val();
                    var OPNum = $('#update_op_no').val();
                    var OPDate = $('#update_op_date').val();
                    var OPName = $('#update_name').val();
                    var OPOccupation= $('#update_occupation').val();
                    var OPAge = $('#update_age').val();
                    var OPMaritalStatus = $('#update_marital_status').val();
                    var OPGender = $('#update_gender').val();
                    var OPmail = $('#update_mail').val();
                    var OPLocalAddress = $('#update_local_address').val();
                    var OPFullAddress = $('#update_full_address').val();
                    var OPPhoneNumber = $('#update_phone_number').val();
                    var OPMobileNumber = $('#update_mobile_number').val();
                    var OPBranch = $('#update_branch').val();
                    console.log(UpdateId);
                    $.ajax({
                        url: "/api/op/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            reg_no:OPNum,
                            op_no:RegistrationNum,
                            op_date: OPDate,
                            name: OPName,
                            age: OPAge,
                            gender: OPGender,
                            full_address: OPFullAddress,
                            phone_no: OPPhoneNumber,
                            mobile_no: OPMobileNumber,
                            occupation: OPOccupation,
                            marital_status: OPMaritalStatus,
                            local_address: OPLocalAddress,
                            email: OPmail,
                            branch_id: OPBranch,

                        },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#OpModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function (response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var OPUpdate = JSON.stringify(response);
                        console.log(OPUpdate);

                        var OPUpdateed = JSON.parse(OPUpdate);
                            if (OPUpdateed.success == true) {
                            if (OPUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (OPUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (OPUpdateed.code == "2") {
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




            //Delete OP 
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DelOP = $(this).val();
                $('#confirmYes').click(function(){                  
                    console.log(DelOP);
                    $.ajax({
                        "url": "/api/op/"+DelOP+"",
                        "method": "DELETE",
                        "timeout": 0,
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
                        var OPResult = JSON.stringify(response);
                            console.log(OPResult); 
                            var OPDelObj = JSON.parse(OPResult);
                            if (OPDelObj.success == true) {  
                            if (OPDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(OPDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (OPDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(OPDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (OPDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(OPDelObj.message);
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
                           
            
            //View OP 
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewOP = $(this).val();
                console.log(ViewOP);
                var settings = {
                    "url": "/api/op/"+ViewOP+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var OPResult = JSON.stringify(response);
                    console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);
                    if (OPedit.success == true) {
                        $('#OPViewModal').modal('show');
                        $('#view_add_op').show();
                        var OPDataArray = OPedit.ops;
                        for(const key in OPDataArray){
                            var OPId = OPDataArray['id'];
                            var RegNum = OPDataArray['reg_no'];
                            var OPNum = OPDataArray['op_no'];
                            var OPDate = OPDataArray['op_date'];
                            var OPName = OPDataArray['name'];
                            var OPMail = OPDataArray['email'];
                            var OPOccupation = OPDataArray['occupation'];
                            var OPAge = OPDataArray['age'];
                            var OPMaritalStatus = OPDataArray['marital_status'];
                            var OPGender = OPDataArray['gender'];
                            var OPLocalAddress = OPDataArray['local_address'];
                            var OPFullAddress = OPDataArray['full_address'];
                            var OPPhoneNumber = OPDataArray['phone_no'];
                            var OPMobileNumber = OPDataArray['mobile_no'];
                            var OPBranch = OPDataArray['branch_id'];


                        }
                        $("#view_op_id").val(OPId);
                        $("#view_reg_no").val(RegNum);
                        $("#view_op_no").val(OPNum);
                        $("#view_op_date").val(OPDate);
                        $("#view_name").val(OPName);
                        $("#view_mail").val(OPMail);
                        $("#view_occupation").val(OPOccupation);
                        $("#view_age").val(OPAge);
                        $("#view_marital_status").val(OPMaritalStatus);
                        $("#view_gender").val(OPGender).change();
                        $("#view_local_address").val(OPLocalAddress);
                        $("#view_full_address").val(OPFullAddress);
                        $("#view_phone_number").val(OPPhoneNumber);
                        $("#view_mobile_number").val(OPMobileNumber);
                        $("#view_mobile_number").val(OPMobileNumber);
                        $("#view_branch").val(OPBranch);

                    }
                });
            });

            //Focus First Field
            $(document).ready(function() {
                $('#OpModal').on('shown.bs.modal', function() {
                    ShowOpNum();
                    $('#name').focus();
                });
            });

            //Function  show Op details 
            function ShowOpNum() {
                var settings = {
                    "url": "/api/maxOP",
                    "method": "GET",
                    "timeout": 0,
                    // "beforeSend": function() {
                    //     $('.loader').show();
                    //     $('.mainContents').hide();
                    // }
                };

                $.ajax(settings).done(function(response) {
                    console.log(response);
                    // $('.loader').hide();
                    // $('.mainContents').hide();

                    var OPResult = JSON.stringify(response);
                    console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);

                    var regno = OPedit.max_reg_no;
                    var opno = OPedit.max_op_no;

                    $("#reg_no").val(regno);
                    $("#op_no").val(opno);
                });
            }

            
        </script>
    </body>
</html>