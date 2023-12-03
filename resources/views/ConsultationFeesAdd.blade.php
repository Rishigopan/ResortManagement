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
                            <div class="table-responsive">
                                <div class="container-fluid my-3">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-12">
                                            <select  class="form-select inputfield " aria-label="Default select example name"id="view_department_id" name="viewDepartment">
                                                <option class="inputlabel" value=""> Department Types </option>
                                                @foreach ($dept as $key )   
                                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                                @endforeach                                        
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <form class="Doctorfees AddForm" id="doctorfee" novalidate> 
                                    @csrf
                                    <table class="table table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                        <thead class="tablehead">
                                            <tr>
                                                <th class="text-center">Doctor Name</th>
                                                <th class="text-center">OP Consultation Fees</th>
                                                <th class="text-center">IP Consultation Fees</th>
                                                <th class="text-center">OP No Fees Days</th>
                                                <th class="text-center">IP No Fees Days</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctfee as $key)
                                                <tr>
                                                    <td class="text-center">{{ $key->name }}</td>
                                                    <input type="hidden" id="id" value="{{ $key->id }}" required>
                                                    <input type="hidden" id="doctor_id" value="{{ $key->doctor_id }}" required>
                                                    <input type="hidden" id="dept_id" value="{{ $key->department_id }}" required>
                                                    <td class="text-center"><input class="text-center inputfield form-control" type="number" min="0" id="op_fees" value="{{ $key->op_consultation_fees }}" required></td>
                                                    <td class="text-center"><input class="text-center inputfield form-control" type="number" min="0" id="ip_fees" value="{{ $key->ip_consultation_fees }}" required></td>
                                                    <td class="text-center"><input class="text-center inputfield form-control" type="number" min="0" id="op_fee_days" value="{{ $key->op_no_fee_days }}" required></td>
                                                    <td class="text-center"><input class="text-center inputfield form-control" type="number" min="0" id="ip_fee_days" value="{{ $key->ip_no_fee_days }}" required></td>
                                                </tr>
                                            @endforeach   
                                        </tbody>                              
                                    </table> 
                                    <div class=" d-flex justify-content-between mt-3 mx-3">
                                        <a href="{{ url('/DoctorFees') }}">
                                            <button type="button" class="btn savebtn px-3 "><i class="ri-arrow-left-line me-3 backarrow"></i>Back</button>
                                        </a>
                                        <button type="submit" class="btn savebtn  px-5 ">Save</button>
                                    </div>
                                </form>
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

            $(document).ready(function() {
                // Add an onchange event handler to the department select element
                $('#view_department_id').on('change', function() {
                    var selectedDepartmentId = $(this).val();

                    // Iterate over each row in the table body
                    $('#MasterTable tbody tr').each(function() {
                        var rowDepartmentId = $(this).find('#dept_id').val();

                        // Check if the row's department ID matches the selected department ID
                        if (selectedDepartmentId === '' || rowDepartmentId === selectedDepartmentId) {
                            $(this).show(); // Show the row
                        } else {
                            $(this).hide(); // Hide the row
                        }
                    }); 
                });
            });

            //Update the Fees 
            $("#doctorfee").validate({
                submitHandler: function(form) {
                    $('.loader').show();
                    $('.mainContents').hide();

                    // Create an array to store the data for each row
                    var rowDataArray = [];

                    // Iterate over each row in the table
                    $('#MasterTable tbody tr').each(function() {
                        var rowData = {};
                        rowData.id = $(this).find('#id').val();
                        rowData.doctor_id = $(this).find('#doctor_id').val();
                        rowData.op_consultation_fees = $(this).find('#op_fees').val();
                        rowData.ip_consultation_fees = $(this).find('#ip_fees').val();
                        rowData.op_no_fee_days = $(this).find('#op_fee_days').val();
                        rowData.ip_no_fee_days = $(this).find('#ip_fee_days').val();

                        // Add the row data to the array
                        rowDataArray.push(rowData);
                    });

                    // Create an object to hold the rows data
                    var requestData = {
                        rows: rowDataArray
                    };

                    // Send an AJAX request to update the data for all rows
                    $.ajax({
                        url: "/api/docconfeeupdate",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        },
                        data: JSON.stringify(requestData),

                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                        },
                    }).done(function(response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        console.log(response);
                        var DoctFeeUpdate = JSON.stringify(response);
                        console.log(DoctFeeUpdate);
                        var DoctorfeeUpdated = JSON.parse(DoctFeeUpdate);
                                if (DoctorfeeUpdated.success == true) {
                                if (DoctorfeeUpdated.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");     
                                $('#ResponseModal').modal('show');
                            } else if (DoctorfeeUpdated.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (DoctorfeeUpdated.code == "2") {
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

        </script>
    </body>

</html>