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
                                     <form action="<?= base_url('post/editPost/') . $key['id_post'] ?>/1" method="post" enctype="multipart/form-data">
                                         <div class="form-group row">
                                             <label for="1" class="col-sm-1 col-form-label">Judul Post</label>
                                             <div class="col-sm-8">

                                                 <input type="text" class="form-control" id="1" name="nama" value="<?php echo $key['judul'] ?>">
                                             </div>
                                             <label for="2" class="col-sm-1 col-form-label">Tanggal</label>
                                             <div class="col-sm-2">
                                                 <input type="text" readonly class="form-control" id="2" name="date" value="<?php echo longdate_indo($key['date']) ?>">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="1" class="col-sm-1 col-form-label">Kategori</label>
                                             <div class="col-sm-5">
                                                 <select class="form-control" id="2" name="kategori">
                                                     <option readonly>Pilih</option>
                                                     <?php $kat = $this->db->get('tb_kategori')->result();
                                                        foreach ($kat as $data) :
                                                            if ($key['kategori'] == $data->id_kategori) : ?>
                                                             <option selected value="<?= $data->id_kategori ?>"><?= $data->nama ?></option>
                                                         <?php else : ?>
                                                             <option value="<?= $data->id_kategori ?>"><?= $data->nama ?></option>
                                                         <?php endif ?>
                                                     <?php endforeach ?>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="ckeditr" class="col-sm-1 col-form-label">Isi</label>
                                             <div class="col-sm-11">
                                                 <textarea type="text" class="ckeditor" id="ckeditor" name="isi" rows="3"><?php echo $key['isi'] ?></textarea>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="5" class="col-sm-2 col-form-label">Gambar</label>
                                             <div class="col-sm-3">
                                                 <img src="<?= base_url() ?>asset/img/post/<?= $key['img'] ?>" alt="" width="100%">
                                             </div>
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

 