<html>
    <head>
        <style>
            .conprintbodyA4 p{
                font-size: 12px;
            }
            .serial-column {
                width: 30%;
            }

            .treatment-column {
                width: 70%;
            }
        </style>
        @include('layouts.headder')

        <title>Treatment Print</title>
                
    </head>
    <body class="conprintbodyA4">
        <header>
            <div class="container-fluid printheadder">
                <div class="row">
                    <div class="col-2 text-center mt-3">
                        <img src="{{url('assets/images/bethanylogo.png')}}" style="width:80px; height:80px;"alt="">
                    </div>
                    <div class="conprintheader col-8 mt-3">
                        <h4 class="billname">BETHANY NATURE CURE CENTER</h4> 
                        <p class="printaddress mb-0">Convent Lane, Bethany Nagar,
                            Nalanchira, Paruthippara,<br>
                            Thiruvananthapuram,
                            Kerala 695 015.                
                        </p>
                        <p class="printphone ">
                            Phone : 0471 2530885, +91 8089407546 <br>
                        </p>
                    </div>
                    <div class="col-2 text-center mt-3">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h6>IP Treatment Report Bill</h6>
                    </div>
                </div>

            </div>
        </header>

        <div class="container-fluid">
            <div class="row my-2">
                <div class="col-2">
                    <p>Name</p>
                    <p>Age</p>
                </div>
                <div class="col-3">
                    <p id="name">: </p>
                    <p  id="age">: </p>
                </div>
                <div class="col-3">
                    <p>IP No</p>
                    <p>Phone No</p>
                </div>
                <div class="col-4">
                    <p id="ipnumber">: </p>
                    <p id="phone">: </p>
                </div>
            </div>
        </div>
        <hr></hr>
        <div class="container-fluid my-2">
        <div class="table-responsive">
            <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                <thead class="tablehead">
                    <tr>
                        <th class="text-center">Sl No</th>
                        <th class="text-center">Date</th>                                    
                        <th class="text-center">M Session</th>                                    
                        <th class="text-center">E Session</th>                                    
                        <th class="text-center">Amount</th>                                                                      
                    </tr>                                            
                </thead>
                <tbody>
                    <tr>
                                                                                        
                    </tr> 
                </tbody> 
                <tfoot>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center"></th>                                    
                        <th class="text-center"></th>                                    
                        <th class="text-center">Total Amount</th>                                    
                        <th class="text-center" id="total-amount"></th>                                                                      
                    </tr> 
                </tfoot>                             
            </table>
        </div>
    </div>
        <br><br>
        <h6 class="text-end me-4">Authorized Signatory</h6>

                


        
        <footer>
            <div class="mx-2">

                <p>Billed By :</p>
                <p>Printed Time : <?php date_default_timezone_set("Asia/Kolkata");
                                        echo date('Y-m-d g:i a'); ?></p>
                <hr></hr>
                <div class="text-center">
                    <p>🍃Happiness is the highest form of health.🍃 </p>
                </div>

            </div>
            @include('layouts.footer')
        </footer>
        <script>


            $(document).ready(function() {
                var IpNumb = "<?php echo $ipNumber; ?>";
                var IPConNum = "<?php echo $ipconNumber; ?>";
                var Date = "<?php echo $date; ?>";
                var Count = "<?php echo $dataCount; ?>";

                console.log(IpNumb);

                var settings = {
                    "url": "/api/Iptreatmentreportdata?IpNumber=" + IpNumb + "&ConNumber=" + IPConNum + "&Date=" + Date + "&DataCount=" + Count,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json"
                    },
                };

                $.ajax(settings).done(function(response) {
                    var Iptreatmentreports = response.Iptreatmentreports;
                    Iptreatmentreports = Iptreatmentreports.Iptreatmentreports;
                    console.log(Iptreatmentreports);

                    // Display name values from the first array
                    var firstReport = Iptreatmentreports[0];
                    $('#name').text(firstReport.name);
                    $('#ipnumber').text(firstReport.ip_no);
                    $('#age').text(firstReport.age);
                    $('#phone').text(firstReport.mobile_no);

                    var tableBody = $('#MasterTable tbody');
                    tableBody.empty();

                    var totalAmount = 0; // Initialize total amount

                    $.each(Iptreatmentreports, function(index, report) {
                        var row = $('<tr></tr>');
                        row.append('<td class="text-center">' + (index + 1) + '</td>');
                        row.append('<td class="text-center text-nowrap">' + report.date + '</td>');
                        row.append('<td class="text-center">' + report.morning_session_names + '</td>');
                        row.append('<td class="text-center">' + report.afternoon_session_names + '</td>');
                        row.append('<td class="text-center">' + report.treatment_cost + '</td>');

                        tableBody.append(row);

                        totalAmount += parseFloat(report.treatment_cost); // Accumulate treatment cost
                    });

                    // Update the table footer with the total amount
                    $('#total-amount').text(totalAmount.toFixed(2));
                    window.print();
                });
            });
           



        </script>
    </body>
</html>


