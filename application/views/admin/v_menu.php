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
                         <a href="#addMenu" class="btn btn-primary text-right" data-toggle="modal">Tambah Menu</a>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                             <div class="row">
                                 <div class="col-sm-12">
                                     <table id="myTable" class="table table-sm table-bordered table-striped dataTable dtr-inline" width="100%">
                                         <thead>
                                             <tr role="row">
                                                 <th >No</th>
                                                 <th >Nama Menu</th>
                                                 <th >Hak Akses</th>
                                                 <th >Link</th>
                                                 <th >Status</th>
                                                 <th >Aksi</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php $no = 1;
                                                foreach ($menu as $key) : ?>
                                                 <tr role="row" class="odd">
                                                     <td tabindex="0" class="sorting_1"><?= $no++ ?></td>
                                                     <td>
                                                         <?= $key['nama'] ?></td>
                                                     <td> <?php if ($key['acces'] == 1) : ?>
                                                             Admin
                                                         <?php elseif ($key['acces'] == 2) : ?>
                                                             Editor
                                                         <?php else : ?>
                                                             User
                                                         <?php endif ?></td>
                                                     <td><?= $key['attr_href'] ?></td>
                                                     <td><?php if ($key['is_active'] == 1) : ?>
                                                             <a href="<?= base_url('menu/akses/') . $key['id_menu'] ?>" class="badge badge-success">Aktif</a>
                                                         <?php else : ?>
                                                             <a href="<?= base_url('menu/akses/') . $key['id_menu'] ?>" class="badge badge-danger">Tidak Aktif</a>
                                                         <?php endif ?></td>
                                                     <td>
                                                         <a href="#editMenu<?= $key['id_menu'] ?>" class="badge badge-primary badge-sm" data-toggle="modal">Edit
                                                         </a>
                                                         <a href="<?= base_url('menu/delete/') . $key['id_menu'] ?>" class="badge badge-danger badge-sm" onclick="return confirm('Yakin akkan menghapus data ini ?')">Delete
                                                         </a>
                                                     </td>
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
 <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Baru</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">??</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url('menu/addMenu') ?>" method="post">
                     <div class="form-group row">
                         <label for="1" class="col-sm-2 col-form-label">Nama Menu</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="1" name="nama">

                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="2" class="col-sm-2 col-form-label">Hak Akses</label>
                         <div class="col-sm-10">
                             <select class="form-control" id="2" name="akses">
                                 <option readonly>Pilih</option>
                                 <option value="1">Admin</option>
                                 <option value="2">Editor</option>
                                 <option value="3">User</option>
                             </select>
                         </div>
                     </div>
                     <?php
                        $menus = $this->db->get_where('tb_menu', array('dropdown' => 1, 'parent' => 0))->result_array();
                        ?>
                     <div class="form-group row">
                         <label for="5" class="col-sm-2 col-form-label">Parent Menu</label>
                         <div class="col-sm-10">
                             <select class="form-control" id="2" name="parent">
                                 <option readonly>Pilih</option>
                                 <?php foreach ($menus as $key) : ?>
                                     <option value="<?= $key['id_menu'] ?>"><?= $key['nama'] ?></option>
                                 <?php endforeach ?>
                             </select>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="2" class="col-sm-2 col-form-label">Dropdown</label>
                         <div class="col-sm-10">
                             <select class="form-control" id="2" name="dropdown">
                                 <option readonly>Pilih</option>
                                 <option value="1">Ya</option>
                                 <option value="0">Tidak</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="3" class="col-sm-2 col-form-label">Icon</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="3" name="icon">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="4" class="col-sm-2 col-form-label">Link</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="4" name="link">
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

 <?php foreach ($menu as $key) : ?>
     <?php
        $id_menu = $key['id_menu'];
        $nama = $key['nama'];
        $icon = $key['icon'];
        $link = $key['attr_href'];
        $hak_akses = $key['acces'];
        $dropdown1 = $key['dropdown'];

        ?>

     <div class="modal fade" id="editMenu<?= $id_menu ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">??</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form action="<?= base_url('menu/editMenu') ?>" method="post">
                         <div class="form-group row">
                             <label for="1" class="col-sm-2 col-form-label">Nama Menu</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="1" name="nama" value="<?= $nama ?>">
                             </div>
                             <div class="col-sm-10">
                                 <input type="hidden" class="form-control" id="1" name="id_menu" value="<?= $id_menu ?>">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="2" class="col-sm-2 col-form-label">Hak Akses</label>
                             <div class="col-sm-10">
                                 <select class="form-control" id="2" name="akses">
                                     <option readonly>Pilih</option>
                                     <?php if ($hak_akses == 1) : ?>
                                         <option value="1" selected>Admin</option>
                                         <option value="2">Editor</option>
                                         <option value="2">User</option>
                                     <?php elseif ($hak_akses == 2) : ?>
                                         <option value="1">Admin</option>
                                         <option value="2" selected>Editor</option>
                                         <option value="3">User</option>
                                     <?php else : ?>
                                         <option value="1">Admin</option>
                                         <option value="2">Editor</option>
                                         <option value="3" selected>User</option>
                                     <?php endif ?>
                                 </select>
                             </div>
                         </div>
                         <?php
                            $menus = $this->db->get_where('tb_menu', array('dropdown' => 1, 'parent' => 0))->result_array();
                            ?>
                         <div class="form-group row">
                             <label for="5" class="col-sm-2 col-form-label">Parent Menu</label>
                             <div class="col-sm-10">
                                 <select class="form-control" id="2" name="parent">
                                     <option readonly>Pilih</option>
                                     <?php foreach ($menus as $submenu) : ?>
                                         <?php if ($key['parent'] == $submenu['id_menu']) : ?>
                                             <option value="<?= $submenu['id_menu'] ?>" selected><?= $submenu['nama'] ?></option>
                                         <?php else : ?>
                                             <option value="<?= $submenu['id_menu'] ?>"><?= $submenu['nama'] ?></option>
                                         <?php endif ?>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="2" class="col-sm-2 col-form-label">Dropdown</label>
                             <div class="col-sm-10">
                                 <select class="form-control" id="2" name="dropdown">
                                     <option readonly>Pilih</option>
                                     <?php if ($dropdown1 == 1) : ?>
                                         <option value="1" selected>Ya</option>
                                         <option value="0">Tidak</option>
                                     <?php else : ?>
                                         <option value="1">Ya</option>
                                         <option value="0" selected>Tidak</option>
                                     <?php endif ?>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="3" class="col-sm-2 col-form-label">Icon</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="3" name="icon" value="<?= $icon ?>">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="4" class="col-sm-2 col-form-label">Link</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="4" name="link" value="<?= $link ?>">
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