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
             <h3 class="card-title"><a href="#addMenu" class="btn btn-primary text-right btn-sm" data-toggle="modal">Tambah Mitra</a></h3>
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
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama Mitra</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">HP</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Saldo simpanan</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php $no = 1;
                        foreach ($mitra as $key) : ?>
                         <tr role="row" class="odd">
                           <td tabindex="0" class="sorting_1"><?= $no++ ?></td>
                           <td tabindex="0" class="sorting_1"><?= $key->date_created ?></td>
                           <td tabindex="0" class="sorting_1"><?= $key->nama ?></td>
                           <td tabindex="0" class="sorting_1"><?= $key->hp ?></td>
                           <td tabindex="0" class="sorting_1"><?= rupiah(10000000) ?></td>
                           <td tabindex="0" class="sorting_1"><a href="#editUser<?= $key->id_user ?>" class="btn btn-primary btn-sm" dadta-toggle="modal">Edit</a>
                             <a href="<?= base_url('user/delete/') . $key->id_user ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin emnghapus data ini ?')">Delete</a> </td>
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
         <h5 class="modal-title" id="exampleModalLabel">Tambah Mitra Baru</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="<?= base_url('mitraku/add') ?>" method="post">
           <div class="form-group row">
             <label for="1" class="col-sm-2 col-form-label">Nama Mitra</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" name="nama">

             </div>
           </div>
           <div class="form-group row">
             <label for="1" class="col-sm-2 col-form-label">Penanggungjawab</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" name="pj">

             </div>
           </div>
           <div class="form-group row">
             <label for="3" class="col-sm-2 col-form-label">No. HP</label>
             <div class="col-sm-10">
               <input type="text" class="form-control"  name="hp">
             </div>
           </div>
           <div class="form-group row">
             <label for="4" class="col-sm-2 col-form-label">Email</label>
             <div class="col-sm-10">
               <input type="text" class="form-control"  name="email">
             </div>
           </div>
           <div class="form-group row">
             <label for="4" class="col-sm-2 col-form-label">Alamat</label>
             <div class="col-sm-10">
               <input type="text" class="form-control"  name="alamat">
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