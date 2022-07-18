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
            <h2>Laporan Data Penduduk</h2>
        </center>
        <br>
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