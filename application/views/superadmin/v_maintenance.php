<style>
    p {
        font-size: 12px;
        color: red;
        margin-top: 3px;
        margin-bottom: 15px;
        text-align: left;
    }

    /* CSS hanya untuk teks dalam <i><b>...</b></i> di label #izinkan_double */
    label[for="izinkan_double"] i b {
        font-size: 12px;
        color: red;
        margin-top: 3px;
        margin-bottom: 15px;
        display: inline-block;
        text-align: left;
    }
</style>
<style>
    .custom-switch {
        padding-left: 3.5rem;
    }

    .custom-switch .custom-control-label::before {
        width: 50px;
        height: 26px;
        border-radius: 30px;
        background-color: #cfcfcf;
        border: none;
        top: 2px;
        left: -3.5rem;
        transition: all 0.3s ease;
    }

    .custom-switch .custom-control-label::after {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background-color: #fff;
        top: 4px;
        left: calc(-3.5rem + 2px);
        transition: all 0.3s ease;
    }

    .custom-control-input:checked~.custom-control-label::before {
        background-color: #28a745 !important;
    }

    /* POSISI BULATAN SAAT AKTIF */
    .custom-control-input:checked~.custom-control-label::after {
        transform: translateX(26px);
    }

    .custom-control-label {
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?= $title; ?></span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <h5>Layanan Pengaduan SIAP-PHKA Hubungi : <br><a href="https://wa.link/4ia9bz" target="_blank">Divisi Mutu PHKA</a></h5>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('info')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('info'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="row">
        <!-- Card Form Input -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title mb-0"> <?= $title; ?> </h5>
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('info')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('info'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('users/superadmin/prosesMaintenance'); ?>"
                        method="POST"
                        id="formMaintenance">

                        <!-- hidden password -->
                        <input type="hidden" name="confirm_password" id="hidden_password">

                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Maintenance Mode</span>
                        </div>

                        <?php if ($this->session->userdata('is_role') == '1'): ?>

                            <div class="form-group">
                                <div class="custom-control custom-switch">

                                    <input type="checkbox"
                                        class="custom-control-input"
                                        id="maintenance_mode"
                                        name="maintenance_mode"
                                        value="1"
                                        <?= (!empty($site_config) && $site_config['maintenance_mode'] == 1) ? 'checked' : ''; ?>>

                                    <label class="custom-control-label" for="maintenance_mode">
                                        Aktifkan Maintenance
                                    </label>

                                </div>
                            </div>

                        <?php endif; ?>

                        <div class="form-group">
                            <label>Status Maintenance : </label>

                            <h5>
                                <b>
                                    <?= ($site_config['maintenance_mode'] == 1) ? 'AKTIF' : 'NONAKTIF'; ?>
                                </b>
                            </h5>
                        </div>

                        <div class="text-right">
                            <button type="button"
                                class="btn btn-primary"
                                id="btnOpenModal">
                                Simpan Status
                            </button>
                        </div>

                    </form>
                    <!-- MODAL AKSES MAINTENANCE MODE -->
                    <!-- MODAL PASSWORD -->
                    <div class="modal fade"
                        id="modalPassword"
                        tabindex="-1"
                        role="dialog"
                        aria-hidden="true">

                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">

                            <div class="modal-content">

                                <div class="modal-header bg-danger text-white">

                                    <h5 class="modal-title">
                                        <b>Konfirmasi Password Maintenance Mode!!</b>
                                    </h5>

                                    <button type="button"
                                        class="close text-white"
                                        data-dismiss="modal">

                                        <span>&times;</span>

                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="form-group">

                                        <label>Masukkan Password :</label>

                                        <!-- Input Group -->
                                        <div class="input-group">

                                            <input type="password"
                                                class="form-control"
                                                id="confirm_password"
                                                placeholder="Masukkan password"
                                                autocomplete="off">

                                            <div class="input-group-append">

                                                <span class="input-group-text"
                                                    id="togglePassword"
                                                    style="cursor: pointer;">

                                                    <i class="fa fa-eye"></i>

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button"
                                        class="btn btn-light"
                                        data-dismiss="modal">

                                        Batal

                                    </button>

                                    <button type="button"
                                        class="btn btn-warning"
                                        id="btnConfirmPassword">

                                        Konfirmasi

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Card Table -->
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Pasien</h5>
                </div> -->

                <h1>
                    <center><b>Maintenance Mode</b></center>
                </h1><br>
                <h3>
                    <center>
                        <b>
                            <span style="color:red;">PERHATIAN!!!</span><br>
                            Ketika status maintenance <span style="color:red;">DIAKTIFKAN</span>, mohon untuk
                            <span style="color:red;">TIDAK LOGOUT </span> dari LOGIN SUPERADMIN. Dan <span style="color:red;">TIDAK CLOSE HALAMAN LOGIN!!!<span><br>
                        </b>
                    </center>
                </h3>
            </div>
        </div>
    </div>
</div>
<script>
    // buka modal
    $('#btnOpenModal').on('click', function() {

        $('#confirm_password').val('');

        $('#modalPassword').modal('show');

    });

    // submit form setelah isi password
    $('#btnConfirmPassword').on('click', function() {

        let inputPassword = $('#confirm_password').val();

        // validasi kosong
        if (inputPassword == '') {

            alert('Password wajib diisi!');
            return false;

        }

        // isi hidden input
        $('#hidden_password').val(inputPassword);

        // submit form
        $('#formMaintenance').submit();

    });

    // tombol mata show/hide password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#confirm_password');

    togglePassword.addEventListener('click', function() {

        // cek type password
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';

        // ubah type input
        password.setAttribute('type', type);

        // ganti icon mata
        this.innerHTML = (type === 'password') ?
            '<i class="fa fa-eye"></i>' :
            '<i class="fa fa-eye-slash"></i>';
    });
</script>
<!-- /content area -->