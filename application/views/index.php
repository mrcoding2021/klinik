<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="slider owl-theme owl-carousel mt-5">
    <?php foreach ($slider as $key) { ?>
      <div class="item">
        <img src="<?= base_url('asset/img/slider/'.$key->img)?>" alt="" srcset="">
      </div>
    <?php } ?>
  </div>
</section><!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Selamat Datang</h2>
        <h3>Imani Medika Siap Memberikan Pelayanan Kesehatan Terbaik untuk Anda</h3>

      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
          <iframe width="100%" height="300" src="https://www.youtube.com/embed/0dAoCfgAQw8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
          <p class="font-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <ul>
            <li>
              <i class="bx bx-store-alt"></i>
              <div>
                <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
              </div>
            </li>
            <li>
              <i class="bx bx-images"></i>
              <div>
                <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
              </div>
            </li>
          </ul>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h3>Layanan Kesehatan</h3>
      </div>
      <div class="row text-center">
        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><img src="<?= base_url('asset/img/umum.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">Poli Umum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><img src="<?= base_url('asset/img/gigi.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">Poli Gigi</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><img src="<?= base_url('asset/img/lab.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">Laboratorium</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><img src="<?= base_url('asset/img/cantik.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">Kecantikan</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>
      </div>
      <div class="row text-center pt-4">
        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><img src="<?= base_url('asset/img/care.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">Home Care</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><img src="<?= base_url('asset/img/bidan.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">Kebidanan</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><img src="<?= base_url('asset/img/apotek.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">Apotek</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><img src="<?= base_url('asset/img/ugd.png') ?>" height="100" alt=""></div>
            <h4 class="title"><a href="">UGD</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Featured Services Section -->
 <section> 
   <div class="container">
       <div class="row ">
           <div class="col-lg-12 text-center">
               <h4>Pendaftaran Online</h4>
               <p>Pendafataran pemeriksaan kesehatan secara online untuk umum</p>
               <div><a class="text-white px-5 btn btn-primary btn-lg" href="<?= base_url('pendaftaran') ?>">Daftar</a></div>
           </div>
          
       </div>
   </div>
 </section>
  


  



</main><!-- End #main -->