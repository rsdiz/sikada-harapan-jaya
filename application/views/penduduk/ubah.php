<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Penduduk</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="nik" value="<?= $penduduk['nik'] ?>">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="number" name="nik" class="form-control" placeholder="NIK" value="<?= $penduduk['nik'] ?>">
                        <small class="form-text text-danger"><?= form_error('nik') ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $penduduk['nama'] ?>">
                        <small class="form-text text-danger"><?= form_error('nama')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TTL</label>
                    <div class="col-5">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= $penduduk['tempat_lahir'] ?>">
                        <small class="form-text text-danger"><?= form_error('tempat_lahir')  ?></small>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <input type="date" max="<?= date('Y-m-d'); ?>" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $penduduk['tgl_lahir'] ?>">
                            <small class="form-text text-danger"><?= form_error('tgl_lahir')  ?></small>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk" class="form-control select2bs4" style="width: 100%;">
                            <?php foreach ($jenis_kelamin as $jk) : ?>
                                <?php if ($jk == $penduduk['jk']) : ?>
                                    <option value="<?= $jk; ?>" selected><?= $jk; ?></option>
                                <?php else : ?>
                                    <option value="<?= $jk; ?>"><?= $jk; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                        <input type="text" name="desa" class="form-control" placeholder="Desa" value="<?= $penduduk['desa'] ?>">
                        <small class="form-text text-danger"><?= form_error('desa')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RT</label>
                    <div class="col-sm-10">
                        <input type="text" name="rt" class="form-control" placeholder="RT" value="<?= $penduduk['rt'] ?>">
                        <small class="form-text text-danger"><?= form_error('rt')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RW</label>
                    <div class="col-sm-10">
                        <input type="text" name="rw" class="form-control" placeholder="RW" value="<?= $penduduk['rw'] ?>">
                        <small class="form-text text-danger"><?= form_error('rw')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?= $penduduk['agama'] ?>">
                        <small class="form-text text-danger"><?= form_error('agama')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                    <div class="col-sm-10">
                        <select name="status_perkawinan" class="form-control select2bs4" style="width: 100%;">
                            <?php foreach ($status_kawin as $sk) : ?>
                                <?php if ($sk == $penduduk['status_perkawinan']) : ?>
                                    <option value="<?= $sk; ?>" selected><?= $sk; ?></option>
                                <?php else : ?>
                                    <option val ue="<?= $sk; ?>"><?= $sk; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="<?= $penduduk['pendidikan'] ?>">
                        <small class="form-text text-danger"><?= form_error('pendidikan')  ?></small>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?= $penduduk['pekerjaan'] ?>">
                        <small class="form-text text-danger"><?= form_error('pekerjaan')  ?></small>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                <a href="<?= base_url('penduduk'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</div>
<!-- /.card-body -->