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

                 <div class="card">

                     <div class="card-body">
                         <form action="<?= base_url('dokter/add') ?>" method="post" class="add">
                             <div class="row">
                                 <div class="col-md-8">
                                     <div class="form-group row">
                                         <div class="col-sm-12">
                                             <label for="1">Nama Lengkap</label>
                                             <input type="text" class="form-control" name="nama" value="<?= $dokter->nama ?>">
                                             <input type="hidden" class="form-control" value="<?= $dokter->id_user ?>" name="id">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-sm-12">
                                             <label for="2">Gelar</label>
                                             <input type="text" value="<?= $dokter->gelar ?>" class="form-control" name="gelar">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-sm-6">
                                             <label for="3">HP</label>
                                             <input type="text" value="<?= $dokter->hp ?>" class="form-control" id="3" name="hp">
                                         </div>
                                         <div class="col-sm-6">
                                             <label for="4">Email</label>
                                             <input type="text" value="<?= $dokter->email ?>" class="form-control" id="4" name="email">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-sm-12">
                                             <label for="4">Alamat</label>
                                             <textarea type="text" class="form-control" id="4" name="alamat"><?= $dokter->alamat ?></textarea>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-sm-12">
                                             <label for="4">Profil</label>
                                             <textarea type="text" value="<?= $dokter->profil ?>" class="form-control" id="editor" name="profil"><?= $dokter->profil ?> </textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="form-group row">
                                         <div class="col-sm-12 mb-3">
                                             <label for="5">Video</label>
                                             <iframe width="100%" height="250" src="https://www.youtube.com/embed/<?= $dokter->video ?>">
                                             </iframe>
                                             <input type="text" value="<?= $dokter->video ?>" class="form-control" id="4" name="video">
                                         </div>
                                         <div class="col-sm-12 mb-3">
                                             <label for="5">Gambar</label>
                                             <img width="100%" src="<?= base_url('asset/img/dokter/' . $dokter->img) ?>" alt="">
                                         </div>
                                         <div class="col-sm-12">
                                             <div class="input-group mb-0">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Upload</span>
                                                 </div>
                                                 <div class="custom-file">
                                                     <input type="file" class="custom-file-input" id="file" name="img">
                                                     <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div>
                                 <a class="btn btn-secondary" href="<?= base_url('dokter/data') ?>">Kembali</a>
                                 <button type="submit" class="btn btn-primary">Simpan</button>
                                 <a class="btn btn-success" href="<?= base_url('dokter/detail') ?>">Tambah Dokter Baru</a>
                             </div>

                         </form>
                     </div>
                     <!-- /.card-body -->
                 </div>
             </div>
         </div>

     </section>
     <!-- /.content -->
 </div>


 <script>
     $('.add').submit(function(e) {
         e.preventDefault()
         var judul = $('input[name="nama"]').val()
         swal({
                 title: "Yakin ingin disimpan?",
                 text: "Pastikan data yang diisi sudah benar dan tepat!",
                 icon: "warning",
                 buttons: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     var formData = new FormData();
                     formData.append('nama', judul);
                     formData.append('gelar', $('input[name="gelar"]').val());
                     formData.append('alamat', $('textarea[name="alamat"]').val());
                     formData.append('profil', $('textarea[name="profil"]').val());
                     formData.append('email', $('input[name="email"]').val());
                     formData.append('hp', $('textarea[name="hp"]').val());
                     formData.append('video', $('input[name="video"]').val());
                     formData.append('id', $('input[name="id"]').val());
                     formData.append('img', $('#file').prop('files')[0]);
                     $.ajax({
                         url: $(this).attr('action'),
                         data: formData,
                         type: 'post',
                         dataType: 'json',
                         cache: false,
                         contentType: false,
                         processData: false,
                         beforeSend: function() {
                             swal({
                                 icon: 'info',
                                 text: 'Loading ....',
                                 buttons: false,
                             });
                         },
                         success: function(res) {
                             if (res.sukses) {
                                 swal({
                                     title: "Berhasil !",
                                     text: `${res.sukses}`,
                                     icon: "success",
                                 }).then((value) => {
                                     $('.modal').modal('hide')
                                     post()
                                 });
                             } else {
                                 swal({
                                     title: "Error !",
                                     text: `${res.error}`,
                                     icon: "error",
                                 })
                             }
                         }
                     })
                 }
             });
     })
 </script>