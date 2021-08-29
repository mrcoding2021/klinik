<?php foreach ($post as $key) :
    $judul = str_replace(' ', '-', strtolower($key['judul']));
    ?>
    <li>

        <img src="<?= base_url('asset/img/post/') . $key['img'] ?>" class="pull-left" alt="" width="100px" />

        <h6><a href="<?= base_url('home/detail/') . $judul ?>">Lorem ipsum dolor sit</a></h6>
        <p>
            <?= substr($key['isi'], 0, 100) ?> ....
        </p>

    </li>
    <hr>
<?php endforeach ?>