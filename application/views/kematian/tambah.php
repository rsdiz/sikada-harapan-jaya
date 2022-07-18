<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kematian</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <div class=" card-body">
                <?php
                $queryKode = "SELECT `id_penduduk`, `nik`, `nama` FROM `penduduk` ";
                $Id = $this->db->query($queryKode)->result_array();
                ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penduduk</label>
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
                    <label class="col-sm-2 col-form-label">Tanggal Kematian</label>
                    <div class="col-5">
                        <input type="date" max="<?= date('Y-m-d'); ?>" name="tgl_kematian" class="form-control" placeholder="Tanggal Kematian" value="<?= set_value('tgl_kematian'); ?>">
                        <small class="form-text text-danger"><?= form_error('tgl_kematian')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sebab</label>
                    <div class="col-sm-10">
                        <input type="text" name="sebab" class="form-control" placeholder="Sebab" value="<?= set_value('sebab'); ?>">
                        <small class="form-text text-danger"><?= form_error('sebab')  ?></small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= base_url('kematian'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>
</div>
</div>
<!-- /.card-body -->