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
                            <p>Silahhkan isi data dibawah ini untuk emalkukan Registrasi Pendaftaran di KSPPS BMT BUMI</p>
                            <?= $this->session->flashdata('alert');
                            $this->db->order_by('id_anggota', 'desc');
                            $simp = $this->db->get('tb_anggota', 1)->row();
                            ?>
                            <form action="<?= base_url('anggota/add') ?>" method="post">
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Id. Anggota</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" readonly name="kode_simpan" value="A<?= str_replace('/','',shortdate_indo(date('Y-m-d'))).($simp->id_anggota + 1)?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" required class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">KTP</label>
                                    <div class="col-sm-9">
                                        <input type="text" required class="form-control" name="ktp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="2" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" required class="form-control" cols="10" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Telp / HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" required class="form-control" name="tlp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" required class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <select name="kerja" class="form-control">
                                            <option value="PNS">PNS</option>
                                            <option value="Karyawan">Karyawan</option>
                                            <option value="Profesional">Profesional</option>
                                            <option value="Wiraswasta">Wiraswasta </option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Nama Ibu Kandung</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ibu">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Nama Ahli Waris</label>
                                    <div class="col-sm-9">
                                        <input type="text" required class="form-control" name="waris">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-3 col-form-label">Hub. Ahli Waris</label>
                                    <div class="col-sm-9">
                                        <select name="hub_waris" class="form-control">
                                            <option value="Pasangan">Pasangan</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Orangtua">Orangtua </option>
                                            <option value="Saudara Kandung">Saudara Kandung</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-danger">Tambah Data</button>
                                </div>
                            </form>

                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <?php $this->load->view('pages/sidebar'); ?>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->