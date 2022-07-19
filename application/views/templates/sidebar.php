<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-pink sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ">
            <img src="<?= base_url('assets'); ?>/img/data-encryption.png" width="30px">
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
        Keamanan Data
    </div>

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