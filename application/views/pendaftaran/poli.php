<main id="main">



    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <h3 class="text-center text-primary mb-4">Pilih Jadwal Pemeriksaan Dokter</h3>
            <div class="row">
                <div class="col-md-12 d-flex">

                    <p class="alert alert-warning"><i class="fas fa-home"></i> Pendaftaran bisa diakses maksimal H-2 sebelum hari berobat ! Jika jadwal tidak tersedia mohon periksa kembali jadwal dokter di halaman sebelumnya apakah jadwal tersedia dalam 2 hari kedepan atau tidak!</p>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="col-md-12 mb-4">
                        <a href="<?= base_url('pendaftaran/form/') ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">HARI INI - <?= longdate_indo(date('Y-m-d')) ?></div>
                                            <div class="h5">Jadwal Tersedia
                                            </div>
                                        </div>
                                        <div class="col-auto text-right">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dokter</div>
                                            <div class="h5">1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 mb-4">
                        <a href="<?= base_url('pendaftaran/form/') ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">BESOK</div>
                                            <div class="h5">Jadwal Tersedia
                                            </div>
                                        </div>
                                        <div class="col-auto text-right">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dokter</div>
                                            <div class="h5">1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 mb-4">
                        <a href="<?= base_url('pendaftaran/form/') ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LUSA - <?= longdate_indo(date('Y-m') . '-' . (date('d') + 2)) ?></div>
                                            <div class="h5">Jadwal Tersedia
                                            </div>
                                        </div>
                                        <div class="col-auto text-right">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dokter</div>
                                            <div class="h5">1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->