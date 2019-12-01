@extends('layouts.customer')

@section('content')
{{--     <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="{{asset('images/2.jpg')}}" height="100px" width="100px" alt="First slide">   Gambar 1 
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="{{asset('images/3.jpg')}}" alt="Second slide"> Gambar 2 
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="{{asset('images/4.jpg')}}" alt="Third slide">  Gambar 3 
          </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


       Marketing messaging and featurettes
      ================================================== 
     Wrap the rest of the page in another container to center all the content. 

      <div class="container marketing">


         <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-12" style="text-align: justify;">
            <h1 class="featurette-heading" style="text-align: center;"><font face="oswald"><b>Sejarah Singkat PT Anugrah Distributor Indonesia</b></font></h1><br>
            <p class="lead"><font face="times new roman">PT Anugrah Distributor Indonesia yang berdiri pada tahun 2016 adalah perusahan yang bergerak dibidang ritel khususnya pada produk perawatan otomotif (automotive care), cat semprot (spray paint) dan pelumas (lubricant) dengan merk terdaftar A72 King yaitu dengan produk chain lube. spray paint, premium paint, paint remover, drain max, oli shock, fuel injector, foaming cleaner dan masih banyak lagi. Adapun pendirinya yaitu bernama Anandhan S.T. Melihat pasar yang semakin besar yaitu makin banyaknya motor dan mobil yang membutuhkan perawatan secara berkala dan rutin memotivasi beliau untuk membuat serta memasarkan merk dan nama produk A72 yang mampu bersaing secara kualitas maupun harga pada produk yang sudah ada sebelumnya.</font>
        <div class="row featurette">
          <div class="col-md-12" style="text-align: justify;">
            <p class="lead"><font face="times new roman">Perusahaan berkantor di alamat jalan Prabu Kian Santang no. 169a, Sangiang Tangerang ini dalam aktivitasnya perusahaan banyak bergerak dibidang bisnis seperti penjualan produk dan pembelian bahan baku produk. Seperti perusahaan pada umumnya PT. Anugrah Distributor Indonesia juga meningkatkan aktivitas bisnis dengan menjalin kerjasama pada toko/bengkel yang menyediakan secara khusus perawatan mobil/motor  ataupun peralatan ritel lainnya demi tercapainya maksud dan tujuan perusahaan.</p><br></font>
          </div>
        </div>

      <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">


      </div>
     
    </main> --}}

    <!-- Slide1 -->
  <section class="slide1">
    <div class="wrap-slick1">
      <div class="slick1">
        <div class="item-slick1 item1-slick1" style="background-image: url({{ asset('images/888888.png') }});">
          <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
            <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
              <font color="gold"> Lubricant For Champions </font>
            </span>

            <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
              New Variants
            </h2>

            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
              <!-- Button -->
              <a href="{{ route('catalogue') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                Shop Now
              </a>
            </div>
          </div>
        </div>

        <div class="item-slick1 item2-slick1" style="background-image: url({{ asset('images/9.png') }});">
          <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
            <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
             <font color="red"> New Variants </font>
            </span>

            <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
              Spray Paint & Premium Spray Paint
            </h2>

            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
              <!-- Button -->
              <a href="{{ route('catalogue') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                Shop Now
              </a>
            </div>
          </div>
        </div>

        <div class="item-slick1 item3-slick1" style="background-image: url({{ asset('images/11.png') }});">
          <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
            <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
             <font color="yellow"> Check Our Catalogue </font>
            </span>

            <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
               Home Care Solution
            </h2>

            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
              <!-- Button -->
              <a href="{{ route('catalogue') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                <font color="goldk"> Shop Now </font>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Banner -->
  <section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="{{ asset('images/44.png') }}" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              {{-- <a href="{{ route('catalogue') }}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4"> --}}
                Freshener
              </a>
            </div>
          </div>

          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="{{ asset('images/7.png') }}" alt="IMG">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="{{ route('catalogue') }}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                Order Now
              </a>
              <button class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">Kacamata</button>
            </div>
          </div>
        </div>

        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="{{ asset('images/3.png') }}" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="{{ route('catalogue') }}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                All Spray Paint
              </a>
            </div>
          </div>

          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="{{ asset('images/5.png') }}" alt="IMG-BENNER">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="{{ route('catalogue') }}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                Automotive Care
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="{{ asset('images/2.png') }}" alt="IMG">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="{{ route('catalogue') }}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                Chain Lube
              </a>
            </div>
          </div>

          <!-- block2 -->
          <div class="block2 wrap-pic-w pos-relative m-b-30">
            <img src="{{ asset('images/6.png') }}" alt="IMG">

            <div class="block2-content sizefull ab-t-l flex-col-c-m">
              <h4 class="m-text4 t-center w-size3 p-b-8">
                Sign up & get comfortable when driving
              </h4>

              <p class="t-center w-size4">
                <font color="black"> Be the frist to know about the latest product </font>
              </p>

              <div class="w-size2 p-t-25">
                <!-- Button -->
                <a href="{{ route('register') }}" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                  Sign Up
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Banner2 -->
  {{-- <section class="banner2 bg5 p-t-55 p-b-55">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
          <div class="hov-img-zoom pos-relative">
            <img src="{{ asset('images/banner-08.jpg') }}" alt="IMG-BANNER">

            <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
              <span class="m-text9 p-t-45 fs-20-sm">
                The Beauty
              </span>

              <h3 class="l-text1 fs-35-sm">
                Lookbook
              </h3>

              <a href="#" class="s-text4 hov2 p-t-20 ">
                View Collection
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
          <div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
            <img src="{{ asset('images/shop-item-09.jpg') }}" alt="IMG-BANNER">

            <div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
              <div class="t-center">
                <a href="product-detail.html" class="dis-block s-text3 p-b-5">
                  Gafas sol Hawkers one
                </a>

                <span class="block2-oldprice m-text7 p-r-5">
                  $29.50
                </span>

                <span class="block2-newprice m-text8">
                  $15.90
                </span>
              </div>

              <div class="flex-c-m p-t-44 p-t-30-xl">
                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                  <span class="m-text10 p-b-1 days">
                    69
                  </span>

                  <span class="s-text5">
                    days
                  </span>
                </div>

                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                  <span class="m-text10 p-b-1 hours">
                    04
                  </span>

                  <span class="s-text5">
                    hrs
                  </span>
                </div>

                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                  <span class="m-text10 p-b-1 minutes">
                    32
                  </span>

                  <span class="s-text5">
                    mins
                  </span>
                </div>

                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                  <span class="m-text10 p-b-1 seconds">
                    05
                  </span>

                  <span class="s-text5">
                    secs
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 --}}

@endsection