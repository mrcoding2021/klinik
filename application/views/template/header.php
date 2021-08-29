<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('asset/') ?>img/logo.png" rel="icon">
  <link href="<?= base_url('asset/') ?>img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('asset/tema/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('asset/tema/') ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('asset/tema/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('asset/tema/') ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('asset/tema/') ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('asset/tema/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="<?= base_url('asset/tema/') ?>assets/vendor/jquery/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?= base_url('asset/tema/') ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v1.2.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">admin@imanimedika.com</a>
        <i class="icofont-phone"></i><a href="https://wa.me/6281291720577">0812-9172-0577</a>
      </div>
      <div class="contact-info">
        <a href="<?= base_url('home/profile') ?>" class="pr-3">Profil</a>
        <a href="<?= base_url('post/artikel') ?>" class="pr-3">Artikel</a>
        <a href="<?= base_url('home/kontak') ?>" class="pr-3">Kontak</a>
        <a href="<?= base_url('auth') ?>" class="pr-3">Login</a>
        <!-- <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a> -->
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html">BizLand<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="<?= base_url() ?>" class=" mr-auto"><img src="<?= base_url('asset/') ?>img/logo.png" alt="" width="100" height="70"></a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?= ($title == 'Imani Medika') ? 'active' : '' ?>"><a href="<?= base_url() ?>">Home</a></li>
          <li class="<?= ($title == 'Klinik Pratama') ? 'active' : '' ?>"><a href="<?= base_url('klinik_pratama') ?>">Klinik Pratama</a></li>
          <li class="<?= ($title == 'Dokter') ? 'active' : '' ?>"><a href="<?= base_url('dokter') ?>">Dokter</a></li>
          <li class="<?= ($title == 'Promo') ? 'active' : '' ?>"><a href="<?= base_url('promo') ?>">Promo</a></li>
          <li class="<?= ($title == 'Cek Kesehatan') ? 'active' : '' ?>"><a href="<?= base_url('cek_kesehatan') ?>">Cek Kesehatan</a></li>
          <li class="<?= ($title == 'Booking') ? 'active' : '' ?>"><a href="<?= base_url('booking') ?>">Booking</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Breadcrumbs ======= -->
  <?php if ($title != 'Imani Medika') { ?>

    <section class="breadcrumbs pt-5">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $title ?></h2>
          <ol>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li><?= $title ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
  <?php } ?>