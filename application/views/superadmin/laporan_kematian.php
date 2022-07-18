<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($kematian); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-black">Laporan Data Kematian</h6>
            </div>
            <div class="card-body">

                <form method="get" action="">
                    <label class="m-0 font-weight-bold text-black">Cetak Berdasarkan</label><br>
                    <select name="filter" id="filter">
                        <option value="">Pilih</option>
                        <option value="1">Per Tanggal</option>
                        <option value="2">Per Bulan</option>
                        <option value="3">Per Tahun</option>
                    </select>
                    <br /><br />

                    <div id="form-tanggal">
                        <label>Tanggal</label><br>
                        <input type="date" name="tanggal" class="input-tanggal" />
                        <br /><br />
                    </div>

                    <div id="form-bulan">
                        <label>Bulan</label><br>
                        <select name="bulan">
                            <option value="">Pilih</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <br /><br />
                    </div>

                    <div id="form-tahun">
                        <label>Tahun</label><br>
                        <select name="tahun">
                            <option value="">Pilih</option>
                            <?php
                            foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                            }
                            ?>
                        </select>
                        <br /><br />
                    </div>

                    <button type="submit" class="btn btn-success">Tampilkan</button>
                    <a href="<?php echo base_url('superadmin/laporankematian'); ?>">
                        <type="submit" class="btn btn-secondary">Reset Filter
                    </a>
                </form>
                <hr />

                <b><?php echo $ket; ?></b>
                <!-- <br /><br /> -->
                <a href="<?= $url_cetak ?>"><button type="button" class="btn btn-danger" title="Print" onclick="return confirm('Yakin Cetak ?');"><i class="fas fa-print"></i> Cetak</button></a>
                <!-- <br /><br /> -->



                <!-- <a href="<?= base_url('superadmin/printkematian'); ?>"><button type="button" class="btn btn-danger" title="Print" onclick="return confirm('Yakin Cetak ?');"><i class="fas fa-print"></i> Cetak</button></a> -->
                <?php
                $queryKematian = "SELECT *
                        FROM `penduduk` JOIN `kematian`
                        ON `penduduk`. `id_penduduk`= `kematian`.`id_penduduk`
                        ";
                $kematian = $this->db->query($queryKematian)->result_array();
                ?>
                <?php if (empty($kematian)) : ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Data Kematian Tidak Ditemukan
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Kematian</th>
                                <th>Sebab</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui-1.12.1/jquery-ui.min.js'); ?>">
    </script> <!-- Load file plugin js jquery-ui -->
    <script>
        $(document).ready(function() { // Ketika halaman selesai di load
            $('#form-tanggal, #form-bulan, #form-tahun').hide();


            // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

            $('#filter').change(function() { // Ketika user memilih filter
                if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                    $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                    $('#form-tanggal').show(); // Tampilkan form tanggal
                } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                    $('#form-tanggal').hide(); // Sembunyikan form tanggal
                    $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                } else { // Jika filternya 3 (per tahun)
                    $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                    $('#form-tahun').show(); // Tampilkan form tahun
                }

                $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
            })
            $('.input-tanggal').datepicker({
                dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
            });
        })
    </script>

</div>
</div>
<!-- End of Main Content -->