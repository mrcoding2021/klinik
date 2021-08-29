 <div class="container mt-5 mb-5">

   <div class="row">
     <?php foreach ($posts as $post) { ?>
       <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
         <div class="member">
           <div class="member-img overflow-hidden img-thumbnail" style="max-height: 180px;">
             <img src="<?= base_url('asset/img/post/' . $post->img) ?>" class="img-fluid " alt="">
           </div>
           <div class="member-info mt-1">
             <h4><a href="<?= base_url('post/artikel/'.$post->slug)?>"><?= $post->judul ?></a></h4>
             <span><?= substr($post->isi, 0, 40) ?> ...</span>
           </div>
         </div>
       </div>
     <?php } ?>

   </div>
 </div>