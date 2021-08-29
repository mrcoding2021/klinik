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
                     
                     <!-- /.card-header -->
                     <div class="card-body">
                         <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                             <div class="row">
                                 <div class="col-sm-12">
                                     <form action="<?= base_url('menu/edit_menu/') . $menu['id_menu'] ?>/1" method="post" enctype="multipart/form-data">
                                         <div class="form-group row">
                                             <label for="1" class="col-sm-1 col-form-label">Judul Menu</label>
                                             <div class="col-sm-11">

                                                 <input type="text" class="form-control" id="1" name="nama" value="<?php echo $menu['nama'] ?>">
                                             </div>
                                             
                                         </div>
                                         
                                         <div class="form-group row">
                                             <label for="ckeditr" class="col-sm-1 col-form-label">Isi</label>
                                             <div class="col-sm-11">
                                                 <textarea type="text" class="ckeditor" id="ckeditor" name="isi" rows="3"><?php echo $menu['isi'] ?></textarea>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="5" class="col-sm-2 col-form-label">Gambar</label>
                                            
                                             <div class="col-sm-7">
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
                     <!-- /.card-body -->
                 </div>
             </div>
         </div>

     </section>
     <!-- /.content -->
 </div>

 