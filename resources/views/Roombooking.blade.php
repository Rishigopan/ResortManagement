<!DOCTYPE html>
<html lang="en">

<head>
    <title>Room Booking</title>
    @include('layouts.headder')
    <style>
        .mainContents {
            display: none;
        }
    </style>

</head>

<body>
    <div class="modal fade addUpdateModal" id="RoomModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Room</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="Room AddForm" id="add_room" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                                <!-- <fieldset>
                                    <legend>Room For</legend> -->
                                    <div class="col-xl-12 col-lg-12 col-12">
                                        <label class="mt-2 mb-1 inputlabel">Room Choosen By</label><br>
                                        <select class="form-select inputfield " aria-label="Default select example  name"
                                            id="op_id" name="opId">
                                            <option class="inputlabel" hidden value="">Choose patient</option>
                                            @foreach ($Op as $key)
                                                <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <select class="form-select inputfield " aria-label="Default select example name"
                                            id="reference_id" name="reference_id">
                                            <option class="inputlabel" hidden value="">Choose Reference</option>
                                            @foreach ($users as $key)
                                                <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                <!-- </fieldset> -->


                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">From Date<span  style="color:red"> *</span></label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="from_date"
                                    name="from_date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">To Date<span  style="color:red"> *</span></label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="To_date" name="To_date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Type<span  style="color:red"> *</span></label><br>
                                <select class="room_type form-select inputfield RoomTypeid"
                                    aria-label="Default select example name" id="room_type" name="room_type" required>
                                    <option class="inputlabel" hidden value=""> Choose Room Type</option>
                                    @foreach ($RoomType as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room<span  style="color:red"> *</span></label><br>

                                <select class="form-select inputfield RoomNumId"
                                    aria-label="Default select example name" id="Room_id" name="Room" required>
                                    <option class="inputlabel" hidden value=""> Choose Room</option>
                                    @foreach ($Room as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->room_no }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label class="mt-2 mb-1 inputlabel">Room Specification<span  style="color:red"> *</span></label><br>
                                <input type="radio" id="ac" name="acnonac"  class="acnonac" value="1">
                                <label for="ac">AC</label>
                                <input type="radio" id="nonac" name="acnonac" class="acnonac" value="2">
                                <label for="nonac">Non-AC</label>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Rent</label><br>
                                <input type="text" class="form-control ShowRent mt-1 inputfield" id="Rent" name="rent"
                                disabled autofocus required>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12">
                            <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                            <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="remarks" name="Remarks" placeholder="Enter Remarks"></textarea>
                        </div>  
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 ">Save</button>
                        </div>
                    </form>
                    <form class="UpdateRoom UpdateForm" id="update_add_room" style="display: none;" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control mt-1 inputfield" id="update_id" name="UpdateId"
                            autofocus required>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">

                                <label class="mt-2 mb-1 inputlabel">Room Choosen By</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"
                                    id="update_op_id" name="opId">
                                    @foreach ($Op as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endforeach
                    
                                </select><br>
                                <div class="text-center">
                                    <p>--- OR ---</p>
                                </div>                                
                                <select class="form-select inputfield " aria-label="Default select example name"
                                    id="Update_reference_id" name="reference_id">
                                    @foreach ($users as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endforeach
                    
                                </select>
                            </div>
                    
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">From Date<span  style="color:red"> *</span></label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="update_from_date"
                                    name="from_date" autofocus>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">To Date<span  style="color:red"> *</span></label><br>
                                <input type="date" class="To_date form-control mt-1 inputfield" id="update_To_date" name="To_date"
                                    autofocus>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Type<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield RoomTypeid"
                                    aria-label="Default select example name" id="update_room_type" name="room_type">
                                    @foreach ($RoomType as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endforeach
                    
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room<span  style="color:red"> *</span></label><br>
                    
                                <select class="form-select inputfield RoomNumId"
                                    aria-label="Default select example name" id="update_Room_id" name="Room">
                                    @foreach ($Room as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->room_no }}
                                        </option>
                                    @endforeach
                    
                                </select>
                            </div>
                            <div>
                    
                    
                                <label class="mt-2 mb-1 inputlabel">Room Specification<span  style="color:red"> *</span></label><br>
                                <input type="radio" id="update_ac" name="update_acnonac"  class="update_acnonac" value="1">
                                <label for="ac">AC</label>
                                <input type="radio" id="update_nonac" name="update_acnonac" class="update_acnonac" value="2">
                                <label for="nonac">Non-AC</label>
                            </div>
                    
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Rent</label><br>
                                <input type="text" class=" Update_Rent ShowRent form-control mt-1 inputfield" id="Update_Rent" name="rent"
                                disabled autofocus required>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12">
                            <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                            <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_remarks" name="Remarks" placeholder="Enter Remarks"></textarea>
                        </div>  
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade addUpdateModal" id="RoomViewModal" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Room Details</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="UpdateRoom UpdateForm" id="view_add_room" style="display: none;" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control mt-1 inputfield" id="view_id" name="UpdateId"
                            autofocus required>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">

                                <label class="mt-2 mb-1 inputlabel">Room Choosen By</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"
                                    id="view_op_id" name="opId" disabled>
                                    @foreach ($Op as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endforeach
                    
                                </select><br>
                                <div class="text-center">
                                    <p>--- OR ---</p>
                                </div>
                                <select class="form-select inputfield " aria-label="Default select example name"
                                    id="view_reference_id" name="reference_id" disabled>
                                    @foreach ($users as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endforeach
                    
                                </select>
                            </div>
                    
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">From Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="view_from_date"
                                    name="from_date" autofocus disabled>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">To Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="view_To_date" name="To_date"
                                    autofocus disabled>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Type</label><br>
                                <select class="form-select inputfield "
                                    aria-label="Default select example name" id="view_room_type" name="room_type" disabled>
                                    @foreach ($RoomType as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endforeach
                    
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room</label><br>
                    
                                <select class="form-select inputfield "
                                    aria-label="Default select example name" id="view_Room_id" name="Room" disabled>
                                    @foreach ($Room as $key)
                                        <option class="inputlabel" value="{{ $key->id }}">{{ $key->room_no }}
                                        </option>
                                    @endforeach
                    
                                </select>
                            </div>
                            <div>
                    
                    
                                <label class="mt-2 mb-1 inputlabel">Room Specification</label><br>
                                <input type="radio" id="view_ac" name="update_acnonac"  class="view_acnonac" value="1" disabled>
                                <label for="ac">AC</label>
                                <input type="radio" id="view_nonac" name="update_acnonac" class="view_acnonac" value="2" disabled>
                                <label for="nonac">Non-AC</label>
                            </div>Acnonac
                    
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Rent</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="view_Rent" name="rent"
                                disabled autofocus required>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12">
                            <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                            <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="view_remarks" name="Remarks" placeholder="Enter Remarks" disabled></textarea>
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
            <h4 class="d-flex justify-content-center py-1 contitle">Room Booking</h4>
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
                                <div class="text-end col-3">
                                    <select class="form-select"  aria-label="Default select example name" id="view_room_type_id" name="viewRoomType">
                                        <option hidden class="inputlabel" value=""> Choose Room Type</option>
                                        @foreach ($RoomType as $key)
                                            <option class="inputlabel" value="{{ $key->id }}">{{ $key->name }}
                                            </option>
                                        @endforeach                                         
                                    </select>
                                </div>                               
                                <div class="col-3">

                                </div>
                                <div class="col-3 text-end">
                                    <button class="btn btn_reset" id="filter_reset" >Reset</button> 
                                    <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#RoomModal">+ Add</button>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div>
                        <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                            <thead class="tablehead">
                                <tr>
                                    <th class="text-center">Sl No</th>
                                    <th class="text-center">Patient Name</th>
                                    <th class="text-center">Reference By</th>
                                    <th class="text-center">Room No</th>
                                    <th class="text-center">Room Type</th>
                                    <th class="text-center">From Date</th>
                                    <th class="text-center">To Date</th>
                                    <th class="text-center">Rent</th>
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
                <img class="img-fluid" src="{{ url('assets/images/loading.gif') }}">
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

            ajax: "{{ route('RoomBooking.RoomBook') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                   
                },
                {
                    data: 'patientname',
                    name: 'patientname'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'room_no',
                    name: 'room_no'
                },
                {
                    data: 'rtname',
                    name: 'rtname'
                },
                {
                    data: 'fromdate',
                    name: 'fromdate'
                },
                {
                    data: 'Todate',
                    name: 'Todate'
                },
                {
                    data: 'Rent',
                    name: 'Rent'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'roomtypeid',
                    name: 'roomtypeid',
                    visible: false
                },


            ]
        });

        //Searchbar
        $('#SearchBar').keyup(function() {
            MasterTable.search($(this).val()).draw();
        });


        //reset form function
        $('#filter_reset').click(function() {
            MasterTable.search('').draw();
            MasterTable.column(8).search('').draw();
            $('#SearchBar').val('');
            $('#view_room_type_id').val('').change();
        });



        $('#view_room_type_id').change(function() {
            var VoucherFilter = $(this).val();
            // //console.log(VoucherFilter);
            MasterTable.column(9).search(VoucherFilter).draw();
        });




        //On Change RoomRent details 

        $(document).on('change', '.acnonac',  (function() {
            var ShowRent = $(this).val();
            var RoomTypeId = $('#room_type').val();
            var RoomId = $('#Room_id').val();
            var acnonac = $("input[name=acnonac]:checked").val();
            var Fromdate = $('#from_date').val();
            var Todate = $('#To_date').val();
            var ResultID = 'Rent';
            //console.log(ShowRent);
            showRent(RoomTypeId,RoomId,acnonac,Fromdate,Todate,ResultID);


        }));

        //OnChange update RoomRent 
        $(document).on('change', '.update_acnonac',  (function() {

            var ShowRent = $(this).val();
            var RoomTypeId = $('#update_room_type').val();
            var RoomId = $('#update_Room_id').val();
            var acnonac = $("input[name=update_acnonac]:checked").val();
            var Fromdate = $('#update_from_date').val();
            var Todate = $('#update_To_date').val();
            var ResultID = 'Update_Rent';
            //console.log(ShowRent);
            showRent(RoomTypeId,RoomId,acnonac,Fromdate,Todate,ResultID);
            
        }));

        //Function  show Rent details 

        function showRent(RoomTypeId,RoomId,acnonac,Fromdate,Todate,ResultID) {
            
            console.log(RoomTypeId);
            console.log(RoomId);
            console.log(acnonac);
            console.log(Fromdate);
            console.log(Todate);
            

            var settings = {
                "url": "/api/calculation",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Accept": "application/json",
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "fromdate": Fromdate,
                    "Todate": Todate,
                    "Room_id": RoomId,
                    "acnonac": acnonac,
                   
                }
            };

            $.ajax(settings).done(function(response) {
                // console.log(response);
                // console.log(response.RoomRent);
                $('#' + ResultID).val(response.RoomRent);
            });
        }


        //Onchange Room Type To Room Number Function
        
        $(document).on('click','.RoomTypeid',(function(){
            $(document).on('change','.RoomTypeid',(function(){
                var RoomId = $(this).val();
                loadOP(RoomId);
            }));
        }));
        

        //Oncange RoomNum
        function loadOP(RoomType) {
            if (RoomType) {
                $.ajax({
                    url: '/api/RoomNumByType/' + RoomType,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('.RoomNumId').empty();
                        $('.RoomNumId').append('<option value="">Choose Room Number</option>');
                        $.each(data, function(key, value) {
                            $('.RoomNumId').append('<option class="inputlabel" value="' + value.id + '">' + value.room_no + '</option>');
                        });
                    }
                });
            } else {
                $('.RoomNumId').empty();
                $('.RoomNumId').append('<option value="">Choose Room Number</option>');
            }
        }



        //Add Room   
        $("#add_room").validate({
            submitHandler: function(form) {
                var OpId = $('#op_id').val();
                var UserId = $('#reference_id').val();
                var Fromdate = $('#from_date').val();
                var RoomTypeId = $('#room_type').val();
                var RoomId = $('#Room_id').val();
                var Todate = $('#To_date').val();
                var Rent=$('#Rent').val();
                var Remarks = $('#remarks').val();
                var acnonac = $("input[name=acnonac]:checked").val();

                $.ajax({
                    url: "/api/roombook",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "fromdate": Fromdate,
                        "op_id": OpId,
                        "user_id": UserId,
                        "Todate": Todate,
                        "RoomType_id": RoomTypeId,
                        "Room_id": RoomId,
                        "remarks": Remarks,
                        "acnonac": acnonac,
                        "remarks": Remarks,
                        "Rent" :Rent
                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#RoomModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function(response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var RoomResult = JSON.stringify(response);
                    console.log(RoomResult);
                    var RoomResultObj = JSON.parse(RoomResult);
                    if (RoomResultObj.success == true) {
                        if (RoomResultObj.code == "0") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/warning.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                        } else if (RoomResultObj.code == "1") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/success.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show');
                        } else if (RoomResultObj.code == "2") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text("Record Adding Failed");
                                $('#ResponseModal').modal('show');
                        }
                    } else {
                        $('#ResponseImage').html(
                            '<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                        $('#ResponseText').text(
                            "Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                        $('#ResponseModal').modal('show');
                    }
                });
            }
        });
   
        //edit RoomBooking
        $('#MasterTable').on('click', '.btn_edit', function() {
            var EditRoom = $(this).val();
            console.log(EditRoom);
            var settings = {
                "url": "/api/roombook/" + EditRoom + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                var RoomResult = JSON.stringify(response);
                console.log(RoomResult);
                var Roomedit = JSON.parse(RoomResult);
                if (Roomedit.success == true) {
                    $('#RoomModal').modal('show');
                    $('#add_room').hide();
                    $('#update_add_room').show();
                    var RoomDataArray = Roomedit.RoomBooks;
                    for (const key in RoomDataArray) {
                        var UpdateId = RoomDataArray['id'];
                        var FromData = RoomDataArray['fromdate'];
                        var ToData = RoomDataArray['Todate'];
                        var RoomId = RoomDataArray['Room_id'];
                        var RoomTypeId = RoomDataArray['RoomType_id'];
                        var Rent= RoomDataArray['Rent'];
                        var Remarks= RoomDataArray['remarks'];
                        var OPId= RoomDataArray['op_id'];
                        var UserId=RoomDataArray['user_id'];
                        var Acnonac = RoomDataArray['acnonac'];
                        
                    }

                    if(Acnonac == 1){
                        $("#update_ac").prop("checked", true);
                    }else{
                        $("#update_nonac").prop("checked", true);
                    }
                    $("#update_id").val(UpdateId);
                    $("#update_op_id").val(OPId);
                    $("#Update_reference_id").val(UserId);
                    $("#update_from_date").val((FromData.slice(0,10)));
                    $("#update_To_date").val((ToData.slice(0,10)));
                    $("#update_room_type").val(RoomTypeId);
                    $("#update_Room_id").val(RoomId);
                    $(".Update_Rent").val(Rent);
                    $("#update_remarks").val(Remarks);


                }
            });

        });




         //Update roombook

        $("#update_add_room").validate({
            rules:{
                update_room_type:{
                    required: true,                    
                },
                update_Room_id:{
                    required: true,                    
                },
                update_op_id:{
                    required: true,                    
                }      
            },
            submitHandler: function(form) {
                var UpdateId = $('#update_id').val(); 
                var  UpFrom= $('#update_from_date').val();                              
                var  UpTo= $('#update_To_date').val();
                var  UpRoom= $('#update_Room_id').val();
                var  UpRoomType= $('#update_room_type').val();
                var  UpRent= $('.Update_Rent').val();
                var UpACnoAc = $("input[name=update_acnonac]:checked").val();
                var  UpRemarks= $('#update_remarks').val();
                var  UpOpId= $('#update_op_id').val();
                var  UpRefId= $('#Update_reference_id').val();
                $.ajax({
                    url: "/api/roombook/"+UpdateId+"",
                    method: "PUT",
                    timeout: 0,
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "fromdate": UpFrom,
                        "op_id": UpOpId,
                        "user_id": UpRefId,
                        "Todate": UpTo,
                        "RoomType_id": UpRoomType,
                        "Room_id": UpRoom,
                        "remarks": UpRemarks,
                        "acnonac": UpACnoAc,
                        "Rent" :UpRent,
                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#RoomModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function (response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var RoomUpdate = JSON.stringify(response);
                    console.log(RoomUpdate);

                    var RoomUpdateed = JSON.parse(RoomUpdate);
                            if (RoomUpdateed.success == true) {
                            if (RoomUpdateed.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("This Record is Already Present");  
                            $('#ResponseModal').modal('show');
                        } else if (RoomUpdateed.code == "1") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Record Updated Successfully");
                            $('#ResponseModal').modal('show');
                        } else if (RoomUpdateed.code == "2") {
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
            var DeleteRoom = $(this).val();
            $('#confirmYes').click(function(){
                
                console.log(DeleteRoom);
                $.ajax({
                    "url": "/api/roombook/"+DeleteRoom+"",
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
                    var ConsultDeleteResult = JSON.stringify(response);
                    console.log(ConsultDeleteResult); 
                    var ConsultDelObj = JSON.parse(ConsultDeleteResult);
                    if (ConsultDelObj.success == true) {  
                        if (ConsultDelObj.code == "0") {
                        $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                        $('#ResponseText').text(ConsultDelObj.message);
                        $('#ResponseModal').modal('show');
                        } else if (ConsultDelObj.code == "1") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(ConsultDelObj.message);
                            $('#ResponseModal').modal('show');
                        } else if (ConsultDelObj.code == "2") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(ConsultDelObj.message);
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
            



        
        //View RoomBook
        $('#MasterTable').on('click', '.btn_view', function () {
            var ViewRoom = $(this).val();
            console.log(ViewRoom);
            var settings = {
                "url": "/api/roombook/"+ViewRoom+"",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                var Result = JSON.stringify(response);
                console.log(Result);
                var Roomedit = JSON.parse(Result);
                if (Roomedit.success == true) {
                    $('#RoomViewModal').modal('show');
                    $('#view_add_room').show();
                    var RoomDataArray = Roomedit.RoomBooks;
                    for(const key in RoomDataArray){
                        var ViewId = RoomDataArray['id'];
                        var FromData = RoomDataArray['fromdate'];
                        var ToData = RoomDataArray['Todate'];
                        var RoomId = RoomDataArray['Room_id'];
                        var RoomTypeId = RoomDataArray['RoomType_id'];
                        var Rent= RoomDataArray['Rent'];
                        var Remarks= RoomDataArray['remarks'];
                        var OPId= RoomDataArray['op_id'];
                        var UserId=RoomDataArray['user_id'];
                        var Acnonac = RoomDataArray['acnonac'];
                    
                       

                    }
                    if(Acnonac == 1){
                        $("#view_ac").prop("checked", true);
                    }else{
                        $("#view_nonac").prop("checked", true);
                    }
                    $("#view_id").val(ViewId);
                    $("#view_op_id").val(OPId);
                    $("#view_reference_id").val(UserId);
                    $("#view_from_date").val((FromData.slice(0,10)));
                    $("#view_To_date").val((ToData.slice(0,10)));
                    $("#view_room_type").val(RoomTypeId);
                    $("#view_Room_id").val(RoomId);
                    $("#view_Rent").val(Rent);
                    $("#view_remarks").val(Remarks);
                  

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
            $('#RoomModal').on('shown.bs.modal', function() {
                $('#op_id').focus();
            });
        });
            
    </script>

</body>

</html>
