@extends('layouts.front.app')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

<div class="container">
    <div class="row">
    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>SISTEM INFORMASI PENGOLAH SAMPAH (SIPAPAH)</h1>
        <h2>Sipapah adalah aplikasi pengolah sampah kertas untuk semua kalangan yang hidup dengan tumpukan kertas. Kita harus peduli terhadap kelestarian alam untuk tidak membuang kertas bekas sembarangan. Meskipun harga kertas bekas tidak seberapa, menjual kertas bekas berarti turut menjaga kelestarian lingkungan. Cinta Alam bersama SIPAPAH.
        </h2>
    </div>
    <div class="col-lg-3 order-3 order-lg-2 daurulang">
        <img src="frontend/assets/img/daurulang.png" class="img-fluid" alt="">
    </div>
    </div>
</div>

</section><!-- End Hero -->

<main id="main">

<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-6 col-lg-3 pickup">
                <img src="frontend/assets/img/shipped.png" alt="" class="img-fluid">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-9 pick-up">
            <h1> Layanan PickUp</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis asperiores quibusdam quos quo rem laborum, excepturi minima ad iste ipsam facere quasi reprehenderit aliquid reiciendis similique, adipisci tempora provident placeat!<span> <a href="#" class="layanan"></a> selengkapnya ..... </span></p>
            </div>
        </div>
    </div>
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container">

    <div class="section-title">
      <a href="/kreasi"><h2>KREASI</h2></a>
      <p>Kreasi adalah salah satu fitur SIPAPAH dimana isinya mengenai tutorial mendaur ulang sampah yang masih layak.</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""></div>
          <h4 class="title"><a href="">Tutorial membuat Tas</a></h4>
          <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""></div>
          <h4 class="title"><a href="">Dolor Sitema</a></h4>
          <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-wow-delay="0.1s">
        <div class="icon-box">
          <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt=""></div>
          <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-wow-delay="0.1s">
        <div class="icon-box">
          <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt=""></div>
          <h4 class="title"><a href="">Magni Dolores</a></h4>
          <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-wow-delay="0.2s">
        <div class="icon-box">
          <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt=""></div>
          <h4 class="title"><a href="">Nemo Enim</a></h4>
          <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-wow-delay="0.2s">
        <div class="icon-box">
          <div class="img-thumbnail"><img src="frontend/assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt=""></div>
          <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
          <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
        </div>
      </div>
    </div>

  </div>
</section><!-- End Services Section -->

</main><!-- End #main -->

@endsection
