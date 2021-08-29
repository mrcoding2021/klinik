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
                         <div class="row">
                             <div class="col-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title"><?= $subtitle . ' - ' . $hari->hari ?></h3>

                                         <div class="card-tools">

                                             <a href="<?= base_url('jadwal')?>"  class="btn-sm btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                                             <a href="#addJadwal" data-toggle="modal" class="btn-sm btn btn-info"><i class="fa fa-plus"></i> Tambah Jadwal</a>
                                         </div>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body table-responsive p-0" style="height: 300px;">
                                         <table class="table table-head-fixed text-nowrap">
                                             <thead>
                                                 <tr>
                                                     <th>ID</th>
                                                     <th>User</th>
                                                     <th>Date</th>
                                                     <th>Status</th>
                                                     <th>Reason</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach ($listJadwal as $key) {
                                                        $this->db->where('parent', $key->id);
                                                        $listJadwal = $this->db->get('tb_user_jadwal')->result(); ?>
                                                     <tr>
                                                         <td>183</td>
                                                         <td>John Doe</td>
                                                         <td>11-7-2014</td>
                                                         <td><span class="tag tag-success">Approved</span></td>
                                                         <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                     </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                                 <!-- /.card -->
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <div class="modal fade" id="addJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <div class="col-sm-6">
                             <label>Dokter</label>
                             <select name="dokter" class="form-control">
                                 <option>Pilih Dokter</option>
                                 <?php foreach ($dokter as $dok) {?>
                                     <option value="<?= $dok->id_user?>"><?= $dok->nama?></option>
                                <?php  }?>
                             </select>
                             <input type="hidden" class="form-control id" name="id">
                         </div>
                     </div>
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