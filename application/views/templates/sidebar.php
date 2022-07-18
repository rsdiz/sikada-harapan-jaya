<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-pink sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ">
            <img src="<?= base_url('assets'); ?>/img/logo.png" width="30px">
        </div>
        <div class="sidebar-brand-text mx-3">SIKADA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `menu`.`id`, `menu`
                    FROM `menu` JOIN `access_menu`
                    ON `menu`.`id` = `access_menu`.`menu_id`
                    WHERE `access_menu`.`role_id` = $role_id
                    ORDER BY `access_menu`.`menu_id` ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu'] ?>
        </div>


        <!-- SUB MENU SESUAI MENU -->

        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                        FROM `sub_menu` JOIN `menu`
                        ON `sub_menu`. `menu_id`= `menu`.`id`
                        WHERE `sub_menu`.`menu_id` = $menuId
                        AND `sub_menu`.`is_active` = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelolaData" aria-expanded="true" aria-controls="collapseKelolaData">
            <i class="fas fa-fw fa-book"></i>
            <span>Kelola Data</span>
        </a>
        <div id="collapseKelolaData" class="collapse" aria-labelledby="headingKelolaData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('kk'); ?>">Data Kartu Keluarga</a>
                <a class="collapse-item" href="<?= base_url('penduduk'); ?>">Data Penduduk</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSirkulasiPenduduk" aria-expanded="true" aria-controls="collapseSirkulasiPenduduk">
            <i class="fas fa-fw fa-sync"></i>
            <span>Sirkulasi Penduduk</span>
        </a>
        <div id="collapseSirkulasiPenduduk" class="collapse" aria-labelledby="headingSirkulasiPenduduk" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('kelahiran'); ?>">Data Kelahiran</a>
                <a class="collapse-item" href="<?= base_url('kematian'); ?>">Data Kematian</a>
                <!-- <a class="collapse-item" href="<?= base_url('domisili'); ?>">Data Domisili</a> -->
                <a class="collapse-item" href="<?= base_url('pindahdomisili'); ?>">Data Pindah Domisili</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('laporan/kk'); ?>">Laporan KK</a>
                <a class="collapse-item" href="<?= base_url('laporan'); ?>">Laporan Penduduk</a>
                <a class="collapse-item" href="<?= base_url('laporan/kelahiran'); ?>">Laporan Kelahiran</a>
                <a class="collapse-item" href="<?= base_url('laporan/kematian') ?>">Laporan Kematian</a>
                <!-- <a class="collapse-item" href="buttons.html">Laporan Domisili</a> -->
                <a class="collapse-item" href="<?= base_url('laporan/pindah') ?>">Laporan Pindah Domisili</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('enkripsi') ?>">
            <i class="fas fa-fw fa-lock"></i>
            <span>Enkripsi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dekripsi') ?>">
            <i class="fas fa-fw fa-unlock"></i>
            <span>Dekripsi</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengguna') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna Sistem</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->