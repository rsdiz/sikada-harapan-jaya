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
        <center>
            <h2>Laporan Data Kematian</h2>
        </center>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Tanggal Kematian</th>
            <th>Sebab</th>
        </tr>

        <?php
        if (!empty($tb_kematian)) {
            $no = 1;
            foreach ($tb_kematian as $kmtn) {
                if (isset($kmtn->tgl_kematian))
                    $tgl_kematian = date('d-m-Y', strtotime($kmtn->tgl_kematian));
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $kmtn['nik']; ?></td>
                    <td><?= $kmtn['nama']; ?></td>
                    <td><?= $kmtn['tgl_kematian']; ?></td>
                    <td><?= $kmtn['sebab']; ?></td>

                </tr>
        <?php }
        } ?>
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