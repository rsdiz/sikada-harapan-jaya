<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- /.card-header -->

    <!-- /.card-header -->

    <div class="card card-info mt-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-black">Data Enkripsi</h6>
            </div>
        </div>
        <div class="card-body">
            <?php echo validation_errors(); ?>

            <?php echo form_open_multipart('/enkripsi/import'); ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor RT</label>
                    <div class="col-sm-10">
                        <input type="number" name="no_rt" class="form-control" minlength="1" maxlength="4" placeholder="Nomor RT" value="<?= set_value('no_rt'); ?>">
                        <small class="form-text text-danger"><?= form_error('no_rt')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah Orang</label>
                    <div class="col-sm-10">
                        <input type="number" name="jml_org" class="form-control" minlength="1" maxlength="8" placeholder="Jumlah Orang" value="<?= set_value('jml_org'); ?>">
                        <small class="form-text text-danger"><?= form_error('jml_org')  ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Input File</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="file" id="file">
                        <?php if (isset($pesan)) echo $pesan ?>
                    </div>
                </div>
                <input type="hidden" name="password" class="form-control" minlength="8" placeholder="Password" value="<?= strtotime("now") ?>">

                <!-- <div class="card-footer"> -->
                <button type="submit" formaction="<?= base_url('Enkripsi/import') ?>" class="btn btn-info"><i class="fas fa-lock"></i> Enkripsi</button>
                <button type="submit" formaction="<?= base_url('Enkripsi/process') ?>" class="btn btn-info"><i class="fas fa-fw fa-sync"></i> Proses</button>
                <!-- </div> -->
                <!-- /.card-footer -->
            <?= form_close() ?>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-black">Langkah-langkah Melakukan Enkripsi</h6>
        </div>

        <div class="card-body">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <p style="text-indent: 35px; text-align: justify">Enkripsi merupakan proses teknis yang mengonversikan informasi menjadi kode rahasia,
                        sehingga mengaburkan data yang dikirim, diterima, atau disimpan.
                        Tujuan dari enkripsi adalah untuk melindungi kerahasiaan data digital yang disimpan pada
                        sistem komputer atau ditransmisikan melalui internet atau jaringan komputer lainnya.
                        Sedangkan Dekripsi merupakan kebalikan dari proses enkripsi yaitu proses konversi data yang sudah
                        dienkripsi kembali menjadi data aslinya sehingga dapat dibaca/ dimengerti kembali.<br>
                        Langkah-langkahnya sebagai berikut.
                    </p>
                </div>
                <div class="col-sm-12">
                    <ol class="list-group list-group-numbered">
                        <li>Masukkan file yang akan dienkripsi atau diamankan.</li>
                        <li>Setelah itu masukkan kunci.</li>
                        <li>Lalu klik Tombol Enkripsi.</li>
                        <li>Apabila ingin mengetahui perhitungan manualnya bisa klik tombol Proses.</li>
                        <li>Setelah melakukan enkripsi, file tersebut akan masuk ke dalam form Data Dekripsi.</li>
                        <li>Untuk mengembalikan file seperti semula lalukan proses Dekripsi, caranya dengan
                            memasukkan kunci yang telah dibuat waktu melakukan enkripsi.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->