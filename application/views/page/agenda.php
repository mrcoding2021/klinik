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
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2020-01-01">Jan 1, 2020</time></li>

                            </ul>
                        </div>

                        <div class="entry-content">

                            <div class="row">  
                                <?php foreach ($agenda as $key ):?>
                                <div class="vol-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img class="card-img-top" src="<?= base_url('asset/img/agenda/').$key->img?>" alt="Card image cap">
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="card-title mt-3 text-danger"><?= $key->nama?></h5>
                                                    <p class="card-text"><?= $key->isi?> ...</p>
                                                    <p class="card-text"><small class="text-muted">Posted : <?= longdate_indo($key->created_at)?></small></p>
                                                    <!-- <div class="more">
                                                        <a href="" class="btn btn-danger btn-sm">Read More ...</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach?>
                            </div>
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <?php $this->load->view('pages/sidebar'); ?>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->