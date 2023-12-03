<!DOCTYPE html>
<html lang="en">

    <head>
        <title>IP Patient Record</title>
        @include('layouts.headder')
        <style>
            .mainContents{
                display:none;
            }
        </style>

    </head>

  <body>
    
    <!-- ======= Header ======= -->

    <!-- Response Modal -->
    @include('layouts.ResponseModals') 

    <!-- Modal -->
    <div class="modal fade delModal" id="delModal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Delete Confirmation</h5>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Do you want to delete this Record?</h4>
                    <div class="text-center mt-3">
                        <button type="button" id="confirmYes" class="btn btn-primary me-5">Yes</button>
                        <button type="button" id="confirmNo" class="btn btn-secondary ms-5"
                            data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            <h4 class="d-flex justify-content-center py-1 contitle">IP Patient Records</h4>                                           
        </div>
        
        <div class="wrapper">
            <!--CONTENTS-->
            <div class="container-fluid mainContents">
                <div class="card card-body mt-2 shadow-lg p-3 mb-2">
                    <div class="main_heading d-flex justify-content-between mb-2  p-2 ">
                        <div id="exportbtns"class="exportbtns">
                            <!-- export buttons -->
                        </div>
                        <div class="">
                            <a href="{{url('/IpPatientRecord')}}">
                                <button class="btn AddBtn ">+  Add</button> 
                            </a>
                        </div>
                    </div>
                    <div>
                        <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                            <thead class="tablehead">
                                <tr>
                                    <th class="text-center">Sl No</th>                                   
                                    <th class="text-center">Op Number</th> 
                                    <th class="text-center">Name</th> 
                                    <th class="text-center">Date</th> 
                                    <th class="text-center">Age</th> 
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
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4]
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
                
                ajax: "{{ route('IpPatientRecordView.IprecordsView') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'ip_no', name: 'ip_no'}, 
                    {data: 'name', name: 'name'},  
                    {data: 'date', name: 'date'},
                    {data: 'age', name: 'age'},                                                
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            //Delete Patient Record
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DeleteSPatientRec = $(this).val();
                $('#confirmYes').click(function(){
                    
                    console.log(DeleteSPatientRec);
                    $.ajax({
                        url: "/api/patient/"+DeleteSPatientRec+"",
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
                        var PatientRecDeleteResult = JSON.stringify(response);
                        console.log(PatientRecDeleteResult); 
                        var PatientRecDelObj = JSON.parse(PatientRecDeleteResult);
                        if (PatientRecDelObj.success == true) {  
                            if (PatientRecDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(PatientRecDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (PatientRecDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(PatientRecDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (PatientRecDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(PatientRecDelObj.message);
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

    </script>
  </body>

</html>