<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Anggota Kartu Keluarga</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="id_kk" value="<?= $ak['id_kk'] ?>">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No KK|Kepala</label>
                    <div class="col-5">
                        <input type="text" name="no_kk" id="no_kk" class="form-control" placeholder="No KK" value="<?= $ak['no_kk'] ?> " disabled>
                        <small class="form-text text-danger"><?= form_error('no_kk')  ?></small>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <input type="text" class="form-control" id="nama_kepala" name="nama_kepala" placeholder="nama kepala" value="<?= $ak['nama_kepala'] ?> " disabled>
                            <small class="form-text text-danger"><?= form_error('nama_kepala')  ?></small>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Anggota</label>
                    <div class="col-5">
                        <select name="id_pend" id="id_pend" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- Penduduk --</option>
                            <?php
                            $QueryPend = "SELECT * FROM tb_pend";
                            $Id = $this->db->query($QueryPend)->result_array();
                            ?>
                            <?php foreach ($Id as $id) : ?>
                                <option value="<?php echo $id['id_pend'] ?>">
                                    <?php echo $id['nik'] ?>
                                    <?php echo $id['nama'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('id_pend')  ?></small>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <select name="hubungan" class="form-control select2bs4" style="width: 100%;">
                                <option selected="selected">-- Hub Keluarga --</option>
                                <option>Ayah</option>
                                <option>Ibu</option>
                                <option>Anak</option>
                            </select>
                            <small class="form-text text-danger"><?= form_error('hubungan')  ?></small>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /.card-body -->