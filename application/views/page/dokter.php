<main id="main" data-aos="fade-up">
    <style>
        .hover {
            border-color: black;
            position: relative;
            top: -10px
        }
    </style>
    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <h4>Cari Dokter</h4>
                    <input type="text" name="ceri" class="form-control">
                    <select name="kategori" class="form-control my-1">
                        <option value="1">Dokter Gigii</option>
                        <option value="2">Dokter Umum</option>
                        <option value="3">Dokter Spesialis Jantung</option>
                    </select>
                    <a href="#" class="btn btn-block btn-warning text-white btn-sm">Cari</a>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        $this->db->where('level', 3);
                        $this->db->where('is_active', 1);
                        $dokter = $this->db->get('tb_user')->result();
                        foreach ($dokter as $key) { ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-4 mb-lg-0">
                                <!-- Card-->
                                <div class="card rounded border-0">
                                    <div class="card-body p-0 m-2 shadow-sm ">
                                        <div class=" d-flex   card-img-top">
                                            <img src="<?= base_url('asset/img/dokter/') . $key->img ?>" alt="..." height="100" width="100" class="rounded-circle p-3">
                                            <div class="p-3">
                                                <h5 class="text-dark mb-0"><?= strtoupper($key->nama) ?></h5>
                                                <p class="small mb-0" style="font-style: italic;"><?= $key->gelar ?></p>
                                                <a href="<?= base_url('dokter/profile/'.str_replace(' ','-',$key->nama))?>" class="badge badge-warning text-white">Detail</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->