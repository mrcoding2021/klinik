<main id="main">



    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <h3 class="text-center text-primary mb-4"><?= $title ?></h3>
            <div class="row">
                <div class="col-md-12 d-flex">
                    <p class="alert alert-primary"><i class="fas fa-home"></i> Jika semua jadwal dokter penuh silahkan ulangi pendaftaran dengan memilih hari berobat yang lain, Klik logo Medika Antapani untuk memulai kembali!</p>
                </div>
                <div class="col-md-12 mb-3">
                    <form action="<?= base_url('pendaftaran/daftar') ?>" method="post">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Nama Pasiem</label>
                                <input type="text" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6">
                                <label>No. KTP / Orang Tua</label>
                                <input type="text" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label>Pilih Dokter</label>
                                <select class="form-control form-control-lg">
                                    <option value="0">Dokter</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>-</label>
                                <a href="#" class="btn-block btn btn-lg btn-success text-white">Ambil Antrian</a>
                            </div>
                        </div>
                    </form>


                </div>


            </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->