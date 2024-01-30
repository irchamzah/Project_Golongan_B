@extends('layouts.front.app')
@section('content')

<section id="hero" class="d-flex align-items-center">
  <style>
    #hero .daurulang img {
      top: -10px;
    }
  </style>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>SISTEM INFORMASI PENGOLAH SAMPAH (SIPAPAH)</h1>
        <h2>Sipapah adalah aplikasi pengolah sampah. Kita harus peduli terhadap kelestarian alam untuk tidak membuang sampah sembarangan, terutama sampah kertas, kardus dan plastik. Meskipun harga kertas bekas tidak seberapa, menjual sampah yang dapat di daur ulang berarti turut menjaga kelestarian lingkungan. Mari cintai Alam bersama SIPAPAH.
        </h2>
        <div></div>
      </div>
      
      <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="IMG/HOME/recycle1.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<main id="main">

  <section id="services" class="about">
    <div class="container">

      <div class="row">
        <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative">
          <a class="glightbox play-btn mb-4">
            <img src="IMG/HOME/recycle.png" class="img-fluid" alt="">
          </a>
        </div>

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <h3>Kami Akan Menjemput Sampah Kalian</h3>
          <p>Terkadang Warga Indonesia menyimpan sampah-sampah di belakang rumah mereka dan tidak segera mengirimnya ke pengepul. Apa alasannya? mungkin mereka Malas atau mungkin tidak ada waktu untuk Mengirimnya ke pengepul. Jika demikian maka Kami adalah Solusinya!
            <br>
            Kami akan datang menjemput sampah kalian dan akan dibayar langsung ditempat! <br>

            Tunggu apa lagi? <a href="/layanan">Ayo mulai Memesan!</a>
          </p>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Dampak Kami</h2>
      </div>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="IMG/HOME/lingkungan.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Lingkungan</h4>
              <p>Krisis sampah global bukan hanya mencemari ekosistem, tetapi juga menyumbang karbon dan mempercepat pemanasan global. Terlibatlah untuk mendaur ulang lebih banyak, ciptakan ekonomi sirkular mulai dari rumahmu.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="IMG/HOME/ekonomi.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Ekonomi</h4>
              <p>Polusi sampah plastik menimbulkan kerugian ekonomi yang tidak sedikit, dan berskala global. Sipapah mengubah sampahmu menjadi mata uang. Membawa ekonomi sirkular sekaligus inklusi ekonomi bagi semua orang.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="IMG/HOME/kesehatan.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Kesehatan</h4>
              <p>Polusi sampah tidak hanya berdampak pada hewan laut dan estetika. Tetapi juga mencemari rantai makanan, termasuk di dalamnya manusia. Ikan, garam dan air yang kita minum mungkin saja mengandung mikro plastik. Daur ulang dengan Sipapah..</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->



  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <!-- <h2>Bergabunglah Bersama Kami!</h2> -->
      </div>

      <div>
        <img style="border:0; width: 100%; " src="IMG/HOME/imgHome.png" frameborder="0" allowfullscreen></img>
      </div>

    </div>
  </section><!-- End Contact Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container">

      <div class="section-title">
        <h2>Liputan Media</h2>
        <!-- <p>Foto sampah daur ulang, upload ke Sipapah, kolektor terdekat akan datang menjemput, menimbang dan membayar sampahmu.</p> -->
      </div>

      <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-7.png" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="frontend/assets/img/clients/client-8.png" class="img-fluid" alt="">
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Clients Section -->


  <!-- <section class="about">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-3 col-md-6 col-lg-3 pickup">
                  <img src="frontend/assets/img/shipped.png" alt="" class="img-fluid">
              </div>
              <div class="col-sm-9 col-md-6 col-lg-9 pick-up">
              <h1 class="mt-md-5 pt-3">Layanan PickUp</h1>
              <p>Layanan yang kami berikan di aplikasi ini adalah memberikan layanan penjemputan sampah dan proses pembayaran secara langsung (Cash On Delivery)<span> <a href="#" class="layanan"></a></span></p>
              </div>
          </div>
      </div>
  </section> -->



  <!-- <section id="services" class="services section-bg">
    <div class="container">

      <div class="section-title">
        <a href="/kreasi"><h2>KREASI</h2></a>
        <p>Kreasi adalah salah satu fitur SIPAPAH dimana isinya mengenai tutorial mendaur ulang sampah yang masih layak.</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="icon-box">
            <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/daur ulang botol.png" class="img-fluid" alt=""></div>
            <h4 class="title"><a href="https://youtu.be/uk5CP6DnEK8" target="_blank">Kotak Pensil Dari Botol Bekas</a></h4>
            <p class="description"></p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box">
            <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/daur ulang kardus.png" class="img-fluid" alt=""></div>
            <h4 class="title"><a href="https://youtu.be/-fvlyHqSbZQ" target="_blank">Tempat Sampah Mini Dari Kardus Bekas</a></h4>
            <p class="description"></p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-wow-delay="0.1s">
          <div class="icon-box">
            <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/paper.png" class="img-fluid" alt=""></div>
            <h4 class="title"><a href="https://youtu.be/Q9s81oDL5Lk" target="_blank">Kertas Daur Ulang</a></h4>
            <p class="description"></p>
          </div>
        </div>
            </div>

    </div>
  </section> -->

</main>

@endsection