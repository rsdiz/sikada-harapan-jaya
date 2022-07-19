<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DATA USERS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="pengguna" class="text-primary">JUMLAH USER</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT count(`id_user`) as jml_user
                    FROM `users`";
                    $getEnk = $this->db->query($query)->row_array();
                    ?>
                    <h4 class="font-weight-bold text-primary"><?= $getEnk['jml_user']; ?></h4>
                </div>
            </div>
        </div>

        <!-- DATA ENKRIPSI -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <a href="dekripsi" class="text-info">JUMLAH DATA TERENKRIPSI</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT count(`nama_file`) as jml_enkrip
                    FROM `file` WHERE id_user={$user['id_user']}";
                    $getEnk = $this->db->query($query)->row_array();
                    ?>
                    <h4 class="font-weight-bold text-info"><?= $getEnk['jml_enkrip']; ?></h4>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->