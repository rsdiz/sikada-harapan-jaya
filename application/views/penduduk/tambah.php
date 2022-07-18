<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Penduduk</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="number" name="nik" class="form-control" placeholder="NIK" value="<?= set_value('nik'); ?>">
                        <small class="form-text text-danger"><?= form_error('nik')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                        <small class="form-text text-danger"><?= form_error('nama')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TTL</label>
                    <div class="col-5">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir'); ?>">
                        <small class="form-text text-danger"><?= form_error('tempat_lahir')  ?></small>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <input type="date" max="<?= date('Y-m-d'); ?>" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                            <small class="form-text text-danger"><?= form_error('tgl_lahir')  ?></small>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <option>LK</option>
                            <option>PR</option>
                        </select>
                    </div>
                </div>
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
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select name="agama" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                            <option>Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                    <div class="col-sm-10">
                        <select name="status_perkawinan" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <option>Kawin</option>
                            <option>Belum Kawin</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <select name="pendidikan" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">-- pilih --</option>
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA</option>
                            <option>Diploma</option>
                            <option>Sarjana</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?= set_value('pekerjaan'); ?>">
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