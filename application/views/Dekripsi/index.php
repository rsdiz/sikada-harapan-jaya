<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($pengguna); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <div class="card card-info mt-3">
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
                                    <th>Nama File Awal</th>
                                    <th>Nama File Enkripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($file as $fl) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $fl['nama_file']; ?></td>
                                        <td><?= $fl['nama_file_enkrip']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($fl['tanggal'])); ?></td>
                                        <td>
                                            <a href="<?= base_url('dekripsi/dekrip/' . $fl['id_file']); ?>"><button type="submit" class="btn btn-info"><i class="fas fa-unlock"></i> Dekripsi</button></a>
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


    </div>
</div>
<!-- End of Main Content -->