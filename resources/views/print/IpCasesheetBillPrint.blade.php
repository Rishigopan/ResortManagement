<html>
    <head>
        <style>
            .conprintbody p{
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
                        <h6>Treatment Bill</h6>
                    </div>
                </div>

            </div>
        </header>

        <div class="container-fluid">
            <div class="row my-2">
                @foreach ($treatmentbillprint as $bill )  
                <div class="col-2">
                    <p>Name</p>
                    <p>Date</p>
                </div>
                <div class="col-3">
                    <p>: {{$bill->opname}}</p>
                    <p>: {{$bill->date}}</p>
                </div>
                <div class="col-3">
                    <p> OP No</p>
                    <p>Consultation No</p>
                    <p>Bill No</p>
                </div>
                <div class="col-4">
                    <p>: {{$bill->op_no}}</p>
                    <p>: {{$bill->consultation_no}}</p>
                    <p>: {{$bill->casesheet_bill_no}}</p>
                </div>
            </div>
        </div>
        <hr></hr>
        <div class="container-fluid my-2">
        <div class="table-responsive">
            <table class="table table-hover BillTable" id="bill_table" style="width: 100%;">
                <thead class="tablehead">
                    <tr>
                        <th class="serial-column">Sl No</th>
                        <th class="treatment-column text-start">Treatment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($treatmentbillprint as $bill)
                        @php
                            $treatments = explode(',', $bill->treatments);
                        @endphp
                        @foreach ($treatments as $index => $treatment)
                            <tr>
                                <td class="serial-column">{{ $index + 1 }}</td>
                                <td class="treatment-column text-start">{{ $treatment }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="serial-column"></td>
                            <th class="treatment-column text-end pe-4">Total: {{ number_format($bill->treatment_cost, 0, ',', ',') }}</th>
                        </tr>
                    @endforeach
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
                    <p>🍃Happiness is the highest form of health.🍃 </p>
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


