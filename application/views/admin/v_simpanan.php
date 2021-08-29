<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Pengajuan <?= $title ?>
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
                    <!-- <div class="card-header">
                        <a href="#addProduk" class="btn btn-primary text-right" data-toggle="modal">Tambah Post</a>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tabelKu" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>HP/Telp</th>
                                                    <th>Ahli Waris</th>
                                                    <th>Produk Simpanan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

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


<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detaiil</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>Tgl. Pengajuan</td>
                                        <td class="tgl"></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Simpanan</td>
                                        <td class="kode_simpanan"></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemohon</td>
                                        <td class="nama"></td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP</td>
                                        <td class="ktp"></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td class="alamat"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="email"></td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td class="kerja"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>Ibu Kandung</td>
                                        <td class="ibu"></td>
                                    </tr>
                                    <tr>
                                        <td>Ahli WAris</td>
                                        <td class="waris"></td>
                                    </tr>
                                    <tr>
                                        <td>Hubungan Ahli Waris</td>
                                        <td class="hub_waris"></td>
                                    </tr>
                                    <tr>
                                        <td>Cara Setoran</td>
                                        <td class="setor"></td>
                                    </tr>
                                    <tr>
                                        <td>Produk Simpanan</td>
                                        <td class="simpanan"></td>
                                    </tr>
                                    <tr>
                                        <td>Basil potong Zakat</td>
                                        <td class="basil"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td ></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>