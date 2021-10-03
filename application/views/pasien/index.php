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
                             <div class="col-lg-3 col-6">
                                 <!-- small card -->
                                 <div class="small-box bg-info">
                                     <div class="inner">
                                         <h4>Daftar Tunggu</h4>
                                         <p>0 Orang <br> Pasien belum ditangani dokter</p>
                                     </div>
                                     <div class="icon">
                                         <i class="fas fa-users"></i>
                                     </div>
                                     <a href="<?= base_url('pasien/waitingList/') ?>" class="small-box-footer">
                                         Detail List <i class="fas fa-arrow-circle-right"></i>
                                     </a>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-6">
                                 <!-- small card -->
                                 <div class="small-box bg-success">
                                     <div class="inner">
                                         <h4>Selesai</h4>
                                         <p>10 Orang <br>Pasien sudah ditangani dokter</p>
                                     </div>
                                     <div class="icon">
                                         <i class="fas fa-users"></i>
                                     </div>
                                     <a href="<?= base_url('pasien/selesai/') ?>" class="small-box-footer">
                                         Detail List <i class="fas fa-arrow-circle-right"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </section>
     <!-- /.content -->
 </div>