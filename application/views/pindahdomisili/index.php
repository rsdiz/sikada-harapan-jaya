<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($pindahdomisili); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <div class="card card-info mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Data Pindah Domisili</h6>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('pindahdomisili/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Tanggal</th>
                                    <th>Tujuan</th>
                                    <th>keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pindahdomisili as $pd) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pd['nama']; ?></td>
                                        <td><?= $pd['nik']; ?></td>
                                        <td><?= $pd['tanggal']; ?></td>
                                        <td><?= $pd['tujuan']; ?></td>
                                        <td><?= $pd['ket']; ?></td>

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