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
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
            <div class="nama-menu" data-namamenu="<?php echo $this->session->flashdata('nama_menu')  ?>"></div>
            <!-- Batas Awal -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="submit" class="btn btn-success mb-auto ml-auto mt-auto" data-toggle="modal" data-target="#addMenu"><i class="fas fa-plus"></i> Tambah Data Trx</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Tgl Trx</th>
                                            <th>Total Harga</th>
                                            <th>Realisasi</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($transaksi as $hasil) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $hasil['nama_transaksi']; ?></td>
                                                <td><?= tanggal_indonesia($hasil['tgl_transaksi']); ?></td>
                                                <td>
                                                    <?= "Rp. " . number_format($hasil['total_harga'], 2, ',', '.'); ?>
                                                </td>
                                                <td><?= $hasil['realisasi'];; ?></td>
                                                <td><?= $hasil['keterangan'];; ?></td>
                                                <td>
                                                    <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                                        <a data-toggle="modal" data-target="#detail-data<?= $hasil['id_transaksi']; ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                        <a data-toggle="modal" data-target="#update-data<?= $hasil['id_transaksi']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a data-toggle="modal" data-target="#hapus-data<?= $hasil['id_transaksi']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Tgl Trx</th>
                                            <th>Total Harga</th>
                                            <th>Realisasi</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
    <!-- Modal Tambah Data-->
    <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5><i class="fas fa-plus-square"></i> Tambah Data Trx</h5>
                </div>
                <form method="post" action="<?php echo base_url('transaction/proses_input_data_trx') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="nama_transaksi" class="col-sm-5 col-form-label col-form-label-sm">Trx Name</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-control-sm" id="nama_transaksi" name="nama_transaksi" rows="3" placeholder="Pembelian ..." required></textarea>
                                    <input type="hidden" value="<?= $kode_trx; ?>" name="kode_trx">
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="tgl_transaksi" class="col-sm-5 col-form-label col-form-label-sm">Tgl Trx</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control form-control-sm" id="tgl_transaksi" name="tgl_transaksi" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="harga_barang" class="col-sm-5 col-form-label col-form-label-sm">Harga Barang</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm" value="0" onchange="total()" id="harga_barang" name="harga_barang" required>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="quantity" class="col-sm-5 col-form-label col-form-label-sm">Jumlah Barang</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control form-control-sm" value="1" onchange="total()" id="quantity" name="quantity" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="total_harga" class="col-sm-5 col-form-label col-form-label-sm">Total Harga</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control form-control-sm" value="0" id="total_harga" name="total_harga" required>
                                </div>
                            </div>
                            <script>
                                function total() {
                                    const hargaBarang = document.getElementById('harga_barang').value;
                                    const jumlahBarang = document.getElementById('quantity').value;
                                    const totalHarga = hargaBarang * jumlahBarang;

                                    document.getElementById('total_harga').value = totalHarga;
                                };
                            </script>
                            <div class="row col-6">
                                <label for="realisasi" class="col-sm-5 col-form-label col-form-label-sm">Realisasi</label>
                                <div class="col-sm-7">
                                    <select name="realisasi" class="form-control form-control-sm" required>
                                        <option value="">--PILIH--</option>
                                        <option value="Perawatan PC">Perawatan PC</option>
                                        <option value="Perawatan Laptop">Perawatan Laptop</option>
                                        <option value="Perawatan Printer">Perawatan Printer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="file_upload" class="col-sm-5 col-form-label col-form-label-sm">File Upload</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control form-control-sm" id="file_upload" name="file_upload">
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="keterangan" class="col-sm-5 col-form-label col-form-label-sm">Keterangan</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-save"></i></button>
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Data -->
    <!-- Modal Details-->
    <?php foreach ($transaksi as $hasil) : ?>
        <div class="modal fade" id="detail-data<?= $hasil['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 style="font-size: 15px;"><i class="fas fa-id-card"></i> Details Personal Computer (PC)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-sm">
                            <tbody style="font-size: 15px;">
                                <tr>
                                    <td><strong>Transaksi</strong></td>
                                    <td><?php echo $hasil['nama_transaksi']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tgl Trx</strong></td>
                                    <td><?php echo tanggal_indonesia($hasil['tgl_transaksi']); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Harga Barang</strong></td>
                                    <td>
                                        <?= "Rp. " . number_format($hasil['harga_barang'], 2, ',', '.'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Quantity</strong></td>
                                    <td><?php echo $hasil['quantity']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Harga</strong></td>
                                    <td>
                                        <?= "Rp. " . number_format($hasil['total_harga'], 2, ',', '.'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Realisasi</strong></td>
                                    <td><?php echo $hasil['realisasi']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Keterangan</strong></td>
                                    <td><?php echo $hasil['keterangan']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Date Created</strong></td>
                                    <td><?php echo $hasil['date_created']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>File Upload</strong></td>
                                    <td>
                                        <!-- <img src="<?= base_url() . './upload/transaksi/' . $hasil['file_upload']; ?>" alt="file_upload" width="200" height="200"> -->
                                        <a href="<?php echo base_url() . 'upload/transaksi/' . $hasil['file_upload']; ?>" target="_blank">
                                            Lihat File
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;  ?>
    <!-- Modal Details-->
    <!-- Modal Update-->
    <?php foreach ($transaksi as $hasil) { ?>
        <div class="modal fade bd-example-modal-lg" id="update-data<?= $hasil['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5><i class="fas fa-edit"></i> Update Data Transaksi</h5>
                    </div>
                    <form id="formUpdate1" method="post" action="<?php echo base_url('transaction/proses_update_data_trx') ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="nama_transaksi" class="col-sm-5 col-form-label col-form-label-sm">Trx Name</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-control-sm" id="nama_transaksi" name="nama_transaksi" rows="3" required><?= $hasil['nama_transaksi']; ?></textarea>
                                        <input type="hidden" value="<?= $hasil['kode_transaksi']; ?>" name="kode_trx">
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="tgl_transaksi" class="col-sm-5 col-form-label col-form-label-sm">Tgl Trx</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control form-control-sm" id="tgl_transaksi" name="tgl_transaksi" value="<?= $hasil['tgl_transaksi']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="harga_barang" class="col-sm-5 col-form-label col-form-label-sm">Harga Barang</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="harga_barang_edit" name="harga_barang" value="<?= $hasil['harga_barang']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="quantity" class="col-sm-5 col-form-label col-form-label-sm">Jumlah Barang</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control form-control-sm" id="quantity_edit" name="quantity" value="<?= $hasil['quantity']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="total_harga" class="col-sm-5 col-form-label col-form-label-sm">Total Harga</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control form-control-sm" id="total_harga_edit" name="total_harga" value="<?= $hasil['total_harga']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="realisasi" class="col-sm-5 col-form-label col-form-label-sm">Realisasi</label>
                                    <div class="col-sm-7">
                                        <select name="realisasi" class="form-control form-control-sm" required>
                                            <option <?php if ($hasil['realisasi'] == "Perawatan PC") {
                                                        echo "selected='selected'";
                                                    }
                                                    echo $hasil['realisasi']; ?> value="Perawatan PC">
                                                Perawatan PC
                                            </option>
                                            <option <?php if ($hasil['realisasi'] == "Perawatan Printer") {
                                                        echo "selected='selected'";
                                                    }
                                                    echo $hasil['realisasi']; ?> value="Perawatan Printer">
                                                Perawatan Printer
                                            </option>
                                            <option <?php if ($hasil['realisasi'] == "Perawatan Laptop") {
                                                        echo "selected='selected'";
                                                    }
                                                    echo $hasil['realisasi']; ?> value="Perawatan Laptop">
                                                Perawatan Laptop
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="file_upload" class="col-sm-5 col-form-label col-form-label-sm">File Upload</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control form-control-sm" id="file_upload" name="file_upload" value="<?= $hasil['file_upload']; ?>">
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="keterangan" class="col-sm-5 col-form-label col-form-label-sm">Keterangan</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="3"><?= $hasil['keterangan']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-save"></i></button>
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }  ?>
    <!-- Modal Update Data-->
    <!-- Modal Hapus-->
    <?php foreach ($transaksi as $hasil) : ?>
        <div class="modal fade" id="hapus-data<?= $hasil['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5><i class="fas fa-trash"></i> Hapus Data TRX</h5>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('transaction/delete_data/' . $hasil['id_transaksi']); ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <p>Apakah Anda Ingin Menghapus Data <strong><?php echo $hasil['kode_transaksi']; ?> </strong>?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button class="btn btn-danger btn-lg" type="submit"><i class="fas fa-trash"></i></button>
                            <button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;  ?>
    <!-- Modal Hapus -->