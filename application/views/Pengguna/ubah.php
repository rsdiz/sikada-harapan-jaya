<!-- left column -->
<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="col-md-12 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Pengguna Sistem</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="id_user" value="<?= $pengguna['id_user'] ?>">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?= $pengguna['nama']; ?>" required>
                        <small class="form-text text-danger"><?= form_error('nama')  ?></small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $pengguna['email']; ?>" required>
                        <small class="form-text text-danger"><?= form_error('email')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image" id="image" value="<?= $pengguna['image']; ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <label class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <small class="form-text text-danger"><?= form_error('password')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <small class="form-text text-danger"><?= form_error('password')  ?></small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= base_url('pengguna'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>
</div>
<!-- /.card-body -->