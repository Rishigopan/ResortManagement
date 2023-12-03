<!DOCTYPE html>
<html lang="en">

  <head>
  @include('layouts.headder')
  <title>IP</title>

  </head>

  <body>

         <!-- ======= Header ======= -->
    
        <header id="header" class="header fixed-top d-flex align-items-center">
            @include('layouts.navbar')
            <style>
                .mainContents{
                    display:none;
                }
            </style>
        </header>

        <!-- End Header -->

        <!-- ======= Sidebar ======= -->

        <aside id="sidebar" class="sidebar ps-0">
            @include('layouts.sidebar')
        </aside>
 
        <!-- End Sidebar-->

        <main id="main" class="main">

        <div class="modal fade addUpdateModal" id="IpModal" tabindex="-1" data-bs-backdrop="static"  data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">IP</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="AddOp AddForm" id="add_ip" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Ip No<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="Ip_no" name="IpNo" placeholder="{{$max_ip}}" disabled autofocus >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Op No<span  style="color:red"> *</span></label><br>
                                    <select class="SearchAndSelect inputfield OpNo mt-1" aria-label="Default select example name"id="op_id" name="OpNo"required>
                                        <option hidden value=""> Choose  Op Number</option>
                                        @foreach ($Op as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                        @endforeach                                                                                 
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Ip Date<span  style="color:red"> *</span></label><br>
                                    <input type="date" class="form-control mt-1 inputfield date" id="Ip_date" name="IpDate" value="<?php echo date('Y-m-d'); ?>" autofocus required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Room Type<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield RoomTypeid" aria-label="Default select example name"id="room_type" name="RoomType" required>
                                        <option class="inputlabel" hidden value=""> Choose Room Type</option>
                                        @foreach ($RoomType as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach 
        
                                        </select>  
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Room<span  style="color:red"> *</span></label><br>
                                    
                                    <select class="form-select inputfield RoomNumId" aria-label="Default select example name"id="Room" name="Room" required>
                                        <option class="inputlabel" hidden value=""> Choose Room</option>
                                        @foreach ($Room as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->room_no}} </option>
                                        @endforeach 
        
                                        </select>  
                                </div>
                                <!-- <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Consultation</label><br>
                                    <select class="form-select inputfield " aria-label="Default select example name" id="consultation_id"  name="consultation_id">
                                        <option class="inputlabel" hidden value="">Choose Consultation</option>
                                        @foreach ($Con as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->consultation_no}} </option>
                                        @endforeach 
        
                                        </select>
                                </div> -->
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield ConsultationName" id="name" name="Name"  autofocus required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                    <input type="text" class="form-control mt-1 inputfield Occupation" id="occupation" name="Occupation" autofocus >
                                </div>
                               
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Age<span  style="color:red"> *</span></label><br>
                                    <input type="number" min="1" class="form-control mt-1 inputfield Age" id="age" name="Age" placeholder="" autofocus required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Marital Status</label><br>
                                    <select class="form-select inputfield MaritalStatus" aria-label="Default select example name"id="marital_status"  name="MaritalStatus">
                                    <option hidden value=""> Select Marital Status</option>
                                    <option value="1"> Single</option>
                                    <option value="2"> Married</option>
                                    <option value="3"> Divorced</option>
                                    <option value="4"> Widowed</option>                                           
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Gender<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield Gender" aria-label="Default select example name"id="gender"  name="Gender" required>
                                    <option hidden value=""> Select Gender</option>
                                    <option value="1"> Male</option>
                                    <option value="2"> Female</option>
                                    <option value="3"> Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Email Id</label><br>
                                    <input type="email" class="form-control mt-1 inputfield update_mail" id="email" name="Email"  autofocus >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                    <textarea   cols="30" rows="2" class="form-control mt-1 inputfield LocalAddress" id="local_address" name="LocalAddress" ></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                    <textarea   cols="30" rows="2" class="form-control mt-1 inputfield FullAddress" id="full_address" name="FullAddress" ></textarea>
                                </div>           
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Primary Mobile Number<span  style="color:red"> *</span></label><br>
                                    <input type="number" class="form-control mt-1 inputfield MobileNumber" id="mobile_number" name="MobileNumber"  autofocus required>
                                </div>                     
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                    <input type="number" class="form-control mt-1 inputfield PhoneNumber" id="phone_number" name="PhoneNumber" autofocus >
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
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Consultation Doctor<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield doctorfee" aria-label="Default select example name" id="doctor" name="Doctor" required>
                                        <option hidden value=""> Choose  Doctor</option>
                                        @foreach ($doct as $key )   
                                            <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach                                                 
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 d-flex">
                                    <div class="col-6 mt-4">
                                        <input class="form-check-input" type="checkbox" id="fees_check" value="" name="">
                                        <label class="form-check-label inputlabel me-2"> Check to collect Fees</label>
                                    </div>
                                    <div class="col-6">
                                        <label class="mt-2 mb-1 inputlabel">Consultation Fees</label><br>
                                        <input type="text" class="form-control mt-1 inputfield ConFee" id="consult_fee" name="ConsultFee" value="0">
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
                                <div class="mt-3">
                                    <p class="AddForm">Last visit before <span class="lastVisitedDays"></span> Days</p>
                                </div>
                            </div>

                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Save</button>
                            </div>
                        </form>
                        <form class="UpdateAddOp UpdateForm" id="update_add_ip" style="display: none;" novalidate>
                           {{ csrf_field() }}
                            <div class="row">
                                <input type="hidden"  id="update_ip_id" >
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Ip No<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_ip_no" name="UpdateIpNo" autofocus disabled required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Op No<span  style="color:red"> *</span></label><br>
                                    <select class="SearchAndSelect inputfield OpNo mt-1" aria-label="Default select example name"id="update_op_no" name="OpNo" required>
                                        @foreach ($Op as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                        @endforeach                                                                                 
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Ip Date<span  style="color:red"> *</span></label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="update_ip_date" name="UpdateIpDate" autofocus required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Room Type<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield RoomTypeid" aria-label="Default select example name" id="Update_room_type" name="RoomType">
                                        @foreach ($RoomType as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                                        @endforeach 
        
                                        </select>  
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Room<span  style="color:red"> *</span></label><br>
                                    
                                    <select class="form-select inputfield RoomNumId" aria-label="Default select example name"id="update_Room" name="Room">
                                        @foreach ($Room as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->room_no}} </option>
                                        @endforeach 
        
                                        </select>  
                                </div>
                                <!-- <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Consultation</label><br>
                                    <select class="form-select inputfield " aria-label="Default select example name" id="update_consultation_id"  name="consultation_id">
                                        @foreach ($Con as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->consultation_no}} </option>
                                        @endforeach 
        
                                        </select>
                                </div>                                -->
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name<span  style="color:red"> *</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_name" name="UpdateName"  autofocus required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="update_occupation" name="UpdateOccupation"  autofocus >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Age<span  style="color:red"> *</span></label><br>
                                    <input type="number" min="1" class="form-control mt-1 inputfield" id="update_age" name="UpdateAge"  autofocus required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Marital Status</label><br>
                                    <select class="form-select inputfield " aria-label="Default select example name"id="update_marital_status" name="UpdateMaritalStatus">
                                    <option value="1"> Single</option>
                                    <option value="2"> Married</option>
                                    <option value="3"> Divorced</option>
                                    <option value="4"> Widowed</option>                                           
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Gender<span  style="color:red"> *</span></label><br>
                                    <select class="form-select inputfield" aria-label="Default select example name"id="update_gender" name="UpdateGender">
                                    <option value="1"> Male</option>
                                    <option value="2"> Female</option>
                                    <option value="3"> Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Email Id</label><br>
                                    <input type="email" class="form-control mt-1 inputfield" id="update_email" name="UpdateMail" autofocus >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                    <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_local_address" name="UpdateLocalAddress"></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                    <textarea  cols="30" rows="2" class="form-control mt-1 inputfield" id="update_full_address" name="UpdateFullAddress" ></textarea>
                                </div>     
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Primary Mobile Number<span  style="color:red"> *</span></label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="update_mobile_number" name="UpdateMobileNumber"autofocus required>
                                </div>                           
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                    <input type="number" class="form-control mt-1 inputfield" id="update_phone_number" name="UpdatePhoneNumber" autofocus >
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
                            <div class=" text-end mt-3">
                                <button type="submit" class="btn savebtn  px-5 ">Update</button>
                            </div>
                        </form>                                
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade addUpdateModal" id="IPViewModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content cntrymodalbg">
                    <div class="modal-header modelhead py-2">
                        <h6 class="modal-title" id="exampleModalLabel">IP</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="UpdateAddOp ViewForm" id="view_add_ip" style="display: none;" novalidate>
                            <div class="row">
                                <input type="hidden"  id="view_ip_id" >
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Ip No</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_ip_no" name="UpdateIpNo" autofocus disabled >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Op No</label><br>
                                    <select class="form-select inputfield OpNo mt-1" aria-label="Default select example name"id="view_op_id" name="OpNo" disabled>
                                        @foreach ($Op as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->op_no}} </option>
                                        @endforeach                                                                                 
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Ip Date</label><br>
                                    <input type="date" class="form-control mt-1 inputfield" id="view_ip_date" name="ViewIpDate" autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Room Type</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_room_type" name="ViewRoomType" autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Room</label><br>
                                    
                                    <select class="form-select inputfield " aria-label="Default select example name"id="view_Room" disabled>
                                        @foreach ($Room as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->room_no}} </option>
                                        @endforeach 
        
                                        </select>  
                                </div>
                                <!-- <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Consultation</label><br>
                                    <select class="form-select inputfield " aria-label="Default select example name" id="view_consultation_id" disabled>
                                        @foreach ($Con as $key )   
                                        <option class="inputlabel" value="{{$key->id}}">{{$key->consultation_no}} </option>
                                        @endforeach 
        
                                        </select>
                                </div> -->
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Name</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_name" name="ViewName"  autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Occupation</label><br>
                                    <input type="text" class="form-control mt-1 inputfield Occupation" id="view_occupation" name="ViewOccupation"  autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Age</label><br>
                                    <input type="text" class="form-control mt-1 inputfield Age" id="view_age" name="ViewAge"  autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Marital Status</label><br>
                                    <select class="form-select inputfield MaritalStatus" disabled aria-label="Default select example name"id="view_marital_status" name="UpdateMaritalStatus">
                                    <option value="1"> Single</option>
                                    <option value="2"> Married</option>
                                    <option value="3"> Divorced</option>
                                    <option value="4"> Widowed</option>                                           
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Gender</label><br>
                                    <select class="form-select inputfield Gender" disabled aria-label="Default select example name"id="view_gender" name="UpdateGender">
                                    <option value="1"> Male</option>
                                    <option value="2"> Female</option>
                                    <option value="3"> Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Email Id</label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="view_mail" name="UpdateMail" autofocus disabled>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Local Address</label><br>
                                    <textarea  cols="30" rows="2" disabled class="form-control mt-1 inputfield LocalAddress" id="view_local_address" name="UpdateLocalAddress"></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Full Address</label><br>
                                    <textarea  cols="30" rows="2" disabled class="form-control mt-1 inputfield FullAddress" id="view_full_address" name="UpdateFullAddress" ></textarea>
                                </div>   
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Primary Mobile Number</label><br>
                                    <input type="text" disabled class="form-control mt-1 inputfield MobileNumber" id="view_mobile_number" name="UpdateMobileNumber"autofocus required>
                                </div>                             
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <label class="mt-3 mb-1 inputlabel">Secondary Mobile Number</label><br>
                                    <input type="text" disabled class="form-control mt-1 inputfield PhoneNumber" id="view_phone_number" name="UpdatePhoneNumber" autofocus required>
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
        
            <div class="container-fluid">
                <h4 class="d-flex justify-content-center py-1 contitle">IP</h4>
                            
            </div>
            
            <div class="wrapper">
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="card card-body main_card mt-2 p-3 mb-2"> 
                        <div class="main_heading d-flex justify-content-between mb-2 p-2">
                            <div id="exportbtns"class="exportbtns col-3">
                                <!-- export buttons -->
                            </div>
                            <div class="">
                                <button class="btn AddBtn" data-bs-toggle="modal" data-bs-target="#IpModal">+Add </button> 
                            </div>
                        </div>
                        <div >
                            <table class="table text-nowrap table-hover MasterTable" id="MasterTable" style="width: 100%;">
                                <thead class="tablehead">
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th class="text-center">IP No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Age</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Mobile</th>
                                        <th class="text-center">Actions</th>
                                    </tr>                                           
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                </tbody>
                            </table>
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
                                columns: [ 0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5]
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
                    ajax: "{{ route('IP.ip') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', },
                        {data: 'ip_no', name: 'ip_no'}, 
                        {data: 'name', name: 'name'},
                        {data: 'age', name: 'age'},
                        {data: 'gender', name: 'gender'},
                        {data: 'mobile_no', name: 'mobile_no'},
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

                //Onchange Room Type To Room Number Function
            
                $(document).on('click','.RoomTypeid',(function(){
                    $(document).on('change','.RoomTypeid',(function(){
                        var RoomId = $(this).val();
                        loadOP(RoomId);
                    }));
                }));
                

                //On change Room Number
                function loadOP(RoomType) {
                    if (RoomType) {
                        $.ajax({
                            url: '/api/RoomNumByType/' + RoomType,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('.RoomNumId').empty();
                                $('.RoomNumId').append('<option value="">Choose Room Number</option>');
                                $.each(data, function(key, value) {
                                    $('.RoomNumId').append('<option class="inputlabel" value="' + value.id + '">' + value.room_no + '</option>');
                                });
                            }
                        });
                    } else {
                        $('.RoomNumId').empty();
                        $('.RoomNumId').append('<option value="">Choose Room Number</option>');
                    }
                }

            //On Change Consultation Fees
            
            $(document).on('change','.doctorfee',(function(){
                var ConfeeDr = $(this).val();
                var ConfeeOp = 0;
                var ConDate = $('.date').val();
                showfees(ConfeeDr,ConfeeOp,ConDate);
            }));


            
            //Function Show Consultation Fees

            function showfees(ConfeeDr,ConfeeOp, ConDate){
                console.log(ConfeeDr,ConfeeOp, ConDate); 
                var settings = {
                    "url": "/api/calculateIPFees?ipid="+ConfeeOp+"&doctorid="+ConfeeDr+"&condate="+ConDate,
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

            //Add IP  
            
            $("#add_ip").validate({ 
                rules:{
                    MobileNumber:{
                        required: true,
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    PhoneNumber:{
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    Age:{
                        required: true,
                        maxlength: 3,                    
                    } ,
                    Doctor:{
                        required: true,
                    }

                },
                submitHandler: function(form) {

                    var OPId = $('#op_id').val();
                    var RefId = $('#reference_id').val();
                    var IpDate = $('#Ip_date').val();
                    var IPNo = $('#Ip_no').val();
                    var IPRoom = $('#Room').val();
                    var IPRmtype = $('#room_type').val();
                    // var Ipcon = $('#consultation_id').val();
                    var IPName = $('#name').val();
                    var IPOccupation= $('#occupation').val();
                    var IPAge = $('#age').val();
                    var IPMaritalStatus = $('#marital_status').val();
                    var IPGender = $('#gender').val();
                    var IPmail = $('#email').val();
                    var IPLocalAddress = $('#local_address').val();
                    var IPFullAddress = $('#full_address').val();
                    var IPPhoneNumber = $('#phone_number').val();
                    var IPMobileNumber = $('#mobile_number').val();
                    var IPBranch = $('#branch').val();
                    var ModeOfPay = $('#mode_pay').val();
                    var IPConFees = $('#fees_check').is(':checked') ? $('#consult_fee').val() : 0;

                    var IPDoctor = $('#doctor').val();
  
                    var remarks = $('#remarks').val();
                    $.ajax({
                        url: "/api/ip",
                        method: "POST",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            op_id:OPId,
                            ip_no:IPNo,
                            RoomType_id:IPRmtype,
                            Room_id:IPRoom,
                            // consultation_id:Ipcon,
                            ip_date:  IpDate ,
                            name: IPName,
                            age: IPAge,
                            gender: IPGender,
                            full_address: IPFullAddress,
                            phone_no: IPPhoneNumber,
                            mobile_no: IPMobileNumber,
                            occupation: IPOccupation,
                            marital_status: IPMaritalStatus,
                            local_address: IPLocalAddress,
                            email: IPmail,
                            remarks:remarks,
                            branch_id: IPBranch,
                            doctor_id: IPDoctor,
                            consultation_fees: IPConFees,
                            mode_of_payment_id:ModeOfPay,
                            consultation_date:IpDate
                        },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#IpModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        MasterTable.ajax.reload();
                        //console.log(response);
                        var IPResult = JSON.stringify(response);
                       // console.log(IPResult);
                        var IPResultObj = JSON.parse(IPResult);
                        if (IPResultObj.success == true) {
                            if (IPResultObj.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (IPResultObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Added Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (IPResultObj.code == "2") {
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

            

            //edit IP 
            $('#MasterTable').on('click', '.btn_edit', function () {
                var EditIP = $(this).val();
                console.log(EditIP);
                var settings = {
                    "url": "/api/ip/"+EditIP+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var OPResult = JSON.stringify(response);
                    console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);
                    if (OPedit.success == true) {
                        $('#IpModal').modal('show');
                        $('#add_ip').hide();
                        $('#update_add_ip').show();
                        var IPDataArray = OPedit.ips;
                        for(const key in IPDataArray){
                            var IpId = IPDataArray['id'];
                            var OPId = IPDataArray['op_id'];
                            var IPNo = IPDataArray['ip_no'];
                            var IPDate = IPDataArray['ip_date'];
                            var RefId = IPDataArray['reference_id'];
                            var IpRoomType = IPDataArray['RoomType_id'];
                            var IPRoom= IPDataArray['Room_id'];
                            // var IPCon = IPDataArray['consultation_id'];
                            var IPName = IPDataArray['name'];
                            var IPMail = IPDataArray['email'];
                            var IPOccupation = IPDataArray['occupation'];
                            var IPAge = IPDataArray['age'];
                            var IPMaritalStatus = IPDataArray['marital_status'];
                            var IPGender = IPDataArray['gender'];
                            var IPLocalAddress = IPDataArray['local_address'];
                            var IPFullAddress = IPDataArray['full_address'];
                            var IPPhoneNumber = IPDataArray['phone_no'];
                            var IPMobileNumber = IPDataArray['mobile_no'];
                            var IPBranch = IPDataArray['branch_id'];

                        }
                        $("#update_ip_id").val(IpId);
                        $("#update_ip_no").val(IPNo);
                        $("#Update_room_type").val(IpRoomType);
                        $("#update_Room").val(IPRoom);
                        $('#update_op_no').data('selectize').setValue(OPId);
                        $("#update_reference_id").val(RefId);
                        $("#update_ip_date").val((IPDate.slice(0,10)));
                        $("#update_name").val(IPName);
                        // $("#update_consultation_id").val(IPCon);
                        $("#update_email").val(IPMail);
                        $("#update_occupation").val(IPOccupation);
                        $("#update_age").val(IPAge);
                        $("#update_marital_status").val(IPMaritalStatus);
                        $("#update_gender").val(IPGender).change();
                        $("#update_local_address").val(IPLocalAddress);
                        $("#update_full_address").val(IPFullAddress);
                        $("#update_phone_number").val(IPPhoneNumber);
                        $("#update_mobile_number").val(IPMobileNumber);
                        $("#update_branch").val(IPBranch);

                    }
                });
            });




            //Update IP 

            $("#update_add_ip").validate({
                rules:{
                    UpdateMobileNumber:{
                        required: true,
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    UpdatePhoneNumber:{
                        minlength: 10,  
                        maxlength: 15,                    
                    },
                    UpdateAge:{
                        required: true,
                        maxlength: 3,                    
                    } 

                },
                submitHandler: function(form) {
                    var UpdateId = $('#update_ip_id').val();
                    var OPId = $('#update_op_no').val();
                    var RefId = $('#update_reference_id').val();
                    var IpDate = $('#update_ip_date').val();
                    var IPNo = $('#update_ip_no').val();
                    var IPRoom = $('#update_Room').val();
                    var IPRmtype = $('#Update_room_type').val();
                    // var Ipcon = $('#update_consultation_id').val();
                    var IPName = $('#update_name').val();
                    var IPOccupation= $('#update_occupation').val();
                    var IPAge = $('#update_age').val();
                    var IPMaritalStatus = $('#update_marital_status').val();
                    var IPGender = $('#update_gender').val();
                    var IPmail = $('#update_email').val();
                    var IPLocalAddress = $('#update_local_address').val();
                    var IPFullAddress = $('#update_full_address').val();
                    var IPPhoneNumber = $('#update_phone_number').val();
                    var IPMobileNumber = $('#update_mobile_number').val();
                    var IPLPhoneNo = $('#update_local_phone_number').val();
                    var IPLMobNo = $('#update_local_mobile_number').val();
                    var IPBranch = $('#update_branch').val();
                    console.log(UpdateId);
                    $.ajax({
                        url: "/api/ip/"+UpdateId+"",
                        method: "PUT",
                        timeout: 0,
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            op_id:OPId,
                            ip_no:IPNo,
                            RoomType_id:IPRmtype,
                            Room_id:IPRoom,
                            // consultation_id:Ipcon,
                            ip_date:  IpDate ,
                            name: IPName,
                            age: IPAge,
                            gender: IPGender,
                            full_address: IPFullAddress,
                            phone_no: IPPhoneNumber,
                            mobile_no: IPMobileNumber,
                            occupation: IPOccupation,
                            marital_status: IPMaritalStatus,
                            local_address: IPLocalAddress,
                            local_phone_no: IPLPhoneNo,
                            local_mobile_no: IPLMobNo,
                            email: IPmail,
                            branch_id: IPBranch,
                            consultation_date:IpDate
                        },
                    beforeSend: function() {
                        $('.loader').show();
                        $('#IpModal').modal('hide');
                        $('.mainContents').hide();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function (response) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    MasterTable.ajax.reload();
                    console.log(response);
                    var OPUpdate = JSON.stringify(response);
                        console.log(OPUpdate);

                        var OPUpdateed = JSON.parse(OPUpdate);
                            if (OPUpdateed.success == true) {
                                if (OPUpdateed.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (OPUpdateed.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (OPUpdateed.code == "2") {
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




            //Delete IP 
            $('#MasterTable').on('click', '.btn_delete', function () {
                $('.delModal').modal('show');
                var DelOP = $(this).val();
                $('#confirmYes').click(function(){                  
                    console.log(DelOP);
                    $.ajax({
                        "url": "/api/ip/"+DelOP+"",
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
                        var OPResult = JSON.stringify(response);
                            console.log(OPResult); 
                            var OPDelObj = JSON.parse(OPResult);
                            if (OPDelObj.success == true) {  
                            if (OPDelObj.code == "0") {
                            $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(OPDelObj.message);
                            $('#ResponseModal').modal('show');
                            } else if (OPDelObj.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(OPDelObj.message);
                                $('#ResponseModal').modal('show');
                            } else if (OPDelObj.code == "2") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/error.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(OPDelObj.message);
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
                           
            
            //View IP 
            $('#MasterTable').on('click', '.btn_view', function () {
                var ViewOP = $(this).val();
                console.log(ViewOP);
                var settings = {
                    "url": "/api/ip/"+ViewOP+"",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var OPResult = JSON.stringify(response);
                    console.log(OPResult);
                    var OPedit = JSON.parse(OPResult);
                    if (OPedit.success == true) {
                        $('#IPViewModal').modal('show');
                        $('#view_add_ip').show();
                        var IPDataArray = OPedit.ips;
                        for(const key in IPDataArray){
                            var IpId=IPDataArray['id'];
                            var OPId = IPDataArray['op_id'];
                            var IPNo = IPDataArray['ip_no'];
                            var IPDate = IPDataArray['ip_date'];
                            var RefId = IPDataArray['reference_id'];
                            var IpRoomType = IPDataArray['RoomType_id'];
                            var IPRoom= IPDataArray['Room_id'];
                            // var IPCon = IPDataArray['consultation_id'];
                            var IPName = IPDataArray['name'];
                            var IPMail = IPDataArray['email'];
                            var IPOccupation = IPDataArray['occupation'];
                            var IPAge = IPDataArray['age'];
                            var IPMaritalStatus = IPDataArray['marital_status']; 
                            var IPGender = IPDataArray['gender'];
                            var IPLocalAddress = IPDataArray['local_address'];
                            var IPFullAddress = IPDataArray['full_address'];
                            var IPPhoneNumber = IPDataArray['phone_no'];
                            var IPMobileNumber = IPDataArray['mobile_no'];
                            var IPBranch = IPDataArray['branch_id'];

                        }
                        $("#view_ip_id").val(IpId);
                        $("#view_op_id").val(OPId);
                        $("#view_ip_no").val(IPNo);
                        $("#view_ip_date").val(IPDate);
                        $("#view_name").val(IPName);
                        $("#view_Room").val(IPRoom);
                        $("#view_room_type").val(IpRoomType);
                        // $("#view_consultation_id").val(IPCon);
                        $("#view_mail").val(IPMail);
                        $("#view_occupation").val(IPOccupation);
                        $("#view_age").val(IPAge);
                        $("#view_marital_status").val(IPMaritalStatus);
                        $("#view_gender").val(IPGender).change();
                        $("#view_local_address").val(IPLocalAddress);
                        $("#view_full_address").val(IPFullAddress);
                        $("#view_phone_number").val(IPPhoneNumber);
                        $("#view_mobile_number").val(IPMobileNumber);
                        $("#view_branch").val(IPBranch);

                    }
                });
            });

            
            //modal close function
            $(".addUpdateModal").on("hidden.bs.modal", function() {
                $(".UpdateForm").hide();
                $(".AddForm").show();
                $(".UpdateForm")[0].reset();
                $(".AddForm")[0].reset();
                $(".addUpdateModal").removeClass("error");
                var errorMessage = $('label.error');
                errorMessage.hide();
                var errorMessage = $('.inputfield.error');
                errorMessage.removeClass('error');
            }); 

            //Focus First Field
            $(document).ready(function() {
                $('#IpModal').on('shown.bs.modal', function() {
                    $('#op_id').focus();
                });
            });
            
        </script>
    </body>
</html>