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
            <h2>Laporan Data Pindah Penduduk</h2>
        </center>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIK</th>
            <th>Tanggal Pindah</th>
            <th>Tujuan</th>
            <th>keterangan</th>
        </tr>

        <?php $no = 1;
        foreach ($pindah as $p) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p['nama']; ?></td>
                <td><?= $p['nik']; ?></td>
                <td><?= $p['tanggal']; ?></td>
                <td><?= $p['tujuan']; ?></td>
                <td><?= $p['ket']; ?></td>
            </tr>
        <?php } ?>
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