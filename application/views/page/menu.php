<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs bg-danger">
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

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single" data-aos="fade-up">

            <div class="entry-img">
              <img src="assets/img/blog-1.jpg" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <?= $title ?> KSPPS - BMT BUMI
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> Admin</li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2020-01-01"></time></li>

              </ul>
            </div>

            <div class="entry-content">
              <?php if ($detail->nama == 'Kontak') : ?>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1722.4654151203554!2d107.02261506531553!3d-6.187315364585968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69896c56e37d07%3A0x9c5c345fd16790a3!2sVGH%20pintu%20barat!5e1!3m2!1sen!2sid!4v1600700574831!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><br>
                <?= $detail->isi ?>
              <?php elseif ($detail->nama == 'Produk') : ?>
                <div class="sidebar-title">
                  <h3>Produk Simpanan</h3>
                </div>
                <div class="sidebar-item categories">
                  <ul>
                    <?php foreach ($produk as $key) : ?>
                      <?php if ($key->kategori == 1) : ?>
                        <li><a href="<?= base_url('produk/detail/' . $key->id_paket) ?>"><?= $key->nama ?></a></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                </div>
                <div class="sidebar-title">
                  <h3>Produk Pembiayaan</h3>
                </div>
                <div class="sidebar-item categories">
                  <ul>
                    <?php foreach ($produk as $key) : ?>
                      <?php if ($key->kategori == 0) : ?>
                        <li><a href="<?= base_url('produk/detail/' . $key->id_paket) ?>"><?= $key->nama ?></a></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                </div>
              <?php else : ?>
                <?= $detail->isi ?>
              <?php endif ?>

            </div>

          </article><!-- End blog entry -->

        </div><!-- End blog entries list -->

        <?php $this->load->view('pages/sidebar'); ?>

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->