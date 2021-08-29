                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Sekolah</h1>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4 text-center">
                            <div class="card  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-3 p-3">
                                            <img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" width="50%" alt="">
                                        </div>
                                        <div class="col-md-6 ml-3 text-left">
                                            Selamat Datang
                                            <h3>Abdul Rohman</h3>
                                            <div class="">ID : 10.0000001 | No. Hp 087883245700</div>
                                            <span>SDIT Nurul fikri Bekasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4 text-center">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    Total Simpanan Pelajar
                                    <div class="h2 mb-0 mr-3 font-weight-bold">Rp. 20.000.000,-</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="myAreaChart" style="display: block; width: 445px; height: 160px;" width="445" height="160" class="chartjs-render-monitor"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Berita Terbaik</h6>
    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <table class="table table-bordered table-responsive-sm" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Img</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($blog as $key) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><img src="<?= base_url('asset/img/post/') . $key->img ?>" alt="" width="50"></td>
                                                        <td><?= $key->judul ?></td>
                                                        <td><?= shortdate_indo($key->date) ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <canvas id="myAreaChart">
    
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->