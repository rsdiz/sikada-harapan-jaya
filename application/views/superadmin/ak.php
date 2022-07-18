<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($kk); ?> -->
    <!-- /.card-header -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Kartu Keluarga</h6>
        </div>
        <div class="ml-1 mt-2 col-6">
            <a href="<?= base_url('superadmin/printanggota'); ?>"><button type="button" class="btn btn-danger" title="Print" onclick="return confirm('Yakin Cetak ?');"><i class="fas fa-print"></i> Cetak</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No KK</th>
                            <th>Nama Kepala</th>
                            <th>Alamat</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Hubungan</th>
                        </tr>

                        <?php $no = 1;
                        foreach ($anggota as $lk) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $lk['no_kk']; ?></td>
                                <td><?= $lk['nama_kepala']; ?></td>
                                <td><?= $lk['desa']; ?></td>
                                <td><?= $lk['nik']; ?></td>
                                <td><?= $lk['nama']; ?></td>
                                <td><?= $lk['hubungan']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <table id="example2" class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No KK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Desa</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kk as $kk) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kk['no_kk']; ?></td>
                            <td><?= $kk['nama_kepala']; ?></td>
                            <td><?= $kk['desa']; ?></td>
                            <td><?= $kk['rt']; ?></td>
                            <td><?= $kk['rw']; ?></td>
                            <td><?= $kk['kec']; ?></td>
                            <td><?= $kk['kab']; ?></td>
                            <td><?= $kk['prov']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> -->

</div>
</div>
</div>
</div>
<!-- End of Main Content -->