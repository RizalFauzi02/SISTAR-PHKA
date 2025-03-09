<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <div class="media-title font-weight-semibold">
                            <?php if ($_SESSION['is_role'] == 1) {
                                echo "Superadmin";
                            } elseif ($_SESSION['is_role'] == 2) {
                                echo "Admin";
                            } elseif ($_SESSION['is_role'] == 3) {
                                echo "Perawat";
                            } elseif ($_SESSION['is_role'] == 4) {
                                echo "Farmasi";
                            } ?>
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="<?= base_url('auth/logout'); ?>" class="text-white"><i class="icon-exit"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <?php if ($_SESSION['is_role'] == 1) { ?>
                    <!-- SUPERADMIN -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/superadmin'); ?>" class="nav-link <?= $menuSuperAdmin['Dashboard']; ?>">
                            <i class="icon-home4"></i>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/superadmin/status_pelayanan'); ?>" class="nav-link <?= $menuSuperAdmin['Status']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/superadmin/add_Pasien'); ?>" class="nav-link <?= $menuSuperAdmin['PasienPulang']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Input Pasien Pulang
                            </span>
                        </a>
                    </li>
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item nav-item-submenu <?= $dropdownSuperAdmin['nav']; ?>">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span>DATA MASTER</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?= $dropdownSuperAdmin['style']; ?>">
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_status'); ?>" class="nav-link <?= $linkSuperAdmin['linkStatusPelayanan']; ?>">Data Status Pelayanan</a></li>
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_user'); ?>" class="nav-link <?= $linkSuperAdmin['linkUser']; ?>">Data User</a></li>
                        </ul>
                    </li>
                <?php } elseif ($_SESSION['is_role'] == 2) { ?>
                    <!-- ADMIN -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/admin'); ?>" class="nav-link <?= $menuAdmin['PasienPulang']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="<?= base_url('users/admin/status_admin'); ?>" class="nav-link <?= $menuAdmin['Status']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li> -->
                <?php } elseif ($_SESSION['is_role'] == 3) { ?>
                    <!-- PERAWAT -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/superadmin/status_pelayanan'); ?>" class="nav-link <?= $menuPerawat['Status']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li>
                <?php } elseif ($_SESSION['is_role'] == 4) { ?>
                    <!-- FARMASI -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/superadmin/status_pelayanan'); ?>" class="nav-link <?= $menuFarmasi['Status']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>