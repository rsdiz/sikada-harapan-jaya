<!-- <h1 class="mt-3 ml-2"><?= $judul;  ?></h1> -->
<div class="row card-info mt-4">
    <div class="col-md-12 ml-2 ">
        <div class="card">
            <div class="card-header ">
                <h3><strong>Data Pindah Penduduk</strong></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>NIK</strong></td>
                            <td><?= $domisili['nik'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td><?= $domisili['nama'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tempat Lahir</strong></td>
                            <td><?= $domisili['tempat_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Lahir</strong></td>
                            <td><?= $domisili['tgl_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin</strong></td>
                            <td><?= $domisili['jk'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Desa</strong></td>
                            <td><?= $domisili['desa'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>RT</strong></td>
                            <td><?= $domisili['rt'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>RW</strong></td>
                            <td><?= $domisili['rw'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Agama</strong></td>
                            <td><?= $domisili['agama'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status Perkawinan</strong></td>
                            <td><?= $domisili['status_perkawinan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan</strong></td>
                            <td><?= $domisili['pekerjaan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td><?= $domisili['status'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Pindah</strong></td>
                            <td><?= $domisili['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tujuan</strong></td>
                            <td><?= $domisili['tujuan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td><?= $domisili['ket'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= base_url('pindahdomisili'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </div>
</div>