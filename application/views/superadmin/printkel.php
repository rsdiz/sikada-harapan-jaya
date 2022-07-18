<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan</title>
    <b>
        <p style="text-align:Center">KABUPATEN PATI</p>
    </b>
    <b>
        <p style="text-align:Center">DESA DUKUHMULYO</p>
    </b>
    <p style="text-align:Center">Alamat : Jln Juwana – Jakenan Km.6, Dukuhmulyo, Jakenan, Pati kode Pos (59182)</p>
    <hr />
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <caption>Laporan Data Kelahiran</caption>
        <tr>
            <th>No</th>
            <!-- <th>ID Kelahiran</th> -->
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Nama Ayah</th>
            <th>No KK</th>
        </tr>

        <?php
        if (!empty($tb_kelahiran)) {
            $no = 1;
            // var_dump($tb_kelahiran);
            foreach ($tb_kelahiran as $lp) {
                if (isset($lp->tgl_lahir))
                    $tgl_lahir = date('d-m-Y', strtotime($lp->tgl_lahir));
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $lp['nama']; ?></td>
                    <td><?= $lp['tgl_lahir']; ?></td>
                    <td><?= $lp['jk']; ?></td>
                    <td><?= $lp['nama_kepala']; ?></td>
                    <td><?= $lp['no_kartu_keluarga']; ?></td>
                </tr>
        <?php }
        }
        ?>
    </table>
    <p style="text-align:Right">Dukuhmulyo, <?= date('d-m-Y') ?></p>
    <br>
    <br>
    <p style="text-align:Right">H. Arie Sunardi, S.H</p>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>