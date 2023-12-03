<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bethany Nature cure & yoga center</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Iceland&family=Playfair+Display:wght@400;700;800&family=Poppins:wght@100;200;300;400&display=swap"
    rel="stylesheet">
  <!-- <link href="https://fonts.cdnfonts.com/css/friz-quadrata-std" rel="stylesheet"> -->
  <link href="{{url('assetss/font/friz_quadrata_tt_regular.ttf')}}" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- AOS animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="{{url('assetss/css/style.css')}}">

  <!-- Owl Carousel And FancyBox -->
  <link rel="stylesheet" href="{{url('assetss/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{url('assetss/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{url('assetss/css/jquery.fancybox.min.css')}}">

  <!-- Scroll Carousel -->
  <link rel="stylesheet" href="{{url('assetss/css/scrollCarousel.css')}}">

  <!-- Curved Carousel -->
  <link rel="stylesheet" href="{{url('assetss/css/curvedCarousel.css')}}">

   <!-- Marquee Carousel -->
   <link rel="stylesheet" href="{{url('assetss/css/marqueeCarousel.css')}}">


  <?php
    date_default_timezone_set('Asia/Kolkata');
    $dtVal = date('d');
    $yrVal = date('y');
  ?>
  <style>
      /**
  * Quick and easy CSS3 rolling-number/slot machine?
  */
      .counterTimeUp {
          height: 1em;
          overflow: hidden;
          font-size: 3.4rem;
          font-family: 'Times New Roman', serif;
      }

      .digits {
          float: left;
          list-style-type: none;
          font-size: 1em;
          line-height: 1em;
      }

      .digits-first {
          margin-top: -1em;
      }

      .digits {
          animation-duration: 1s;
          animation-timing-function: ease-in-out;
          animation-delay: 1.5s;
          animation-fill-mode: forwards;
          padding:0;
      }

      .digUpAnimeDay {
          animation-name: digitUpAnimationDate;
      }
      .digUpAnimeYear {
          animation-name: digitUpAnimationYear;
      }

      /* Animations */
      @keyframes digitUpAnimationDate {
          100% {
              margin-top: -<?=$dtVal?>em;
          }
      }
      @keyframes digitUpAnimationYear {
          100% {
              margin-top: -<?=$yrVal?>em;
          }
      }
</style>
</head>

<body>
  <!-- <section id="landingSection">
      <div class="landingAlign">
        <div>
        <h1 class="landingHeader text-white">Bethany</h1>
        <p class="exploreBg mt-2">Explore &nbsp;<a href="#home" class="btn-get-started scrollto exploreBtn"><i class="material-icons">send</i></a></p>
        </div>
      </div>
    </section> -->
  <!-- <div class="container-lg"> -->


  <!-- ======= Landing Section start ======= -->
  <section id="landingSection">
    <div class="row vh-100 m-0">
      <div class="col-xl-2 col-lg-2 col-2 landingPageLinks">
        <div>
          <ul class="">
            <li class="list-unstyled mb-2">
              <a href="#" class="mediaLinks">
                <i class="bi bi-facebook" aria-hidden="true"></i>
              </a>
            </li>
            <li class="list-unstyled mb-2">
              <a href="#" class="mediaLinks">
                <i class="bi bi-twitter" aria-hidden="true"></i>
              </a>
            </li>
            <li class="list-unstyled">
              <a href="#" class="mediaLinks">
                <i class="bi bi-instagram" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xl-8 col-lg-8 col-8 landingAlign">
        <div>
          <h1 class="landingHead text-white">Bethany</h1>
          <!-- <p class="text-white exploreBg mt-2 text-center">Explore &nbsp;<a href="#mainPage"><img id="sendIcon" class="sendIcon" src="{{url('assetss/img/Landing/sendIcon.png')}}" onmouseover="this.src='{{url('assetss/img/Landing/sendIconHover.png')}}'" onmouseout="this.src='{{url('assetss/img/Landing/sendIcon.png')}}'"></a></p> -->
          <p class="text-white exploreBg mt-1 text-center">Explore &nbsp;<a href="#home"><button class="exploreBtn"
                id="exploreBtn"><i class="material-icons text-black">send</i></button></a></p>
          <!-- <p class="text-white exploreBg mt-1 text-center">Explore &nbsp;<button class="exploreBtn" id="exploreBtn"><i class="material-icons text-black">send</i></button></p> -->
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-2 LandingDate">
        <div>
          <!-- <div class="vertLine1"></div> -->
          <div class="row vert1">
            <div class="col-6 vertLine">

            </div>
            <div class="col-6">

            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="text-white landingTime text-center" id="landingTimeDate">
              <div class="counterTimeUp">
                <ul class="digits digits-first digUpAnimeDay">
                    <?php
                        for($iR=0;$iR<=31;$iR++){
                            echo("<li>$iR</li>");
                        }
                    ?>
                </ul>
            </div>
              </h2>
              <!-- <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span> -->
            </div>
          </div>
          <div class="row vert2">
            <div class="col-6 vertLine">

            </div>
            <div class="col-6">

            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="text-white landingTime text-center" id="landingTimeYear">
              <div class="counterTimeUp">
                <ul class="digits digits-first digUpAnimeYear">
                <?php
                        for($iR=0;$iR<=50;$iR++){
                            echo("<li>$iR</li>");
                        }
                    ?>
                </ul>
            </div>
              </h2>
            </div>
          </div>

          <!-- <div class="vertLine2 mt-1"></div> -->

        </div>
      </div>
    </div>
  </section>
  <!-- ======= Landing Section end ======= -->

  <div class="container-fluid px-0 hideMyEntireSection" id="homeSectionCollections">
    
    <!-- ======= Main Carousel Section start ======= -->
    <section id="mainPage">
      <!-- <section class="headerPage"> -->
      <div class="container-fluid p-0">
        <!-- <nav class="navbar navbar-default navbar-trans navbar-expand-lg" id="home">
          <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
              aria-label="Toggle navigation">
            </button>
            <a href=""><img src="{{url('assetss/img/logo/bethany logo.png')}}" alt=""></a>

            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
              <ul class="navbar-nav">

                <li class="nav-item">
                  <a class="nav-link active" href="index.html">Home</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link ps-xl-5" href="#homeSectionCollections">Shop</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link ps-xl-5" href="#teamMembers">Members</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link ps-xl-5" href="#homeSectionCollections">Forum</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link ps-xl-5" href="#homeSectionCollections">Farmhouse</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link ps-xl-5" href="#footer">Contact Us</a>
                </li>
              </ul>
            </div>

            
            <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse"
              data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">Login
            </button>

          </div>
        </nav> -->


  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{url('assetss/img/logo.png')}}" alt=""> -->
        <img src="{{url('assetss/img/logo/bethany logo.png')}}" alt="" class="img-fluid" style="width:130px; height:140px;">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="#carouselExampleCaptions">Home</a></li>
          <li><a href="#treatments">Shop</a></li>
          <li><a href="#teamMembers">Members</a></li>
          <li><a href="#gallery">Forum</a></li>
          <li><a href="#ourAttractions">Farmhouse</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a href="#footer">Contact Us</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="mt-xl-5 pt-xl-2">
        <a class="btn-book-a-table" href="{{ route('login') }}">Login</a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>


        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1" style="visibility: hidden;"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"
              style="visibility: hidden;"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"
              style="visibility: hidden;"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
              <img src="{{url('assetss/img/SlideCarousel/yogaexercise1.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block carouselCaption">
                <h5>JUST LIKE NATURE<br>INTENDED</h5>
                <p>A place to rest and restore</p>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
              <img src="{{url('assetss/img/SlideCarousel/bethanysite.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block carouselCaption">
                <!-- <h5>JUST LIKE NATURE<br>INTENDED</h5>
                    <p>A place to rest and restore</p> -->
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
              <img src="{{url('assetss/img/SlideCarousel/yogaexercise2.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block carouselCaption">
                <!-- <h5>JUST LIKE NATURE<br>INTENDED</h5>
                    <p>A place to rest and restore</p> -->
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!-- </section> -->

    </section>
    <!-- ======= Main Carousel Section end ======= -->

    <!-- ======= Welcome Section start ======= -->
    <!-- <section id="welcomeBg">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-12 d-md-none pt-5">
                    <div class="welcomeHead text-center">
                      <h3>Welcome <br> to <br><span class="welcomeSpan1">BETHANY <br></span> <span class="welcomeSpan2">Nature cure center</span> </h3>
                    </div>
                  </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                      <div class="">
                        <div class="text-center">
                          <img src="{{url('assetss/img/welcome/welcomeImg1.png')}}" alt="" class="img-fluid" data-aos="fade-down" data-aos-easing="linear" >
                        </div>
                        <img src="{{url('assetss/img/welcome/welcomeImg2.png')}}" alt="" class="img-fluid shake">
                      </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 d-none d-md-flex">
                      <div class="welcomeHead text-center">
                        <h3>Welcome <br> to <br><span class="welcomeSpan1">BETHANY <br></span> <span class="welcomeSpan2">Nature cure center</span> </h3>
                      </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-none d-md-block">
                      <div class="text-center welcomeSectn3">
                        <img src="{{url('assetss/img/welcome/welcomeImg3.png')}}" alt="" data-aos="fade-down" data-aos-easing="linear" ><br>
                        <img src="{{url('assetss/img/welcome/welcomeImg4.png')}}" alt="" data-aos="fade-down" data-aos-easing="linear" >
                        <img src="{{url('assetss/img/welcome/welcomeImg5.png')}}" alt="" class="img-fluid shake welcomeImg5">
                      </div>
                    </div>
                </div>
              </div>
            </section> -->

    <section id="welcomeBg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-12 d-none d-md-flex">
            <div>
              <div class="text-start">
                <img src="{{url('assetss/img/welcome/welcomeImg1.png')}}" alt="" class="img-fluid fadeDownLeaf" data-aos="fade-down"
                  data-aos-easing="linear" data-aos-duration="1500">
              </div>
              <img src="{{url('assetss/img/welcome/welcomeImg2.png')}}" alt="" class="up-down welcomeImg2" style="width:420px; height:440px;">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-12 d-none d-md-flex">
            <div class="welcomeHead text-center">
              <h3>Welcome <br> to <br><span class="welcomeSpan1">BETHANY <br></span> <span class="welcomeSpan2">Nature
                  cure center</span> </h3>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 d-none d-md-block">
            <div class="text-end welcomeSectn3">
              <img src="{{url('assetss/img/welcome/welcomeImg3.png')}}" class="ps-5 fadeDownLeaf rightLeafWelcome" alt="" data-aos="fade-down"
                data-aos-easing="linear" data-aos-duration="1500"><br>
              <img src="{{url('assetss/img/welcome/welcomeImg4.png')}}" class="ps-5 fadeDownLeafWater rightLeafWaterWelcome" alt="" data-aos="fade-down"
                data-aos-easing="linear" data-aos-duration="3000"><br>
              <img src="{{url('assetss/img/welcome/welcomeImg5.png')}}" alt="" class="img-fluid up-down welcomeImg5">
            </div>
          </div>
        </div>

        <!-- Mobile View start-->
        <div class="row d-md-none">
          <div class="col-12">
            <div class="text-center welcomeMobile">
              <h3>Welcome <br> to <br><span class="welcomeSpan1">BETHANY <br></span> <span class="welcomeSpan2">Nature
                  cure center</span> </h3>
            </div>
          </div>
          <div class="col-12 pb-5">
              <div class="text-center">
                <img src="{{url('assetss/img/welcome/welcomeImg1.png')}}" alt="" class="img-fluid fadeDownLeaf" data-aos="fade-down"
                  data-aos-easing="linear" data-aos-duration="1500">
              </div>
          </div>
          <div class="col-12">
            <img src="{{url('assetss/img/welcome/welcomeImg2.png')}}" alt="" class="up-down welcomeImg2 mb-5">
          </div>
        </div>
        <!-- Mobile View end-->

      </div>
    </section>
    <!-- ======= Welcome Section end ======= -->

    <!-- ======= Treatments Section start ======= -->
    <section id="treatments">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center treatLeafContain">
            <img src="{{url('assetss/img/treatments/treatLeaf.png')}}" alt="" style="width:250px;" data-aos="fade-down" data-aos-easing="linear"
              data-aos-duration="1500" data-aos-delay="100">
            <!-- <img src="{{url('assetss/img/treatments/treatLeaf.png')}}" alt=""> -->
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <img src="{{url('assetss/img/treatments/oleafRight.png')}}" alt="" class="img-fluid treatmentImg pb-5"><span
              class="treatmentHead">ur Treatments</span>
          </div>
        </div>
        <!-- <div class="container-fluid p-0"> -->
        <div class="rollerCarouselBox">
          <div class="rollerItemGroup">
            <div class="rollerItem rollItem1" id="rollElement1">
              <div class="rollerImageBox mb-0 text-center">
                <img src="{{url('assetss/img/treatments/treatment scroll image 1.png')}}" alt="">
              </div>
              <div class="rollerItemContentBox">
                <h2 class="pb-1">MASSAGE THERAPY</h2>
                <span class="prevRollerCarousel"><i class="fa fa-arrow-left"></i></span>
                <p>Body Massage mainly provides relaxation, good health, lessen pain and muscle tightness, improve the work of the immune system, reduce digestive disorders and wellbeing. Loosens secretions and stimulates discharges of mucus from the throat and lungs.</p>
                <span class="nextRollerCarousel"><i class="fa fa-arrow-right"></i></span>
              </div>
            </div>

            <div class="rollerItem rollItem2" id="rollElement2">
              <div class="rollerImageBox">
                <img src="{{url('assetss/img/treatments/treatment scroll image 2.png')}}" alt="">
              </div>
              <div class="rollerItemContentBox">
                <h2 class="">DIET THERAPY</h2>
                <span class="prevRollerCarousel"><i class="fa fa-arrow-left"></i></span>
                <p>Diet therapy is one of the most important parts of Bethany nature cure centre. Bethany follows a strict vegetarian diet. Food must be taken in natural forms such as fresh seasonal fruits & fresh green leafy vegetables & they play a significant role in our diet therapy.</p>
                <span class="nextRollerCarousel"><i class="fa fa-arrow-right"></i></span>
              </div>
            </div>

            <div class="rollerItem rollItem3" id="rollElement3">
              <div class="rollerImageBox">
                <img src="{{url('assetss/img/treatments/treatment scroll image 3.png')}}" alt="">
              </div>
              <div class="rollerItemContentBox">
                <h2 class="py-2">YOGA THERAPY</h2>
                <span class="prevRollerCarousel"><i class="fa fa-arrow-left"></i></span>
                <p>Indoor and outdoor facilities are available for yoga practices. Yoga classes have been sessionally arranged at 7 AM and 5 PM. Yoga session includes  ASANAS, PRANAYAMAS, MUDRAS, etc</p>
                <span class="nextRollerCarousel"><i class="fa fa-arrow-right"></i></span>
              </div>
            </div>

            <div class="rollerItem rollItem4" id="rollElement4">
              <div class="rollerImageBox">
                <img src="{{url('assetss/img/treatments/treatment scroll image 4.png')}}" alt="">
              </div>
              <div class="rollerItemContentBox">
                <h2 class="py-2">PACKS</h2>
                <span class="prevRollerCarousel"><i class="fa fa-arrow-left"></i></span>
                <p>It is non surgical procedure that aims to alleviate pain, restore function and improves a patient ability to move the affected area of the body. It includes,specific exercise, manual therapy, mechanical modalities etc. </p>
                <span class="nextRollerCarousel"><i class="fa fa-arrow-right"></i></span>
              </div>
            </div>

            <div class="rollerItem rollItem5" id="rollElement5">
              <div class="rollerImageBox mb-0">
                <img src="{{url('assetss/img/treatments/treatment scroll image 5.png')}}" alt="">
              </div>
              <div class="rollerItemContentBox">
                <h2 class="py-2">PHYSIOTHERAPY</h2>
                <span class="prevRollerCarousel"><i class="fa fa-arrow-left"></i></span>
                <p>Physiotherapy is a non surgical procedure that aims to alleviate pain, restore function and improves a patient ability to move the affected area of the body it includes specific exercise, manual and mechanical modalities.</p>
                <span class="nextRollerCarousel"><i class="fa fa-arrow-right"></i></span>
              </div>
            </div>
          </div>

        </div>
        <!-- </div> -->
      </div>
    </section>
    <!-- ======= Treatments Section end ======= -->

    <!-- ======= Gallery Section start ======= -->
    <section id="gallery">
      <div class="container-fluid px-0">
        <div class="galleryHead">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-12 d-none d-md-block">
              <div class="text-center">
                <img src="{{url('assetss/img/gallery/leftgalleryleaf.png')}}" alt="" data-aos="fade-down" data-aos-easing="linear"
                  data-aos-duration="1500">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
              <div class="text-center galleryCaption">
                <img src="{{url('assetss/img/gallery/galleryHead.png')}}" alt="" class="img-fluid galleryHeadMobile">
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-12 d-none d-md-block">
              <div class="text-end">
                <img src="{{url('assetss/img/gallery/rightgalleryleaf.png')}}" alt="" data-aos="fade-down"
                  data-aos-easing="linear" data-aos-duration="1500">
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid px-0">
          <div class="galleryMainContent d-none d-md-block">
              <div class="row m-0 galMainRow">
                  <div class="col-xl-3 col-lg-3 col-12 galMainCol1">
                      <div class="row galMainCol1-row1">
                          <div class="col-12 galMainImgParent">
                              <img src="{{url('assetss/img/gallery/galleryImg1.png')}}" alt="" id="galBgSpecImg">
                              <h2 class="galleryImgcontnt1 text-white">Treating&nbsp;the<br> source, <br> Not the <br>
                                  Symptom
                              </h2>
                          </div>
                      </div>
                      <div class="row galMainCol1-row2">
                          <div class="col-12 galMainImgParent" id="galImgC1R2">
                              <img src="{{url('assetss/img/gallery/galleryImg3.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg6.png')}}" alt="">
                            <img src="{{url('assetss/img/gallery/galleryImg7.png')}}" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-12 galMainCol2">
                      <div class="row galMainCol2-row1">
                          <div class="col-xl-6 col-lg-6 col-12 galMainImgParent galBr-5" id="galImgC2R1">
                              <img src="{{url('assetss/img/gallery/galleryImg2.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg4.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg5.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg8.png')}}" alt="">
                          </div>
                          <div class="col-xl-6 col-lg-6 col-12 galMainImgParent" id="galMainImgParent-TxtSp2">
                              <div class="galleryTextSpace2 text-center" id="galleryTextSpace2">
                                  <h2 class="galleryImgcontnt2 text-white">"Life is a <br> combination <br> of magic &
                                      <br> yoga"
                                  </h2>
                              </div>
                          </div>
                      </div>
                      <div class="row galMainCol2-row2">
                          <div class="col-xl-5 col-lg-5 col-12 galMainImgParent galBr-5" id="galImgC2R2">
                              <img src="{{url('assetss/img/gallery/galleryImg4.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg5.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg8.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg2.png')}}" alt="">
                          </div>
                          <div class="col-xl-7 col-lg-7 col-12 galMainImgParent">
                              <p class="galleryText3 pt-5 text-center p-3">Science of yoga and ayurveda is subtler
                                  than the
                                  science of
                                  medicine,  because science of medicine is often victim of statistical
                                  manipulation</p>
                          </div>
                      </div>
                      <div class="row galMainCol2-row3">
                          <div class="col-xl-6 col-lg-6 col-12 galMainImgParent galBr-5" id="galImgC2R3">
                              <img src="{{url('assetss/img/gallery/galleryImg5.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg8.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg2.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg4.png')}}" alt="">
                          </div>
                          <div class="col-xl-6 col-lg-6 col-12 galMainImgParent" id="galImgC3R3">
                              <img src="{{url('assetss/img/gallery/galleryImg6.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg7.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg3.png')}}" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-12 galMainCol3">
                      <div class="row galMainCol3-row1">
                          <div class="col-12 galMainImgParent" id="galImgC4R1">
                              <img src="{{url('assetss/img/gallery/galleryImg7.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg3.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg6.png')}}" alt="">
                          </div>
                      </div>
                      <div class="row galMainCol3-row2">
                          <div class="col-12 galMainImgParent" id="galImgC4R2">
                              <img src="{{url('assetss/img/gallery/galleryImg8.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg2.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg4.png')}}" alt="">
                              <img src="{{url('assetss/img/gallery/galleryImg5.png')}}" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3" id="borderOnlyGallery"></div>
              </div>
          </div>
          
         <!-- Gallery Mobile View -->
          
         <div class="galleryContentMob d-md-none py-4">
          <div class="row">
            <div class="col-12 px-4">
              <img src="{{url('assetss/img/gallery/GalleryMobImg1.jpg')}}" alt="" class="img-fluid">
            </div>
           </div>
           <div class="col-12 ps-3">
            <img src="{{url('assetss/img/gallery/galleryImg5.png')}}" alt="">
           </div>   
           <div class="col-12 ps-3">
            <img src="{{url('assetss/img/gallery/galleryImg2.png')}}" alt="" class="img-fluid" style="width:360px;">
           </div>             
         </div>

          <!-- Gallery Mobile View -->
        </div>
      </div>
    </section>
    <!-- ======= Gallery Section end ======= -->

    <!-- ======= Why Choose us Section start ======= -->
    <section id="whyChooseUs">
      <div class="container-fluid">
        <div class="row pt-5">
          <div class="col-xl-4 col-md-4 col-4"></div>
          <div class="col-xl-4 col-md-4 col-12">
            <div class="whyChoosePadding">
              <h3 class="text-center pb-3">Why Choose Us</h3>
              <p class="text-center mb-0">Our culture and tradition hold the key to good health. Bethany holds elements
                of surrealism and authenticity that goes far beyond to create a meaningful health care system.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 col-4"></div>
        </div>
        <div class="row">
          <div class="col-xl-4 col-md-4 col-12">
            <div class="text-center pb-1">
              <img src="{{url('assetss/img/whychooseus/leaf.png')}}" alt="">
            </div>
            <div class="whyChoosePadding whyContent1">
              <h3 class="text-center pb-2 fs-5">ALWAYS FRESH</h3>
              <p class="text-center">Fresh foods are the ones that contain the essential amount of nutrients, vitamins
                and minerals that our body requires.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 col-12 d-none d-md-flex whyChoseMainImgContainer">
            <img src="{{url('assetss/img/whychooseus/Whychoose MainImg.png')}}" alt="" class="img-fluid whyChooseImg">
          </div>
          <div class="col-xl-4 col-md-4 col-12">
            <div class="text-center pb-1">
              <img src="{{url('assetss/img/whychooseus/plant.png')}}" alt="">
            </div>
            <div class="whyChoosePadding whyContent2">
              <h3 class="text-center pb-2 fs-5">100% NATURAL</h3>
              <p class="text-center">Ayurveda is one of the world's oldest medical systems and remains one of India's
                traditional health care systems.</p>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-xl-4 col-md-4 col-12">
            <div class="text-center pb-1">
              <img src="{{url('assetss/img/whychooseus/heartbeat.png')}}" alt="">
            </div>
            <div class="whyChoosePadding whyContent3">
              <h3 class="text-center pb-2 fs-5">SUPER HEALTHY</h3>
              <p class="text-center">In Ayurveda, perfect health is defined as "a balance between body, mind, spirit and
                social wellbeing.</p>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 col-4"></div>
          <div class="col-xl-4 col-md-4 col-12">
            <div class="text-center pb-1">
              <img src="{{url('assetss/img/whychooseus/badge.png')}}" alt="">
            </div>
            <div class="whyChoosePadding whyContent4">
              <h3 class="text-center pb-2 fs-5">PREMIUM QUALITY</h3>
              <p class="text-center">Ayurveda teaches that three qualities, called doshas, form important
                characteristics of the prakruti, or constitution.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= Why Choose us Section end ======= -->

    <!-- ======= Newsletter Section start ======= -->
    <section id="newsLetter">
      <div class="container-fluid midShiftY">
        <div class="row">
          <div class="col-12">
            <div class="text-center bg-secondary signUp">
              <h2 class="text-white pb-3">Sign up For News Letter</h2>
              <div class="position-relative mx-5">
                <input class="form-control w-100 py-3 ps-4 pe-5 letterInput" type="text"
                  placeholder="Enter your Email Here">
                <button type="button"
                  class="btn submitBtn px-4 py-2 position-absolute top-0 end-0 mt-2 me-2 text-white">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= Newsletter Section end ======= -->

    <!-- ======= Our Attractions Section start ======= -->

   <section id="ourAttractions">
   <div class="row">
        <div class="col-12">
          <div class="text-center attractns">
            <img src="{{url('assetss/img/teamMembers/oleafLeftImg.png')}}" alt="" class="img-fluid attractnImg pb-5"><span
              class="attractnHead">ur Attractions</span>
          </div>
        </div>
      </div>
    <div class="marquee-wrapper attractn-owl-curve">
      <div class="marquee">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}">
        <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}">
      </div>
    </div>
   </section>


    <!-- <section id="ourAttractions">
      <div class="row">
        <div class="col-12">
          <div class="text-center attractns">
            <img src="{{url('assetss/img/teamMembers/oleafLeftImg.png')}}" alt="" class="img-fluid attractnImg pb-5"><span
              class="attractnHead">ur Attractions</span>
          </div>
        </div>
      </div>

      <div class="scrollCarouselNew" id="scrollCarouselNew">
        <div class="attractnCarousel" id="attractnCarousel">
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}" alt=""></div>
          <div class="itemScollCarousel"><img src="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}" alt=""></div>
        </div>
      </div>
    </section> -->


    <!-- <section id="curvedCarousel">
    
      <div class="container-fluid">
        <div class="row text-center justify-content-center mb-5">
          <div class="col-12">
            <h2 class="text-center">Owl Carousel</h2>
          </div>
        </div>

        <div class="owl-carousel owl-3-slider san-owl-curve">

          <div class="item">
            <a class="slidePic" href="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}" data-fancybox="gallery">
              <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg1.jpg')}}" alt="Image" class="img-fluid">
            </a> 
          </div>

          <div class="item">
            <a class="slidePic" href="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}" data-fancybox="gallery">
              <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg2.jpg')}}" alt="Image" class="img-fluid">
            </a> 
          </div>

          <div class="item">
            <a class="slidePic" href="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}" data-fancybox="gallery">
              <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg3.jpg')}}" alt="Image" class="img-fluid">
            </a> 
          </div>


          <div class="item">
            <a class="slidePic" href="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}" data-fancybox="gallery">
              <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg4.jpg')}}" alt="Image" class="img-fluid">
            </a> 
          </div>

          <div class="item">
            <a class="slidePic" href="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}" data-fancybox="gallery">
              <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg5.jpg')}}" alt="Image" class="img-fluid">
            </a> 
          </div>

          <div class="item">
            <a class="slidePic" href="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}" data-fancybox="gallery">
              <img src="{{url('assetss/img/ourAttractions/ourAtttractnImg6.jpg')}}" alt="Image" class="img-fluid">
            </a> 
          </div>

        </div>

      </div>
	
    </section> -->




    <!-- ======= Our Attractions Section end ======= -->


    <!-- ======= Our Team Members Section start ======= -->
    <section id="teamMembers">
      <div class="leafContainerNew">
        <div class="row">
          <div class="col-12">
            <div class="text-center">
              <img src="{{url('assetss/img/teamMembers/oleafLeftImg.png')}}" alt="" class="img-fluid teamMembrImg pb-5"><span
                class="teamMemberHead">ur Team Members</span>
            </div>
          </div>
        </div>
        <div class="container">
        <div class="row">
          <div class="col-lg-4 teamSpace text-center">
            <div class="teamContainer">
              <img src="{{url('assetss/img/teamMembers/member1.png')}}" alt="">
              <div class="triangleBox triangle-lr">
                <div class="triangleBox triangle-lr">
                  <div>
                    <h4 class="text-left">VERY REV. DR. FR. Mathew <br> Jacob Thiruvalil OIC</h4>
                  </div>
                </div>
              </div>
              <div class="triangleBox triangle-rl">
                <div>
                  <a href="#" class="fa fa-facebook pe-1 "></a>
                  <a href="#" class="fa fa-twitter pe-1"></a>
                  <a href="#" class="fa fa-google"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 teamSpace1">
            <div class="teamContainer">
              <img src="{{url('assetss/img/teamMembers/member2.webp')}}" alt="">
              <div class="triangleBox triangle-lr triCont-lt">
                <div>
                  <h4 class="pb-3">DR. Chincy Mohan</h4>
                </div>
              </div>
              <div class="triangleBox triangle-rl">
                <div>
                  <a href="#" class="fa fa-facebook pe-1"></a>
                  <a href="#" class="fa fa-twitter pe-1"></a>
                  <a href="#" class="fa fa-google"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 teamSpace2">
            <div class="teamContainer">
              <img src="{{url('assetss/img/teamMembers/member3.png')}}" alt="">
              <div class="triangleBox triangle-lr">
                <div class="triangleBox triangle-lr">
                  <div>
                    <h4>FR. Geevarghese <br> Thiruvalil OIC</h4>
                  </div>
                </div>
              </div>
              <div class="triangleBox triangle-rl">
                <div>
                  <a href="#" class="fa fa-facebook pe-1"></a>
                  <a href="#" class="fa fa-twitter pe-1"></a>
                  <a href="#" class="fa fa-google"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="d-none d-md-block leftLeaf">
            <img src="{{url('assetss/img/teamMembers/leafRight.png')}}" alt=""
              class="animate__animated animate__rotateInDownRight animate__delay-2s">
          </div>
          <div class="d-none d-md-block rightLeaf">
            <img src="{{url('assetss/img/teamMembers/leafLeft.png')}}" alt=""
              class="animate__animated animate__rotateInDownLeft animate__delay-3s">
          </div>
      </div>
    </section>
    <!-- ======= Our Team Members Section end ======= -->

    <!-- ======= Footer ======= -->
    <section class="section-footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <div class="widget-a">
              <div class="w-header-a">
                <div class="ps-5">
                  <img src="{{url('assetss/img/logo/bethany logo.png')}}" alt="">
                </div>
                <h3 class="w-title-a footerHead">Bethany</h3>
              </div>
              <div class="w-body-a">
                <p class="w-text-a footerMainContent pe-xl-5">
                  Bethany Nature Cure centre was established in the year 1976, the first of tis kind in Kerala, in a
                  building which was located at Bethany Ashram, Nalanchira. On August 1982, a new hospital building was
                  inaugurated at Mekkonam, Bethany Nagar, Nalanchira. Bethany Nature cure centre is one of the best
                  naturopathy hospitals in India.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-2 section-md-t3 footerSpace">
            <div class="widget-a">
              <div class="w-header-a">
                <h3 class="w-title-a footerSubHead">About</h3>
              </div>
              <div class="w-body-a">
                <div class="w-body-a">
                  <ul class="list-unstyled">
                    <li class="item-list-a py-2">
                      <a href="#">Menu</a>
                    </li>
                    <li class="item-list-a pb-2">
                      <a href="#">Features</a>
                    </li>
                    <li class="item-list-a pb-2">
                      <a href="#">News & Blogs</a>
                    </li>
                    <li class="item-list-a">
                      <a href="#">Help & Support</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 section-md-t3 footerSpace">
            <div class="widget-a">
              <div class="w-header-a">
                <h3 class="w-title-a footerSubHead">Company</h3>
              </div>
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a py-2">
                    <a href="#">How we work</a>
                  </li>
                  <li class="item-list-a pb-2">
                    <a href="#">Terms of service</a>
                  </li>
                  <li class="item-list-a pb-2">
                    <a href="#">Pricing</a>
                  </li>
                  <li class="item-list-a">
                    <a href="#">FAQ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 section-md-t3 footerSpace">
            <div class="widget-a">
              <div class="w-header-a">
                <h3 class="w-title-a footerSubHead">Contact Us</h3>
              </div>
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a pt-2 pb-3">
                    <a href="#">Bethany Nagar, Nalanchira <br> Trivandrum-695025</a>
                  </li>
                  <li class="item-list-a pb-2">
                    <a href="#">bethnynaturecure@mail.com</a>
                  </li>
                  <li class="item-list-a">
                    <a href="#">www.bethnynaturecure.com</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-footer">
                <p class="copyright mb-1">
                  &copy; Copyright
                  <span class="color-a fw-bold text-black">BETHANY.</span> All Rights Reserved
                </p>
              </div>
              <div class="credits fs-6">
                Designed with <i class="ri-heart-fill fs-4 text-black"></i> by <a href="http://techstas.com/"
                  class="text-black fw-bold">Techstas Info Solutions</a>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </section>
    <!-- ======= End Footer ======= -->
  </div>


  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="{{url('assetss/vendor/purecounter/purecounter_vanilla.js')}}"></script>

  <!-- Scroll Carousel JS -->
  <script src="{{url('assetss/js/scrollCarousel.js')}}"></script>

  <!-- Treatment Carousel JS -->
  <script src="{{url('assetss/js/treatmentCarousel.js')}}"></script>

  <!-- Gallery JS -->
  <script src="{{url('assetss/js/galleryImgChange.js')}}"></script>

  

  <!-- Owl Carousel js -->
  <script src="{{url('assetss/js/popper.min.js')}}"></script>
  <script src="{{url('assetss/js/owl.carousel.min.js')}}"></script>
  <script src="{{url('assetss/js/jquery.fancybox.min.js')}}"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="{{url('assetss/js/aos.js')}}"></script>
  <!-- <script src="{{url('assetss/js/bootstrap.min.js')}}"></script> -->
 
  <!-- <script src="{{url('assetss/js/jquery-3.4.1.min.js')}}"></script> -->
  <!-- <script src="{{url('assetss/js/script.js')}}"></script> -->
  
 <!-- Navbar JS File -->

 <script src="{{url('assetss/js/navbar.js')}}"></script>
  

  <!-- Main JS File -->
  <script src="{{url('assetss/js/script.js')}}"></script>
  <script src="{{url('assetss/js/custom.js')}}"></script>
  <script>
    AOS.init({
    });
    const myCarouselElement = document.querySelector('#carouselExampleCaptions')
    const carousel = new bootstrap.Carousel(myCarouselElement, {
      pause:false
    })
  </script>
</body>

</html>