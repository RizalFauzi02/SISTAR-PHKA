<?php $this->load->view('template/default/header'); ?>

<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <?php $this->load->view('template/default/sidebar'); ?>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <?php echo $contents; ?>

        <?php $this->load->view('template/default/footer'); ?>