<!DOCTYPE html>
<html lang="en">

    <head>
        @include('layouts.headder')
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

            <div class="container-fluid ">
                <h4 class="mt-4 d-flex justify-content-center py-1 contitle">Diets Schedule</h4>                                                                  
            </div>                    
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="container-fluid">
                        <form class="Token AddForm" id="Diet_shedule" novalidate>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-6">
                                    <label class="mt-3 mb-1 ">IP Number<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield IP_No" aria-label="Default select example name"id="ip_no" name="IPNo" required>
                                    <option hidden value=""> Choose IP Number</option>
                                    @foreach ($ipno as $key )   
                                        <option class="inputlabel" value="{{$key->id}}" data-gender="{{$key->gender}}">{{$key->ip_no}} </option>
                                    @endforeach    
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6">
                                    <label class="mt-3 mb-1 inputlabel">Date</label><br>
                                    <input type="date"  class="form-control mt-1 inputfield" id="date" name="Date"   value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6">
                                    <label class="mt-3 mb-1 ">Time</label><br>
                                    <select class="form-control inputfield" aria-label="Default select example name"  id="time" name="Time" Placeholder="Select Time">
                                        <option value="">Select Time</option>
                                        <option value="06:30:00">6.30 AM</option>
                                        <option value="08:30:00">8.30 AM</option>
                                        <option value="11:00:00">11.00 AM</option>
                                        <option value="01:00:00">1.00 PM</option>
                                        <option value="04:00:00">4.00 PM</option>
                                        <option value="07:30:00">7.30 PM</option>                                   
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 text-start mt-4">
                                    <button type="submit" class="btn savebtn  mt-3 px-4">Submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>

                    <div class="card card-body main_card mt-2 shadow-lg p-3 mb-2">                              
                        <div class="main_heading mb-2 shadow p-2 subheading">
                            <div class="container-fluid ">
                                <h4 class="mt-4 d-flex justify-content-center py-1 contitle" data-bs-toggle="collapse" href="#morningcollapse"><i class="ri-arrow-drop-down-line"></i>Diets</h4>                                                                  
                            </div> 
                            <div class="collapse clpse" id="morningcollapse">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="diet_table" style="width: 100%;">
                                        <thead class="tablehead">
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">IP No</th>
                                                <th class="text-center">Consultation No</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Patient Name</th>
                                                <th class="text-center">Age</th>                                                
                                                <th class="text-center">Diets</th>

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
            </div>   
        </main><!-- End #main -->
        @include('layouts.footer')
        <script>
           $(document).on('submit', '#Diet_shedule', function (e) {
                e.preventDefault();
                var IPNum = $('#ip_no').val();
                var date = $('#date').val();
                var time = $('#time').val();
                console.log(time);
                var url = "/api/getdietschedule?date=" + date + "&IPNumber=" + IPNum;
                if (time) {
                    url += "&time=" + time;
                }
                var settings = {
                    "url": url,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json"
                    },
                };
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var IPDiets = response.data.data.IpDiets;

                    // Update the morning session table
                    var DietIPTable = $('#diet_table');
                    DietIPTable.find('tbody').empty(); // Clear previous data

                    $.each(IPDiets, function (index, item) {
                        var row = $('<tr>');
                        row.append('<td class="text-center">' + (index + 1) + '</td>');
                        row.append('<td class="text-center">' + item.ip_no + '</td>');
                        row.append('<td class="text-center">' + item.consultation_no + '</td>');
                        row.append('<td class="text-center">' + item.name + '</td>'); 
                        row.append('<td class="text-center">' + item.date + '</td>');
                        row.append('<td class="text-center">' + item.time + '</td>');
                        row.append('<td class="text-center">' + item.age + '</td>');
                        row.append('<td class="text-center">' + item.DietName + '</td>');

                        DietIPTable.append(row);
                    });
                });
            });

            // //Focus First Field
            $(document).ready(function() {
                $('#date').focus();
                // Show tables when the page loads
                $('.clpse').collapse('show');

                // Toggle tables when clicked
                $('.contitle').on('click', function() {
                    $($(this).data('target')).collapse('toggle');
                });
            }); 
            
        </script>
    </body>
</html>