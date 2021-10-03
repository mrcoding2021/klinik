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
                         <h3 class="card-title"><?= $subtitle . ' - ' . $hari->hari ?></h3>

                         <div class="card-tools">
                             <a href="<?= base_url('jadwal') ?>" class="btn-sm btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                             <a href="#addJadwal" data-toggle="modal" class="tambah btn-sm btn btn-info"><i class="fa fa-plus"></i> Tambah Jadwal</a>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body table-responsive">
                         <table class="table table-hover" width="100%" id="listJadwal">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Dokter</th>
                                     <th>Waktu</th>
                                     <th>Status</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>

                             </tbody>
                         </table>
                     </div>
                     <!-- /.card-body -->
                 </div>
             </div>
         </div>

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <div class="modal fade" id="addJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg-secondary text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Baru</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url('jadwal/add') ?>" method="post" class="addJadwal">
                     <div class="form-group row">
                         <div class="col-sm-12">
                             <label>Dokter</label>
                             <select name="id_user" class="form-control dokter">
                                 <option>Pilih Dokter</option>
                                 <?php foreach ($dokter as $dok) { ?>
                                     <option value="<?= $dok->id_user ?>"><?= $dok->nama ?></option>
                                 <?php  } ?>
                             </select>
                             <input type="hidden" class="form-control id" name="id">
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-sm-6">
                             <label>Hari</label>
                             <input type="text" readonly class="form-control hari" name="hari" value="<?= $hari->hari ?>">
                             <input type="hidden" class="form-control parent" name="parent" value="<?= $hari->id ?>">
                         </div>
                         <div class="col-sm-6">
                             <label>Waktu</label>
                             <select name="waktu" class="waktu form-control">
                                 <option>Pilih Waktu</option>
                                 <option value="Pagi">Pagi</option>
                                 <option value="Siang">Siang</option>
                                 <option value="Sore">Sore</option>
                                 <option value="Malam">Malam</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-sm-6">
                             <label>Mulai Jam</label>
                             <input type="time" class="form-control start_time" name="start_time">
                         </div>
                         <div class="col-sm-6">
                             <label>Mulai Jam</label>
                             <input type="time" class="form-control end_time" name="end_time">
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-sm-12">
                             <label>Keterangan</label>
                             <textarea type="text" class="form-control ket" name="ket"></textarea>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>

 <script>
     var parent = '<?= $hari->id ?>'
     $('.tambah').click(function(e) {
         $('.modal-title').text('Tambah Jadwal Baru')
         $('.ket').val('')
         $('.start_time').val('')
         $('.end_time').val('')
     })

     $('.addJadwal').submit(function(e) {
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
                     $.ajax({
                         url: $(this).attr('action'),
                         data: $(this).serialize(),
                         type: 'post',
                         dataType: 'json',
                         success: function(res) {
                             if (res.sukses) {
                                 $('.modal').modal('hide')
                                 jadwal(parent)
                                 swal({
                                     title: "Berhasil !",
                                     text: `${res.sukses}`,
                                     icon: "success",
                                 })
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
     
     jadwal(parent)

     function jadwal(parent) {

         var jadwal = $('#listJadwal').DataTable({
             'ajax': {
                 "type": "POST",
                 "url": '<?= base_url('jadwal/getAll/') ?>' + parent,
                 "dataSrc": ""
             },
             "destroy": true,
             'columns': [{
                     "data": "no"
                 },
                 {
                     "data": "dokter"
                 },
                 {
                     "data": "waktu"
                 },
                 {
                     "data": "status"
                 },
                 {
                     "data": "id",
                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                         $(nTd).html('<a href="#addJadwal" data-id="' + oData.id + '" data-toggle="modal" class="text-xs btn btn-sm btn-info detail"><i class="fa fa-search"></i></a><a href="#" data-id="' + oData.id + '"  class="text-xs btn btn-sm btn-danger hapus ml-1" data-status="1"><i class="fa fa-trash"></i></a>');
                     }
                 },
             ]
         });
     }

     $(document).on('click', '.hapus', function(e) {
         var id = $(this).data('id')
         var status = $(this).data('status')
         if (status == 0) {
             var msg = 'Jadwal ini akan diaktifkan kembali'
         } else {
             var msg = 'Jadwal ini akan di non aktifkan'
         }
         swal({
                 title: "Yakin ?",
                 text: msg,
                 icon: "warning",
                 buttons: true,
             })
             .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '<?= base_url('jadwal/hapus/') ?>',
                        data: {
                            'id': id,
                            'status' : status
                        },
                        dataType: 'json',
                        type: 'post',
                        success: function(res) {
                            console.log(res)
                            if (res.sukses) {
                                jadwal(parent)
                                swal({
                                    title: "Berhasil !",
                                    text: `${res.sukses}`,
                                    icon: "success",
                                })
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
             })
     })

     $(document).on('click', '.detail', function(e) {
         var id = $(this).data('id')
         $.ajax({
             url: '<?= base_url('jadwal/getAll/') ?>',
             data: {
                 'id': id
             },
             dataType: 'json',
             type: 'post',
             success: function(res) {
                 console.log(res)
                 $('.id').val(res.id)
                 $('.parent').val(res.parent)
                 $('.hari').val(res.hari)
                 $('.parent').val(res.parent)
                 $('.start_time').val(res.start_time)
                 $('.end_time').val(res.end_time)
                 $('.ket').val(res.ket)
                 $('.dokter option[value="' + res.id_user + '"]').attr('selected', true)
                 $('.dokter option[value="' + res.id_user + '"]').siblings().attr('selected', false)
                 $('.waktu option[value="' + res.waktu + '"]').attr('selected', true)
                 $('.waktu option[value="' + res.waktu + '"]').siblings().attr('selected', false)
             }
         })
     })
 </script>