<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Patient Record</title>
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
            <div class="container-fluid">
                <h4 class="d-flex justify-content-center py-1 contitle">Patient Records Edit</h4>   
            </div>        
            <div class="text-end me-3">
                <a href="{{url('/PatientRecordView')}}">
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
                        <form class="PatientRecord UpdateForm" id="patient_record" novalidate>
                        {{ csrf_field() }}
                            <input type="hidden"  id="update_record_id" value="{{$id}}">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-Patient" role="tabpanel" aria-labelledby="pills-Patient-tab" tabindex="0">
                                <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-12">
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel">Op No<span  style="color:red"> *</span></label><br>
                                                <select class="form-select inputfield OpNo" aria-label="Default select example name"id="op_no" name="OpNo" disabled>
                                            @foreach ($opno as $key )   
                                                    <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                                   
                                                </select>
                                            </div>
                                            <div class="12">
                                                <label class="mt-2 mb-1 inputlabel">Date</label><br>
                                                <input type="date" class="form-control mt-1 inputfield Date" id="date" name="Date" value="{{$key->date}}" disabled required>
                                            </div>
                                            <div class="12">
                                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                                <input type="text" class="form-control mt-1 inputfield PatientName" id="patient_name" name="PatientName" value="{{$key->name}}"  disabled >
                                            </div>
                                            <div class="12">
                                                <label class="mt-2 mb-1 inputlabel">Age</label><br>
                                                <input type="text" class="form-control mt-1 inputfield Age" id="age" name="Age"  value="{{$key->age}}" disabled >
                                            </div>
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                                <textarea cols="30" rows="2" class="form-control mt-1 inputfield FullAddress" id="full_address" name="FullAddress" disabled>{{$key->full_address}}</textarea>
                                            </div>
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel">Primary Mobile Number</label><br>
                                                <input type="text" class="form-control mt-1 inputfield MobileNumber" id="mobile_number" name="MobileNumber"  value="{{$key->mobile_no}}" disabled >
                                            </div>
                                            <div class="12">
                                                <label class="mt-3 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                                <input type="text" class="form-control mt-1 inputfield PhoneNumber" id="phone_number" name="PhoneNumber"  value="{{$key->phone_no}}" disabled>
                                            </div>
                                            <div class="12">
                                            <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                            <input type="text" class="form-control mt-1 inputfield Occupation" id="occupation" name="Occupation"  value="{{$key->occupation}}" disabled >
                                            </div>
                                            <div class="12">
                                            <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                            <textarea cols="30" rows="2" class="form-control mt-1 inputfield LocalAddress" id="local_address" name="LocalAddress" disabled>{{$key->local_address}}</textarea>
                                            </div>                                                
                                        </div>
                                        @endforeach
                                        <div class="col-xl-6 col-lg-6 col-12">
                                            @foreach ($pr as $Patrec )
                                                <label class="mt-3 mb-1 inputlabel">{{$Patrec->field_name}}</label><br>
                                                @if ($Patrec->input_type == 'text')
                                                    @foreach($jsonresult as $jsonresults)
                                                        @if ($Patrec->id == $jsonresults['id'])
                                                           @php 
                                                            $Value = $jsonresults['record']
                                                           @endphp
                                                        @endif
                                                    @endforeach
                                                    <textarea cols="30" rows="3" class="form-control mt-1 inputfield patientrec" id="{{$Patrec->name}}" name="{{$Patrec->name}}" data-records="{{$Patrec->id}}" disabled>{{$Value}}</textarea>
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
                                                    @foreach($jsonresult as $jsonresults)
                                                        @if ($genexam->id == $jsonresults['id'])
                                                            @php 
                                                            $Value = $jsonresults['record']
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <input class="form-check-input patientrec" disabled type="checkbox" value="" id="check{{$genexam->id}}" name="{{$genexam->name}}" data-records="{{$genexam->id}}" @if($Value == '1') checked @endif>                                      
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
                                                @foreach($jsonresult as $jsonresults)
                                                    @if ($generalexam->id == $jsonresults['id'])
                                                        @php 
                                                        $Value = $jsonresults['record']
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            <textarea cols="30" rows="1" class="form-control mt-1 inputfield patientrec" id="{{$generalexam->name}}" name="{{$generalexam->name}}" data-records="{{$generalexam->id}}" disabled>{{$Value}}</textarea>
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
                                                @foreach($jsonresult as $jsonresults)
                                                    @if ($initialdetail->id == $jsonresults['id'])
                                                        @php 
                                                        $Value = $jsonresults['record']
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            <textarea cols="30" rows="1" class="form-control mt-1 inputfield patientrec" id="{{$initialdetail->name}}" name="{{$initialdetail->name}}" data-records="{{$initialdetail->id}}" disabled>{{$Value}}</textarea>
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
                                                @foreach($jsonresult as $jsonresults)
                                                    @if ($sysexam->id == $jsonresults['id'])
                                                        @php 
                                                        $Value = $jsonresults['record']
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            <textarea cols="30" rows="1" class="form-control mt-1 inputfield patientrec" id="{{$sysexam->name}}" name="{{$sysexam->name}}" data-records="{{$sysexam->id}}" disabled>{{$Value}}</textarea>
                                            @endif
                                        </div>
                                        @endforeach  
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class=" text-end mt-3">
                                <a href="{{url('/PatientRecordView')}}">
                                    <button class="btn savebtn px-5" >Close</button> 
                                </a>
                            </div>
                    </div>
                </div>
            </div>   
        </main><!-- End #main -->
        <!-- Response Modal -->
        @include('layouts.ResponseModals') 
        @include('layouts.footer')

      

    </body>

</html>