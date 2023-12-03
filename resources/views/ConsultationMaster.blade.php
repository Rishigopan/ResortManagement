<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headder')
    <title>Consultation</title>

    <style>
        .mainContents{
            display:none;
        }
    </style>
</head>

<body>
    <div class="modal fade addUpdateModal" id="ConsultationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Consultation</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="Consultation AddForm" id="consultation" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Consultation No</label><br>
                                <input disabled type="text" class="form-control mt-1 inputfield" id="consultation_no" name="ConsultationNo" placeholder="{{$max_consultation}}" autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Op No<span  style="color:red"> *</span></label><br>
                                <select class="inputfield OpNo SearchAndSelect" aria-label="Default select example name"id="op_no" name="OpNo">
                                    <option hidden value=""> Choose  Op Number</option>
                                    @foreach ($opno as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                    @endforeach                                                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Doctor<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield doctorfee" aria-label="Default select example name" id="doctor" name="Doctor">
                                <option hidden value=""> Choose  Doctor</option>
                                    @foreach ($doct as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Consultation Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield date" id="consultation_date" name="ConsultationDate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input  type="text" class="form-control mt-1 inputfield detailbold ConsultationName" id="consultation_name" name="ConsultationName"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">OP Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield detailbold OpDate" id="op_date" name="OpDate"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Age</label><br>
                                <input type="number" class="form-control mt-1 inputfield detailbold Age" id="age" name="Age" placeholder="0"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                <input type="text" class="form-control mt-1 inputfield detailbold Occupation" id="occupation" name="Occupation"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Gender</label><br>
                                <select class="form-select inputfield detailbold Gender" disabled aria-label="Default select example name"  id="gender" name="Gender">
                                <option hidden> Choose Gender</option>
                                <option value="1"> Male</option>
                                <option value="2"> Female</option>
                                <option value="3"> Others</option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Marital Status</label><br>
                                <select class="form-select inputfield detailbold MaritalStatus" disabled aria-label="Default select example name"  id="marital_status" name="MaritalStatus">
                                <option hidden> Choose Marital Status</option>
                                <option value="1"> Single</option>
                                <option value="2"> Married</option>
                                <option value="3"> Divorced</option>
                                <option value="4"> Widowed</option>                                           
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Primary Mobile Number</label><br>
                                <input type="text" class="form-control mt-1 inputfield detailbold MobileNumber" id="mobile_number" name="MobileNumber"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                <input type="text" class="form-control mt-1 inputfield detailbold PhoneNumber" id="pobile_number" disabled name="PhoneNumber"  autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Local Address</label><br>
                                <textarea   cols="30" rows="2" class="form-control mt-1 detailbold inputfield LocalAddress" id="local_address" name="LocalAddress"  disabled></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Full Address</label><br>
                                <textarea   cols="30" rows="2" class="form-control mt-1 detailbold inputfield FullAddress" id="full_address" name="FullAddress"  disabled></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 d-flex">
                                <div class="col-6 mt-4">
                                    <input class="form-check-input" type="checkbox" id="fees_check" value="" name="">
                                    <label class="form-check-label inputlabel me-2"> Check to collect Fees</label>
                                </div>
                                <div class="col-6">
                                    <label class="mt-2 mb-1 inputlabel">Consultation Fees</label><br>
                                    <input type="text" class="form-control mt-1 inputfield ConFee" id="consult_fee" name="ConsultFee" >
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mode Of Pay<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="mode_pay" name="ModePay" required>
                                    <option hidden value=""> Choose  Payment type</option>
                                    @foreach ($modeofpay as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="branch" name="Branch">
                                    <option class="inputlabel" hidden value=""> Choose Branch</option>
                                    @foreach ($branch as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>
                            <div class="mt-3">
                                <p class="AddForm">Last visit before <span class="lastVisitedDays"></span> Days</p>
                            </div>
                        </div>
                        <div class=" text-end mt-2">
                            <button type="submit" class="btn savebtn  px-5 "> Save</button>
                        </div>
                    </form> 
                    <form class="UpdateConsultation UpdateForm" id="update_consultation" style="display: none;"novalidate>
                        <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden"  id="update_consult_id" >
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Consultation No</label><br>
                                <input disabled type="text" class="form-control mt-1 inputfield" id="update_consultation_no" name="update_ConsultationNo" placeholder="BET/CON/000.../21-.." autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Doctor<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield doctorfee" aria-label="Default select example name"id="update_doctor" name="updateDoctor">
                                <option value=""> Choose  Doctor</option>
                                    @foreach ($doct as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Op No<span  style="color:red"> *</span></label><br>
                                <select class="inputfield OpNo SearchAndSelect" aria-label="Default select example name"id="update_op_no" name="updateOpNo">
                                    <option value=""> Choose  Op Number</option>
                                    @foreach ($opno as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                    @endforeach                                                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Consultation Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield" id="update_consultation_date" name="updateConsultationDate"  autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input  type="text" class="form-control mt-1 inputfield detailbold ConsultationName" id="consultation_name" name="ConsultationName"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">OP Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield detailbold OpDate" id="op_date" name="OpDate"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Age</label><br>
                                <input type="text" class="form-control mt-1 inputfield detailbold Age" id="age" name="Age" placeholder="0"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                <input type="text" class="form-control mt-1 inputfield detailbold Occupation" id="occupation" name="Occupation"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Gender</label><br>
                                <select class="form-select inputfield Gender detailbold" disabled aria-label="Default select example name"  id="gender" name="Gender">
                                <option value="1"> Male</option>
                                <option value="2"> Female</option>
                                <option value="3"> Others</option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Marital Status</label><br>
                                <select class="form-select inputfield detailbold" disabled aria-label="Default select example name MaritalStatus"  id="marital_status" name="MaritalStatus">
                                <option value="1"> Single</option>
                                <option value="2"> Married</option>
                                <option value="3"> Divorced</option>
                                <option value="4"> Widowed</option>                                           
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Primary Mobile Number</label><br>
                                <input type="text" class="form-control mt-1 inputfield MobileNumber detailbold" id="mobile_number" name="MobileNumber"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                <input type="text" class="form-control mt-1 inputfield PhoneNumber detailbold" id="pobile_number" disabled name="PhoneNumber"  autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Local Address</label><br>
                                <textarea   cols="30" rows="2" class="form-control mt-1 inputfield LocalAddress detailbold" id="local_address" name="LocalAddress"  disabled></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Full Address</label><br>
                                <textarea   cols="30" rows="2" class="form-control mt-1 inputfield FullAddress detailbold" id="full_address" name="FullAddress"  disabled></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 d-flex">
                                <div class="col-6 mt-4">
                                    <input class="form-check-input" type="checkbox" id="Update_fees_check" value="" name="">
                                    <label class="form-check-label inputlabel me-2"> Check to collect Fees</label>
                                </div>
                                <div class="col-6">
                                    <label class="mt-2 mb-1 inputlabel">Consultation Fees</label><br>
                                    <input type="text" class="form-control mt-1 inputfield ConFee" id="update_consult_fee" name="UpdateConsultFee">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mode Of Pay<span  style="color:red"> *</span></label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="update_mode_pay" name="updateModePay" required>
                                    <option value=""> Choose  Payment type</option>
                                    @foreach ($modeofpay as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                <select class="form-select inputfield " aria-label="Default select example name"id="update_branch" name="UpdateBranch">
                                    <option class="inputlabel" hidden value=""> Choose Branch</option>
                                    @foreach ($branch as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>
                        </div>
                        <div class=" text-end mt-2">
                                <button type="submit" class="btn savebtn  px-5 "> Update</button>
                        </div>
                    </form>                                
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade addUpdateModal " id="ViewConsultationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header modelhead py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Consultation </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="ViewConsultation UpdateForm" id="view_consultation" style="display: none;"novalidate>
                        <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden"  id="view_consult_id" >
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Consultation No</label><br>
                                <input disabled type="text" class="form-control mt-1 inputfield" id="view_consultation_no" name="view_ConsultationNo" placeholder="BET/CON/000.../21-.." autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Doctor</label><br>
                                <select class="form-select inputfield" disabled aria-label="Default select example name"id="view_doctor" name="view_Doctor">
                                <option value=""> Choose  Doctor</option>
                                    @foreach ($doct as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Op No</label><br>
                                <select class="form-select inputfield OpNo" disabled aria-label="Default select example name"id="view_op_no" name="view_OpNo">
                                    <option value=""> Choose  Op Number</option>
                                    @foreach ($opno as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                    @endforeach                                                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Consultation Date</label><br>
                                <input type="date" disabled class="form-control mt-1 inputfield" id="view_consultation_date" name="updateConsultationDate"  autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                <input  type="text" class="form-control mt-1 inputfield ConsultationName" id="consultation_name" name="ConsultationName"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">OP Date</label><br>
                                <input type="date" class="form-control mt-1 inputfield OpDate" id="op_date" name="OpDate"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Age</label><br>
                                <input type="text" class="form-control mt-1 inputfield Age" id="age" name="Age" placeholder="0"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                <input type="text" class="form-control mt-1 inputfield Occupation" id="occupation" name="Occupation"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Gender</label><br>
                                <select class="form-select inputfield Gender" disabled aria-label="Default select example name"  id="gender" name="Gender">
                                <option value="1"> Male</option>
                                <option value="2"> Female</option>
                                <option value="3"> Others</option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Marital Status</label><br>
                                <select class="form-select inputfield" disabled aria-label="Default select example name MaritalStatus"  id="marital_status" name="MaritalStatus">
                                <option value="1"> Single</option>
                                <option value="2"> Married</option>
                                <option value="3"> Divorced</option>
                                <option value="4"> Widowed</option>                                           
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Primary Mobile Number</label><br>
                                <input type="text" class="form-control mt-1 inputfield MobileNumber" id="mobile_number" name="MobileNumber"  disabled autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                <input type="text" class="form-control mt-1 inputfield PhoneNumber" id="pobile_number" disabled name="PhoneNumber"  autofocus required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Local Address</label><br>
                                <textarea   cols="30" rows="2" class="form-control mt-1 inputfield LocalAddress" id="local_address" name="LocalAddress"  disabled></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Full Address</label><br>
                                <textarea   cols="30" rows="2" class="form-control mt-1 inputfield FullAddress" id="full_address" name="FullAddress"  disabled></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Consultation Fees</label><br>
                                <input type="text" class="form-control mt-1 inputfield ConFee" id="view_consult_fee" name="ViewConsultFee"  disabled >
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-2 mb-1 inputlabel">Mode Of Pay</label><br>
                                <select class="form-select inputfield" aria-label="Default select example name"id="view_mode_pay" name="viewModePay" disabled >
                                    <option value=""> Choose  Payment type</option>
                                    @foreach ($modeofpay as $key )   
                                    <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                    @endforeach                                                                                 
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-3 mb-1 inputlabel">Branch</label><br>
                                <select class="form-select inputfield " disabled aria-label="Default select example name"id="view_branch" name="ViewBranch">
                                <option class="inputlabel" hidden value=""> Choose Branch</option>
                                    @foreach ($branch as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->branch_name}} </option>
                                    @endforeach                                                                           
                                </select>
                            </div>
                        </div>
                        <div class=" text-end mt-3">
                            <button type="button" class="btn savebtn  px-5 "data-bs-dismiss="modal" aria-label="Close">Close</button>
                        </div>  
                    </form>                             
                </div>
            </div>
        </div>
    </div>
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
                <h4 class="d-flex justify-content-center py-1 contitle">Consultation</h4>                                    
            </div>
            
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="card card-body main_card mt-2 p-3 mb-2">
                        <div class="main_heading d-flex justify-content-between mb-2 p-2">
                            <div id="exportbtns"class="exportbtns">
                                <!-- export buttons -->
                            </div>
                            <div class="">
                                <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#ConsultationModal">+Add</button> 
                            </div>
                        </div>
                        <div>
                            <table class="table  table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="  tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">Consultation No</th>
                                        <th class="text-center">OP No</th>
                                        <th class="text-center">Consultation Date</th>
                                        <th class="text-center">Doctor</th>                                                
                                        <th class="text-center">Actions</th>
                                    </tr>                                           
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
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
        </main>
       
  </main><!-- End #main -->
  @include('layouts.footer')
    <script type="text/javascript">

        //Data Table

        $('.MasterTable thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('.MasterTable thead');
            var MasterTable = $('.MasterTable').DataTable({
                processing: true,
                orderCellsTop: true,
                fixedHeader: true,
                "dom": 'Blrt<"bottom"ip>',
                "pagingType": 'simple_numbers',
                "language": {
                    "paginate": {
                        "previous": "<i class='bi bi-caret-left-fill'></i>",
                        "next": "<i class='bi bi-caret-right-fill'></i>"
                    }
                },    
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },  
                ],
                
                initComplete: function () {
                    $("#MasterTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                    var api = this.api();
                        // For each column
                    api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        if (colIdx < api.columns().nodes().length - 1) {
                            $(cell).html('<input type="text" class="text-center searchcolumn" placeholder="Search" />');
                        } else {
                            $(cell).empty();
                        }     
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
                                // var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();
    
                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    // .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
                    $('.dt-buttons').appendTo('#exportbtns');
                },
            
            ajax: "{{ route('Consultation.consultation') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'consultation_no', name: 'consultation_no'}, 
                {data: 'op_no', name: 'op_no'},
                {data: 'consultation_date', name: 'consultation_date'}, 
                {data: 'name', name: 'name'},                  
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });


        //Function  show op details 

        function showopdetails(EditOP){
            console.log(EditOP);
            var settings = {
                "url": "/api/op/"+EditOP+"",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                var OPResult = JSON.stringify(response);
                console.log(OPResult);
                var OPedit = JSON.parse(OPResult);
                if (OPedit.success == true) {

                    var OPDataArray = OPedit.ops;
                    for(const key in OPDataArray){
                        var OPId = OPDataArray['id'];
                        var OPNum = OPDataArray['op_no'];
                        var OPDate = OPDataArray['op_date'];
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


                    }

                    console.log(OPNum);
                   
                    //$("#update_op_no").val(OPNum);
                    $(".OpDate").val((OPDate.slice(0,10)));
                    $(".ConsultationName").val(OPName);
                    $(".update_mail").val(OPMail);
                    $(".Occupation").val(OPOccupation);
                    $(".Age").val(OPAge);
                    $(".MaritalStatus").val(OPMaritalStatus).change();
                    $(".Gender").val(OPGender).change();
                    $(".LocalAddress").val(OPLocalAddress);
                    $(".FullAddress").val(OPFullAddress);
                    $(".PhoneNumber").val(OPPhoneNumber);
                    $(".MobileNumber").val(OPMobileNumber);

                }
            });
        }


        //On Change op details 

        $(document).on('change','.OpNo',(function(){
            var EditOP = $(this).val();
            showopdetails(EditOP);
        }));


        

        //On Change Consultation Fees
        
        $(document).on('change','.doctorfee',(function(){
            var ConfeeDr = $(this).val();
            var ConfeeOp = $('.OpNo').val();
            var ConDate = $('.date').val();
            showfees(ConfeeDr,ConfeeOp,ConDate);
        }));


        
        //Function Show Consultation Fees

        function showfees(ConfeeDr ,ConfeeOp, ConDate){
            console.log(ConfeeDr,ConfeeOp,ConDate);
            var settings = {
                "url": "/api/calculateFees?opid="+ConfeeOp+"&doctorid="+ConfeeDr+"&condate="+ConDate,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Accept": "application/json"
                },
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                console.log(response.consultations.consultationFee);
                if (response.success == true) {
                    $(".ConFee").val(response.consultations.consultationFee);
                    // Update last visited days
                    $(".lastVisitedDays").text(response.consultations.lastVisitedDays);
                    if (response.consultations.checkConsultationExists == 1) {
                        $("#fees_check").prop("checked", true);
                    } else {
                        $("#fees_check").prop("checked", false);
                    }
                }
            });
        }

        //Add Consultations

        $("#consultation").validate({
            rules:{
                Doctor:{
                    required: true,                    
                },
                OpNo:{
                    required: true,                    
                },
                ConsultationDate:{
                    required: true,                    
                }      
            },
            submitHandler: function(form) {
                var ConDate = $('#consultation_date').val();
                var ConOP = $('#op_no').val();
                var ConDoct = $('#doctor').val();
                var ConFees = $('#fees_check').is(':checked') ? $('#consult_fee').val() : 0;
                var ConPaymentMethod = $('#mode_pay').val();
                var ConBranch = $('#branch').val();


                $.ajax({
                    url: "/api/consultation",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        consultation_date: ConDate,
                        op_id: ConOP,
                        doctor_id: ConDoct,
                        consultation_fees:ConFees,
                        mode_of_payment_id:ConPaymentMethod,
                        branch_id: ConBranch 

                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#ConsultationModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function (response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var DeptResult = JSON.stringify(response);
                    console.log(DeptResult);
                    var DeptResultObj = JSON.parse(DeptResult);
                    if (DeptResultObj.success == true) {
                        if (DeptResultObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("This Record is Already Present");   
                            $('#ResponseModal').modal('show');
                        } else if (DeptResultObj.code == "1") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Record Added Successfully");
                            $('#ResponseModal').modal('show');
                        } else if (DeptResultObj.code == "2") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Record Adding Failed");
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



        //edit Consultations
        $('#MasterTable').on('click', '.btn_edit', function () {
            var EditConsult = $(this).val();
            console.log(EditConsult);
            var settings = {
                "url": "/api/consultation/"+EditConsult+"",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                var ConsultResult = JSON.stringify(response);
                console.log(ConsultResult);
                var Consultedit = JSON.parse(ConsultResult);
                if (Consultedit.success == true) {
                    $('#ConsultationModal').modal('show');
                    $('#consultation').hide();
                    $('#update_consultation').show();
                    var ConsultDataArray = Consultedit.consultations;
                    for(const key in ConsultDataArray){
                        var ConsultNo = ConsultDataArray['consultation_no'];
                        var ConsultDate = ConsultDataArray['consultation_date'];
                        var ConsultOpId = ConsultDataArray['op_id'];
                        var ConsultDoctorId = ConsultDataArray['doctor_id'];
                        var ConsultDoctorFee = ConsultDataArray['consultation_fees'];
                        var ConsultPayment = ConsultDataArray['mode_of_payment_id'];
                        var ConsultId = ConsultDataArray['id'];
                        var ConsultBranch = ConsultDataArray['branch_id'];

                    }
                    $("#update_consultation_no").val(ConsultNo);
                    $("#update_consultation_date").val((ConsultDate.slice(0,10)));
                    $('#update_op_no').data('selectize').setValue(ConsultOpId);
                    $("#update_doctor").val(ConsultDoctorId);
                    $("#update_consult_id").val(ConsultId);
                    $("#update_consult_fee").val(ConsultDoctorFee);
                    $("#update_mode_pay").val(ConsultPayment);
                    $("#update_branch").val(ConsultBranch);

                    if (parseFloat(ConsultDoctorFee) > 0) {
                        $('#Update_fees_check').prop('checked', true);
                    } else {
                        $('#Update_fees_check').prop('checked', false);
                    }

                    showopdetails(ConsultOpId);

                }
            });        
        });




        //Update Consultation

        $("#update_consultation").validate({
            rules:{
                updateDoctor:{
                    required: true,                    
                },
                updateOpNo:{
                    required: true,                    
                },
                updateConsultationDate:{
                    required: true,                    
                }      
            },
            submitHandler: function(form) {
                var UpdateId = $('#update_consult_id').val(); 
                var ConNo = $('#update_consultation_no').val();                              
                var ConDate = $('#update_consultation_date').val();
                var ConOP = $('#update_op_no').val();
                var ConDoct = $('#update_doctor').val();
                var UConFee = $('#Update_fees_check').is(':checked') ? $('#update_consult_fee').val() : 0;
                var UConPayment = $('#update_mode_pay').val();
                var UConBranch = $('#update_branch').val();


                $.ajax({
                    url: "/api/consultation/"+UpdateId+"",
                    method: "PUT",
                    timeout: 0, 
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        consultation_date: ConDate,
                        op_id: ConOP,
                        doctor_id: ConDoct,
                        consultation_no: ConNo,
                        consultation_fees:UConFee,
                        mode_of_payment_id:UConPayment,
                        branch_id: UConBranch,

                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#ConsultationModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function (response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var ConsultUpdate = JSON.stringify(response);
                    console.log(ConsultUpdate);

                    var ConsultUpdateed = JSON.parse(ConsultUpdate);
                            if (ConsultUpdateed.success == true) {
                            if (ConsultUpdateed.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("This Record is Already Present");     
                            $('#ResponseModal').modal('show');
                        } else if (ConsultUpdateed.code == "1") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Record Updated Successfully");
                            $('#ResponseModal').modal('show');
                        } else if (ConsultUpdateed.code == "2") {
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



            
        //Delete Department
        $('#MasterTable').on('click', '.btn_delete', function () {
            $('.delModal').modal('show');
            var DeleteConsult = $(this).val();
            $('#confirmYes').click(function(){
                
                console.log(DeleteConsult);
                $.ajax({
                    "url": "/api/consultation/"+DeleteConsult+"",
                    "method": "DELETE",
                    "timeout": 0,
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/x-www-form-urlencoded"
                },
                beforeSend: function() {
                    $('.loader').show();
                    $('.delModal').modal('hide');
                    $('.mainContents').hide();
                    $('#ResponseImage').html("");
                    $('#ResponseText').text("");
                },
                }).done(function (response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var ConsultDeleteResult = JSON.stringify(response);
                    console.log(ConsultDeleteResult); 
                    var ConsultDelObj = JSON.parse(ConsultDeleteResult);
                    if (ConsultDelObj.success == true) {  
                        if (ConsultDelObj.code == "0") {
                        $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                        $('#ResponseText').text(ConsultDelObj.message);
                        $('#ResponseModal').modal('show');
                        } else if (ConsultDelObj.code == "1") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(ConsultDelObj.message);
                            $('#ResponseModal').modal('show');
                        } else if (ConsultDelObj.code == "2") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(ConsultDelObj.message);
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
            });
        });
            
                

        //View Consultation
        $('#MasterTable').on('click', '.btn_view', function () {
            var ViewConsult = $(this).val();
            console.log(ViewConsult);
            var settings = {
                "url": "/api/consultation/"+ViewConsult+"",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                var ConsultResult = JSON.stringify(response);
                console.log(ConsultResult);
                var Consultedit = JSON.parse(ConsultResult);
                if (Consultedit.success == true) {
                    $('#ViewConsultationModal').modal('show');
                    $('#view_consultation').show();
                    var ConsultDataArray = Consultedit.consultations;
                    for(const key in ConsultDataArray){
                        var ConsultNo = ConsultDataArray['consultation_no'];
                        var ConsultDate = ConsultDataArray['consultation_date'];
                        var ConsultOpId = ConsultDataArray['op_id'];
                        var ConsultDoctorId = ConsultDataArray['doctor_id'];
                        var ConsultDoctorFee = ConsultDataArray['consultation_fees'];
                        var ConsultPaymentview = ConsultDataArray['mode_of_payment_id'];
                        var ConsultId = ConsultDataArray['id'];
                        var ConsultBranch = ConsultDataArray['branch_id'];

                    }
                    $("#view_consultation_no").val(ConsultNo);
                    $("#view_consultation_date").val((ConsultDate.slice(0,10)));
                    $("#view_op_no").val(ConsultOpId);
                    $("#view_doctor").val(ConsultDoctorId);
                    $("#view_consult_id").val(ConsultId);
                    $("#view_consult_fee").val(ConsultDoctorFee);
                    $("#view_mode_pay").val(ConsultPaymentview);
                    $("#view_branch").val(ConsultBranch);


                    showopdetails(ConsultOpId);

                }
            });         
        
        });
        
        //Focus First Field
        $(document).ready(function() {
            $('#ConsultationModal').on('shown.bs.modal', function() {
                $('#op_no').focus();
            });
        });
            
        

    </script>

</body>

</html>