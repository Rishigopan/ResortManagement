<!DOCTYPE html>
<html lang="en">

<head>
    <title>Treatment</title>
    @include('layouts.headder')
    <style>
        .mainContents {
            display: none;
        }
    </style>
</head>

  <body>
  <div class="modal fade addUpdateModal" id="TreatmentModal" tabindex="-1" data-bs-backdrop="static"               data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Treatment</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="Treatment AddForm" id="treatment" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="treatment_name" name="TreatmentName" placeholder="Enter Treatment Name" autofocus required>
                                </div>                            
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="cost" name="Cost" autofocus >
                                </div>                                            
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 "> Save</button>
                            </div>
                        </form>   
                        <form class="UpdateTreatment UpdateForm" id="update_treatment" style="display: none;" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <input type="hidden" id="update_treatment_id" >
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_treatment_name"
                                    name="TreatmentName" placeholder="Enter Treatment Name" autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                <input type="number" class="form-control mt-1 inputfield" id="update_cost" name="Cost" autofocus>
                            </div>
                        </div>
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 "> Update</button>
                        </div>
                    </form>
                    <!-- <form class="UpdateTreatment UpdateForm" id="update_treatment" style="display: none;" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input type="hidden" id="update_treatment_id">
                                <input type="text" class="form-control mt-1 inputfield" id="update_treatment_name"
                                    name="UpdateTreatmentName" autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                <input type="number" class="form-control mt-1 inputfield" id="update_cost"
                                    name="UpdateCost" autofocus required>
                            </div>
                        </div>
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 "> Update</button>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade addUpdateModal" id="TreatmentViewModal" tabindex="-1"
        data-bs-backdrop="static"data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Treatment</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" id="view_treatment" style="display: none;" novalidate>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input type="hidden" id="view_treatment_id">
                                <input disabled class="form-control mt-1 inputfield" id="view_treatment_name"
                                    name="ViewTreatmentName" autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel"> Cost</label><br>
                                <input disabled class="form-control mt-1 inputfield" id="view_cost" name="ViewCost"
                                    autofocus required>
                            </div>
                        </div>
                        <div class=" text-end mt-3">
                            <button type="button" class="btn savebtn  px-5 "data-bs-dismiss="modal"
                                aria-label="Close">Close</button>
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
            <h4 class="d-flex justify-content-center py-1 contitle">Treatment </h4>
        </div>

        <div class="wrapper">
            <!--CONTENTS-->
            <div class="container-fluid mainContents">
                <div class="card card-body main_card mt-2 p-3 mb-2">
                    <div class="main_heading d-flex justify-content-between mb-2  p-2 ">
                        <div id="exportbtns"class="exportbtns col-3">
                            <!-- export buttons -->
                        </div>
                        <div class="">
                            <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#TreatmentModal">+
                                Add</button>
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
            buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
            ],

            initComplete: function() {
                $("#MasterTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                var api = this.api();
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        if (colIdx < api.columns().nodes().length - 1) {
                            $(cell).html(
                                '<input type="text" class="text-center searchcolumn" placeholder="Search" />'
                                );
                        } else {
                            $(cell).empty();
                        }
                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                // var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                // .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
                $('.dt-buttons').appendTo('#exportbtns');
            },

            ajax: "{{ route('Treatment.treatment') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'cost',
                    name: 'cost'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        //Add Treatment 

        $("#treatment").validate({
            rules: {
                TreatmentName: {
                    required: true,
                    minlength: 2,
                    maxlength: 25,
                },
                Cost: {
                    number: true
                }
            },
            messages: {
                TreatmentName: {
                    required: "Please Enter Treatment Name",
                    minlength: "atleast 2 characters",
                    maxlength: "maximum 25 characters",
                }
            },
            submitHandler: function(form) {
                var TreatmentName = $('#treatment_name').val();
                var TreatmentCost = $('#cost').val();

                $.ajax({
                    url: "/api/treatment",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        name: TreatmentName,
                        cost: TreatmentCost
                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('.mainContents').hide();
                    },
                }).done(function(response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var TreatmentResult = JSON.stringify(response);
                    console.log(TreatmentResult);
                    var TreatmentResultObj = JSON.parse(TreatmentResult);
                    if (TreatmentResultObj.success == true) {
                        if (TreatmentResultObj.code == "0") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/warning.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                        } else if (TreatmentResultObj.code == "1") {
                            $('#treatment')[0].reset();
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/success.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#treatment_name').focus();
                                });
                        } else if (TreatmentResultObj.code == "2") {
                            $('#TreatmentModal').modal('hide');
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text("Record Adding Failed");
                                $('#ResponseModal').modal('show');                        }
                    } else {
                        $('#ResponseImage').html(
                            '<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                        $('#ResponseText').text(
                            "Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                    }
                    $('#ResponseModal').modal('show');
                });

            }
        });




        //edit Treatment
        $('#MasterTable').on('click', '.btn_edit', function() {
            var EditTreatment = $(this).val();
            console.log(EditTreatment);
            var settings = {
                "url": "/api/treatment/" + EditTreatment + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                var TreatmentResult = JSON.stringify(response);
                console.log(TreatmentResult);
                var Treatmentedit = JSON.parse(TreatmentResult);
                if (Treatmentedit.success == true) {
                    $('#TreatmentModal').modal('show');
                    $('#treatment').hide();
                    $('#update_treatment').show();
                    var TreatmentArray = Treatmentedit.treatment;
                    for (const key in TreatmentArray) {
                        var TreatmentName = TreatmentArray['name'];
                        var TreatmentCost = TreatmentArray['cost'];
                        var TreatmentId = TreatmentArray['id'];

                    }
                    $("#update_treatment_id").val(TreatmentId);
                    $("#update_treatment_name").val(TreatmentName);
                    $("#update_cost").val(TreatmentCost);
                }
            });

        });



        //Update Treatment
        $("#update_treatment").validate({
            rules: {
                UpdateTreatmentName: {
                    required: true,
                    minlength: 2,
                    maxlength: 25,
                },
                UpdateCost: {
                    number: true
                }
            },
            messages: {
                UpdateTreatmentName: {
                    required: "Please Enter Treatment Name",
                    minlength: "atleast 2 characters",
                    maxlength: "maximum 25 characters",
                }
            },
            submitHandler: function(form) {
                var UpdateId = $('#update_treatment_id').val();
                var UpdateTreatmentName = $('#update_treatment_name').val();
                var UpdateTreatmentRemark = $('#update_cost').val();
                $.ajax({
                    url: "/api/treatment/" + UpdateId + "",
                    method: "PUT",
                    timeout: 0,
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        name: UpdateTreatmentName,
                        cost: UpdateTreatmentRemark
                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#TreatmentModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function(response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var TreatmentUpdate = JSON.stringify(response);
                    console.log(TreatmentUpdate);
                    var TreatmentUpdateed = JSON.parse(TreatmentUpdate);
                    if (TreatmentUpdateed.success == true) {
                        if (TreatmentUpdateed.code == "0") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/warning.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                        } else if (TreatmentUpdateed.code == "1") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/success.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                            $('#ResponseText').text("Successfully Updated Treatment");
                            $('#ResponseModal').modal('show');
                        } else if (TreatmentUpdateed.code == "2") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text("Record Updating Failed");
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

        //Delete Treatment
        $('#MasterTable').on('click', '.btn_delete', function() {
            $('.delModal').modal('show');
            var DeleteTreatment = $(this).val();
            $('#confirmYes').click(function() {

                console.log(DeleteTreatment);
                $.ajax({
                    url: "/api/treatment/" + DeleteTreatment + "",
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
                }).done(function(response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var TreatmentDeleteResult = JSON.stringify(response);
                    console.log(TreatmentDeleteResult);
                    var TreatmentDelObj = JSON.parse(TreatmentDeleteResult);
                    if (TreatmentDelObj.success == true) {
                        if (TreatmentDelObj.code == "0") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/warning.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                            $('#ResponseText').text(TreatmentDelObj.message);
                            $('#ResponseModal').modal('show');
                        } else if (TreatmentDelObj.code == "1") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/success.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                            $('#ResponseText').text(TreatmentDelObj.message);
                            $('#ResponseModal').modal('show');
                        } else if (TreatmentDelObj.code == "2") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                                );
                            $('#ResponseText').text(TreatmentDelObj.message);
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
            })
        });

        //View Treatment
        $('#MasterTable').on('click', '.btn_view', function() {
            var ViewTreatment = $(this).val();
            console.log(ViewTreatment);
            var settings = {
                "url": "/api/treatment/" + ViewTreatment + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                var TreatmentResult = JSON.stringify(response);
                console.log(TreatmentResult);
                var TreatmentView = JSON.parse(TreatmentResult);
                if (TreatmentView.success == true) {
                    $('#TreatmentViewModal').modal('show');
                    $('#view_treatment').show();
                    var TreatmentArray = TreatmentView.treatment;
                    for (const key in TreatmentArray) {
                        var TreatmentName = TreatmentArray['name'];
                        var TreatmentCost = TreatmentArray['cost'];
                        var TreatmentId = TreatmentArray['id'];

                    }
                    $("#view_treatment_id").val(TreatmentId);
                    $("#view_treatment_name").val(TreatmentName);
                    $("#view_cost").val(TreatmentCost);
                }
            });

        });

        //Focus First Field
        $(document).ready(function() {
            $('#TreatmentModal').on('shown.bs.modal', function() {
                $('#treatment_name').focus();
            });
        });
            
    </script>
</body>

</html>
