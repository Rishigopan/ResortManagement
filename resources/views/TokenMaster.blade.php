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
                <h4 class="mt-4 d-flex justify-content-center py-1 contitle">Token Register</h4>                                                                  
            </div>                    
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="container-fluid">
                        <form class="Token AddForm" id="token" novalidate>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-6">
                                    <label class="mt-3 mb-1 inputlabel">Doctor<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield mt-1" aria-label="Default select example name"id="doctor" name="Doctor">
                                        <option hidden value=""> Choose a Doctor</option>
                                        @foreach ($doct as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach                                      
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6">
                                    <label class="mt-3 mb-1 inputlabel">Consultation Date<span  style="color:red"> *</span></label><br>
                                    <input type="date"  class="form-control mt-1 inputfield" id="consultation_date" name="updateConsultationDate"   value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-12 text-start mt-4">
                                    <button type="submit" class="btn savebtn  mt-3 px-4 "> Submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <div class="card card-body main_card mt-2 shadow-lg p-3 mb-2">                              
                        <div class="table-responsive" id="result">
                            <table class="table table-hover mastertable" id="MasterTable token_tb" style="width: 100%;">
                                <thead class="table  tablehead">
                                    <tr>
                                        <!-- <th class="">Si No</th> -->
                                        <th>Token No</th>
                                        <th>Consultation No</th>
                                        <th>Op No</th>
                                        <th>Op Date</th>    
                                        <th>Name</th>                                                
                                        <th>Age</th>                                                
                                        <th>Gender</th>      
                                        <th>Patient Record</th>                                                                      
                                        <th>Case Sheet</th>                                                                                                                                     
                                        <th>Diet Chart</th>
                                        <th>BMI</th>                                                                                                                                          
                                    </tr>                                           
                                </thead>
                                <tbody id="tb">
                                <!-- <?php $cnt = 1; ?> -->
                                    <tr>
                                        <!-- <td><?php echo $cnt; $cnt++;?></td> -->
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
        </main><!-- End #main -->
        @include('layouts.footer')
        <script>

            $(document).on('submit','#token',(function(e){
                e.preventDefault();
                var TokenDoctor = $('#doctor').val();
                var TokenConDate = $('#consultation_date').val();
                var settings = {
                "url": "/api/getConsultationByDateandDoctor?date="+TokenConDate+"&doctorid="+TokenDoctor,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Accept": "application/json"
                },
                };
        
                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var TokenResult = JSON.stringify(response);
                    var TokenView = JSON.parse(TokenResult);
                    console.log(TokenResult);
                    if (TokenView.success == true) {
                        const TokenDataArray = TokenView.consultations;

                        const tb = document.getElementById("tb");
                        let tr = []; 
                        TokenDataArray.forEach(item => {
                            let gender = "";
                            if (item.gender === 1) {
                                gender = "Male";
                            } else if (item.gender === 2) {
                                gender = "Female";
                            } else if (item.gender === 3) {
                                gender = "Others";
                            }
                        tr.push('<tr><td>' + item.token_no + '</td>')
                        tr.push('<td>' + item.consultation_no + '</td>')
                        tr.push('<td>' + item.op_no + '</td>')
                        tr.push('<td>' + item.op_date + '</td>')
                        tr.push('<td>' + item.name + '</td>')
                        tr.push('<td>' + item.age + '</td>')
                        tr.push('<td>' + gender + '</td>')
                        tr.push('<td><a class="btn token_btn  text-nowrap me-2" href="PatientRecordId/' + item.id + '/' + item.op_id +'"> Patient Record</i></a></td>')
                        tr.push('<td><a class="btn token_btn  text-nowrap me-2" href="CaseSheets/' + item.id + '/' + item.op_id +'"> Case Sheet</i></a></td>')
                        tr.push('<td><a class="btn token_btn  text-nowrap me-2" href="DietChartById/' + item.id + '/' + item.op_id +'"> Diet Chart</i></a></td>')
                        tr.push('<td><a class="btn token_btn  text-nowrap me-2" href="BMIId/' + item.id + '/' + item.op_id +'">BMI</i></a></td></tr>')
                        })
                        tb.innerHTML = tr.join("");
                        document.getElementById("result");
                    }

                
                });
            }));

            //Focus First Field
            $(document).ready(function() {
                $('#doctor').focus();
            });
            
        </script>
    </body>
</html>