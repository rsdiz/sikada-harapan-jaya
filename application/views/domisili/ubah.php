<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Domisili</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="id_domisili" value="<?= $domisili['id_domisili'] ?>">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Id Domisili</label>
                    <div class="col-sm-10">
                        <input type="number" name="id_domisili" class="form-control" placeholder="Id Domisili" value="<?= $domisili['id_domisili'] ?>">
                        <small class="form-text text-danger"><?= form_error('id_domisili') ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?= $domisili['tanggal'] ?>">
                        <small class="form-text text-danger"><?= form_error('tanggal')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Asal</label>
                    <div class="col-sm-10">
                        <input type="text" name="asal" class="form-control" placeholder="Asal" value="<?= $domisili['asal'] ?>">
                        <small class="form-text text-danger"><?= form_error('asal')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?= $domisili['keterangan'] ?>">
                        <small class="form-text text-danger"><?= form_error('Keterangan')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?= $domisili['nik'] ?>">
                        <small class="form-text text-danger"><?= form_error('nik')  ?></small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= base_url('domisili'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>
</div>
<!-- /.card-body -->