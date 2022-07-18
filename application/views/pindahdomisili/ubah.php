<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Pindah Domisili</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="id_pindah" value="<?= $domisili['id_pindah'] ?>">
            <div class=" card-body">
                <div class="form-group row" hidden>
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_pend" name="id_pend" placeholder="id_pend" value="<?= $domisili['id_pend']; ?>">
                        <small class="form-text text-danger"><?= form_error('tanggal')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?= $domisili['tanggal']; ?>">
                        <small class="form-text text-danger"><?= form_error('tanggal')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-10">
                        <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" value="<?= $domisili['tujuan']; ?>">
                        <small class="form-text text-danger"><?= form_error('tujuan')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" name="ket" class="form-control" placeholder="Keterangan" value="<?= $domisili['ket']; ?>">
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