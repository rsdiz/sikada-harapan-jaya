<!-- <h1 class="mt-3 ml-2"><?= $title;  ?></h1> -->
<div class="row card-info mt-4">
    <div class="col-md-12 ml-2 ">
        <div class="card">
            <div class="card-header ">
                <h3><strong>Data Kelahiran</strong></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Nama Lengkap</strong></td>
                            <td><?= $kelahiran['nama'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Lahir</strong></td>
                            <td><?= $kelahiran['tgl_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin</strong></td>
                            <td><?= $kelahiran['jk'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Keluarga</strong></td>
                            <td><?= $kelahiran['no_kk'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= base_url('kelahiran'); ?>" class="btn btn-warning mt-3"><i class="fas fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </div>
</div>