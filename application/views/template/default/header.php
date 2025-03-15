<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?> - SISTAR</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/app-assets/img/logo.png'); ?>">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/app-assets/Bootstrap 4/Template/layout_1/LTR/default/full/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/app-assets/Bootstrap 4/Template/layout_1/LTR/default/full/') ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/app-assets/Bootstrap 4/Template/layout_1/LTR/default/full/') ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/app-assets/Bootstrap 4/Template/layout_1/LTR/default/full/') ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/app-assets/Bootstrap 4/Template/layout_1/LTR/default/full/') ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/app-assets/'); ?>sweetalert2/dist/notiflix-2.6.0.min.css">
    <script src="<?= base_url('assets/app-assets/'); ?>sweetalert2/dist/notiflix-2.6.0.min.js"></script>
    <script src="<?= base_url('assets/app-assets/'); ?>sweetalert2/dist/sweetalert2.all.js"></script>
    <!-- /SweetAlert2 -->

    <!-- Core JS files -->
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/main/jquery.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/pickers/daterangepicker.js"></script>

    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template/layout_1/LTR/default/full/') ?>assets/js/app.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/media/fancybox.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/demo_pages/content_cards_content.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/demo_pages/form_layouts.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/pickers/anytime.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/forms/styling/switch.min.js"></script>
    <!-- /theme JS files -->

    <!-- CUSTOM -->
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/demo_pages/picker_date.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/plugins/custom/admin.js"></script>
    <script src="<?= base_url('assets/js') ?>/custom.js"></script>
    <!-- <script src="<?= base_url('assets/app-assets/Bootstrap 4/Template') ?>/global_assets/js/demo_pages/datatables_basic.js"></script> -->


    <!-- /Custom -->

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand d-flex align-items-center">
            <a href="#" class="d-inline-block">
                <!-- <img src="<?= base_url('assets/app-assets/img/logo-bg.png') ?>" alt=""> -->
            </a>
            <h5 class="ml-2 font-weight-bold mb-0">SISTAR - PHKA</h5>
        </div>



        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <span class="badge bg-dark ml-md-3 mr-md-auto" id="realTimeClock" style="font-size: 1.2rem; padding: 10px 15px; display: inline-block;">Loading...</span>


            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="<?= base_url('assets/app-assets/img/profile/') . $profile['profile']; ?>" class="rounded-circle mr-2" height="34" alt=""> -->
                        <span> <?php if ($_SESSION['is_role'] == 1) {
                                    echo "Superadmin";
                                } elseif ($_SESSION['is_role'] == 2) {
                                    echo "Admin";
                                } elseif ($_SESSION['is_role'] == 3) {
                                    echo "Perawat";
                                } elseif ($_SESSION['is_role'] == 4) {
                                    echo "Farmasi";
                                } ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> -->
                        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item"><i class="icon-exit"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->