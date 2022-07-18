<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pindah Domisili</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <div class=" card-body">
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="number" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                        <small class="form-text text-danger"><?= form_error('nama')  ?></small>
                    </div>
                </div> -->

                <?php
                $queryKode = "SELECT `id_pend`, `nik`, `nama` FROM `tb_pend` ";
                $Id = $this->db->query($queryKode)->result_array();
                ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <select name="id_pend" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <?php foreach ($Id as $id) : ?>
                                <option value="<?php echo $id['id_pend'] ?>">
                                    <?php echo $id['nik'] ?>
                                    <?php echo $id['nama'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <small class="form-text text-danger"><?= form_error('id_pend')  ?></small>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" max="<?= date('Y-m-d'); ?>" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                        <small class="form-text text-danger"><?= form_error('tanggal')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-10">
                        <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" value="<?= set_value('tujuan'); ?>">
                        <small class="form-text text-danger"><?= form_error('tujuan')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" name="ket" class="form-control" placeholder="Keterangan" value="<?= set_value('ket'); ?>">
                        <small class="form-text text-danger"><?= form_error('ket')  ?></small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= base_url('pindahdomisili'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>
</div>
<!-- /.card-body -->