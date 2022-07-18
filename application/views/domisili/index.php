<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($domisili); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Domisili
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="col-sm-12 mt-4">
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
                            Data Domisili <strong>Berhasil</strong> <?= $this->session->flashdata('flash');  ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-group row">
                <div class="ml-1 col-6">
                    <a href="<?= base_url('domisili/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <div class="col-5">
                    <div class="row mr-3">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Penduduk" name="keyword">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (empty($domisili)) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Data Domisili Tidak Ditemukan
                </div>
            <?php endif; ?>
            <br>
            <table id="example1" class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Asal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($domisili as $dmsl) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dmsl['nik']; ?></td>
                            <td><?= $dmsl['nama']; ?></td>
                            <td><?= $dmsl['tanggal']; ?></td>
                            <td><?= $dmsl['asal']; ?></td>
                            <td>
                                <!-- <a href="<?= base_url('domisili/detail/' . $dmsl['id_domisili']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-user"></i></button></a> -->
                                <a href="<?= base_url('domisili/ubah/' . $dmsl['id_domisili']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
                                <a href="<?= base_url('domisili/hapus/' . $dmsl['id_domisili']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a>
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