<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-pink sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/laporankk') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Laporan KK</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/laporanpenduduk') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Laporan Penduduk</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/laporankelahiran') ?>">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Laporan Kelahiran</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/laporankematian') ?>">
            <i class="fas fa-fw fa-user-minus"></i>
            <span>Laporan Kematian</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/laporanpindah') ?>">
            <i class="fas fa-fw fa-user-times"></i>
            <span>Laporan Pindah Domisili</span>
        </a>
    </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna Sistem</span>
        </a> -->
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