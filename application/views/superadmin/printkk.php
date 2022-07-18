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
            <h2>Laporan Data Kartu Keluarga</h2>
        </center>
        <tr>
            <th>No</th>
            <th>No KK</th>
            <th>Nama Kepala</th>
            <th>Desa</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kecamatan</th>
            <th>Kabupaten</th>
            <th>provinsi</th>
        </tr>

        <?php $no = 1;
        foreach ($kk as $lk) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $lk['no_kk']; ?></td>
                <td><?= $lk['nama_kepala']; ?></td>
                <td><?= $lk['desa']; ?></td>
                <td><?= $lk['rt']; ?></td>
                <td><?= $lk['rw']; ?></td>
                <td><?= $lk['kec']; ?></td>
                <td><?= $lk['kab']; ?></td>
                <td><?= $lk['prov']; ?></td>
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