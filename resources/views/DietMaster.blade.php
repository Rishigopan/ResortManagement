<!DOCTYPE html>
<html lang="en">

    <head>

      @include('layouts.headder')
      <title>Diet</title>
        <style>
            .mainContents{
                display:none;
            }
        </style>
    </head>

    <body>
        <div class="modal fade addUpdateModal" id="DietModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead  py-2">
                        <h6 class="modal-title " id="exampleModalLabel">Diet</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Diet AddForm" id="diet" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="diet_name" name="DietName" placeholder="Enter Diet Name" autofocus required>
                                </div>                            
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                    <input type="number" min="0" class="form-control mt-1 inputfield" id="diet_cost" name="DietCost"  autofocus >
                                </div>                                            
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Save</button>
                            </div>
                        </form>  
                        <form class="UpdateDiet UpdateForm" id="update_diet" style="display: none;" novalidate>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <input type="hidden"  id="update_diet_id" >
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_diet_name" name="UpdateDietName" autofocus required>
                                </div>                            
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                    <input type="number" min="0" class="form-control mt-1 inputfield" id="update_diet_cost" name="UpdateDietCost" autofocus >
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
        <div class="modal fade addUpdateModal" id="DepartmentViewModal" tabindex="-1" data-bs-backdrop="static"   data-bs-keyboard="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content cntrymodalbg">
                        <div class="modal-header modelhead py-2">
                            <h6 class="modal-title" id="exampleModalLabel">Diet</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="" id="view_diet" style="display: none;" novalidate>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-12">
                                        <input type="hidden"  id="view_diet_id" >
                                        <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                        <input disabled class="form-control mt-1 inputfield" id="view_diet_name" name="ViewDietName" autofocus required>
                                    </div>                            
                                    <div class="col-xl-12 col-lg-12 col-12">
                                        <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                        <input disabled class="form-control mt-1 inputfield" id="view_diet_cost" name="ViewDietCost" autofocus required>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Diet </h4>             
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
                                <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#DietModal">+ Add</button> 
                            </div>
                        </div>
                        <div>
                            <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">Name</th>                                    
                                        <th class="text-center">Cost</th>                        
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
                
                ajax: "{{ route('Diet.diet') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'}, 
                    {data: 'cost', name: 'cost'},                  
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            //Add Diet  
            $("#diet").validate({
                rules:{
                    DietName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,  
                    },
                    DietCost:{
                        number:true                  
                    }  
                },
                messages: {
                    DietName:{
                        required: "Please Enter Diet Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var DietName = $('#diet_name').val();
                    var DietCost = $('#diet_cost').val();
                    $.ajax({
                        url: "/api/diet",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: DietName,
                            cost: DietCost
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
                        var DietResult = JSON.stringify(response);
                        console.log(DietResult);
                        var DietResultObj = JSON.parse(DietResult);
                        if (DietResultObj.success == true) {
                            if (DietResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (DietResultObj.code == "1") {
                                $('#diet')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#diet_name').focus();
                                });
                            } else if (DietResultObj.code == "2") {
                                $('#DietModal').modal('hide');
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
         
            //edit Diet
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditDiet = $(this).val();
                console.log(EditDiet);
                var settings = {
                    "url": "/api/diet/"+EditDiet+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var DietResult = JSON.stringify(response);
                    console.log(DietResult);
                    var Dietedit = JSON.parse(DietResult);
                    if (Dietedit.success == true) {
                        $('#DietModal').modal('show');
                        $('#diet').hide();
                        $('#update_diet').show();
                        var DietDataArray = Dietedit.diet;
                        for(const key in DietDataArray){
                            var DietId = DietDataArray['id'];
                            var DietName = DietDataArray['name'];
                            var DietCost = DietDataArray['cost'];                           
                        }
                        $("#update_diet_id").val(DietId);
                        $("#update_diet_name").val(DietName);
                        $("#update_diet_cost").val(DietCost);
                    }
                });
                              
            });



            //Update Diet

            $("#update_diet").validate({
                rules:{
                    UpdateDietName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                    
                    },
                    UpdateDietCost:{
                        number:true                  
                    }   
                },
                messages: {
                    UpdateDietName:{
                        required: "Please Enter Diet Name",
                        minlength:"atleast 2 characters",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_diet_id').val();                
                    var UpdateDietName = $('#update_diet_name').val();
                    var UpdateDietCost = $('#update_diet_cost').val();
                    $.ajax({
                        url: "/api/diet/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateDietName,
                            cost: UpdateDietCost
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            //$('#updatebranch_form').addClass("disable");
                            $('#DietModal').modal('hide');
                            $('.mainContents').hide();
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        if (response.success == true) {
                            if (response.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (response.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (response.code == "2") {
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
               
             //Delete Diet
             $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteDietType = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteDietType);
                    $.ajax({
                        url: "/api/diet/"+DeleteDietType+"",
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
                        var DietDeleteResult = JSON.stringify(response);
                        console.log(DietDeleteResult); 
                        var DietDelObj = JSON.parse(DietDeleteResult);
                        if (DietDelObj.success == true) {  
                            if (DietDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(DietDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (DietDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DietDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (DietDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(DietDelObj.message);
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

             //View Diet

             $('#MasterTable').on('click', '.btn_view', function () {
                var ViewDiet = $(this).val();
                console.log(ViewDiet);
                var settings = {
                    "url": "/api/diet/"+ViewDiet+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var DietResult = JSON.stringify(response);
                    console.log(DietResult);
                    var Dietedit = JSON.parse(DietResult);
                    if (Dietedit.success == true) {
                        $('#DepartmentViewModal').modal('show');
                       
                        $('#view_diet').show();
                        var DietDataArray = Dietedit.diet;
                        for(const key in DietDataArray){
                            var DietId = DietDataArray['id'];
                            var DietName = DietDataArray['name'];
                            var DietCost = DietDataArray['cost'];                           
                        }
                        $("#view_diet_id").val(DietId);
                        $("#view_diet_name").val(DietName);
                        $("#view_diet_cost").val(DietCost);
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
                $('#DietModal').on('shown.bs.modal', function() {
                    $('#diet_name').focus();
                });
            });
            
            
        </script>
    </body>

</html>