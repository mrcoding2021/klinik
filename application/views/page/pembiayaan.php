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
                            <p>Silahkan isi data dibawah ini untuk pengajuan pembiayaan di KSPPS BMT BUMI, kami akan proses lebih lanjut</p>
                            <?= $this->session->flashdata('alert');
                            $this->db->order_by('id_pengajuan', 'desc');
                            $simp = $this->db->get('tb_pembiayaan', 1)->row();

                            ?>
                            <form action="<?= base_url('pembiayaan/add') ?>" method="post">
                                <h4>Data Pribadi</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Id. Pembiayaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" readonly name="kode_biaya" value="P<?= str_replace('/', '', shortdate_indo(date('Y-m-d'))) . ((($simp->id_pengajuan == null) ? '0' : $simp->id_pengajuan) + 1) ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Jenis Pembiayaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="jns_biaya">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Pengajuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="pengajuan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Nama Pemohon</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Tempat, tgl. lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="tgl_lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-8">
                                        <select name="pendidikan" class="form-control">
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="Universitas">Universitas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">No. KTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="ktp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">No. NPWP</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="npwp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="sex" class="form-control">
                                            <option value="Lak-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="2" class="col-sm-4 col-form-label">Alamat KTP</label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat" required class="form-control" cols="10" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Kode Pos</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="kode_pos">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">No. Tlp. Rumah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tlp_rumah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Telp / HP</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="tlp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" required class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Alamat Domisili</label>
                                    <div class="col-sm-8">
                                        <textarea name="domsili" required class="form-control" cols="10" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Kode Pos</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pos">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Lama tinggal</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="lama_tinggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="2" class="col-sm-4 col-form-label">Status Rumah</label>
                                    <div class="col-sm-8">
                                            <select name="sts_rumah" class="form-control">
                                                <option value="Sendiri">Sendiri</option>
                                                <option value="Kredit">Kredit</option>
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="Dinas">Dinas </option>
                                                <option value="Saudara">Saudara</option>
                                                <option value="Orangtua">Orangtua</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Status Perkwawinan</label>
                                    <div class="col-sm-8">
                                        <select name="status_kawin" class="form-control">
                                            <option value="Kawin">Kawin</option>
                                            <option value="Janda/Duda">Janda / Duda</option>
                                            <option value="Lajang">Lajang</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Agama</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="agama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Nama Ibu Kandung</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="ibu">
                                    </div>
                                </div>
                                <hr>
                                <h4>Data Kekayaan</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Harga Rumah</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="hrg_rumah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Harga Mobil</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="hrg_mobil">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Harga Motor</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="hrg_motor">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Harga Tanah</label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="hrg_tanah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Harga Emas</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hrg_emas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Harga Saham</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hrg_Saham">
                                    </div>
                                </div>
                                <hr>
                                <h4>Data Pekerjaan</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pt">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Masa Kerja</label>
                                    <div class="col-sm-8">
                                        <select name="ms_kerja" class="form-control">
                                            <option value="Kurang dari 3 tahun">Kurang dari 3 tahun</option>
                                            <option value="Antara 4 s/d 8 tahun">Antara 4 s/d 8 tahun</option>
                                            <option value="Lebih dari 10 tahun">Lebih dari 10 tahun </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Bagian/Divisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="divisi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Nama Atasan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="atasan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Alamat Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="alamat_pt">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Ext. </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="ext_pt">
                                    </div>
                                </div>
                                <hr>
                                <h4>Data Pasangan</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Nama Istri/Suami</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="istri">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="kerja_istri">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Bagian / Divisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="divisi_istri">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Lama Bekerja</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lama_kerja">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Telp Istri/Suami</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hp_istri">
                                    </div>
                                </div>
                                <hr>
                                <h4>Data Penghasilan Perbulan</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Pernghaslan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Penghasilan Tambahan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="income_add">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Penghasilan Istri/Suami</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="income_istri">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Total Penghasilan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="total">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Jumlah Tanggungan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="family">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Pengeluaran rutin /bln</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="out_rutin">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Kewaiban Tempat Lain</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hutang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Sisa Pendapatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sisa">
                                    </div>
                                </div>
                                <hr>
                                <h4>Detail Pembiayaan</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Jumlah Dimohon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="istri">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Lama Pembiayaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tenor">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Kesanggupan Membayar</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="bayar_perbulan">
                                    </div>
                                </div>
                                <hr>
                                <h4>Data Asset (Fixed Asset)</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Jens Asset</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jenis_asset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Alamat Lokasi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lokasi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Harga Jual</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hrg_jual">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Bukti Kepemilikan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="bukti">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Kepemilikan atas nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pemilik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Tekp. Pemilik</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hp_pemilik    ">
                                    </div>
                                </div>
                                <hr>
                                <h4>Data Agunan Moveable Asset</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Jenis Kendaraan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jns_kendaraan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Merek</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="merek">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Tipe</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tipe">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Tahun</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tahun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">No. Mesin</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="no_mesin">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">No. Rangka</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="no_rangka">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Nama Dealer</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="dealer">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-4 col-form-label">Tekp. Dealer</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hp_dealer">
                                    </div>
                                </div>
                                <p>
                                    Bismillahirrahmanirrohim dengan ini saya menyatakan bahwa data yang saya isikan adalah benar sesuai kenyataan kondisi saya saat ini.
                                </p>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Kirim Pengajuan</button>
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