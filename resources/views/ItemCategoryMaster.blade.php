<!DOCTYPE html>
<html lang="en">

<head>
    <title>Item Category</title>
    @include('layouts.headder')
    <style>
        .mainContents {
            display: none;
        }
    </style>
</head>

<body>

    <div class="modal fade addUpdateModal" id="ItemCategoryModal" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Item Category</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="ItemCategory AddForm" id="item_category" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="item_name"
                                    name="ItemName" placeholder="Enter Item Category Name" autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield" id="item_remarks" name="ItemRemarks"
                                    placeholder="Enter Remarks"></textarea>
                            </div>
                        </div>
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 "> Save</button>
                        </div>
                    </form>
                    <form class="UpdateItemCategory UpdateForm" id="update_item_category" style="display: none;"
                        novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <input type="hidden" class="form-control mt-1 inputfield" id="update_itemcat_id"
                                    name="UpdateItemCategory" autofocus required>
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_item_name"
                                    name="UpdateItemName"autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield" id="update_item_remarks"
                                    name="UpdateItemRemarks"></textarea>
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

    <div class="modal fade addUpdateModal" id="ItemcatViewModal" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Item Category</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" id="view_item_category" style="display: none;" novalidate>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">

                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input disabled class="form-control mt-1 inputfield" id="view_item_name"
                                    name="ViewItemName"autofocus required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label class="mt-3 mb-1 inputlabel">Remarks </label><br>
                                <textarea disabled cols="30" rows="2" class="form-control mt-1 inputfield" id="view_item_remarks"
                                    name="ViewItemRemarks"></textarea>
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
            <h4 class="d-flex justify-content-center py-1 contitle">Item Category </h4>
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
                            <button class="btn AddBtn px-4" data-bs-toggle="modal"
                                data-bs-target="#ItemCategoryModal">+ Add</button>
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

            ajax: "{{ route('ItemCategory.itemcat') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'remarks',
                    name: 'remarks'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        //Add Item Category  
        $("#item_category").validate({
            rules: {
                ItemName: {
                    required: true,
                    minlength: 2,
                    maxlength: 25,
                }
            },
            messages: {
                ItemName: {
                    required: "Please Enter Item Category Name",
                    minlength: "atleast 2 characters",
                    maxlength: "maximum 25 characters",
                }
            },
            submitHandler: function(form) {
                var ItemcatName = $('#item_name').val();
                var ItemcatRemark = $('#item_remarks').val();
                $.ajax({
                    url: "/api/item-category",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        name: ItemcatName,
                        remarks: ItemcatRemark
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
                    var ItemcatResult = JSON.stringify(response);
                    console.log(ItemcatResult);
                    var ItemcatResultObj = JSON.parse(ItemcatResult);
                    if (ItemcatResultObj.success == true) {
                        if (ItemcatResultObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{ url('assets/images/warning.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("This Record is Already Present");  
                            $('#ResponseModal').modal('show');
                        } else if (ItemcatResultObj.code == "1") {
                            $('#item_category')[0].reset();
                            $('#ResponseImage').html('<img src="{{ url('assets/images/success.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Record Added Successfully");
                            $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#item_name').focus();
                                });                        
                        } else if (ItemcatResultObj.code == "2") {
                            $('#ItemCategoryModal').modal('hide');
                            $('#ResponseImage').html('<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">');
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


        //Edit Item Category
        $('#MasterTable').on('click', '.btn_edit', function() {
            var EditItemCat = $(this).val();
            console.log(EditItemCat);
            var settings = {
                "url": "/api/item-category/" + EditItemCat + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                var ItemCatResult = JSON.stringify(response);
                console.log(ItemCatResult);
                var ItemCatedit = JSON.parse(ItemCatResult);
                if (ItemCatedit.success == true) {
                    $('#ItemCategoryModal').modal('show');
                    $('#item_category').hide();
                    $('#update_item_category').show();
                    var ItemCatArray = ItemCatedit.itemCategory;
                    for (const key in ItemCatArray) {
                        var ItemCatName = ItemCatArray['name'];
                        var ItemCatRemark = ItemCatArray['remarks'];
                        var ItemCatId = ItemCatArray['id'];

                    }

                    $("#update_itemcat_id").val(ItemCatId);
                    $("#update_item_name").val(ItemCatName);
                    $("#update_item_remarks").val(ItemCatRemark);
                }
            });

        });


        //Update Item Category
        $("#update_item_category").validate({
            rules: {
                UpdateItemName: {
                    required: true,
                    minlength: 2,
                    maxlength: 25,
                }
            },
            messages: {
                UpdateItemName: {
                    required: "Please Enter Item Category Name",
                    minlength: "atleast 2 characters",
                    maxlength: "maximum 25 characters",
                }
            },
            submitHandler: function(form) {
                var UpdateId = $('#update_itemcat_id').val();
                var UpdateItemCatName = $('#update_item_name').val();
                var UpdateItemCatRemark = $('#update_item_remarks').val();
                $.ajax({
                    url: "/api/item-category/" + UpdateId + "",
                    method: "PUT",
                    timeout: 0,
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        name: UpdateItemCatName,
                        remarks: UpdateItemCatRemark
                    },
                    beforeSend: function() {
                        $('.loader').show();
                        //$('#updatebranch_form').addClass("disable");
                        $('#ItemCategoryModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function(response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var ItemCatUpdate = JSON.stringify(response);
                    console.log(ItemCatUpdate);
                    var ItemCatUpdateed = JSON.parse(ItemCatUpdate);
                    if (ItemCatUpdateed.success == true) {
                        if (ItemCatUpdateed.code == "0") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/warning.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text("This Record is Already Present");  
                            $('#ResponseModal').modal('show');
                        } else if (ItemCatUpdateed.code == "1") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/success.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text("Record Updated Successfully");
                            $('#ResponseModal').modal('show');
                        } else if (ItemCatUpdateed.code == "2") {
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


        //Delete Item Category
        $('#MasterTable').on('click', '.btn_delete', function() {
            $('.delModal').modal('show');
            var DeleteItemCatType = $(this).val();
            console.log(DeleteItemCatType);
            $('#confirmYes').click(function() {
                console.log(DeleteItemCatType);
                $.ajax({
                    url: "/api/item-category/" + DeleteItemCatType + "",
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
                    var ItemCatDeleteResult = JSON.stringify(response);
                    console.log(ItemCatDeleteResult);
                    var ItemCatDelObj = JSON.parse(ItemCatDeleteResult);
                    if (ItemCatDelObj.success == true) {
                        if (ItemCatDelObj.code == "0") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/warning.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text(ItemCatDelObj.message);
                            $('#ResponseModal').modal('show');
                        } else if (ItemCatDelObj.code == "1") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/success.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text(ItemCatDelObj.message);
                            $('#ResponseModal').modal('show');
                        } else if (ItemCatDelObj.code == "2") {
                            $('#ResponseImage').html(
                                '<img src="{{ url('assets/images/error.jpg') }}" style="height:60px;width:60px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text(ItemCatDelObj.message);
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

            });
            $('#confirmNo').click(function() {
                DeleteItemCatType = '';
            });
        });


        //View Item Category
        $('#MasterTable').on('click', '.btn_view', function() {
            var ViewItemCat = $(this).val();
            console.log(ViewItemCat);
            var settings = {
                "url": "/api/item-category/" + ViewItemCat + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                var ItemCatResult = JSON.stringify(response);
                console.log(ItemCatResult);
                var ItemCatView = JSON.parse(ItemCatResult);
                if (ItemCatView.success == true) {
                    $('#ItemcatViewModal').modal('show');
                    $('#view_item_category').show();
                    var ItemCatArray = ItemCatView.itemCategory;
                    for (const key in ItemCatArray) {
                        var ItemCatName = ItemCatArray['name'];
                        var ItemCatRemark = ItemCatArray['remarks'];
                        var ItemCatId = ItemCatArray['id'];

                    }
                    $("#view_itemcat_id").val(ItemCatId);
                    $("#view_item_name").val(ItemCatName);
                    $("#view_item_remarks").val(ItemCatRemark);
                }
            });

        });

        //Focus First Field
        $(document).ready(function() {
            $('#ItemCategoryModal').on('shown.bs.modal', function() {
                $('#item_name').focus();
            });
        });
            
    </script>

</body>

</html>
