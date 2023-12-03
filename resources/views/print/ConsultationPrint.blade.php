<html>
    <head>
        <style>
            .conprintbody p{
                font-size: 12px;
            }

        </style>
        @include('layouts.headder')

        <title>Consultation Print</title>
                
    </head>
    <body class="conprintbody">
        <header>
            <div class="container-fluid printheadder">
                <div class="row">
                    <div class="col-2 text-center mt-3">
                        <img src="{{url('assets/images/bethanylogo.png')}}" style="width:80px; height:80px;"alt="">
                    </div>
                    <div class="conprintheader col-10 mt-3">
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
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h6>IP Consultation Bill</h6>
                    </div>
                </div>

            </div>
        </header>

        <div class="container-fluid">
            <div class="row my-2">
                @foreach ($conbillprint as $bill )  
                <div class="col-2">
                    <p>OP Number</p>
                    <p>Date</p>
                    <p>Doctor</p>
                </div>
                <div class="col-4">
                    <p>: {{$bill->op_no}}</p>
                    <p>: {{$bill->consultation_date}}</p>
                    <p>: {{$bill->name}}</p>
                </div>
                <div class="col-3">
                    <p> Token Number</p>
                    <p>Bill Number</p>
                    <p>Patient Name</p>
                </div>
                <div class="col-3">
                    <p>: {{$bill->token_no}}</p>
                    <p>: {{$bill->consultation_bill_no}}</p>
                    <p>: {{$bill->opname}}</p>
                </div>
            </div>
        </div>
        <hr></hr>
        <div class="container-fluid  my-2">
            <div class="table-responsive">
                <table class="table  table-hover BillTable" id="bill_table" style="width: 100%;">
                    <thead class="tablehead">
                        <tr>
                            <th class="">Sl No</th>                                    
                            <th class="text-center">Service Description</th>
                            <th class="text-center">Amount</th>                                    
                            
                        </tr>                                           
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1</td>
                            <td class="text-center">Registration Fee</td>                        
                            <td class="text-center">{{ $bill->registration_fees }}</td>
                        </tr> -->
                        <tr>
                            <td>1</td>
                            <td class="text-center">Consultation Fee</td>                        
                            <td class="text-center">{{$bill->consultation_fees}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <th class="text-center">Net Amount :</th>                        
                            <!-- <th class="text-center"> @php
                                                        $netAmount = $bill->registration_fees + $bill->consultation_fees;
                                                        echo $netAmount;
                                                    @endphp </th> -->
                            <th class="text-center"> @php echo $bill->consultation_fees;                  
                            @endphp </th>
                        </tr>
                        
                    </tbody>
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
                    <p>Happiness is the highest form of health. </p>
                </div>
            @endforeach 

            </div>
            @include('layouts.footer')
        </footer>
        <script>
            window.onload = function() {
                window.print();
            };
        </script>
    </body>
</html>





