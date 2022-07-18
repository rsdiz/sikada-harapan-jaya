<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($kelahiran); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <div class="card card-info mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Data Kelahiran</h6>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('kelahiran/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <?php
                        $queryKelahiran = "SELECT *
                        FROM `tb_kk` JOIN `tb_kelahiran`
                        ON `tb_kk`. `id_kk`= `tb_kelahiran`.`id_kk`
                        ";
                        $kelahiran = $this->db->query($queryKelahiran)->result_array();
                        ?>
                        <?php if (empty($kelahiran)) : ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                Data Kelahiran Tidak Ditemukan
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Keluarga</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($kelahiran as $klhrn) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $klhrn['nama']; ?></td>
                                        <td><?= $klhrn['tgl_lahir']; ?></td>
                                        <td><?= $klhrn['jk']; ?></td>
                                        <td><?= $klhrn['no_kk']; ?></td>

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