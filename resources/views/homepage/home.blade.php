@extends('layouts.customer')

@section('content')
    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="{{asset('images/2.jpg')}}" height="100px" width="100px" alt="First slide">  <!-- Gambar 1 -->
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="{{asset('images/3.jpg')}}" alt="Second slide"> <!-- Gambar 2 -->
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="{{asset('images/4.jpg')}}" alt="Third slide"> <!-- Gambar 3 -->
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


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">


        <!-- START THE FEATURETTES -->

        <!-- <hr class="featurette-divider"> -->

        <div class="row featurette">
          <div class="col-md-12" style="text-align: justify;">
            <h1 class="featurette-heading" style="text-align: center;"><font face="oswald"><b>Sejarah Singkat PT Anugrah Distributor Indonesia</b></font></h1><br>
            <p class="lead"><font face="times new roman">PT Anugrah Distributor Indonesia yang berdiri pada tahun 2016 adalah perusahan yang bergerak dibidang ritel khususnya pada produk perawatan otomotif (automotive care), cat semprot (spray paint) dan pelumas (lubricant) dengan merk terdaftar A72 King yaitu dengan produk chain lube. spray paint, premium paint, paint remover, drain max, oli shock, fuel injector, foaming cleaner dan masih banyak lagi. Adapun pendirinya yaitu bernama Anandhan S.T. Melihat pasar yang semakin besar yaitu makin banyaknya motor dan mobil yang membutuhkan perawatan secara berkala dan rutin memotivasi beliau untuk membuat serta memasarkan merk dan nama produk A72 yang mampu bersaing secara kualitas maupun harga pada produk yang sudah ada sebelumnya.</font>
        <div class="row featurette">
          <div class="col-md-12" style="text-align: justify;">
            <p class="lead"><font face="times new roman">Perusahaan berkantor di alamat jalan Prabu Kian Santang no. 169a, Sangiang Tangerang ini dalam aktivitasnya perusahaan banyak bergerak dibidang bisnis seperti penjualan produk dan pembelian bahan baku produk. Seperti perusahaan pada umumnya PT. Anugrah Distributor Indonesia juga meningkatkan aktivitas bisnis dengan menjalin kerjasama pada toko/bengkel yang menyediakan secara khusus perawatan mobil/motor  ataupun peralatan ritel lainnya demi tercapainya maksud dan tujuan perusahaan.</p><br></font>
          </div>
        </div>

      <!--   <hr class="featurette-divider">

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
 -->
        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
     
    </main>
@endsection