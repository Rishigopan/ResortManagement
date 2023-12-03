<!DOCTYPE html>
<html lang="en">

    <head>

        @include('layouts.headder')
        <title>Daily OP Report</title>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Daily OP Report</h4>                                  
            </div>
            <div class="row mt-4 mx-3">
                    <div class="tab-pane fade show active" id="pills-optreatment" role="tabpanel" aria-labelledby="pills-optreatment-tab">
                        <!-- Contents of the OP Treatment Report tab -->
                        <div class="wrapper">
                            <!--CONTENTS-->
                            <div class="container-fluid mainContents">
                                <div class="card card-body main_card mt-2 p-3 mb-2">                           
                                    <div class="main_heading  mb-2 p-2">
                                        <div class="container-fluid ">
                                        <form class="AddForm" id="op_report" novalidate>
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2 col-6 ">
                                                    <label class="mt-3 mb-1 inputlabel">From Date </label><br>
                                                    <input type="date" class="form-control inputfield" id="from_date" name="Date" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-6 ">
                                                    <label class="mt-3 mb-1 inputlabel">To Date</label><br>
                                                    <input type="date" class="form-control inputfield" id="to_date" name="Date" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-6">
                                                    <label class="mt-3 mb-1 inputlabel ">Doctor</label><br>
                                                    <select class="SearchAndSelect inputfield " aria-label="Default select example name"id="doctor" name="Doctor" >
                                                        <option value="0"> Select Doctor</option>
                                                        @foreach ($doctors as $key )   
                                                            <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                                        @endforeach    
                                                    </select>
                                                </div>    
                                                <div class="col-xl-2 col-lg-2 col-6">
                                                    <label class="mt-3 mb-1 inputlabel ">Op Number</label><br>
                                                    <select class="SearchAndSelect inputfield " aria-label="Default select example name"id="op_no" name="OPNo" >
                                                        <option value="0"> Select OP Number</option>
                                                        @foreach ($opno as $key )   
                                                            <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                                        @endforeach    
                                                    </select>
                                                </div>
                                                <div class=" col-xl-2 col-lg-2 col-6 mt-4 text-end">
                                                    <button type="submit" class="btn savebtn  px-5 mt-3"> Search</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-4 table-responsive">
                                        <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                            <thead class="tablehead">
                                                <tr>
                                                    <th class="text-center">Sl No</th>
                                                    <th class="text-center">Date</th>   
                                                    <th class="text-center">OP Number</th>  
                                                    <th class="text-center">Consultation Number</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Age</th>
                                                    <th class="text-center">Gender</th>
                                                    <th class="text-center">Phone</th>
                                                    <th class="text-center">Doctor</th> 
                                                </tr>                                            
                                            </thead>
                                            <tbody>
                                                <tr>
                                                                                                                
                                                </tr> 
                                            </tbody>                           
                                        </table>
                                    </div>
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

            //Search And Select
            $('.SearchAndSelect').selectize();


            //Datatable results
            $(document).ready(function() {
                var table = $('#MasterTable').DataTable({
                    "dom": 'Blrt<"bottom"ip>',
                    processing: true,
                    serverSide: false,
                    paging: true,
                    ajax: {
                        url: '/api/dailyopreport', 
                        data: function (data) {
                            data.from_date = $('#from_date').val();
                            data.to_date = $('#to_date').val();
                            data.doctor = $('#doctor').val();
                            data.op_number = $('#op_no').val();
                        }
                    },
                    columns: [
                        { 
                            data: null,
                            name: '',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                // Calculate and return the row number
                                return meta.row + 1;
                            }
                        },
                        { 
                            data: 'consultation_date', 
                            name: 'consultation_date',
                            render: function (data, type, row, meta) {
                                // Format the date as dmy (dd/mm/yyyy)
                                var date = new Date(data);
                                var day = date.getDate();
                                var month = date.getMonth() + 1;
                                var year = date.getFullYear();
                                return day + '/' + month + '/' + year;
                            }
                        },       
                        { data: 'op_no', name: 'op_no' },
                        { data: 'consultation_no', name: 'consultation_no' },
                        { data: 'name', name: 'name' },
                        { data: 'age', name: 'age' },
                        {
                            data: 'gender',
                            name: 'gender',
                            render: function (data, type, row, meta) {
                                if (data === 1) {
                                    return 'Male';
                                } else if (data === 2) {
                                    return 'Female';
                                } else {
                                    return 'Others';
                                }
                            }
                        },
                        { data: 'mobile_no', name: 'mobile_no' },
                        { data: 'Drname', name: 'Drname' },
                    ],
                    buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },  
                ],
                });

                $('#op_report').on('submit', function(e) {
                    e.preventDefault();
                    table.ajax.reload(function(json) {
                        console.log(json.data); 
                    });
                });
            });


        </script>
    </body>

</html>