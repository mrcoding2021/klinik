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
                                             Detail List Jadwal <i class="fas fa-arrow-circle-right"></i>
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
 
