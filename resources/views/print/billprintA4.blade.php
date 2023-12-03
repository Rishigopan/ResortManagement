<!-- A4 Paper Size -->
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
                        <img src="{{url('assets/images/bethanylogo.png')}}" style="width:120px; height:120px;"alt="">
                    </div>
                    <div class="conprintheader col-6 mt-3">
                        <h4 class="billname">BETHANY NATURE CURE CENTER</h4> 
                        <h6>Convent Lane, Bethany Nagar, <br>
                            Nalanchira, Paruthippara,<br>
                            Thiruvananthapuram,<br>
                            Kerala 695 015
                        </h6>
                    </div>
                    <div class="col-4 mt-3">
                    <br><br>
                        <div class="row">
                            <div class="col-2">
                                <p><b> Phone<br><br>
                                    Email</b>
                                </p>
                            </div>
                            <div class="col-10">
                                <p> 0471 2530885, <br>
                                         +91 8089407546  <br>
                                    bethanynaturecure@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <h6><b>Consultation Bill</b></h6>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row my-5">
                @foreach ($conbillprint as $bill )  
                <div class="col-2">
                    <h6>OP Number</h6>
                    <h6>Date</h6>
                    <h6>Doctor</h6>
                </div>
                <div class="col-4">
                    <h6>: {{$bill->op_no}}</h6>
                    <h6>: {{$bill->consultation_date}}</h6>
                    <h6>: {{$bill->name}}</h6>
                </div>
                <div class="col-3">
                    <h6> Token Number</h6>
                    <h6>Bill Number</h6>
                    <h6>Patient Name</h6>
                </div>
                <div class="col-3">
                    <h6>: {{$bill->token_no}}</h6>
                    <h6>: {{$bill->consultation_bill_no}}</h6>
                    <h6>: {{$bill->opname}}</h6>
                </div>
            </div>
        </div>
        <hr></hr>
        <div class="container-fluid  my-5">
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
                        <tr>
                            <td>1</td>
                            <td class="text-center">Registration Fee</td>                        
                            <td class="text-center">{{ $bill->registration_fees }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-center">Consultation Fee</td>                        
                            <td class="text-center">{{$bill->consultation_fees}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <th class="text-center">Net Amount :</th>                        
                            <th class="text-center"> @php
                                                        $netAmount = $bill->registration_fees + $bill->consultation_fees;
                                                        echo $netAmount;
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

            @endforeach 

            </div>
            @include('layouts.footer')
        </footer>
    </body>
</html>