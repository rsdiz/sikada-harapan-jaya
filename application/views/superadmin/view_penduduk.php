<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($penduduk); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <div class="card card-info mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Data Penduduk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($penduduk as $pndk) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pndk['nik']; ?></td>
                                        <td><?= $pndk['nama']; ?></td>
                                        <td><?= $pndk['tempat_lahir']; ?></td>
                                        <td><?= $pndk['tgl_lahir']; ?></td>
                                        <td><?= $pndk['jk']; ?></td>
                                        <td>
                                            <a href="<?= base_url('superadmin/detail/' . $pndk['nik']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-user"></i></button></a>
                                            <!-- <a href="<?= base_url('penduduk/ubah/' . $pndk['nik']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
                                <a href="<?= base_url('penduduk/hapus/' . $pndk['nik']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</div>
<!-- End of Main Content -->