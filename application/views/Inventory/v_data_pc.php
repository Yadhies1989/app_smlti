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
                                <button type="submit" class="btn btn-success mb-auto ml-auto mt-auto" data-toggle="modal" data-target="#addMenu"><i class="fas fa-plus"></i> Tambah PC</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode PC</th>
                                                <th>PC (Desktop)</th>
                                                <th>Monitor</th>
                                                <th>Pengguna</th>
                                                <th>Ruangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data as $hasil) {
                                                //show nama user
                                                $peg_id = $hasil['user'];
                                                $peg_nama = $peg_id;
                                                if (is_numeric($peg_id)) {
                                                    $peg_row = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = $peg_id")->row_array();
                                                    $peg_nama = $peg_row['nama'];
                                                }

                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $hasil['kode_pc']; ?></td>
                                                    <td><?= $hasil['nama_pc']; ?></td>
                                                    <td><?= $hasil['nama_monitor']; ?></td>
                                                    <td><?= $peg_nama; ?></td>
                                                    <td>
                                                        <?php foreach ($ruangan as $m) : ?>
                                                            <?php if ($m['id_ruangan'] == $hasil['ruangan']) : ?>
                                                                <?= $m['nama_ruangan']; ?>
                                                            <?php else : ?>

                                                            <?php endif; ?>
                                                        <?php endforeach ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                                            <a data-toggle="modal" data-target="#detail-data<?= $hasil['id_pc']; ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                            <a data-toggle="modal" data-target="#update-data<?= $hasil['id_pc']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                            <a data-toggle="modal" data-target="#hapus-data<?= $hasil['id_pc']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode PC</th>
                                                <th>PC (Desktop)</th>
                                                <th>Monitor</th>
                                                <th>Pengguna</th>
                                                <th>Ruangan</th>
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

    </html>
    <!-- Modal Tambah Data-->
    <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5><i class="fas fa-plus-square"></i> Tambah Data PC</h5>
                </div>
                <form method="post" action="<?php echo base_url('inventory/proses_input_data_pc') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="nama_pc" class="col-sm-5 col-form-label col-form-label-sm">Kode PC</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm" value="<?= $kode_pc; ?>" id="kode_pc" name="kode_pc" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="nama_pc" class="col-sm-5 col-form-label col-form-label-sm">Nama PC</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-control-sm" id="nama_pc" name="nama_pc" rows="3" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nama PC ..." required></textarea>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="nama_monitor" class="col-sm-5 col-form-label col-form-label-sm">Nama Monitor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm" id="nama_monitor" placeholder="Nama Monitor ..." name="nama_monitor" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="sn_pc" class="col-sm-5 col-form-label col-form-label-sm">SN PC</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm" value="0" id="sn_pc" placeholder="Serial PC" name="sn_pc" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="sn_monitor" class="col-sm-5 col-form-label col-form-label-sm">SN Monitor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm" value="0" id="sn_monitor" placeholder="Serial Monitor" name="sn_monitor" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="tgl_beli" class="col-sm-5 col-form-label col-form-label-sm">Tanggal Beli</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control form-control-sm" placeholder="Tanggal Beli" name="tgl_beli" required>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="penguasaan" class="col-sm-5 col-form-label col-form-label-sm">Penguasaan</label>
                                <div class="col-sm-7">
                                    <select name="penguasaan" class="form-control form-control-sm" required>
                                        <option value="">--PILIH--</option>
                                        <option value="BMN">BMN</option>
                                        <option value="Non BMN">Non BMN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="nup" class="col-sm-5 col-form-label col-form-label-sm">NUP</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm" id="nup" placeholder="NUP" name="nup" value="0" required>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="ruangan" class="col-sm-5 col-form-label col-form-label-sm">Ruangan</label>
                                <div class="col-sm-7">
                                    <select name="ruangan" class="form-control form-control-sm" id="ruangan" required>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url('inventory/get_ruangan'); ?>',
                                        cache: false,
                                        success: function(msg) {
                                            $("#ruangan").html(msg);
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="user" class="col-sm-5 col-form-label col-form-label-sm">Pengguna</label>
                                <div class="col-sm-7">
                                    <select class="form-control form-control-sm" name="user" id="user">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url('inventory/get_user'); ?>',
                                        cache: false,
                                        success: function(msg) {
                                            $("#user").html(msg);
                                        }
                                    });
                                });
                            </script>
                            <div class="row col-6">
                                <label for="keterangan" class="col-sm-5 col-form-label col-form-label-sm">Keterangan</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" rows="2" onkeyup="this.value = this.value.toUpperCase()" placeholder="Keterangan ..." required></textarea>
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
    <?php foreach ($data as $hasil) : ?>
        <?php
        $params['data'] = $hasil['kode_pc'];
        $params['level'] = 'H';
        $params['size'] = 10;

        $params['savename'] = './upload/qrcode/' . $hasil['id_pc'] . '.png';
        $this->ciqrcode->generate($params);
        ?>
        <div class="modal fade" id="detail-data<?= $hasil['id_pc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 style="font-size: 15px;"><i class="fas fa-id-card"></i> Details Personal Computer (PC)</h5>
                        <!-- <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i></button> -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-sm">
                            <tbody style="font-size: 15px;">
                                <tr>
                                    <td><strong>Kode PC</strong></td>
                                    <td><?php echo $hasil['kode_pc']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama PC</strong></td>
                                    <td><?php echo $hasil['nama_pc']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Monitor</strong></td>
                                    <td><?php echo $hasil['nama_monitor']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>SN Monitor</strong></td>
                                    <td><?php echo $hasil['sn_monitor']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>SN PC</strong></td>
                                    <td><?php echo $hasil['sn_pc']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Beli</strong></td>
                                    <td><?php echo tanggal_indonesia($hasil['tgl_beli']); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Penguasaan</strong></td>
                                    <td><?php echo $hasil['penguasaan']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>NUP (BMN)</strong></td>
                                    <td><?php echo $hasil['nup']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ruangan</strong></td>
                                    <?php foreach ($ruangan as $rgn) : ?>
                                        <?php if ($hasil['ruangan'] === $rgn['id_ruangan']) : ?>
                                            <td><?= $rgn['nama_ruangan']; ?></td>
                                        <?php elseif ($hasil['ruangan'] === '') : ?>

                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </tr>
                                <tr>
                                    <td><strong>Pengguna</strong></td>
                                    <?php foreach ($pegawai as $pgw) : ?>
                                        <?php if ($hasil['user'] === $pgw['id_pegawai']) : ?>
                                            <td><?= $pgw['nama']; ?></td>
                                        <?php elseif ($hasil['user'] === '') : ?>

                                        <?php endif; ?>
                                    <?php endforeach ?>
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
                                    <td><strong>QR</strong></td>
                                    <td><?php echo '<img src="' . base_url() . './upload/qrcode/' . $hasil['id_pc'] . '.png" width="200" height="200" />'; ?></td>
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
    <?php foreach ($data as $hasil) { ?>
        <div class="modal fade bd-example-modal-lg" id="update-data<?= $hasil['id_pc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5><i class="fas fa-edit"></i> Update Personal Computer (PC)</h5>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('inventory/ubah_data_pc/' . $hasil['id_pc']); ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="nama_monitor" class="col-sm-5 col-form-label col-form-label-sm">Kode PC</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="kode_pc" name="kode_pc" value="<?= $hasil['kode_pc']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="nama_pc" class="col-sm-5 col-form-label col-form-label-sm">Nama PC</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-control-sm" id="nama_pc" name="nama_pc" rows="3" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nama PC ..." required><?= $hasil['nama_pc']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="nama_monitor" class="col-sm-5 col-form-label col-form-label-sm">Nama Monitor</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="nama_monitor" placeholder="Nama Monitor ..." name="nama_monitor" onkeyup="this.value = this.value.toUpperCase()" value="<?= $hasil['nama_monitor']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="sn_pc" class="col-sm-5 col-form-label col-form-label-sm">SN PC</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="sn_pc" placeholder="Serial PC" name="sn_pc" value="<?= $hasil['sn_pc']; ?>" onkeyup="this.value = this.value.toUpperCase()" required>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="sn_monitor" class="col-sm-5 col-form-label col-form-label-sm">SN Monitor</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="sn_monitor" placeholder="Serial Monitor" name="sn_monitor" value="<?= $hasil['sn_monitor']; ?>" onkeyup="this.value = this.value.toUpperCase()" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="tgl_beli" class="col-sm-5 col-form-label col-form-label-sm">Tanggal Beli</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control form-control-sm" placeholder="Tanggal Beli" name="tgl_beli" value="<?= $hasil['tgl_beli']; ?>" required>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="penguasaan" class="col-sm-5 col-form-label col-form-label-sm">Penguasaan</label>
                                    <div class="col-sm-7">
                                        <select name="penguasaan" class="form-control form-control-sm" required>
                                            <option <?php if ($hasil['penguasaan'] == "BMN") {
                                                        echo "selected='selected'";
                                                    }
                                                    echo $hasil['penguasaan']; ?> value="BMN">
                                                BMN
                                            </option>
                                            <option <?php if ($hasil['penguasaan'] == "Non BMN") {
                                                        echo "selected='selected'";
                                                    }
                                                    echo $hasil['penguasaan']; ?> value="Non BMN">
                                                Non BMN
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="nup" class="col-sm-5 col-form-label col-form-label-sm">NUP</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="nup" placeholder="NUP" name="nup" value="<?= $hasil['nup']; ?>" required>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="ruangan" class="col-sm-5 col-form-label col-form-label-sm">Ruangan</label>
                                    <div class="col-sm-7">
                                        <select name="ruangan" class="form-control form-control-sm" id="ruangan" required>
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($ruangan as $m) : ?>
                                                <?php $selected = ($m['id_ruangan'] == $hasil['ruangan']) ? "selected" : "" ?>
                                                <option <?= $selected; ?> value="<?php echo $m['id_ruangan']; ?>"><?php echo $m['nama_ruangan']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="user" class="col-sm-5 col-form-label col-form-label-sm">Pengguna</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm" name="user" id="user">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($pegawai as $m) : ?>
                                                <?php $selected = ($m['id_pegawai'] == $hasil['user']) ? "selected" : "" ?>
                                                <option <?= $selected; ?> value="<?php echo $m['id_pegawai']; ?>"><?php echo $m['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php echo base_url('inventory/get_user'); ?>',
                                            cache: false,
                                            success: function(msg) {
                                                $("#user").html(msg);
                                            }
                                        });
                                    });
                                </script>
                                <div class="row col-6">
                                    <label for="keterangan" class="col-sm-5 col-form-label col-form-label-sm">Keterangan</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" rows="2" onkeyup="this.value = this.value.toUpperCase()" placeholder="Keterangan ..." required><?= $hasil['keterangan']; ?></textarea>
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
    <?php foreach ($data as $hasil) : ?>
        <div class="modal fade" id="hapus-data<?= $hasil['id_pc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5><i class="fas fa-trash"></i> Hapus Data Personal Computer (PC)</h5>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('inventory/hapus_data_pc/' . $hasil['id_pc']); ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <p>Apakah Anda Ingin Menghapus Data <strong><?php echo $hasil['nama_pc']; ?> </strong>?</p>
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