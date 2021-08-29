 <div class="col-lg-4">

   <div class="sidebar" data-aos="fade-left">

     <h3 class="sidebar-title">Search</h3>
     <div class="sidebar-item search-form">
       <form action="">
         <input type="text">
         <button type="submit"><i class="icofont-search"></i></button>
       </form>

     </div><!-- End sidebar search formn-->

     <h3 class="sidebar-title">Produk Unggulan</h3>
     <div class="sidebar-item categories">
       <ul>
         <?php $program = $this->db->get('paket')->result();foreach ($program as $key ) :?>
         <li><a href="<?= base_url('produk/detail/'.$key->id_paket) ?>"><?= str_replace(' ','-',$key->nama)?> </a></li>
         <?php endforeach?>
       </ul>
     </div><!-- End sidebar categories-->

     <h3 class="sidebar-title">Agenda</h3>
     <div class="sidebar-item recent-posts">
       <?php $this->db->where('kategori', 1);
        $acara = $this->db->get('tb_agenda', 6)->result();
        foreach ($acara as $key) : ?>
         <div class="post-item clearfix">
           <img src="<?= base_url('asset/img/agenda/') . $key->img ?>" alt="">
           <h4><a href="blog-single.html"><?= $key->nama ?></a></h4>
           <time datetime="2020-01-01"><?= $key->created_at ?></time>
         </div>
       <?php endforeach ?>
     </div>

     <h3 class="sidebar-title">Artikel Lainnya</h3>
     <div class="sidebar-item recent-posts">
       <?php $this->db->order_by('id_post', 'desc');
        $acara = $this->db->get('tb_post', 6)->result();
        foreach ($acara as $key) : ?>
         <div class="post-item clearfix">
           <img src="<?= base_url('asset/img/post/') . $key->img ?>" alt="">
           <h4><a href="<?= base_url('post/' . str_replace('-', '', $key->date) . '/' . str_replace(' ', '-', $key->judul)) ?>"><?= $key->judul ?></a></h4>
           <time datetime="2020-01-01"><?= shortdate_indo($key->date) ?></time>
         </div>
       <?php endforeach ?>
     </div>



   </div><!-- End sidebar -->

 </div><!-- End blog sidebar -->