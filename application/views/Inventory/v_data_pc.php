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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>id</th>
                                                <th>Nama PC</th>
                                                <th>Nama Monitor</th>
                                                <th>SN PC</th>
                                                <th>SN Monitor</th>
                                                <th>Tgl Beli</th>
                                                <th>Penguasaan</th>
                                                <th>NUP</th>
                                                <th>Ruangan</th>
                                                <th>User</th>
                                                <th>Date Created</th>
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
                                                if(is_numeric($peg_id)){
                                                    $peg_row = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = $peg_id")->row_array();
                                                    $peg_nama = $peg_row['nama'];
                                                }
                                                
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $hasil['id_pc']; ?></td>
                                                    <td><?= $hasil['nama_pc']; ?></td>
                                                    <td><?= $hasil['nama_monitor']; ?></td>
                                                    <td><?= $hasil['sn_pc']; ?></td>
                                                    <td><?= $hasil['sn_monitor']; ?></td>
                                                    <td><?= $hasil['tgl_beli']; ?></td>
                                                    <td><?= $hasil['penguasaan']; ?></td>
                                                    <td><?= $hasil['nup']; ?></td>
                                                    <td><?= $hasil['ruangan']; ?></td>
                                                    <td><?= $peg_nama; ?></td>
                                                    <td><?= $hasil['date_created']; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#detail-data<?= $hasil['id_pc']; ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                        <a data-toggle="modal" data-target="#update-data<?= $hasil['id_pc']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a data-toggle="modal" data-target="#hapus-data<?= $hasil['id_pc']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>id</th>
                                                <th>Nama PC</th>
                                                <th>Nama Monitor</th>
                                                <th>SN PC</th>
                                                <th>SN Monitor</th>
                                                <th>Tgl Beli</th>
                                                <th>Penguasaan</th>
                                                <th>NUP</th>
                                                <th>Ruangan</th>
                                                <th>User</th>
                                                <th>Date Created</th>
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
                    <h5><i class="fas fa-plus-square"></i> Tambah Personal Computer (PC)</h5>
                </div>
                <form method="post" action="<?php echo base_url('inventory/proses_input_data_pc') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="nama_pc" class="col-sm-5 col-form-label">Nama PC</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nama_pc" placeholder="Nama PC" name="nama_pc" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="nama_monitor" class="col-sm-5 col-form-label">Nama Monitor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nama_monitor" placeholder="Nama Monitor" name="nama_monitor" onkeyup="this.value = this.value.toUpperCase()" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="sn_pc" class="col-sm-5 col-form-label">Serial PC</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="sn_pc" placeholder="Serial PC" name="sn_pc" required>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="sn_monitor" class="col-sm-5 col-form-label">Serial Monitor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="sn_monitor" placeholder="Serial Monitor" name="sn_monitor" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="tgl_beli" class="col-sm-5 col-form-label">Tanggal Beli</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" placeholder="Tanggal Beli" name="tgl_beli">
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="penguasaan" class="col-sm-5 col-form-label">Penguasaan</label>
                                <div class="col-sm-7">
                                    <select name="penguasaan" class="form-control" required>
                                        <option value="">--PILIH--</option>
                                        <option value="BMN">BMN</option>
                                        <option value="Non BMN">Non BMN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="nup" class="col-sm-5 col-form-label">NUP</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nup" placeholder="NUP" name="nup">
                                </div>
                            </div>
                            <div class="row col-6">
                                <label for="ruangan" class="col-sm-5 col-form-label">Ruangan</label>
                                <div class="col-sm-7">
                                    <select name="ruangan" class="form-control" required>
                                        <option value="">--PILIH--</option>
                                        <option value="1">Kepaniteraan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-6">
                                <label for="user" class="col-sm-5 col-form-label">User</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="user" id="user">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url('inventory/get_user'); ?>',
                                        cache: false, 
                                        success: function(msg){
                                        $("#user").html(msg);
                                        }
                                    });
                                });
                            </script>
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
        <div class="modal fade bd-example-modal-xl" id="detail-data<?= $hasil['id_pc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5><i class="fas fa-id-card"></i> Details Personal Computer (PC)</h5>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Nama PC</strong></td>
                                    <td><?php echo $hasil['nama_pc']; ?></td>
                                    <td><strong>Nama Monitor</strong></td>
                                    <td><?php echo $hasil['nama_monitor']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>SN Monitor</strong></td>
                                    <td><?php echo $hasil['sn_monitor']; ?></td>
                                    <td><strong>SN PC</strong></td>
                                    <td><?php echo $hasil['sn_pc']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tgl Beli</strong></td>
                                    <td><?php echo $hasil['tgl_beli']; ?></td>
                                    <td><strong>Penguasaan</strong></td>
                                    <td><?php echo $hasil['penguasaan']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>NUP</strong></td>
                                    <td><?php echo $hasil['nup']; ?></td>
                                    <td><strong>Id Ruangan</strong></td>
                                    <td><?php echo $hasil['ruangan']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Id Pegawai</strong></td>
                                    <td><?php echo $hasil['user']; ?></td>
                                    <td><strong>Date Created</strong></td>
                                    <td><?php echo $hasil['date_created']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">

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
                                    <label for="nama_pc" class="col-sm-5 col-form-label">Nama PC</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="<?= $hasil['nama_pc']; ?>" name="nama_pc" onkeyup="this.value = this.value.toUpperCase()" required>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="nama_monitor" class="col-sm-5 col-form-label">Nama Monitor</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="<?= $hasil['nama_monitor']; ?>" name="nama_monitor" onkeyup="this.value = this.value.toUpperCase()" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="sn_pc" class="col-sm-5 col-form-label">Serial PC</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="<?= $hasil['sn_pc']; ?>" name="sn_pc" required>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="sn_monitor" class="col-sm-5 col-form-label">Serial Monitor</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="<?= $hasil['sn_monitor']; ?>" name="sn_monitor" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="tgl_beli" class="col-sm-5 col-form-label">Tanggal Beli</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="tgl_beli" value="<?= $hasil['tgl_beli']; ?>">
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="penguasaan" class="col-sm-5 col-form-label">Penguasaan</label>
                                    <div class="col-sm-7">
                                        <select name="penguasaan" class="form-control" value="<?= $hasil['penguasaan']; ?>" required>
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
                                    <label for="nup" class="col-sm-5 col-form-label">NUP</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="<?= $hasil['nup']; ?>" name="nup" required>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <label for="ruangan" class="col-sm-5 col-form-label">Ruangan</label>
                                    <div class="col-sm-7">
                                        <select name="ruangan" class="form-control" value="<?= $hasil['ruangan']; ?>" required>
                                            <option <?php if ($hasil['ruangan'] == 0) { echo "selected='selected'"; }?> value='0'>
                                                --PILIH--
                                            </option>
                                            <option <?php if ($hasil['ruangan'] == 1) { echo "selected='selected'"; }?> value='1'>
                                                Kepaniteraan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="row col-6">
                                    <label for="user" class="col-sm-5 col-form-label">User</label>
                                    <div class="col-sm-7">
                                        <select name="user" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($pegawai as $m) : ?>
                                                <?php $selected = ($m['id_pegawai'] == $hasil['user']) ? "selected" : "" ?>
                                                <option <?= $selected; ?> value="<?php echo $m['id_pegawai']; ?>"><?php echo $m['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        var getComboA; 
        $(document).ready(function(){
            getComboA = function(selectObject) {
                var kecamatan = selectObject.value;
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('dispensasiKawin/get_desa'); ?>',
                    data: {kecamatan: kecamatan},
                    cache: false,
                    success: function(msg){
                        $("#desa_edit").html(msg);
                    }
                });
            }
        });
    </script>
    
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
                            <p>Apakah Anda Ingin Menghapus Data <strong><?php echo $hasil['nama_pc']; ?> </strong> ID <strong><?php echo $hasil['id_pc']; ?></strong> ?</p>
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

    