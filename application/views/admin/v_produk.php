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
                        <a href="#addProduk" class="btn btn-primary text-right" data-toggle="modal">Tambah Post</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Img</th>
                                                    <th>Nama Produk</th>
                                                    <th>Detail</th>
                                                    <th>Kategori Produk</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($produk as $key) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><img src="<?= base_url() ?>asset/img/produk/<?= $key['img'] ?>" alt="" width="100px">
                                                        </td>

                                                        <td width="25%">
                                                            <?= $key['nama'] ?>
                                                        </td>

                                                        <td>
                                                            <?= $key['isi'] ?>
                                                        </td>
                                                        <td>
                                                            <?= ($key['kategori'] == 1) ? 'Simpanan' : 'Pembiayaan' ?>

                                                        </td>

                                                        <td>
                                                            <a href="#editProduk<?= $key['id_paket'] ?>" class="badge badge-primary tombolEdit" data-toggle="modal">Edit
                                                            </a>
                                                            <a href="<?= base_url('produk/delete/') . $key['id_paket'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Delete
                                                            </a><br>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
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
<!-- End of Main Content -->
<div class="modal fade" id="addProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('produk/addProduk') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="1" class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="1" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="1" class="col-sm-3 col-form-label">Deskripsi Produk</label>
                        <div class="col-sm-9">
                            <textarea name="isi" id="ckeditor" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="1" class="col-sm-3 col-form-label">Kategori Produk</label>
                        <div class="col-sm-9">
                            <select name="kategori" class="form-control">
                                <option value="0">Pembiayaan</option>
                                <option value="1">Simpanan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="5" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="img">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php foreach ($produk as $key) : ?>
    <div class="modal fade" id="editProduk<?php echo $key['id_paket'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('produk/editProduk/' . $key['id_paket']) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label">Nama Produk</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" name="nama" value="<?php echo $key['nama'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label">Deskripsi Produk</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" col="5" name="isi"><?php echo $key['isi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label">Kategori Produk</label>
                            <div class="col-sm-9">
                                <select name="kategori" class="form-control">
                                    <option <?= ($key['kategori'] == 0) ? 'selected' : '' ?> value="0">Pembiayaan</option>
                                    <option <?= ($key['kategori'] == 1) ? 'selected' : '' ?> value="1">Simpanan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="5" class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-3">
                                <img src="<?= base_url() ?>asset/img/produk/<?= $key['img'] ?>" alt="" width="100%">
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="img">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
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
<?php endforeach ?>