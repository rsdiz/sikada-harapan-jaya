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
            <?php if (empty($anggota)) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Data Anggota Keluarga Tidak Ditemukan
                </div>
            <?php endif; ?>
            <br>

            <!-- <div class="ml-1 col-6">
                <a href="<?= base_url('kk/tambahak') ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data</a>
            </div> -->
            <form class="form-horizontal" action="" method="POST">
                <input type="hidden" name="id_kk" value="<?= $ak['id_kk'] ?>">
                <div class=" card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No KK</label>
                        <div class="col-5">
                            <input type="text" name="no_kk" id="no_kk" class="form-control" placeholder="No KK" value="<?= $ak['no_kk'] ?> " disabled>
                            <small class="form-text text-danger"><?= form_error('no_kk')  ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kepala Keluarga</label>

                        <div class="col-5">
                            <div class="input-group">
                                <input type="text" class="form-control" id="nama_kepala" name="nama_kepala" placeholder="nama kepala" value="<?= $ak['nama_kepala'] ?> " disabled>
                                <small class="form-text text-danger"><?= form_error('nama_kepala')  ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-5">
                            <input type="text" name="rt" class="form-control" placeholder="RT" value="<?= $ak['desa'] ?> " disabled>
                            <small class="form-text text-danger"><?= form_error('rt')  ?></small>
                        </div>
                    </div>
                </div>
            </form>
            <div class="ml-1 col-6">
                <a href="<?= base_url('kk/tambahAK/' . $ak['id_kk']) ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Anggota</a>
            </div>
            <div class="ml-1 mt-2 col-6">
                <a href="<?= base_url('kk/pa/' . $ak['id_kk']) ?>"><button type="button" class="btn btn-danger" title="Print" onclick="return confirm('Yakin Cetak ?');"><i class="fas fa-print"></i> Cetak</button></a>
            </div>
            <table id="example1" class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No KK</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Hubungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($anggota as $ak) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $ak['no_kartu_keluarga']; ?></td>
                            <td><?= $ak['nik']; ?></td>
                            <td><?= $ak['nama']; ?></td>
                            <td><?= $ak['hubungan']; ?></td>
                            <td>
                                <!-- <a href="<?= base_url('ak/detail/' . $ak['no_kartu_keluarga']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-user"></i></button></a>
                                <a href="<?= base_url('ak/ubah/' . $ak['no_kartu_keluarga']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a> -->
                                <!-- <a href="<?= base_url('ak/print/' . $ak['id_kartu_keluarga']); ?>"><button type="button" class="btn btn-warning" title="Print"><i class="fas fa-print"></i></button></a> -->
                                <a href="<?= base_url('ak/hapus/' . $ak['id_anggota']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a>
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