<main id="main" data-aos="fade-up">

    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url('asset/img/promo/' . $promo->img) ?>" class="card-img-top" height="300px">
                </div>
                <div class="div col-md-8">
                    <h3><?= $promo->judul ?></h3>
                    <span>Masa Berlaku hingga : <?= $promo->jadwal ?></span>
                    <hr>
                    Harga Mulaid ari :
                    <h3><?= rupiah($promo->harga) ?></h3>
                    Kamu bisa menghubungi jika ingin memesan <br>

                    <a href="https://wa.me/62081291720577" class="mt-3 px-5 btn btn-warning">Beli Promo</a>
                    <hr>
                </div>
                <div class="col-md-12 p-3">
                    <p><?= $promo->ket ?></p>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->