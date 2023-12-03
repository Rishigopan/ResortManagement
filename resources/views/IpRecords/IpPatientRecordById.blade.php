<!DOCTYPE html>
<html lang="en">

  <head>
  @include('layouts.headder')
  <title>IP Patient Record</title>

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
                <h4 class="d-flex justify-content-center py-1 contitle">IP Patient Records</h4>   
            </div>        
            <div class="text-end me-3">
                <a href="{{ url('/IpPatientRecordByIdView/' . $id) }}">
                    <button class="btn AddBtn px-4" >View</button> 
                </a>
            </div>            
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">                                         
                    <div class="card card-body main_card mt-2 shadow-lg p-3 mb-2">    
                        <ul class="nav nav-pills mb-3 justify-content-center nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-Patient-tab" data-bs-toggle="pill" data-bs-target="#pills-Patient" type="button" role="tab" aria-controls="pills-Patient" aria-selected="true">Patient Record</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-General-tab" data-bs-toggle="pill" data-bs-target="#pills-General" type="button" role="tab" aria-controls="pills-General" aria-selected="false"> General Physical Examination</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-Initial-tab" data-bs-toggle="pill" data-bs-target="#pills-Initial" type="button" role="tab" aria-controls="pills-Initial" aria-selected="false"> Initial Evaluation Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-Systemic-tab" data-bs-toggle="pill" data-bs-target="#pills-Systemic" type="button" role="tab" aria-controls="pills-Systemic" aria-selected="false" >Systemic Examination</button>
                            </li>
                        </ul>
                        <form class="PatientRecord AddForm" id="patient_record" novalidate>
                            {{ csrf_field() }}
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-Patient" role="tabpanel" aria-labelledby="pills-Patient-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-12">
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel">Ip No<span  style="color:red"> *</span></label><br>
                                                <select class="form-select inputfield IpNo" aria-label="Default select example name"id="ip_no" name="IpNo" required disabled>
                                                    @foreach ($ipno as $key )   
                                                    <option class="inputlabel" value="{{$key->id}}">{{$key->ip_no}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="12">
                                                <label class="mt-2 mb-1 inputlabel">Date</label><br>
                                                <input type="date" class="form-control mt-1 inputfield Date" id="date" name="Date" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                                            </div>
                                            <div class="12">
                                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                                <input type="text" class="form-control mt-1 inputfield PatientName" id="patient_name" name="PatientName" placeholder="Enter Your Name" autofocus disabled >
                                            </div>
                                            <div class="12">
                                                <label class="mt-2 mb-1 inputlabel">Age</label><br>
                                                <input type="text" class="form-control mt-1 inputfield Age" id="age" name="Age" placeholder="0" autofocus disabled>
                                            </div>
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield FullAddress" id="full_address" name="FullAddress" placeholder="" disabled></textarea>
                                            </div>
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel"> Primary Mobile Number</label><br>
                                                <input type="text" class="form-control mt-1 inputfield MobileNumber" id="mobile_number" name="MobileNumber" placeholder="Enter Mobile Number" autofocus disabled>
                                            </div>
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel"> Secondary Mobile Number</label><br>
                                                <input type="text" class="form-control mt-1 inputfield PhoneNumber" id="phone_number" name="PhoneNumber" placeholder="Enter Mobile number" autofocus disabled>
                                            </div>
                                            <div class="12">
                                                <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                                <input type="text" class="form-control mt-1 inputfield Occupation" id="occupation" name="Occupation" placeholder="Enter Your Occupation" autofocus disabled>
                                            </div>
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield LocalAddress" id="local_address" name="LocalAddress" placeholder="Enter Local Address" disabled></textarea>
                                            </div>                                               
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12">
                                            @foreach ($pr as $Patrec )
                                            <label class="mt-3 mb-1 inputlabel">{{$Patrec->field_name}}</label><br>
                                                @if ($Patrec->input_type == 'text')
                                                <textarea cols="30" rows="3" class="form-control mt-1 inputfield patientrec" id="{{$Patrec->name}}" name="{{$Patrec->name}}" data-records="{{$Patrec->id}}" placeholder=""></textarea>
                                                @endif
                                            @endforeach 
                                        </div>                                                       
                                    </div>  
                                </div>
                                <div class="tab-pane fade" id="pills-General" role="tabpanel" aria-labelledby="pills-General-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-12">   
                                            @foreach ($gpe as $genexam )
                                            @if ($genexam->input_type == 'check')
                                            <input class="form-check-input patientrec" type="checkbox" id="check{{$genexam->id}}" value="" name="{{$genexam->name}}" data-records="{{$genexam->id}}">
                                            <label class="form-check-label inputlabel me-2" for="check{{$genexam->id}}">
                                            {{$genexam->field_name}}
                                            </label>
                                            @endif
                                            @endforeach 
                                        </div>
                                        @foreach ($gpe as $generalexam )
                                        <div class="col-xl-6 col-lg-6 col-12">
                                            @if ($generalexam->input_type == 'text')
                                            <label class="mt-3 mb-1 inputlabel">{{$generalexam->field_name}} </label><br>
                                            <textarea cols="30" rows="1" class="form-control mt-1 inputfield patientrec" id="{{$generalexam->name}}" name="{{$generalexam->name}}" data-records="{{$generalexam->id}}" placeholder=""></textarea>
                                            @endif
                                        </div>
                                        @endforeach 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-Initial" role="tabpanel" aria-labelledby="pills-Initial-tab" tabindex="0">
                                    <div class="row">
                                        @foreach ($ied as $initialdetail )
                                        <div class="col-xl-6 col-lg-6 col-12">
                                            @if ($initialdetail->input_type == 'text')
                                            <label class="mt-3 mb-1 inputlabel">{{$initialdetail->field_name}} </label><br>
                                            <textarea cols="30" rows="1" class="form-control mt-1 inputfield patientrec" id="{{$initialdetail->name}}" name="{{$initialdetail->name}}" data-records="{{$initialdetail->id}}" placeholder=""></textarea>
                                            @endif
                                        </div>
                                        @endforeach                                       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-Systemic" role="tabpanel" aria-labelledby="pills-Systemic-tab" tabindex="0">
                                    <div class="row">
                                        @foreach ($se as $sysexam )
                                        <div class="col-xl-6 col-lg-6 col-12">
                                            @if ($sysexam->input_type == 'text')
                                            <label class="mt-3 mb-1 inputlabel">{{$sysexam->field_name}} </label><br>
                                            <textarea cols="30" rows="1" class="form-control mt-1 inputfield patientrec" id="{{$sysexam->name}}" name="{{$sysexam->name}}" data-records="{{$sysexam->id}}" placeholder=""></textarea>
                                            @endif
                                        </div>
                                        @endforeach  
                                    </div>
                                </div>
                            </div>
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Save</button>
                            </div>
                        </form>                                                        
                    </div>
                </div>
            </div>   

        </main><!-- End #main -->

        <!-- Response Modal -->
        @include('layouts.ResponseModals')    

        
        @include('layouts.footer')

        <script type="text/javascript">

            $(document).ready(function() {
                var x = [];

                function AddRecord(id, record) {
                    if ($("#check" + id).attr('type') == 'checkbox') {
                        record = ($("#check" + id).is(":checked")) ? 1 : 0;
                        x.push({ id: id, record: record });    
                    }else{
                        x.push({ id: id, record: record });    
                    }  
                }

                $("#patient_record").validate({
                    submitHandler: function(form) {

                        $('.patientrec').each(function() {
                            AddRecord($(this).data('records'), $(this).val());
                        });
                        var json = JSON.stringify(x);
                        var Ipno_id = $('#ip_no').val();
                        var Date = $('#date').val();
                        console.log(x);
                        $.ajax({
                            url: "/api/ippatient",
                            method: "POST",
                            timeout: 0,
                            headers: {
                                "Accept": "application/json",
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            data: {
                                ip_id: Ipno_id,
                                date: Date,
                                records: json
                            },beforeSend: function() {
                            $('.loader').show();
                           
                        },
                    }).done(function (response) {
                        $(".AddForm")[0].reset();
                        $('.loader').hide();
                        console.log(response);  
                        var PatientResult = JSON.stringify(response);
                        console.log(PatientResult);
                        var PatientResultObj = JSON.parse(PatientResult);
                        if (PatientResultObj.success == true) {
                            if (PatientResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (PatientResultObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (PatientResultObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Adding Failed");
                                $('#ResponseModal').modal('show');
                            }
                        } 
                        else 
                        {
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#ResponseModal').modal('show');
                        }  
                    });
                }
            });
        });

            //Function  show op details 
            function showopdetails(EditIp){
                console.log(EditIp);
                var settings = {
                    "url": "/api/ip/"+EditIp+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var OPResult = JSON.stringify(response);
                    console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);
                    if (OPedit.success == true) {

                        var OPDataArray = OPedit.ips;
                        for(const key in OPDataArray){
                            var OPId = OPDataArray['id'];
                            var OPNum = OPDataArray['op_no'];
                            var OPName = OPDataArray['name'];
                            var OPMail = OPDataArray['email'];
                            var OPOccupation = OPDataArray['occupation'];
                            var OPAge = OPDataArray['age'];
                            var OPMaritalStatus = OPDataArray['marital_status'];
                            var OPGender = OPDataArray['gender'];
                            var OPLocalAddress = OPDataArray['local_address'];
                            var OPFullAddress = OPDataArray['full_address'];
                            var OPPhoneNumber = OPDataArray['phone_no'];
                            var OPMobileNumber = OPDataArray['mobile_no'];
                            var OPLPhoneNo = OPDataArray['local_phone_no'];
                            var OPLMobNo = OPDataArray['local_mobile_no'];

                        }

                        $(".PatientName").val(OPName);
                        $(".update_mail").val(OPMail);
                        $(".Occupation").val(OPOccupation);
                        $(".Age").val(OPAge);
                        $(".MaritalStatus").val(OPMaritalStatus).change();
                        $(".Gender").val(OPGender).change();
                        $(".LocalAddress").val(OPLocalAddress);
                        $(".FullAddress").val(OPFullAddress);
                        $(".PhoneNumber").val(OPPhoneNumber);
                        $(".MobileNumber").val(OPMobileNumber);
                        $(".LocalPhoneNumber").val(OPLPhoneNo);
                        $(".LocalMobileNumber").val(OPLMobNo);
                    }
                });
            }

            //On Change op details 
            $(document).ready(function() {
                var EditIp = $('#ip_no').val();
                showopdetails(EditIp);
            });

            //Focus First Field
            $(document).ready(function() {
                $('#ip_no').focus();
            });

        </script>
    </body>
</html>