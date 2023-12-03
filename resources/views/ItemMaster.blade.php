<!DOCTYPE html>
<html lang="en">

  <head>
    @include('layouts.headder')
    <title>Item</title>
    <style>
        .mainContents{
            display:none;
        }
    </style>
  </head>

  <body>
     <div class="modal fade addUpdateModal" id="ItemModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Item </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="Item AddForm" id="item" novalidate>
                       {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="item_name" name="ItemName" placeholder=" " autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">GST %</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="gst" name="GST" placeholder=" " autofocus >
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Item Category<span  style="color:red"> *</span></label><br>
                                <!-- <input type="text" class="form-control mt-1 inputfield" id="item_category" name="ItemCategory" placeholder=" " autofocus required> -->
                                <select class="form-select inputfield " aria-label="Default select example name"id="item_category" name="ItemCategory">
                                  <option class="inputlabel" hidden value=""> Choose Item Category</option>
                                    @foreach ($itemc as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>                               
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Batch No</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="batch_no" name="BatchNo" placeholder=" " autofocus >
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Unit<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="unit" name="Unit">
                                <option class="inputlabel" hidden value=""> Select Item Units</option>
                                @foreach ($units as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach   
                                                        
                                </select>
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Expiry Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="exp_date" name="ExpDate" placeholder=" " autofocus >
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">MRP<span  style="color:red"> *</span></label><br>
                                <input type="number" min="0" class="form-control mt-1 inputfield" id="mrp" name="MRP" placeholder=" " autofocus required>
                            </div>                            
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Opening Stock</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="opening_stock" name="OpeningStock" placeholder=" " autofocus >
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Selling Price<span  style="color:red"> *</span></label><br>
                                <input type="number" min="0" class="form-control mt-1 inputfield" id="selling_price" name="SellingPrice" placeholder=" " autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Reorder Level</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="reorder_level" name="ReorderLevel" placeholder=" " autofocus >
                            </div>                                                     
                        </div>
                        <div class=" text-end mt-3">
                            <button type="submit" class="btn savebtn  px-5 ">Save</button>
                        </div>
                    </form>
                    <form class="UpdateItem UpdateForm" id="update_item" style="display: none;" novalidate>
                       {{ csrf_field() }}
                        <input type="hidden"  id="update_item_id" >
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_item_name" name="UpdateItemName" placeholder=" " autofocus required>
                            </div>    
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">GST %</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_gst" name="UpdateGST" placeholder=" " autofocus >
                            </div> 
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Item Category<span  style="color:red"> *</span></label><br>
                                <!-- <input type="text" class="form-control mt-1 inputfield" id="update_item_category" name="UpdateItemCategory" placeholder=" " autofocus required> -->
                                <select class="form-select inputfield " aria-label="Default select example name"id="update_item_category" name="UpdateItemCategory">
                                    @foreach ($itemc as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>                             
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Batch No</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_batch_no" name="UpdateBatchNo" placeholder=" " autofocus >
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Unit<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="update_unit" name="UpdateUnit">
                                  @foreach ($units as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach   
                                                        
                                </select>
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Expiry Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="update_exp_date" name="UpdateExpDate" placeholder=" " autofocus >
                            </div> 
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">MRP<span  style="color:red"> *</span></label><br>
                                <input type="number" min="0" class="form-control mt-1 inputfield" id="update_mrp" name="UpdateMRP" placeholder=" " autofocus required>
                            </div>                             
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Opening Stock</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_opening_stock" name="UpdateOpeningStock" placeholder=" " autofocus >
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Selling Price<span  style="color:red"> *</span></label><br>
                                <input type="number" min="0" class="form-control mt-1 inputfield" id="update_selling_price" name="UpdateSellingPrice" placeholder=" " autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Reorder Level</label><br>
                                <input type="text" class="form-control mt-1 inputfield" id="update_reorder_level" name="UpdateReorderLevel" placeholder=" " autofocus >
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
    <div class="modal fade addUpdateModal" id="ItemViewModal" tabindex="-1" data-bs-backdrop="static"  data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Item Details</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" id="view_item" style="display: none;" novalidate>
                        <input type="hidden"  id="view_item_id" >
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_item_name" name="ViewItemName" placeholder=" " autofocus required>
                            </div>    
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">GST %</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_gst" name="ViewGST" placeholder=" " autofocus required>
                            </div> 
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Item Category</label><br>
                                
                                <select class="form-select inputfield " disabled aria-label="Default select example name"id="view_item_category" name="ViewItemCategory">
                                    @foreach ($itemc as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>                             
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Batch No</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_batch_no" name="ViewBatchNo" placeholder=" " autofocus required>
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Unit</label><br>
                                <!-- <input type="text" disabled class="form-control mt-1 inputfield" id="view_unit" name="ViewUnit" placeholder=" " autofocus required> -->
                                <select disabled class="form-select inputfield " aria-label="Default select example name"id="view_unit" name="ViewUnit">
                                <option class="inputlabel" hidden value="0"> Choose Item Unit</option>
                                @foreach ($units as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                @endforeach                                                      
                                </select>
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Expiry Date</label><br>
                                <input type="date"  disabled class="form-control mt-1 inputfield" id="view_exp_date" name="ViewExpDate" placeholder=" " autofocus required>
                            </div>         
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">MRP</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_mrp" name="ViewMRP" placeholder=" " autofocus required>
                            </div>                     
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Opening Stock</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_opening_stock" name="ViewOpeningStock" placeholder=" " autofocus required>
                            </div>  
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Selling Price</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_selling_price" name="ViewSellingPrice" placeholder=" " autofocus required>
                            </div> 
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Reorder Level</label><br>
                                <input type="text" disabled class="form-control mt-1 inputfield" id="view_reorder_level" name="ViewReorderLevel" placeholder=" " autofocus required>
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

    <aside id="sidebar ps-0" class="sidebar">
        @include('layouts.sidebar')
    </aside>

    <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="container-fluid">
            <h4 class="d-flex justify-content-center py-1 contitle">Item </h4>                
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
                                    <select class="form-select inputfield " aria-label="Default select example name"id="view_itemcat_id" name="viewDepartment">
                                        <option class="inputlabel" hidden value="">  Item Category</option>
                                        @foreach ($itemc as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach                                      
                                    </select>
                                </div>
                                <div class="col-3">
                                    
                                </div>                               
                                                        
                                <div class="col-3 text-end">
                                    <button class="btn btn_reset" id="filter_reset" >Reset</button> 
                                    <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#ItemModal">+ Add</button> 
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
                                    <th class="text-center">Item Category</th>                                    
                                    <th class="text-center">Selling Price</th> 
                                    <th class="text-center">MRP</th>   
                                    <th class="text-center">GST %</th>                              
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
                
                ajax: "{{ route('Item.item') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'}, 
                    {data: 'ItemCat', name: 'ItemCat'},  
                    {data: 'selling_price', name: 'selling_price'},
                    {data: 'mrp', name: 'mrp'},      
                    {data: 'gst', name: 'gst'},                                                    
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'itemid', name: 'itemid', visible: false},                              

                ]
            });

            //Searchbar
            $('#SearchBar').keyup(function() {
                MasterTable.search($(this).val()).draw();
            });

            //reset form function
            $('#filter_reset').click(function() {
                MasterTable.search('').draw();
                MasterTable.column(7).search('').draw();
                $('#SearchBar').val('');
                $('#view_itemcat_id').val('').change();
            });



            $('#view_itemcat_id').change(function() {
                var VoucherFilter = $(this).val();
                // //console.log(VoucherFilter);
                MasterTable.column(7).search(VoucherFilter).draw();
            });

            //Add Item  

            $("#item").validate({
                rules:{
                    ItemName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                                       
                    },
                    ItemCategory:{
                        required: true,
                    },
                    Unit:{
                        required: true,
                    },
                    SellingPrice:{
                        required: true,
                        number:true,
                        max: function() {
                            return parseFloat($("#mrp").val());
                        }
                    },
                    MRP:{
                        required: true,
                        number:true
                    }
                },
                messages: {
                    ItemName:{
                        required: "Please Enter Item Name",
                        minlength:"atleast 2 charecter",
                        maxlength: "maximum 25 characters",
                    },
                    SellingPrice: {
                        max: "The Selling Price cannot be greater than the MRP."
                    }
                },
                submitHandler: function(form) {
                    var ItemName = $('#item_name').val();
                    var ItemGST = $('#gst').val();
                    var ItemCategory = $('#item_category').val();
                    var ItemBatchNo = $('#batch_no').val();
                    var ItemUnit = $('#unit').val();
                    var ItemExpDate = $('#exp_date').val();
                    var ItemSellingPrice = $('#selling_price').val();
                    var ItemOpeningstock = $('#opening_stock').val();
                    var ItemMRP = $('#mrp').val();
                    var ItemReorderLevel = $('#reorder_level').val();
                    $.ajax({
                        url: "{{url('/api/item')}}",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: ItemName,
                            item_category: ItemCategory,
                            unit: ItemUnit,
                            selling_price: ItemSellingPrice,
                            mrp: ItemMRP,
                            gst:ItemGST,
                            batch_no: ItemBatchNo,
                            exp_date: ItemExpDate,
                            opening_stock: ItemOpeningstock,
                            reorder_level: ItemReorderLevel,                       
                        },beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);  
                        var ItemResult = JSON.stringify(response);
                        console.log(ItemResult);
                        var ItemResultObj = JSON.parse(ItemResult);
                        if (ItemResultObj.success == true) {
                            if (ItemResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (ItemResultObj.code == "1") {
                                $('#item')[0].reset();
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show').on('hidden.bs.modal', function () {
                                    $('#item_name').focus();
                                });
                            } else if (ItemResultObj.code == "2") {
                                $('#ItemModal').modal('hide');
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
         
            //edit Item

            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditItem = $(this).val();
                console.log(EditItem);
                var settings = {
                    "url": "/api/item/"+EditItem+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var ItemResult = JSON.stringify(response);
                    console.log(ItemResult);
                    var Itemedit = JSON.parse(ItemResult);
                    if (Itemedit.success == true) {
                        $('#ItemModal').modal('show');
                        $('#item').hide();
                        $('#update_item').show();
                        var ItemDataArray = Itemedit.items;
                        for(const key in ItemDataArray){
                            var ItemId = ItemDataArray['id'];
                            var ItemName = ItemDataArray['name'];
                            var ItemGST = ItemDataArray['gst'];
                            var ItemCategory = ItemDataArray['item_category'];
                            var ItemBatchNo = ItemDataArray['batch_no'];
                            var ItemUnit = ItemDataArray['unit'];
                            var ItemExpDate = ItemDataArray['exp_date'];
                            var ItemSellingPrice = ItemDataArray['selling_price'];
                            var ItemOpeningstock = ItemDataArray['opening_stock'];
                            var ItemMRP = ItemDataArray['mrp'];
                            var ItemReorderLevel = ItemDataArray['reorder_level'];

                        }
                        $("#update_item_id").val(ItemId);
                        $("#update_item_name").val(ItemName);
                        $("#update_gst").val(ItemGST);
                        $("#update_item_category").val(ItemCategory);
                        $("#update_batch_no").val(ItemBatchNo);
                        $("#update_unit").val(ItemUnit);
                        $("#update_exp_date").val(ItemExpDate);
                        $("#update_selling_price").val(ItemSellingPrice);
                        $("#update_opening_stock").val(ItemOpeningstock);
                        $("#update_mrp").val(ItemMRP);
                        $("#update_reorder_level").val(ItemReorderLevel);

                    }
                });
                
            });

            //Update Item

            $("#update_item").validate({
                rules:{
                    UpdateItemName:{
                        required: true,
                        minlength: 2,  
                        maxlength: 25,                                       
                    },
                    UpdateItemCategory:{
                        required: true,
                    },
                    UpdateUnit:{
                        required: true,
                    },
                    UpdateSellingPrice:{
                        required: true,
                        number:true
                    },
                    UpdateMRP:{
                        required: true,
                        number:true
                    }
                },
                messages: {
                    UpdateItemName:{
                        required: "Please Enter Item Name",
                        minlength:"atleast 2 charecter",
                        maxlength: "maximum 25 characters",
                    }
                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_item_id').val();                
                    var UpdateItemName = $('#update_item_name ').val();
                    var UpdateItemGST = $('#update_gst').val();
                    var UpdateItemCategory = $('#update_item_category').val();
                    var UpdateItemBatchNo = $('#update_batch_no').val();
                    var UpdateItemUnit  = $('#update_unit').val();
                    var UpdateItemExpDate  = $('#update_exp_date').val();
                    var UpdateItemSellingPrice  = $('#update_selling_price').val();
                    var UpdateItemOpeningStock  = $('#update_opening_stock').val();
                    var UpdateItemMRP  = $('#update_mrp').val();
                    var UpdateItemReorderLevel  = $('#update_reorder_level').val();
                    $.ajax({
                        url: "/api/item/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            name: UpdateItemName,
                            item_category: UpdateItemCategory,
                            unit: UpdateItemUnit,
                            selling_price: UpdateItemSellingPrice,
                            mrp: UpdateItemMRP,
                            gst: UpdateItemGST,
                            batch_no: UpdateItemBatchNo,
                            exp_date: UpdateItemExpDate,
                            opening_stock: UpdateItemOpeningStock,
                            reorder_level: UpdateItemReorderLevel,                       
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            //$('#updatebranch_form').addClass("disable");
                            $('#ItemModal').modal('hide');
                            $('.mainContents').hide();
                            //$('#ResponseImage').html("");
                            //$('#ResponseText').text("");
                        },
                    })
                    .done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        console.log(response);
                        var ItemUpdate = JSON.stringify(response);
                        console.log(ItemUpdate);
                        var ItemUpdateed = JSON.parse(ItemUpdate);
                        if (ItemUpdateed.success == true) {
                            if (ItemUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (ItemUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (ItemUpdateed.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updating Failed");
                                $('#ResponseModal').modal('show');
                            }
                        } 
                        else 
                        {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#ResponseModal').modal('show');
                        }  
                    });
                }
            });
               
             //Delete Item
             $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteItemType = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteItemType);
                    $.ajax({
                        url: "/api/item/"+DeleteItemType+"",
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
                        var ItemDeleteResult = JSON.stringify(response);
                        console.log(ItemDeleteResult); 
                        var ItemDelObj = JSON.parse(ItemDeleteResult);
                        if (ItemDelObj.success == true) {  
                            if (ItemDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(ItemDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (ItemDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(ItemDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (ItemDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(ItemDelObj.message);
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

            //View Items
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewItem = $(this).val();
                console.log(ViewItem);
                var settings = {
                    "url": "/api/item/"+ViewItem+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var ItemResult = JSON.stringify(response);
                    console.log(ItemResult);
                    var ItemView = JSON.parse(ItemResult);
                    if (ItemView.success == true) {
                        $('#ItemViewModal').modal('show');                        
                        $('#view_item').show();
                        var ItemDataArray = ItemView.items;
                        for(const key in ItemDataArray){
                            var ItemId = ItemDataArray['id'];
                            var ItemName = ItemDataArray['name'];
                            var ItemGST = ItemDataArray['gst'];
                            var ItemCategory = ItemDataArray['item_category'];
                            var ItemBatchNo = ItemDataArray['batch_no'];
                            var ItemUnit = ItemDataArray['unit'];
                            var ItemExpDate = ItemDataArray['exp_date'];
                            var ItemSellingPrice = ItemDataArray['selling_price'];
                            var ItemOpeningstock = ItemDataArray['opening_stock'];
                            var ItemMRP = ItemDataArray['mrp'];
                            var ItemReorderLevel = ItemDataArray['reorder_level'];

                        }
                        $("#view_item_id").val(ItemId);
                        $("#view_item_name").val(ItemName);
                        $("#view_gst").val(ItemGST);
                        $("#view_item_category").val(ItemCategory);
                        $("#view_batch_no").val(ItemBatchNo);
                        $("#view_unit").val(ItemUnit);
                        $("#view_exp_date").val(ItemExpDate);
                        $("#view_selling_price").val(ItemSellingPrice);
                        $("#view_opening_stock").val(ItemOpeningstock);
                        $("#view_mrp").val(ItemMRP);
                        $("#view_reorder_level").val(ItemReorderLevel);

                    }
                });
                
            });

            //Focus First Field
            $(document).ready(function() {
                $('#ItemModal').on('shown.bs.modal', function() {
                    $('#item_name').focus();
                });
            });
            
        </script>

  </body>

</html>