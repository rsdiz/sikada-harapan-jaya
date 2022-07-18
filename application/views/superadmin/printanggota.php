<!DOCTYPE html>
<html>

<head>
    <title>Cetak</title>
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
            <h2>Kartu Keluarga</h2>
        </center>
        <p style="text-align:center">
        <p>No KK : <?= $ak['no_kk']; ?></p>
        </p>
        <p style="text-align:center">
        <p>Kepala Keluarga : <?= $ak['nama_kepala']; ?></p>
        </p>
        <p style="text-align:center">
        <p>Alamat : <?= $ak['desa']; ?></p>
        </p>
        <tr>
            <th>No</th>
            <!-- <th>No KK</th>
            <th>Nama Kepala</th>
            <th>Alamat</th> -->
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Hubungan</th>
        </tr>

        <?php $no = 1;
        foreach ($anggota as $lk) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <!-- <td><?= $lk['no_kk']; ?></td>
                <td><?= $lk['nama_kepala']; ?></td>
                <td><?= $lk['desa']; ?></td> -->
                <td><?= $lk['nik']; ?></td>
                <td><?= $lk['nama']; ?></td>
                <td><?= $lk['hubungan']; ?></td>
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