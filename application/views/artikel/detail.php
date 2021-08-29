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
                         <form action="<?= base_url('post/add') ?>" method="post" class="add">
                             <div class="row">
                                 <div class="col-md-9">
                                     <div class="form-group row">
                                         <div class="col-sm-12">
                                             <label for="1">Judul</label>
                                             <input type="text" value="<?= $post->judul ?>" class="form-control" name="judul">
                                             <input type="hidden" class="form-control" value="<?= $post->id ?>" name="id">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-sm-12">
                                             <label for="3">Isi</label>
                                             <textarea id="editor" type="text" class="form-control" cols="20" name="isi"><?= $post->isi ?></textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group row">
                                         <div class="col-sm-12 mb-3">
                                             <label for="3">Kategori</label>
                                             <select name="ketegori" class="form-control">
                                                 <?php foreach ($kategori as $key) { ?>
                                                     <option <?= ($key->kategori == $post->kategori) ? 'selected' : '' ?> value="<?= $key->id_kategori ?>"><?= $key->nama ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                         <div class="col-sm-12 mb-3" id="foto">
                                             <label for="5">Gambar</label>
                                             <img width="100%" src="<?= base_url('asset/img/post/' . $post->img) ?>" alt="">
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
                                 <a class="btn btn-secondary" href="<?= base_url('post') ?>">Kembali</a>
                                 <button type="submit" class="btn btn-primary">Simpan</button>
                                 <a class="btn btn-success" href="<?= base_url('post/detail') ?>">Tambah Post Baru</a>
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
         var judul = $('input[name="judul"]').val()
         swal({
                 title: "Yakin ingin disimpan?",
                 text: "Pastikan data yang diisi sudah benar dan tepat!",
                 icon: "warning",
                 buttons: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     var formData = new FormData();
                     formData.append('judul', judul);
                     formData.append('kategori', $('input[name="kategori"]').val());
                     formData.append('isi', $('textarea[name="isi"]').val());
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