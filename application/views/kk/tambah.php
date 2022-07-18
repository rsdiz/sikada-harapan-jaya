<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kartu Keluarga</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No KK</label>
                    <div class="col-sm-10">
                        <input type="number" name="no_kk" class="form-control" placeholder="No KK" value="<?= set_value('no_kk'); ?>">
                        <small class="form-text text-danger"><?= form_error('no_kk')  ?></small>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="number" name="nik" class="form-control" placeholder="NIK" value="<?= set_value('nik'); ?>">
                        <small class="form-text text-danger"><?= form_error('nik')  ?></small>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kepala</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kepala" class="form-control" placeholder="Nama Kepala" value="<?= set_value('nama_kepala'); ?>">
                        <small class="form-text text-danger"><?= form_error('nama_kepala')  ?></small>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <option>Anak</option>
                            <option>Ayah</option>
                            <option>Ibu</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                        <input type="text" name="desa" class="form-control" placeholder="Desa" value="<?= set_value('desa'); ?>">
                        <small class="form-text text-danger"><?= form_error('desa')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RT</label>
                    <div class="col-sm-10">
                        <input type="text" name="rt" class="form-control" placeholder="RT" value="<?= set_value('rt'); ?>">
                        <small class="form-text text-danger"><?= form_error('rt')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RW</label>
                    <div class="col-sm-10">
                        <input type="text" name="rw" class="form-control" placeholder="RW" value="<?= set_value('rw'); ?>">
                        <small class="form-text text-danger"><?= form_error('rw')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="kec" class="form-control" placeholder="Kecamatan" value="<?= set_value('kec'); ?>">
                        <small class="form-text text-danger"><?= form_error('kec')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" name="kab" class="form-control" placeholder="Kabupaten" value="<?= set_value('kab'); ?>">
                        <small class="form-text text-danger"><?= form_error('rw')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" name="prov" class="form-control" placeholder="Provinsi" value="<?= set_value('prov'); ?>">
                        <small class="form-text text-danger"><?= form_error('prov')  ?></small>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                <a href="<?= base_url('kk'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</div>
<!-- /.card-body -->