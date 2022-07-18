<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($kematian); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <div class="card card-info mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Data Kematian</h6>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('kematian/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <?php
                        $queryKematian = "SELECT *
                        FROM `tb_pend` JOIN `tb_kematian`
                        ON `tb_pend`. `id_pend`= `tb_kematian`.`id_pend`
                        ";
                        $kematian = $this->db->query($queryKematian)->result_array();
                        ?>
                        <?php if (empty($kematian)) : ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                Data Kematian Tidak Ditemukan
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Kematian</th>
                                    <th>Sebab</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kematian as $kmtn) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $kmtn['nik']; ?></td>
                                        <td><?= $kmtn['nama']; ?></td>
                                        <td><?= $kmtn['tgl_kematian']; ?></td>
                                        <td><?= $kmtn['sebab']; ?></td>
                                        <td>
                                            <a href="<?= base_url('kematian/ubah/' . $kmtn['nik']); ?>"><button type="button" class="btn btn-success" title="Ubah"><i class="fas fa-edit"></i></button></a>
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