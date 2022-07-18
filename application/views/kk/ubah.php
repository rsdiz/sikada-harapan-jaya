<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kartu Keluarga</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="no_kk" value="<?= $kk['id_kk'] ?>">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No KK</label>
                    <div class="col-sm-10">
                        <input type="number" name="no_kk" class="form-control" placeholder="No KK" value="<?= $kk['no_kk'] ?>">
                        <small class="form-text text-danger"><?= form_error('no_kk') ?></small>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="number" name="nik" class="form-control" placeholder="NIK" value="<?= $kk['nik'] ?>">
                        <small class="form-text text-danger"><?= form_error('nik') ?></small>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kepala</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kepala" class="form-control" placeholder="Nama Kepala Keluarga" value="<?= $kk['nama_kepala'] ?>">
                        <small class="form-text text-danger"><?= form_error('nama_kepala')  ?></small>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control select2bs4" style="width: 100%;">
                            <?php foreach ($status as $stts) : ?>
                                <?php if ($status == $kk['status']) : ?>
                                    <option value="<?= $stts; ?>" selected><?= $stts; ?></option>
                                <?php else : ?>
                                    <option value="<?= $stts; ?>"><?= $stts; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                        <input type="text" name="desa" class="form-control" placeholder="Desa" value="<?= $kk['desa'] ?>">
                        <small class="form-text text-danger"><?= form_error('desa')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RT</label>
                    <div class="col-sm-10">
                        <input type="text" name="rt" class="form-control" placeholder="RT" value="<?= $kk['rt'] ?>">
                        <small class="form-text text-danger"><?= form_error('rt')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RW</label>
                    <div class="col-sm-10">
                        <input type="text" name="rw" class="form-control" placeholder="RW" value="<?= $kk['rw'] ?>">
                        <small class="form-text text-danger"><?= form_error('rw')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="kec" class="form-control" placeholder="Kecamatan" value="<?= $kk['kec'] ?>">
                        <small class="form-text text-danger"><?= form_error('kec')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" name="kab" class="form-control" placeholder="Kabupaten" value="<?= $kk['kab'] ?>">
                        <small class="form-text text-danger"><?= form_error('kab')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" name="prov" class="form-control" placeholder="Provinsi" value="<?= $kk['prov'] ?>">
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