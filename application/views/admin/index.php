<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DATA KK -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <a href="kk" class="text-info">DATA KARTU KELUARGA</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT `no_kartu_keluarga`, count(`no_kartu_keluarga`) as kk
                    FROM `kartu_keluarga`";
                    $getPen = $this->db->query($query)->row_array();
                    ?>
                    <h4 class="font-weight-bold text-info"><?= $getPen['kk']; ?></h4>
                </div>
            </div>
        </div>
        <!-- DATA PENDUDUK -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="penduduk" class="text-primary">DATA PENDUDUK</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT `nik`, count(`nik`) as penduduk
                    FROM `penduduk`";
                    $getPen = $this->db->query($query)->row_array();
                    ?>
                    <h4 class="font-weight-bold text-primary"><?= $getPen['penduduk']; ?></h4>
                </div>
            </div>
        </div>

        <!-- DATA KELAHIRAN -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                <a href="kelahiran" class="text-success">DATA KELAHIRAN</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT `id_kartu_keluarga`, count(`id_kartu_keluarga`) as lahir
                    FROM `kelahiran`";
                    $getPen = $this->db->query($query)->row_array();
                    ?>
                    <h4 class="font-weight-bold text-success"><?= $getPen['lahir']; ?></h4>
                </div>
            </div>
        </div>

        <!-- DATA KEMATIAN -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="kematian" class="text-warning">DATA KEMATIAN
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-minus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT `id_penduduk`, count(`id_penduduk`) as kematian
                    FROM `kematian`";
                    $getPen = $this->db->query($query)->row_array();
                    ?>
                    <h4 class="font-weight-bold text-warning"><?= $getPen['kematian']; ?></h4>
                </div>
            </div>
        </div>

        <!-- DATA PINDAH DOMISILI -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                <a href="pindahdomisili" class="text-secondary">DATA PINDAH DOMISILI
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT `id_penduduk`, count(`id_penduduk`) as pindah
                    FROM `pindah_domisili`";
                    $getPen = $this->db->query($query)->row_array();
                    ?>
                    <h4 class="font-weight-bold text-secondary"><?= $getPen['pindah']; ?></h4>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->