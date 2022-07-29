    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $title; ?> - TA <?= $tahun_a; ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/beranda/' ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $title; ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Batas Awal -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Perawatan Printer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Perawatan PC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Perawatan Laptop</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Tgl Transaksi</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($perawatan_printer) : ?>
                                                <?php
                                                $no = 1;
                                                foreach ($perawatan_printer as $hasil) :
                                                    $perawatan_printer[] = $hasil['total_harga'];
                                                    $total_perawatan_printer = array_sum($perawatan_printer);
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $hasil['nama_transaksi']; ?></td>
                                                        <td><?= tanggal_indonesia($hasil['tgl_transaksi']); ?></td>
                                                        <td>
                                                            <?= "Rp. " . number_format($hasil['total_harga'], 2, ',', '.'); ?>
                                                        </td>
                                                        <td><?= $hasil['keterangan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td scope="col" colspan="3" class="text-center">Total</td>
                                                    <td scope="col" colspan="1"><?= "Rp. " . number_format($total_perawatan_printer, 2, ',', '.'); ?></td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td scope="col" colspan="5" class="text-center text-danger">
                                                        <h1>DATANYA KOSONG SAHABATQU ...</h1>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Tgl Transaksi</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($perawatan_pc) : ?>
                                                <?php
                                                $no = 1;
                                                foreach ($perawatan_pc as $hasil) :
                                                    $perawatan_pc[] = $hasil['total_harga'];
                                                    $total_perawatan_pc = array_sum($perawatan_pc);
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $hasil['nama_transaksi']; ?></td>
                                                        <td><?= tanggal_indonesia($hasil['tgl_transaksi']); ?></td>
                                                        <td>
                                                            <?= "Rp. " . number_format($hasil['total_harga'], 2, ',', '.'); ?>
                                                        </td>
                                                        <td><?= $hasil['keterangan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td scope="col" colspan="3" class="text-center">Total</td>
                                                    <td scope="col" colspan="1"><?= "Rp. " . number_format($total_perawatan_pc, 2, ',', '.'); ?></td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td scope="col" colspan="5" class="text-center text-danger">
                                                        <h1>DATANYA KOSONG SAHABATQU ...</h1>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Tgl Transaksi</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($perawatan_laptop) : ?>
                                                <?php
                                                $no = 1;
                                                foreach ($perawatan_laptop as $hasil) :
                                                    $perawatan_laptop[] = $hasil['total_harga'];
                                                    $total_perawatan_laptop = array_sum($perawatan_laptop);
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $hasil['nama_transaksi']; ?></td>
                                                        <td><?= tanggal_indonesia($hasil['tgl_transaksi']); ?></td>
                                                        <td>
                                                            <?= "Rp. " . number_format($hasil['total_harga'], 2, ',', '.'); ?>
                                                        </td>
                                                        <td><?= $hasil['keterangan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td scope="col" colspan="3" class="text-center">Total</td>
                                                    <td scope="col" colspan="1"><?= "Rp. " . number_format($total_perawatan_laptop, 2, ',', '.'); ?></td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td scope="col" colspan="5" class="text-center text-danger">
                                                        <h1>DATANYA KOSONG SAHABATQU ...</h1>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Batas Akhir-->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </body>