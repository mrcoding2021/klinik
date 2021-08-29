 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1> <?= $title ?></h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active"> <?= $title ?></li>
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
             <a href="#addMenu" class="btn btn-primary text-right btn-sm" data-toggle="modal">Tambah Menu</a>
             <a href="#addMenu" class="btn btn-success text-right btn-sm" data-toggle="modal">Import Transaksi</a>
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
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tanggal</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Keterangan</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Debit</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Kredit</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jumlah</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php $no = 1;
                        foreach ($transaksi as $key) : ?>
                         <tr role="row" class="odd">
                           <td tabindex="0" class="sorting_1"><?= $no++ ?></td>
                           <td tabindex="0" class="sorting_1"><?= $key->date_created ?></td>
                           <td tabindex="0" class="sorting_1"><?php $agen = $this->db->get_where('tb_user', ['id_user' => $key->id_user])->row();
                                                              echo $key->keterangan . ' a/n ' . $agen->nama ?></td>
                           <td tabindex="0" class="sorting_1"><?= rupiah($key->debit) ?></td>
                           <td tabindex="0" class="sorting_1"><?= rupiah($key->kredit) ?></td>
                           <td tabindex="0" class="sorting_1"><?= $key->date_created ?></td>
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
           <span aria-hidden="true">×</span>
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