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
                         <a href="#addMenu" class="tambah btn btn-primary text-right pull-right" data-toggle="modal">Tambah Menu</a>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                             <div class="row">
                                 <div class="col-sm-12">
                                     <table id="slider" class="table table-sm table-bordered table-striped dataTable dtr-inline" width="100%">
                                         <thead>
                                             <tr role="row">
                                                 <th>No</th>
                                                 <th>Gambar</th>
                                                 <th>Judul</th>
                                                 <th>Keterangan</th>
                                                 <th>Aksi</th>
                                             </tr>
                                         </thead>
                                         <tbody>


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
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Baru</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url('slider/add') ?>" method="post" class="add">
                     <div class="form-group row">
                         <label for="1" class="col-sm-2 col-form-label">Judul</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" name="judul">
                             <input type="hidden" class="form-control" name="id_slider">
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="2" class="col-sm-2 col-form-label">Keterangan</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" name="ket">
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
                         <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>

 <script>
     $(document).ready(function() {
         $('.tambah').click(function(e) {
             $('.modal-title').text('Tambah Data Karyawan')
             $('input').val('')
         })

         $('.add').submit(function(e) {
             e.preventDefault()
             var judul = $('input[name="judul"]').val()
             var ket = $('input[name="ket"]').val()
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
                         formData.append('ket', ket);
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
                                         slider()
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

         slider()

         function slider() {

             var slider = $('#slider').DataTable({
                 "processing": true,
                 "language": {
                     processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                 },
                 'ajax': {
                     "type": "POST",
                     "url": '<?= base_url('slider/getAll/') ?>',
                     "dataSrc": ""
                 },
                 "destroy": true,
                 'columns': [{
                         "data": "no"
                     },
                     {
                         "data": "img",
                     },
                     {
                         "data": "judul"
                     },
                     {
                         "data": "ket"
                     },
                     {
                         "data": "judul",
                         "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                             $(nTd).html('<a data-toggle="modal" class="mr-1 detail badge badge-info" href="#addMenu" data-id="' + oData.id_slider + '" >Detail</a><a class="hapus mr-1 badge badge-danger" href="#" data-id="' + oData.id_slider + '" >Hapus</a>');
                         }
                     }
                 ]
             });
         }

         $(document).on('click', '.detail', function(e) {
             var id = $(this).data('id')
             $('.modal-title').text('Edit Data')
             $.ajax({
                 url: '<?= base_url('slider/getID') ?>',
                 data: {
                     'id': id
                 },
                 dataType: 'json',
                 type: 'post',
                 success: function(res) {
                     console.log(res)
                     if (res.sukses) {
                         $('input[name="id_slider"]').val(id)
                         $('input[name="judul"]').val(res.sukses.judul)
                         $('input[name="ket"]').val(res.sukses.ket)
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

         $(document).on('click', '.hapus', function(e) {
             var id = $(this).data('id')
             swal({
                     title: "Yakin ingin disimpan?",
                     text: "Pastikan data yang diisi sudah benar dan tepat!",
                     icon: "warning",
                     buttons: true,
                 })
                 .then((willDelete) => {
                     if (willDelete) {
                         $.ajax({
                             url: '<?= base_url('slider/hapus/') ?>' + id,
                             type: 'post',
                             dataType: 'json',
                             success: function(res) {
                                 if (res.sukses) {
                                     swal({
                                         title: "Berhasil !",
                                         text: `${res.sukses}`,
                                         icon: "success",
                                     })
                                     slider()
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
     })
 </script>