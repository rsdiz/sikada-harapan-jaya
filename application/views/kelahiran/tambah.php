<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data kelahiran</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                        <small class="form-text text-danger"><?= form_error('nama')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" max="<?= date('Y-m-d'); ?>" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?= set_value('tgl_lahir'); ?>">
                        <small class="form-text text-danger"><?= form_error('tgl_lahir')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <small class="form-text text-danger"><?= form_error('jk')  ?></small>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">KK</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_kk" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('id_kk'); ?>">
                        <small class="form-text text-danger"><?= form_error('id_kk')  ?></small>
                    </div>
                </div> -->
                <?php
                $queryKode = "SELECT `id_kartu_keluarga`, `no_kartu_keluarga`, `nama_kepala` FROM `kartu_keluarga` ";
                $Id = $this->db->query($queryKode)->result_array();
                ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keluarga</label>
                    <div class="col-sm-10">
                        <select name="id_kk" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <?php foreach ($Id as $id) : ?>
                                <option value="<?php echo $id['id_kartu_keluarga'] ?>">
                                    <?php echo $id['no_kartu_keluarga'] ?>
                                    <?php echo $id['nama_kepala'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <small class="form-text text-danger"><?= form_error('id_kk')  ?></small>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= base_url('kelahiran'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>
</div>
<!-- /.card-body -->