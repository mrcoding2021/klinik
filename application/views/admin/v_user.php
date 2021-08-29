<!-- Content Wrapper. Contains page content -->
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
                        <h3 class="card-title"><a href="#addUser" class="btn btn-primary text-right" data-toggle="modal">Tambah User</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama User</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">HP</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Level</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($userfull as $key) : ?>
                                                <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1"><?= $no++ ?></td>
                                                    <td><?php echo $key['nama'] ?></td>
                                                    <td><?php echo $key['hp'] ?></td>
                                                    <td> <?php if ($key['level'] == 1) : ?>
                                                            Admin
                                                        <?php else : ?>
                                                            Editor
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?php if ($key['is_active'] == 1) : ?>
                                                            <a href="<?= base_url('menu/akses/') . $key['id_user'] ?>" class="badge badge-success">Aktif</a>
                                                        <?php else : ?>
                                                            <a href="<?= base_url('menu/akses/') . $key['id_user'] ?>" class="badge badge-danger">Tidak Aktif</a>
                                                        <?php endif ?></td>
                                                    <td>
                                                        <a href="#editUser<?= $key['id_user'] ?>" class="btn btn-primary btn-sm" dadta-toggle="modal">Edit</a>
                                                        <a href="<?= base_url('user/delete/') . $key['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin emnghapus data ini ?')">>Delete</a> </td>
                                                </tr>
                                            <?php endforeach ?>

                                        </tbody>

                                    </table>
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
<!-- /.content-wrapper -->



<div class=" modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">�</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?= base_url('user/addUser') ?>" method="post">
                                                                            <div class="form-group row">
                                                                                <label for="1" class="col-sm-2 col-form-label">Nama User</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control" name="nama">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="2" class="col-sm-2 col-form-label">Email</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control" name="email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="3" class="col-sm-2 col-form-label">Password</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control" name="pwd">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="4" class="col-sm-2 col-form-label">Hak Akses</label>
                                                                                <div class="col-sm-10">
                                                                                    <select class="form-control" name="level">
                                                                                        <option readonly>Pilih</option>
                                                                                        <option value="1">Admin</option>
                                                                                        <option value="2">Sekolah</option>
                                                                                        <option value="3">Murid</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" class="btn btn-primary">Input</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                </div>
                                <?php foreach ($userfull as $key) :

                                ?>

                                    <div class="modal fade" id="editUser<?= $key['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">�</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('user/addUser') ?>" method="post">
                                                        <div class="form-group row">
                                                            <label for="1" class="col-sm-2 col-form-label">Nama User</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="2" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="3" class="col-sm-2 col-form-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="pwd">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="4" class="col-sm-2 col-form-label">Hak Akses</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" name="level">
                                                                    <option readonly>Pilih</option>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2">Editor</option>
                                                                </select>
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
                                <?php endforeach; ?>