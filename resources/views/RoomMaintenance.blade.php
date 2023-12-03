<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Room Maintainance</title>
        @include('layouts.headder')
        <style>
            .mainContents{
                display:none;
            }
        </style>
        @livewireStyles

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
            <div class="container-fluid px-4 ">
                <h4 class="mt-4 d-flex justify-content-center py-1 contitle">Room Maintenence</h4>                                  
            </div>
           

            <div class="wrapper">
            
                <!--CONTENTS-->
                <div class="container-fluid mainContents">
                    <div class="card card-body main_card mt-2 shadow-lg p-3 mb-2">  
                        <livewire:room-maintain/> 
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
         @livewireScripts

        <script type="text/javascript">


            //loader
            $(function() {
                $(".loader").fadeOut(1500, function() {
                    $(".mainContents").show();        
                });
            });
 
        </script>
  </body>

</html>