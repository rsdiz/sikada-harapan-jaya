<?php
date_default_timezone_set('Asia/Jakarta');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($pengguna); ?> -->
    <!-- /.card-header -->

    <!-- /.card-header -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-black">Dekripsi File Penduduk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>RT</th>
                            <th>Jumlah Orang</th>
                            <th>Waktu Enkripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($file as $fl) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>RT.0<?= $fl['nomor_rt']; ?></td>
                                <td><?= $fl['jumlah_orang']; ?></td>
                                <td><?= date("d-m-Y h:i:s A", $fl['createdAt']) ?></td>
                                <td>
                                    <a target="_blank" href="<?= base_url('dekripsi/dekrip/' . $fl['id_file']); ?>"><button type="submit" class="btn btn-info"><i class="fas fa-unlock"></i> Dekripsi</button></a>
                                    <a href="<?= base_url('dekripsi/download/' . $fl['id_file']); ?>"><button type="button" class="btn btn-success" title="Download"><i class="fas fa-download"></i></button></a>
                                    <a href="<?= base_url('dekripsi/hapus/' . $fl['id_file']); ?>"><button type="button" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin hapus ?');"><i class="fas fa-trash-alt"></i></button></a>
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