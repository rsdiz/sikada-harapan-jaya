<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($laporanpenduduk); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-black">Laporan Data Penduduk</h6>
            </div>
            <div class="card-body">
                <a href="<?= base_url('laporan/print'); ?>"><button type="button" class="btn btn-danger" title="Print" onclick="return confirm('Yakin Cetak ?');"><i class="fas fa-print"></i> Cetak</button></a>
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
                                <th>Desa</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Status Perkawinan</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($laporan as $lp) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $lp['nik']; ?></td>
                                    <td><?= $lp['nama']; ?></td>
                                    <td><?= $lp['tempat_lahir']; ?></td>
                                    <td><?= $lp['tgl_lahir']; ?></td>
                                    <td><?= $lp['jk']; ?></td>
                                    <td><?= $lp['desa']; ?></td>
                                    <td><?= $lp['rt']; ?></td>
                                    <td><?= $lp['rw']; ?></td>
                                    <td><?= $lp['status_perkawinan']; ?></td>
                                    <td><?= $lp['agama']; ?></td>
                                    <td><?= $lp['pekerjaan']; ?></td>
                                    <!-- <td>
                                <a href="<?= base_url('penduduk/detail/' . $pndk['nik']); ?>"> <button type="button" class="btn btn-info" title="Detail"><i class="fas fa-user"></i></button></a>
                                <a href="<?= base_url('penduduk/ubah/' . $pndk['nik']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
                                <a href="<?= base_url('penduduk/hapus/' . $pndk['nik']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a>
                            </td> -->
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
<!-- End of Main Content -->