<!DOCTYPE html>
<html lang="en">

    <head>
    <title>Basic Settings</title>
      @include('layouts.headder')
        <style>
            .mainContents{
                display:none;
            }
        </style>
    </head>

    <body>
        
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
                <h4 class="d-flex justify-content-center py-1 contitle">Basic Settings </h4>             
            </div>
            
            <div class="wrapper">
                <!--CONTENTS-->
                
                <div class="container-fluid mainContents">
                    <div class="card card-body main_card mt-2 shadow-lg p-3 mb-2"> 
                        <div class="main_heading d-flex justify-content-center my-2  p-1 formheading">
                            <div>
                                <h5 class=" "> Prefix Settings</h5>                                    
                            </div>                                
                        </div>
                        <form class="BasicSettings AddForm" id="basic_settings" novalidate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xl-2 col-md-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">Registration Prefix<span style="color:red; font-size:15px">*</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="reg_prefix" name="RegPrefix" placeholder="" autofocus required value="{{ env('REGISTRATION_PREFIX') }}">
                                </div>
                                <div class="col-xl-2 col-md-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">OP Prefix<span style="color:red; font-size:15px">*</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="op_prefix" name="OPPrefix" placeholder="" autofocus required value="{{ env('OP_PREFIX') }}">
                                </div>
                                <div class="col-xl-2 col-md-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">IP Prefix<span style="color:red; font-size:15px">*</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="ip_prefix" name="IPPrefix" placeholder="" autofocus required value="{{ env('IP_PREFIX') }}">
                                </div>
                                <!-- <div class="col-xl-2 col-md-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">IP Consultation Prefix<span style="color:red; font-size:15px">*</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="op_consultation_prefix" name="OPConsultationPrefix" placeholder="" autofocus required value="{{ env('OP_CONSULTATION_PREFIX') }}">
                                </div>
                                <div class="col-xl-2 col-md-6 col-12">
                                    <label class="mt-2 mb-1 inputlabel">OP Consultation Prefix<span style="color:red; font-size:15px">*</span></label><br>
                                    <input type="text" class="form-control mt-1 inputfield" id="ip_consultation_prefix" name="IPConsultationPrefix" placeholder="" autofocus required value="{{ env('IP_CONSULTATION_PREFIX') }}">
                                </div> -->
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn savebtn px-5">Save</button>
                                </div>
                            </div>
                        </form>
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

        @include('layouts.footer')

        <script type="text/javascript">

            //UPdate Prefix

            $("#basic_settings").validate({

                submitHandler: function(form) {
                    var RegPrefix = $('#reg_prefix').val();                
                    var OPPrefix = $('#op_prefix').val();                
                    var IPPrefix = $('#ip_prefix').val();
                    // var OPConsultationPrefix = $('#op_consultation_prefix').val();
                    // var IPConsultationPrefix = $('#ip_consultation_prefix').val();

                    $.ajax({
                        url: "/api/prefixSettting",
                        method: "POST",
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        data: {
                            RegPrefix: RegPrefix,
                            OPPrefix: OPPrefix,
                            IPPrefix: IPPrefix,
                            // OPConsultationPrefix: OPConsultationPrefix,
                            // IPConsultationPrefix: IPConsultationPrefix
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                        },
                    }).done(function (response) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        console.log(response);
                            if (response.success == true) {
                                if (response.code == "0") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/warning.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("This Record is Already Present");  
                                $('#ResponseModal').modal('show');
                            } else if (response.code == "1") {
                                $('#ResponseImage').html('<img src="{{url('assets/images/success.jpg')}}" style="height:60px;width:60px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Record Updated Successfully");
                                $('#ResponseModal').modal('show');
                            } else if (response.code == "2") {
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
           
            //Focus First Field
            $(document).ready(function() {
                $('#op_prefix').focus();
            });
        </script>
    </body>
</html>