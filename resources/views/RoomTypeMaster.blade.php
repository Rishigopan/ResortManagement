<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Room Type</title>
      @include('layouts.headder')

      <style>
        .mainContents{
            display:none;
        }
      </style>

  </head>
  <body>
       <div class="modal fade addUpdateModal" id="Room_TypeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Room Type</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="RoomType AddForm" id="room_type" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="room_name" name="RoomName" placeholder="Enter Room Type Name" autofocus required>
                                </div>                                                                                    
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 "> Save</button>
                            </div>
                        </form> 
                        <form class="UpdateRoomType UpdateForm" id="update_room_type" style="display: none;" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                            <input type="hidden" class="form-control mt-1 inputfield" id="update_id" name="UpdateId" autofocus required>
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_room_name" name="UpdateRoomName" autofocus required>
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
        <div class="modal fade addUpdateModal" id="RoomTypeViewModal" tabindex="-1" data-bs-backdrop="static"               data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Room Type</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" id="view_room_type" style="display: none;" novalidate>
                            <div class="row">
                            <input type="hidden" class="form-control mt-1 inputfield" id="view_id" name="ViewId" autofocus required>
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                    <input disabled class="form-control mt-1 inputfield" id="view_room_name" name="ViewRoomName" autofocus required>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Room Type </h4>                                                  
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
                                <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#Room_TypeModal">+ Add</button> 
                            </div>
                        </div>
                        <div>
                            <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                    <thead class="tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">Name</th>                                                                               
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
                            columns: [ 0, 1]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1]
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
                ajax: "{{ route('RoomType.viewRoomType') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });



            //Searchbar
            $('#SearchBar').keyup(function() {
                MasterTable.search($(this).val()).draw();
            });



            //Add Room Type  
            $("#room_type").validate({
                rules:{
                    RoomName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    }     
                },
                messages: {
                    RoomName:{
                        required: "Please Enter Room Type Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var RoomName = $('#room_name').val();
                    $.ajax({
                        url: "/api/room-type",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: RoomName
                        },beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);           
                        var RoomTypeResult = JSON.stringify(response);
                        console.log(RoomTypeResult);
                        var RoomTypeResultObj = JSON.parse(RoomTypeResult);
                        if (RoomTypeResultObj.success == true) {
                            if (RoomTypeResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (RoomTypeResultObj.code == "1") {
                                $('#room_type')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#room_name').focus();
                                });
                            } else if (RoomTypeResultObj.code == "2") {
                                $('#Room_TypeModal').modal('hide');
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


            //edit Room Type
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditRoomType = $(this).val();
                console.log(EditRoomType);
                var settings = {
                    "url": "/api/room-type/"+EditRoomType+"",
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var RoomTypeResult = JSON.stringify(response);
                    console.log(RoomTypeResult);
                    var RoomTypeedit = JSON.parse(RoomTypeResult);
                    if (RoomTypeedit.success == true) {
                        $('#Room_TypeModal').modal('show');
                        $('#room_type').hide();
                        $('#update_room_type').show();
                        var RoomDataArray = RoomTypeedit.roomType;
                        for(const key in RoomDataArray){
                            var RoomName = RoomDataArray['name'];
                            var RoomTypeId = RoomDataArray['id'];
                        }
                        $("#update_room_name").val(RoomName);
                        $("#update_id").val(RoomTypeId);
                    }
                });
            });



            //Update Room Type

            $("#update_room_type").validate({
                rules:{
                    UpdateRoomName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    }     
                },
                messages: {
                    UpdateRoomName:{
                        required: "Please Enter Room Type Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_id').val();                
                    var UpdateRoomName = $('#update_room_name').val();
                    $.ajax({
                        url: "/api/room-type/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateRoomName
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('#Room_TypeModal').modal('hide');
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
                        var RoomTypeUpdate = JSON.stringify(response);
                        console.log(RoomTypeUpdate);
                        var RoomTypeUpdateed = JSON.parse(RoomTypeUpdate);
                        if (RoomTypeUpdateed.success == true) {
                            if (RoomTypeUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (RoomTypeUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (RoomTypeUpdateed.code == "2") {
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




            //Delete Room Type
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteRoomType = $(this).val();
                $('#confirmYes').click(function(){
                   
                    console.log(DeleteRoomType);
                    $.ajax({
                        url: "/api/room-type/"+DeleteRoomType+"",
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
                        var RoomTypeResult = JSON.stringify(response);
                        console.log(RoomTypeResult); 
                        var RoomTypeDelObj = JSON.parse(RoomTypeResult);
                        if (RoomTypeDelObj.success == true) {  
                            if (RoomTypeDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(RoomTypeDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (RoomTypeDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(RoomTypeDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (RoomTypeDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(RoomTypeDelObj.message);
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
            
            //View Room Type
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewRoomType = $(this).val();
                console.log(ViewRoomType);
                var settings = {
                    "url": "/api/room-type/"+ViewRoomType+"",
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var RoomTypeResult = JSON.stringify(response);
                    console.log(RoomTypeResult);
                    var RoomTypeView = JSON.parse(RoomTypeResult);
                    if (RoomTypeView.success == true) {
                        $('#RoomTypeViewModal').modal('show');
                       
                        $('#view_room_type').show();
                        var RoomDataArray = RoomTypeView.roomType;
                        for(const key in RoomDataArray){
                            var RoomName = RoomDataArray['name'];
                            var RoomTypeId = RoomDataArray['id'];
                        }
                        $("#view_room_name").val(RoomName);
                        $("#view_id").val(RoomTypeId);
                    }
                });
            });
           
            //Focus First Field
            $(document).ready(function() {
                $('#Room_TypeModal').on('shown.bs.modal', function() {
                    $('#room_name').focus();
                });
            });
            
        </script>
    </body>
</html>