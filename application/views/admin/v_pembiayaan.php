<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <h1><?= $title ?></h1>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?= $title ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg">
                <!-- DataTales Example -->
                <?= $this->session->flashdata('alert');
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="#addMenu" class="btn btn-primary text-right" data-toggle="modal">Tambah Post</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="pembiayaan" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl Pengajuan</th>
                                        <th>Nama Pemohon</th>
                                        <th>Jenis Pembiayaan</th>
                                        <th>Jumlah Pengajuan</th>
                                        <th>Agunan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>



</div>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        text-align: left;
        padding: 8px;
    }

    .q {
        width: 30%;
        border-bottom: .5px black solid;
        border-top: .5px black solid;
        border-color: #cccccc;
    }

    .n {
        width: 3%;
        border-bottom: .5px black solid;
        border-top: .5px black solid;
        border-color: #cccccc;
    }

    .a {
        border-bottom: .5px black solid;
        border-top: .5px black solid;
        border-color: #cccccc;
    }
</style>

</div>


<div class="modal fade" id="detail-p" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pribadi-tab" data-toggle="tab" href="#pribadi" role="tab" aria-controls="pribadi" aria-selected="true">Data Pribadi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="kekayaan-tab" data-toggle="tab" href="#kekayaan" role="tab" aria-controls="kekayaan" aria-selected="false">Data Kekayaan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="kerja-tab" data-toggle="tab" href="#kerja" role="tab" aria-controls="kerja" aria-selected="false">Data Pekerjaan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pasangan-tab" data-toggle="tab" href="#pasangan" role="tab" aria-controls="pasangan" aria-selected="false">Data Suami/Istri</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="gaji-tab1" data-toggle="tab" href="#gaji" role="tab" aria-controls="gaji" aria-selected="true">Data Penghasilan (Perbulan)</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="biaya-tab1" data-toggle="tab" href="#biaya" role="tab" aria-controls="biaya" aria-selected="false">Detail Pembiayaan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="agunan-tab1" data-toggle="tab" href="#agunan" role="tab" aria-controls="agunan" aria-selected="false">Agunan</a>
                    </li>


                </ul>
                <div class="tab-content" id="myTabContent">

                    <!-- data pribadi  -->
                    <div class="tab-pane fade show active" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Kode Pembiayaan</td>
                                        <td class="n">:</td>
                                        <td class="kode a"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Jenis Pembiayaan</td>
                                        <td class="n">:</td>
                                        <td class="jns_biaya a"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Pengajuan</td>
                                        <td class="n">:</td>
                                        <td class="pengajuan a"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Nama Pemohon</td>
                                        <td class="n">:</td>
                                        <td class="a nama"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Tempat, tgl lahir</td>
                                        <td class="n">:</td>
                                        <td class="a ttl"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Pendidikan Terakhir</td>
                                        <td class="n">:</td>
                                        <td class="a pendidikan"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">No. KTP</td>
                                        <td class="n">:</td>
                                        <td class="a ktp"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">No. NPWP</td>
                                        <td class="n">:</td>
                                        <td class="a npwp"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Jenis Kelamin</td>
                                        <td class="n">:</td>
                                        <td class="a sex"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Alamat KTP</td>
                                        <td class="n">:</td>
                                        <td class="a alamat_ktp"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Kode Post</td>
                                        <td class="n">:</td>
                                        <td class="a kode_pos"> tahun</td>
                                    </tr>
                                    <tr>
                                        <td class="q">No. Tlp Rumah</td>
                                        <td class="n">:</td>
                                        <td class="a tlp_rumah"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">No. HP</td>
                                        <td class="n">:</td>
                                        <td class="a hp"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Alamat Domisili</td>
                                        <td class="n">:</td>
                                        <td class="a domisili"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Lama Tinggal</td>
                                        <td class="n">:</td>
                                        <td class="a lama_tinggal"> tahun</td>
                                    </tr>
                                    <tr>
                                        <td class="q">Kode Post</td>
                                        <td class="n">:</td>
                                        <td class="a post"> tahun</td>
                                    </tr>
                                    <tr>
                                        <td class="q">Status Rumah</td>
                                        <td class="n">:</td>
                                        <td class="a status_rmh"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Status Perkawinan</td>
                                        <td class="n">:</td>
                                        <td class="a status_kawin"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Agama</td>
                                        <td class="n">:</td>
                                        <td class="a agama"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Nama Ibu Kandung</td>
                                        <td class="n">:</td>
                                        <td class="a ibu"></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- data kekayaan  -->
                    <div class="tab-pane fade" id="kekayaan" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Harga Rumah</td>
                                        <td class="n">:</td>
                                        <td class="a hrg_rumah"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Harga Mobil</td>
                                        <td class="n">:</td>
                                        <td class="a hrg_mobil"> tahun</td>
                                    </tr>
                                    <tr>
                                        <td class="q">Harga Motor</td>
                                        <td class="n">:</td>
                                        <td class="a hrg_motor"></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Harga Tanah</td>
                                        <td class="n">:</td>
                                        <td class="a hrg_tanah"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Harga Emas</td>
                                        <td class="n">:</td>
                                        <td class="a hrg_emas"></td>

                                    </tr>
                                    <tr>
                                        <td class="q">Harga Saham</td>
                                        <td class="n">:</td>
                                        <td class="a hrg_saham"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- data pekerjaan  -->
                    <div class="tab-pane fade" id="kerja" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Nama Perusahaan</td>
                                        <td class="n">:</td>
                                        <td class="a pt"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Lama Bekerja</td>
                                        <td class="n">:</td>
                                        <td class="a lama_bekerja"> tahun</td>
                                    </tr>
                                    <tr>
                                        <td class="q">Bagian / divisi</td>
                                        <td class="n">:</td>
                                        <td class="a divisi"></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Nama Atasan Langsung</td>
                                        <td class="n">:</td>
                                        <td class="a atasan"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Alamat Perusahaan</td>
                                        <td class="n">:</td>
                                        <td class="a alamat_pt"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Ext.</td>
                                        <td class="n">:</td>
                                        <td class="a ext_pt"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="pasangan" role="tabpanel" aria-labelledby="pasangan-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Nama Istri / Suami</td>
                                        <td class="n">:</td>
                                        <td class="a nama_istri"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Pekerjaan</td>
                                        <td class="n">:</td>
                                        <td class="a pekerjaan"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Nama Perusahaan</td>
                                        <td class="n">:</td>
                                        <td class="a pt_istri"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Divisi</td>
                                        <td class="n">:</td>
                                        <td class="a divisi_istri"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Lama Bekerja</td>
                                        <td class="n">:</td>
                                        <td class="a lama_bekerja_istri"> tahun</td>
                                    </tr>
                                    <tr>
                                        <td class="q">Tlp. Istri</td>
                                        <td class="n">:</td>
                                        <td class="a tlp_istri"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Ext</td>
                                        <td class="n">:</td>
                                        <td class="a ext_istri"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- data penghasilan  -->
                    <div class="tab-pane fade" id="gaji" role=" tabpanel" aria-labelledby="gaji-tab1">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Penghasilan</td>
                                        <td class="n">:</td>
                                        <td class="a penghasilan"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Penghasilan Tambahan</td>
                                        <td class="n">:</td>
                                        <td class="a penghasilan_add"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Penghasilan Istri</td>
                                        <td class="n">:</td>
                                        <td class="a penghasilan_istri"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Total Penghasilan</td>
                                        <td class="n">:</td>
                                        <td class="a total_penghasilan"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Jumlah Tanggungan</td>
                                        <td class="n">:</td>
                                        <td class="a family">orang</td>
                                    </tr>
                                    <tr>
                                        <td class="q">Pengeluaran Rutin /bulan</td>
                                        <td class="n">:</td>
                                        <td class="a out_rutin"> </td>
                                    </tr>
                                    <tr>
                                        <td class="q">Kewajiban Tempat Lain</td>
                                        <td class="n">:</td>
                                        <td class="a hutang"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Sisa Pendapatan</td>
                                        <td class="n">:</td>
                                        <td class="a sisa"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- detail pembiayaan  -->
                    <div class="tab-pane fade" id="biaya" role="tabpanel" aria-labelledby="biaya-tab1">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td class="q">Jumlah Dimohon</td>
                                        <td class="n">:</td>
                                        <td class="a jumlah_dimohon"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Lama Pembiayaan</td>
                                        <td class="n">:</td>
                                        <td class="a tenor"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Kesanggupan membayar</td>
                                        <td class="n">:</td>
                                        <td class="a bayar_perbulan"></td>
                                    </tr>
                                </table>
                            </div>
                           
                        </div>
                    </div>

                    <!-- detail agunan  -->
                    <div class="tab-pane fade" id="agunan" role="tabpanel" aria-labelledby="agunan-tab1">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Fixed Asset</h4>
                                <table>
                                    <tr>
                                        <td class="q">Jenis Agunan</td>
                                        <td class="n">:</td>
                                        <td class="a asset"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Alamat</td>
                                        <td class="n">:</td>
                                        <td class="a alamat_agunan"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Harga Jual</td>
                                        <td class="n">:</td>
                                        <td class="a hrg_jual"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Bukti kepemilikan</td>
                                        <td class="n">:</td>
                                        <td class="a bukti"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Atas nama Pemilik</td>
                                        <td class="n">:</td>
                                        <td class="a an_pemilik"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Tlp Pemilik</td>
                                        <td class="n">:</td>
                                        <td class="a tlp_milik"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <h4>Moveable Asset</h4>
                                <table>
                                    <tr>
                                        <td class="q">Jenis Asset</td>
                                        <td class="n">:</td>
                                        <td class="a jns_kendaraan"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Merek</td>
                                        <td class="n">:</td>
                                        <td class="a merek"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Type</td>
                                        <td class="n">:</td>
                                        <td class="a type"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Tahun</td>
                                        <td class="n">:</td>
                                        <td class="a tahun_kendaraan"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">No.Mesin</td>
                                        <td class="n">:</td>
                                        <td class="a no_mesin"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">No. rangka</td>
                                        <td class="n">:</td>
                                        <td class="a no_rangka"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Nama Dealer</td>
                                        <td class="n">:</td>
                                        <td class="a nama_dealer"></td>
                                    </tr>
                                    <tr>
                                        <td class="q">Tlp Dealer</td>
                                        <td class="n">:</td>
                                        <td class="a hp_dealer"></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>