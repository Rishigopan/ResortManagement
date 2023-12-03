<!DOCTYPE html>
<html lang="en">

<head>


    @include('layouts.headder')
    <title>BETHANY</title>
    <style>
      .mainContents{
          display:none;
      }
    </style>
</head>

<body>

  <!-- ======= Header ======= -->

  <header id="header" class="header fixed-top d-flex align-items-center">
      @include('layouts.navbar')
  </header>

  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

  <aside id="sidebar" class="sidebar  ps-0">
      @include('layouts.sidebar')
  </aside>

  <!-- End Sidebar-->

  <main id="main" class="main p-4">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Colections Card -->
            <div class="col-xxl-3 col-md-6 col-sm-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Collections <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="  d-flex align-items-center justify-content-center">
                      <i><img src="{{url('assets/images/dashtokens.png')}}" style="width:60px; height:60px;"></i>

                    </div>
                    <div class="ps-3">
                      <h6>{{$todayCollection}}</h6>
                      <!-- <span class="text-muted small pt-2 ps-1">Collections Today</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Colections Card -->

            <!-- Tokens Card -->
            <div class="col-xxl-3 col-md-6 col-sm-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Tokens  <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center">
                    <i><img src="{{url('assets/images/dashtoken.png')}}" style="width:60px; height:60px;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$todayTokens}} Tokens</h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                    </div>
                  </div>

                </div>

              </div>

            </div><!-- End Tokens Card -->

            <!-- Doctors Card -->
            <div class="col-xxl-3 col-md-6 col-sm-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Doctors</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center">
                    <i><img src="{{url('assets/images/dashdoct.png')}}" style="width:60px; height:60px;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$doctors}}  Doctors</h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                    </div>
                  </div>

                </div>

              </div>

            </div><!-- End Doctors Card -->
            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-6 col-sm-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center">
                    <i><img src="{{url('assets/images/dashusers.png')}}" style="width:60px; height:60px;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$Users-1}}  Users</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>
    <section>
      <div class="container-fluid mainContents">
        <div class="card card-body main_card mt-2 p-3 mb-2"> 
          <div class="row mb-3">
            <div class="col-xl-4 col-lg-4 col-12">
              <label class="mt-2 mb-1 inputlabel">Date</label><br>
              <input type="date" class="form-control mt-1 inputfield " id="date" name="Date" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-12">
              <label class="mt-2 mb-1 inputlabel">Room Type</label><br>
                <select class="form-select inputfield mt-1" aria-label="Default select example name"id="room_type" name="RoomType" required>
                  <option class="inputlabel" hidden value=""> Choose Room Type</option>
                  @foreach ($RoomType as $key )   
                  <option class="inputlabel" value="{{$key->id}}">{{$key->name}} </option>
                  @endforeach 
                </select>  
            </div>
            <div class="col-xl-4 col-lg-4 col-12">

            </div>
          </div>
          <div class="row mt-3">
            <!-- @foreach ($Room as $key)
              <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="card text-start indexroomcard{{ empty($key->name) ? ' empty-card' : '' }}">
                  <div class="card-body p-3">
                    <div class="d-flex justify-content-center roomnum">
                      <h3 class="card-text">{{$key->room_no}}</h3>
                    </div>
                    <div class="mt-5 text-center" >
                      @if (empty($key->name))
                        <div class="my-5">

                        </div>
                        <a href="{{ url('/RoomBooking')}}" class="bookbtn">Book Now</a>
                        <div class="my-5">

                        </div>
                        
                      @else
                        <p class="roomname">{{$key->name}}</p>
                        <div class="d-flex justify-content-between roomicon">
                          <i class="ri-secure-payment-fill"></i>
                          <i class="ri-file-user-line"></i>
                          <i class="ri-file-history-line"></i>
                        </div>
                      @endif
                    </div>
                    
                  </div>
                </div>
              </div>
            @endforeach -->
            @foreach ($Room as $key)
              @if ($loop->first || $key->room_no != $Room[$loop->index - 1]->room_no)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                  <div class="card text-start indexroomcard{{ empty($key->name) ? ' empty-card' : '' }}{{ $key->name && $key->has_multiple_names ? ' multi-name-card' : '' }}">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-center roomnum">
                        <h3 class="card-text">{{$key->room_no}}</h3>
                      </div>
                      <div class="mt-5 text-center">
                        @if (empty($key->name))
                          <div class="my-5"></div>
                          <a href="{{ url('/RoomBooking')}}" class="bookbtn">Book Now</a>
                          <div class="my-5"></div>
                        @else
                          @php
                            $names = collect([]);
                            $names->push($key->name);
                            $key->has_multiple_names = false;
                          @endphp
                          @foreach ($Room->slice($loop->index + 1) as $nextKey)
                            @if ($nextKey->room_no == $key->room_no && !empty($nextKey->name))
                              @php
                                $names->push($nextKey->name);
                                $nextKey->has_multiple_names = true;
                              @endphp
                            @else
                              @break
                            @endif
                          @endforeach
                          @if ($names->count() > 1)
                            <ul class="roomname">
                              @foreach ($names as $name)
                                <li>{{ $name }}</li>
                              @endforeach
                            </ul>
                          @else
                            <p class="roomname">{{ $names->first() }}</p>
                          @endif
                          <div class="d-flex justify-content-between roomicon">
                            <i class="ri-secure-payment-fill"></i>
                            <i class="ri-file-user-line"></i>
                            <i class="ri-file-history-line"></i>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach



          </div>
        </div>
      </div>
    </section>
    <div class="loader">
        <div class="">
            <img class="img-fluid" src="{{url('assets/images/loading.gif')}}">
            <h4 class="text-center">LOADING</h4>
        </div>
    </div>
  </main><!-- End #main -->
  @include('layouts.footer')


</body>

</html>