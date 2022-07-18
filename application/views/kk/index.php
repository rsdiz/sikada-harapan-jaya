<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($kk); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <div class="card card-info mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Data Kartu Keluarga</h6>
                </div>
                <div class="card-body">

                    <a href="<?= base_url('kk/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No KK</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kk as $kk) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $kk['no_kartu_keluarga']; ?></td>
                                        <td><?= $kk['nama_kepala']; ?></td>
                                        <td>
                                            <a href="<?= base_url('kk/ak/' . $kk['id_kartu_keluarga']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-users"></i></button></a>
                                            <a href="<?= base_url('kk/ubah/' . $kk['id_kartu_keluarga']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
                                            <a href="<?= base_url('kk/hapus/' . $kk['id_kartu_keluarga']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a>
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