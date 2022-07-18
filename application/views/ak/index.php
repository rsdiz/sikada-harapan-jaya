<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($ak); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Anggota Keluarga
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="col-sm-12 mt-4">
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
                            Data Anggota Keluarga <strong>Berhasil</strong> <?= $this->session->flashdata('flash');  ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-group row">
                <div class="ml-1 col-6">
                    <a href="<?= base_url('AK/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <div class="col-5">
                    <div class="row mr-3">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari AK" name="keyword">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                    <a href="<?= base_url('AK'); ?>"><button class="btn btn-danger ml-1">Batal</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (empty($ak)) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Data Anggota Keluarga Tidak Ditemukan
                </div>
            <?php endif; ?>
            <br>
            <table id="example1" class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No KK</th>
                        <th>NIK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ak as $ak) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $ak['no_kk']; ?></td>
                            <td><?= $ak['nik']; ?></td>
                            <td><?= $ak['nama_kepala']; ?></td>
                            <td><?= $ak['status']; ?></td>
                            <td>
                                <!-- <a href="<?= base_url('ak/detail/' . $ak['no_kk']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-user"></i></button></a>
                                <a href="<?= base_url('ak/ubah/' . $ak['no_kk']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
                                <a href="<?= base_url('ak/hapus/' . $ak['no_kk']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
<!-- End of Main Content -->