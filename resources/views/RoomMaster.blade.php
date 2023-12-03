<!DOCTYPE html>
<html lang="en">

  <head>
        <title>Room </title>
        @include('layouts.headder')
        <style>
            .mainContents{
                display:none;
            }
        </style>

  </head>

  <body>
     <div class="modal fade addUpdateModal" id="RoomModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room No<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="room_no" name="RoomNo" placeholder="Enter Room Number" autofocus required>
                            </div>   
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Room Type<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="room_type" name="RoomType">
                                <option class="inputlabel" hidden value=""> Choose Room Type</option>
                                @foreach ($room as $key )   
                                <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach 

                                </select>
                            </div>  
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Floor</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="floor" name="Floor">
                                <option class="inputlabel" hidden value=""> Choose Floor</option>
                                <option class="inputlabel" value="0"> Ground Floor</option>
                                <option class="inputlabel" value="1"> First Floor</option>
                                <option class="inputlabel" value="2"> Second Floor</option>
                                <option class="inputlabel" value="3"> Third Floor</option>
                                <option class="inputlabel" value="4"> Fourth Floor</option>                                                                          
                                </select>
                            </div>                                 
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Rent AC</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="room_rent_aC" name="RoomRentAc" placeholder="Enter Room Rent" autofocus >
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Rent Non AC</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="room_non_ac" name="RoomNonAc" placeholder="Enter Room Rent" autofocus >
                            </div>                                                                                 
                        </div>
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 ">Save</button>
                        </div>
                    </form>
                    <form class="UpdateRoom UpdateForm" id="update_add_room" style="display: none;" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control mt-1 inputfield" id="update_id" name="UpdateId" autofocus required>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room No<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_room_no" name="UpdateRoomNo" autofocus required>
                            </div>   
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Room Type<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="update_room_type" name="UpdateRoomType">
                                    @foreach ($room as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach   
                                </select>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Floor</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="update_floor" name="UpdateFloor">
                                <option class="inputlabel" value="0"> Ground Floor</option>
                                <option class="inputlabel" value="1"> First Floor</option>
                                <option class="inputlabel" value="2"> Second Floor</option>
                                <option class="inputlabel" value="3"> Third Floor</option>
                                <option class="inputlabel" value="4"> Fourth Floor</option>                                                                       
                                </select>
                            </div>                                    
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Rent AC</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_room_rent_aC" name="UpdateRoomRentAc" autofocus>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Rent Non AC</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_room_non_ac" name="UpdateRoomNonAc" autofocus>
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
    <div class="modal fade addUpdateModal" id="RoomViewModal" tabindex="-1" data-bs-backdrop="static"               data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Room Details</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" id="view_add_room" style="display: none;" novalidate>
                        <input type="hidden" disabled class="form-control mt-1 inputfield" id="view_id" name="viewId" autofocus required>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room No</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_room_no" name="viewRoomNo" autofocus required>
                            </div>   
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Floor</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="view_floor" name="viewFloor" disabled>
                                <option class="inputlabel" value="0"> Ground Floor</option>
                                <option class="inputlabel" value="1"> First Floor</option>
                                <option class="inputlabel" value="2"> Second Floor</option>
                                <option class="inputlabel" value="3"> Third Floor</option>
                                <option class="inputlabel" value="4"> Fourth Floor</option>                                                                       
                                </select>
                            </div>       
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Room Type</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="view_room_type" name="viewRoomType" disabled>
                                    @foreach ($room as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach   
                                </select>
                            </div>  
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Rent AC</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_room_rent_aC" name="viewRoomRentAc" autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Room Rent Non AC</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_room_non_ac" name="viewRoomNonAc" autofocus required>
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
            <h4 class="d-flex justify-content-center py-1 contitle">Room</h4>                                           
        </div>
        
        <div class="wrapper">
            <!--CONTENTS-->
            <div class="container-fluid mainContents">
                <div class="card card-body main_card mt-2 p-3 mb-2">                   
                    <div class="main_heading d-flex justify-content-between mb-2  p-2 ">
                        <div class="container-fluid">
                            <div class="row">
                                <div id="exportbtns"class="exportbtns col-3">
                                    <!-- export buttons -->
                                </div>
                                <div class="col-3">
                                    <select class="form-select"  aria-label="Default select example name" id="view_room_type_id" name="viewRoomType">
                                        <option hidden class="inputlabel" value="">Room Types</option>
                                        @foreach ($room as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
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
                                    <th class="text-center">Room</th> 
                                    <th class="text-center">Room Type</th> 
                                    <th class="text-center">Floor No</th> 
                                    <th class="text-center">Rent ( AC )</th> 
                                    <th class="text-center">Rent ( Non-AC )</th>           
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
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5]
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
                
                ajax: "{{ route('Room.room') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'room_no', name: 'room_no'}, 
                    {data: 'name', name: 'name'},
                    {data: 'floor_id', name: 'floor_id'},
                    {data: 'rent_ac', name: 'rent_ac'},
                    {data: 'rent_non_ac', name: 'rent_non_ac'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'roomtypeid', name: 'roomtypeid', visible: false},                  

                ]
            });
            //reset form function
            $('#filter_reset').click(function() {
                MasterTable.search('').draw();
                MasterTable.column(7).search('').draw();
                $('#SearchBar').val('');
                $('#view_room_type_id').val('').change();
            });



            $('#view_room_type_id').change(function() {
                var VoucherFilter = $(this).val();
                // //console.log(VoucherFilter);
                MasterTable.column(7).search(VoucherFilter).draw();
            });



            //Add Room   
            $("#add_room").validate({
                rules:{
                    RoomNo:{
                        required: true,
                                            
                    } ,
                    RoomType:{
                        required: true,
                                            
                    }     
                },
                messages: {
                    RoomNo:{
                        required: "Please Enter Room Number",
                    },
                    RoomType:{
                        required: "Please Enter Room Type",
                    }
                },
                submitHandler: function(form) {    
                    var RoomNumber = $('#room_no').val();
                    var FloorId = $('#floor').val();
                    var RoomId= $('#room_type').val();
                    var RentAc = $('#room_rent_aC').val();
                    var RentNonAc = $('#room_non_ac').val();
                    $.ajax({
                        url: "/api/room",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            room_no: RoomNumber,
                            room_type_id: RoomId,
                            floor_id: FloorId,
                            rent_ac: RentAc,
                            rent_non_ac: RentNonAc
                        },beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);  
                        var RoomResult = JSON.stringify(response);
                        console.log(RoomResult);
                        var RoomResultObj = JSON.parse(RoomResult);
                        if (RoomResultObj.success == true) {
                            if (RoomResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (RoomResultObj.code == "1") {
                                $('#add_room')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#room_no').focus();
                                });
                            } else if (RoomResultObj.code == "2") {
                                $('#RoomModal').modal('hide');
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

            //edit Room 
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditRoom = $(this).val();
                console.log(EditRoom);
                var settings = {
                    "url": "/api/room/"+EditRoom+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var RoomResult = JSON.stringify(response);
                    console.log(RoomResult);
                    var Roomedit = JSON.parse(RoomResult);
                    if (Roomedit.success == true) {
                        $('#RoomModal').modal('show');
                        $('#add_room').hide();
                        $('#update_add_room').show();
                        var RoomDataArray = Roomedit.rooms;
                        for(const key in RoomDataArray){
                            var RoomId = RoomDataArray['id'];
                            var RoomNo = RoomDataArray['room_no'];
                            var RoomFloor = RoomDataArray['floor_id'];
                            var RoomType = RoomDataArray['room_type_id'];
                            var RoomRentAc = RoomDataArray['rent_ac'];
                            var RoomRentNonAc = RoomDataArray['rent_non_ac'];
                        }
                        $("#update_id").val(RoomId);
                        $("#update_room_no").val(RoomNo);
                        $("#update_floor").val(RoomFloor);
                        $("#update_room_type").val(RoomType);
                        $("#update_room_rent_aC").val(RoomRentAc);
                        $("#update_room_non_ac").val(RoomRentNonAc);

                    }
                });
               
            });



            //Update Room 
            $("#update_add_room").validate({
                rules:{
                    UpdateRoomNo:{
                        required: true,
                                            
                    } ,
                    UpdateRoomType:{
                        required: true,
                                            
                    }     
                },
                messages: {
                    UpdateRoomNo:{
                        required: "Please Enter Room Number",
                    },
                    UpdateRoomType:{
                        required: "Please Enter Room Type",
                    }
                },
                submitHandler: function(form) {   
                    var UpdateId = $('#update_id').val();                
                    var UpdateRoomNo = $('#update_room_no').val();
                    var UpdateRoomTypId = $('#update_room_type').val();
                    var UpdateFloorId = $('#update_floor').val();
                    var UpdateRentAc = $('#update_room_rent_aC').val();
                    var UpdateRentNonAc = $('#update_room_non_ac').val();
                    $.ajax({
                        url: "/api/room/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            room_no: UpdateRoomNo,
                            room_type_id: UpdateRoomTypId,
                            floor_id: UpdateFloorId,
                            rent_ac: UpdateRentAc,
                            rent_non_ac: UpdateRentNonAc
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#RoomModal').modal('hide');
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

            //Delete Room 
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteRoom = $(this).val();
                $('#confirmYes').click(function(){
                   
                    console.log(DeleteRoom);
                    $.ajax({
                        url: "/api/room/"+DeleteRoom+"",
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
                        var RoomResult = JSON.stringify(response);
                        console.log(RoomResult); 
                        var RoomDelObj = JSON.parse(RoomResult);
                        if (RoomDelObj.success == true) {  
                            if (RoomDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(RoomDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (RoomDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(RoomDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (RoomDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(RoomDelObj.message);
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
            //edit View 
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewRoom = $(this).val();
                console.log(ViewRoom);
                var settings = {
                    "url": "/api/room/"+ViewRoom+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var RoomResult = JSON.stringify(response);
                    console.log(RoomResult);
                    var RoomView = JSON.parse(RoomResult);
                    if (RoomView.success == true) {
                        $('#RoomViewModal').modal('show');
                        $('#view_add_room').show();
                        var RoomDataArray = RoomView.rooms;
                        for(const key in RoomDataArray){
                            var RoomId = RoomDataArray['id'];
                            var RoomNo = RoomDataArray['room_no'];
                            var RoomFloor = RoomDataArray['floor_id'];
                            var RoomType = RoomDataArray['room_type_id'];
                            var RoomRentAc = RoomDataArray['rent_ac'];
                            var RoomRentNonAc = RoomDataArray['rent_non_ac'];
                        }
                        $("#view_id").val(RoomId);
                        $("#view_room_no").val(RoomNo);
                        $("#view_floor").val(RoomFloor);
                        $("#view_room_type").val(RoomType);
                        $("#view_room_rent_aC").val(RoomRentAc);
                        $("#view_room_non_ac").val(RoomRentNonAc);

                    }
                });
               
            });

            //Focus First Field
            $(document).ready(function() {
                $('#RoomModal').on('shown.bs.modal', function() {
                    $('#room_no').focus();
                });
            });
            
        </script>

  </body>

</html>