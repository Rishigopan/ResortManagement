<!DOCTYPE html>
<html lang="en">

  <head>

     @include('layouts.headder')
     <title>Collection Detail</title>
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
            <div class="container-fluid">
                <h4 class="d-flex justify-content-center py-1 contitle">Collection Detailed Report - {{ Session::get('current_year') }}</h4>                                  
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
                                            <select class="form-select inputfield OpNo" aria-label="Default select example name"id="mode_pay_id" name="ModePay">
                                                <option hidden value=""> Choose  Payment type</option>
                                                @foreach ($modeofpay as $key )   
                                                <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                                @endforeach                                                                                 
                                            </select>
                                        </div>
                                        <div class="col-3">
                                           
                                        </div>                               
                                                              
                                        <div class="col-3 text-end">
                                        <button class="btn btn_reset  py-1" id="filter_reset" >Reset</button> 

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div>
                                <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                    <thead class="tablehead">
                                        <tr>
                                            <th class="text-center">Sl No</th>
                                            <th class="text-center">OP Number</th>                                    
                                            <th class="text-center">Name</th>                                    
                                            <th class="text-center">Age</th>                                    
                                            <th class="text-center">Phone Number</th>                                    
                                            <th class="text-center">Mode Of Payment</th>
                                            <th class="text-center">Amounts</th>                                    
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

            //Searchbar
            $('#SearchBar').keyup(function() {
                MasterTable.search($(this).val()).draw();
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
            
                ajax: "{{ route('Colection.collectDetail') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'op_no', name: 'op_no'}, 
                    {data: 'name', name: 'name'}, 
                    {data: 'age', name: 'age'}, 
                    {data: 'mobile_no', name: 'mobile_no'}, 
                    {data: 'Payname', name: 'Payname'}, 
                    {data: 'consultation_fees', name: 'consultation_fees'},    
                    {data: 'mode_of_payment_id', name: 'mode_of_payment_id', visible: false},                  
              
                ]
            });

            //reset form function
            $('#filter_reset').click(function() {
                MasterTable.search('').draw();
                MasterTable.column(7).search('').draw();
                $('#SearchBar').val('');
                $('#mode_pay_id').val('').change();
            });



            $('#mode_pay_id').change(function() {
                var VoucherFilter = $(this).val();
                // //console.log(VoucherFilter);
                MasterTable.column(7).search(VoucherFilter).draw();
            });
            
        </script>
  </body>

</html>