<main id="main" data-aos="fade-up">

    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <!-- Card-->
                    <div class="card rounded shadow-sm border-0">
                        <div class="card-body p-0">
                            <div class="bg-warning py-3 text-center card-img-top"><img src="<?= base_url('asset/img/dokter/' . $dokter->img) ?>" alt="..." width="100" class="rounded-circle mb-2 img-thumbnail d-block mx-auto">

                            </div>
                            <div class="p-4 text-center justify-content-center">

                                <ul class="list-inline small">
                                    <li class="list-inline-item m-0"><i class="icofont-star text-warning mr-3"></i></li>
                                    <li class="list-inline-item m-0"><i class="icofont-star text-warning mr-3"></i></li>
                                    <li class="list-inline-item m-0"><i class="icofont-star text-warning mr-3"></i></li>
                                    <li class="list-inline-item m-0"><i class="icofont-star text-warning mr-3"></i></li>
                                    <li class="list-inline-item m-0 "><i class="icofont-star text-warning "></i></li>
                                </ul>
                                <a href="#book" data-toggle="modal" class="text-white btn-block btn btn-success">BOOKING SEKARANG</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h5 class="font-weight-bold mb-0 d-block"><?= $dokter->nama ?></h5>
                    <p class="text-muted"><?= $dokter->gelar ?></p>
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/F8tDU-BUdHU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p><?= $dokter->profil ?></p>
                    </p>
                </div>
                <div class="col-lg-3">
                    <h5>Jadwal</h5>
                    <div class="mb-3">
                        <p>Minggu, 7 Januari 2021</p>
                        <a href="#booking" class="text-white btn-block btn btn-danger">13.00 s/d 15.00</a>
                    </div>
                    <div>
                        <p>Minggu, 7 Februari 2021</p>
                        <a href="#booking" class="text-white btn-block btn btn-warning">13.00 s/d 15.00</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Praktek Dokter</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dokter/booking') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="1">Nama Pasien</label>
                                <input type="text" class="form-control" id="1" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="1">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="1" name="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label for="1">Alamat Email</label>
                                <input type="text" class="form-control" id="1" name="nama">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="1">No. HP</label>
                                <input type="text" class="form-control" id="1" name="nama">
                        </div>
                            <div class="form-group">
                                <label for="1">Alamat</label>
                                <textarea type="text" class="form-control ckeditor" id="ckeditor" name="alamat" rows="5"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="4">Keluhan</label>
                            <textarea type="text" class="form-control ckeditor" id="ckeditor" name="keluhan" rows="5"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>