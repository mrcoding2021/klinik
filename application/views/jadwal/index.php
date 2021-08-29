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
                     <div class="card-content">
                         <div class="row mx-2 my-3">
                             <?php foreach ($hari as $key) {
                                    $this->db->where('parent', $key->id);
                                    $listJadwal = $this->db->get('tb_user_jadwal')->result(); ?>

                                 <div class="col-lg-3 col-6">
                                     <!-- small card -->
                                     <div class="small-box bg-warning">
                                         <div class="inner">
                                             <h3><?= $key->hari; ?></h3>
                                             <p><?= count($listJadwal)?> Jadwal</p>
                                         </div>
                                         <div class="icon">
                                             <i class="fas fa-calendar-alt"></i>
                                         </div>
                                         <a href="<?= base_url('jadwal/hari/' . $key->id . '/' . strtolower($key->hari)) ?>" class="small-box-footer">
                                             More info <i class="fas fa-arrow-circle-right"></i>
                                         </a>
                                     </div>
                                 </div>
                             <?php } ?>
                             
                         </div>
                     </div>
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
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Baru</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url('dokter/add') ?>" method="post" class="add">
                     <div class="form-group row">
                         <label for="1" class="col-sm-2 col-form-label">Nama Lengkap</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" name="nama">
                             <input type="hidden" class="form-control" name="id_user">
                         </div>
                     </div>
                     <!-- <div class="form-group row">
                         <label for="2" class="col-sm-2 col-form-label">Hak Akses</label>
                         <div class="col-sm-10">
                             <select class="form-control" id="2" name="akses">
                                 <?php
                                    $this->db->where_not_in('id_user', 1);
                                    $user = $this->db->get('tb_user_menu')->result();
                                    foreach ($user as $key) { ?>
                                     <option <?= $key->id_user ?>><?= $key->menu ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                     </div> -->

                     <div class="form-group row">
                         <label for="2" class="col-sm-2 col-form-label">Gelar</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" name="gelar">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="3" class="col-sm-2 col-form-label">HP</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="3" name="hp">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="4" class="col-sm-2 col-form-label">Email</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="4" name="email">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="4" class="col-sm-2 col-form-label">Alamat</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="4" name="alamat">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="5" class="col-sm-2 col-form-label">Gambar</label>
                         <div class="col-sm-3">
                             <img width="100%" src="https://image.flaticon.com/icons/png/512/194/194915.png" alt="">
                         </div>
                         <div class="col-sm-7">
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
                     <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-primary">Input</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>

 <script>
     $('.tambah').click(function(e) {
         $('.modal-title').text('Tambah Data Karyawan')
         $('input').val('')
     })

     $('.add').submit(function(e) {
         e.preventDefault()
         var nama = $('input[name="nama"]').val()
         swal({
                 title: "Yakin ingin disimpan?",
                 text: "Pastikan data yang diisi sudah benar dan tepat!",
                 icon: "warning",
                 buttons: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     var formData = new FormData();
                     formData.append('nama', nama);
                     formData.append('hp', $('input[name="hp"]').val());
                     formData.append('email', $('input[name="email"]').val());
                     formData.append('alamat', $('input[name="alamat"]').val());
                     formData.append('id_user', $('input[name="id_user"]').val());
                     formData.append('level', $('.level').val());
                     formData.append('gelar', $('input[name="gelar"]').val());
                     formData.append('img', $('#file').prop('files')[0]);
                     $.ajax({
                         url: $(this).attr('action'),
                         data: formData,
                         type: 'post',
                         dataType: 'json',
                         cache: false,
                         contentType: false,
                         processData: false,
                         success: function(res) {
                             if (res.sukses) {
                                 swal({
                                     title: "Berhasil !",
                                     text: `${res.sukses}`,
                                     icon: "success",
                                 }).then((value) => {
                                     $('.modal').modal('hide')
                                     dokter()
                                     // window.location.href = "<?= base_url('project') ?>"
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

     dokter()

     function dokter() {

         var dokter = $('#dokter').DataTable({
             'ajax': {
                 "type": "POST",
                 "url": '<?= base_url('dokter/getAll/') ?>',
                 "dataSrc": ""
             },
             "destroy": true,
             'columns': [{
                     "data": "no"
                 },
                 {
                     "data": "img",
                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                         $(nTd).html('<img src="<?= base_url('asset/img/dokter/') ?>' + oData.img + '" width="100">');
                     }
                 },
                 {
                     "data": "nama"
                 },
                 {
                     "data": "gelar"
                 },
                 {
                     "data": "hp"
                 },
                 {
                     "data": "email"
                 },
                 {
                     "data": "href"
                 }
             ]
         });
     }

     $(document).on('click', '.hapus', function(e) {
         var id = $(this).data('id')
         swal({
                 title: "Yakin ingin dihapus?",
                 text: "Pastikan data yang diisi sudah benar dan tepat!",
                 icon: "warning",
                 buttons: true,
             })
             .then((willDelete) => {
                 $.ajax({
                     url: '<?= base_url('dokter/hapus/') ?>' + id,
                     dataType: 'json',
                     type: 'post',
                     success: function(res) {
                         console.log(res)
                         if (res.sukses) {
                             swal({
                                 title: "Berhasil !",
                                 text: `${res.sukses}`,
                                 icon: "success",
                             }).then((value) => {
                                 dokter()
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
             })
     })
 </script>