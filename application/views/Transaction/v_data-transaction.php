    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $title; ?></h1>
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
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
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
                                                <th>Tanggal Trx</th>
                                                <th>Total Harga</th>
                                                <th>Realisasi</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal Trx</th>
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
                                    <textarea class="form-control form-control-sm" id="nama_transaksi" name="nama_transaksi" rows="3" onkeyup="this.value = this.value.toUpperCase()" placeholder="Pembelian ..." required></textarea>
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
                                        <option value="PEMELIHARAAN PC">PEMELIHARAAN PC</option>
                                        <option value="PEMELIHARAAN LAPTOP">PEMELIHARAAN LAPTOP</option>
                                        <option value="PEMELIHARAAN PRINTER">PEMELIHARAAN PRINTER</option>
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