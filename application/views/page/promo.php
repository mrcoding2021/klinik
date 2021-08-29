<main id="main" data-aos="fade-up">

    <section class="inner-page">
        <div class="container">
            <div class="row">
                <?php foreach ($promo as $pro) { ?>
                    <div class="col-md-3 mb-3">
                    <a href="<?= base_url('home/detail/'.str_replace(' ','-',$pro->judul).'/'. $pro->id)?>">
                        <div class="card h-100 shadow">
                            <img src="<?= base_url('asset/img/promo/'.$pro->img) ?>" class="card-img-top" height="200px">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pro->judul?></h5>
                                <p class="card-text"><?= $pro->jadwal?></p>
                            </div>
                        </div>
                    </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->