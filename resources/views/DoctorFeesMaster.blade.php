<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Doctor fees</title>
     @include('layouts.headder')
     <style>
        .mainContents{
            display:none;
        }
    </style>
  </head>

  <body>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Doctor Consultation Fees </h4>                                    
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
                                    <a href="{{url('/feesadd')}}">
                                        <button class="btn AddBtn" >+  Add</button> 
                                    </a>
                                </div>
                            </div>
                            <div>
                                <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                    <thead class="tablehead">
                                        <tr>
                                            <th class="text-center">Sl No</th>
                                            <th class="text-center">Doctor Name</th>
                                            <th class="text-center">OP Consultation Fees</th>
                                            <th class="text-center">IP Consultation Fees</th>       
                                            <th class="text-center">OP No Fees Days</th>                                                               
                                            <th class="text-center">IP No Fees Days</th> 
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
                            $(cell).html('<input type="text" class="text-center searchcolumn" placeholder="Search" />');
    
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
                
                ajax: "{{ route('DoctorFees.docconfee') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'}, 
                    {data: 'op_consultation_fees', name: 'op_consultation_fees'},      
                    {data: 'ip_consultation_fees', name: 'ip_consultation_fees'},              
                    {data: 'op_no_fee_days', name: 'op_no_fee_days'},                            
                    {data: 'ip_no_fee_days', name: 'ip_no_fee_days'},                                         
                ]
            });
            
        </script>
  </body>

</html>