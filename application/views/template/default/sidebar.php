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
                            <div class="media-title font-weight-semibold"><?= $_SESSION['username']; ?> -
                                <?php if ($_SESSION['is_role'] == 1) {
                                    echo "Superadmin";
                                } elseif ($_SESSION['is_role'] == 2) {
                                    echo "Admin";
                                } elseif ($_SESSION['is_role'] == 3) {
                                    echo "Perawat";
                                } elseif ($_SESSION['is_role'] == 4) {
                                    echo "Farmasi";
                                } elseif ($_SESSION['is_role'] == 5) {
                                    echo "Manajemen";
                                } ?>
                            </div>
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
                        <a href="<?= base_url('users/superadmin/add_Pasien'); ?>" class="nav-link <?= $menuSuperAdmin['PasienPulang']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Input Pasien Ranap
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
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/superadmin/log_SendWhatsApp'); ?>" class="nav-link <?= $menuSuperAdmin['log_WA']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                History Pengiriman WhatsApp
                            </span>
                        </a>
                    </li>
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item nav-item-submenu <?= $dropdownSuperAdmin['nav']; ?>">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span>Data Master</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?= $dropdownSuperAdmin['style']; ?>">
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_status'); ?>" class="nav-link <?= $linkSuperAdmin['linkStatusPelayanan']; ?>">Data Status Pelayanan</a></li>
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_user'); ?>" class="nav-link <?= $linkSuperAdmin['linkUser']; ?>">Data User</a></li>
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/status_pesan_Ultramsg'); ?>" class="nav-link <?= $linkSuperAdmin['LinkLogUltraMsg']; ?>">Data Kirim API WA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu <?= $dropdownSuperAdminSubMenu['nav']; ?>">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span>Master Delete</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?= $dropdownSuperAdminSubMenu['style']; ?>">
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_del_log_WA'); ?>" class="nav-link <?= $linkSuperAdminSubMenu['linkDelLogWA']; ?>">Hapus History Log WA</a></li>
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_del_dat_pasien'); ?>" class="nav-link <?= $linkSuperAdminSubMenu['linkDelDatPasien']; ?>">Hapus Data Pasien</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu <?= $dropdownSuperAdminLaporan['nav']; ?>">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span>Laporan</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?= $dropdownSuperAdminLaporan['style']; ?>">
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_lap_pasien'); ?>" class="nav-link <?= $linkSuperAdminLap['linkLapPasien']; ?>">Laporan Data Pasien</a></li>
                            <li class="nav-item"><a href="<?= base_url('users/superadmin/m_lap_log_wa'); ?>" class="nav-link <?= $linkSuperAdminLap['linkLapLog']; ?>">Laporan History Log WhatsApp</a></li>
                        </ul>
                    </li>
                <?php } elseif ($_SESSION['is_role'] == 2) { ?>
                    <!-- ADMIN -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/admin'); ?>" class="nav-link <?= $menuAdmin['PasienPulang']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Input Pasien Ranap
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/admin/status_admin'); ?>" class="nav-link <?= $menuAdmin['Status']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/admin/log_SendWhatsApp'); ?>" class="nav-link <?= $menuAdmin['log_WA']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                History Pengiriman WhatsApp
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/admin/status_pengiriman_pesan'); ?>" class="nav-link <?= $menuAdmin['status_pesan']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pengiriman Whatsapp
                            </span>
                        </a>
                    </li>
                <?php } elseif ($_SESSION['is_role'] == 3) { ?>
                    <!-- PERAWAT -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/perawat'); ?>" class="nav-link <?= $menuPerawat['Status']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/perawat/dataPasien'); ?>" class="nav-link <?= $menuPerawat['DatPasien']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Data Pasien Kamar Kosong
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/perawat/log_SendWhatsApp'); ?>" class="nav-link <?= $menuPerawat['log_WA']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                History Pengiriman WhatsApp
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/perawat/status_pengiriman_pesan'); ?>" class="nav-link <?= $menuPerawat['status_pesan']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pengiriman Whatsapp
                            </span>
                        </a>
                    </li>
                <?php } elseif ($_SESSION['is_role'] == 4) { ?>
                    <!-- FARMASI -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/farmasi'); ?>" class="nav-link <?= $menuFarmasi['Status']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pelayanan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/farmasi/log_SendWhatsApp'); ?>" class="nav-link <?= $menuFarmasi['log_WA']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                History Pengiriman WhatsApp
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/farmasi/status_pengiriman_pesan'); ?>" class="nav-link <?= $menuFarmasi['status_pesan']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pengiriman Whatsapp
                            </span>
                        </a>
                    </li>
                <?php } elseif ($_SESSION['is_role'] == 5) { ?>
                    <!-- Manajemen -->
                    <li class="nav-item">
                        <a href="<?= base_url('users/manajemen'); ?>" class="nav-link <?= $menuManajemen['Dashboard']; ?>">
                            <i class="icon-home4"></i>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/manajemen/data_pasien'); ?>" class="nav-link <?= $menuManajemen['data_pasien']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Data Pasien
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/manajemen/log_SendWhatsApp'); ?>" class="nav-link <?= $menuManajemen['log_WA']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                History Pengiriman WhatsApp
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/manajemen/status_pengiriman_pesan'); ?>" class="nav-link <?= $menuManajemen['status_pesan']; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Status Pengiriman Whatsapp
                            </span>
                        </a>
                    </li>
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">Dropdown Menu</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item nav-item-submenu <?= $dropdownManajemen['nav']; ?>">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span>Laporan</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?= $dropdownManajemen['style']; ?>">
                            <li class="nav-item"><a href="<?= base_url('users/manajemen/m_lap_pasien'); ?>" class="nav-link <?= $linkManajemen['linkLapPasien']; ?>">Laporan Data Pasien</a></li>
                            <li class="nav-item"><a href="<?= base_url('users/manajemen/m_lap_log_wa'); ?>" class="nav-link <?= $linkManajemen['linkLapLogWA']; ?>">Laporan History Log WhatsApp</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php $mtc_admin = $menuSuperAdmin['mtc_admin'] ?? ' '; ?>
                <?php if ($_SESSION['is_role'] == 1) { ?>
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">MAINTENANCE</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users/superadmin/maintenance'); ?>" class="nav-link <?= $mtc_admin; ?>">
                            <i class="icon-gear"></i>
                            <span>
                                Maintenance Mode
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