<!-- ======= Blog Section ======= -->

  <div class="container mt-5 mb-5">

    <div class="row">

      <div class="col-lg-4 entries">

        <div class="entry-img">
          <img src="<?= base_url('asset/img/post/' . $post->img) ?>" alt="" class="img-fluid" height="300">
        </div>


      </div><!-- End blog entries list -->
      <div class="col-lg-8">
        <article class="entry entry-single" data-aos="fade-up">


          <h2 class="entry-title">
            <?= $post->judul ?>
          </h2>

          <div class="entry-content">
          
            <?= $post->isi ?>


          </div>

        </article><!-- End blog entry -->
      </div>

    </div>
  </div>
  
