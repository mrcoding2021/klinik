<aside class="left-sidebar">

    <div class="widget">
        <h5 class="widgetheading">Menu Lain</h5>
        <ul class="cat">
            <?php $this->load->view('template/menu'); ?>
        </ul>
    </div>
    <div class="widget">
        <h5 class="widgetheading">Post Terbaru</h5>
        <ul class="recent">
            <?php
            $this->load->view('template/blog');
            ?>
        </ul>
    </div>

</aside>