<div class="content d-flex justify-content-center align-items-center">
    <?= $this->session->flashdata('pesan'); ?>
    <!-- Login form -->
    <form class="login-form" action="<?= base_url('auth/ProsesLogin'); ?>" method="POST">
        <div class="card mb-0">
            <div class="card-body">
                <?php if ($this->session->userdata('error')) { ?>
                    <div class="alert alert-warning alert-styled-right alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold"><?= $this->session->userdata('error') ?></span>
                    </div>
                <?php } ?>
                <?php if ($this->session->userdata('success')) { ?>
                    <div class="alert alert-info alert-styled-right alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold"><?= $this->session->userdata('success') ?></span>
                    </div>
                <?php } ?>
                <div class="text-center mb-3">
                    <!-- <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i> -->
                    <img src="<?php echo base_url('assets/app-assets/img/logo.png'); ?>" alt="Logo" class="logo-login">
                    <h1 class="mb-0">SISTAR</h1>
                    <span class="d-block text-muted"><b>S</b>istem <b>I</b>nformasi <b>S</b>tatus <b>T</b>indak lanjut <b>A</b>dministrasi <b>R</b>awat inap</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" name="username" class="form-control" placeholder="Username" autocomplete>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" name="password" class="form-control" id="inputPW" placeholder="Password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group d-flex align-items-center">
                    <div class="form-check mb-0">
                        <label class="form-check-label">
                            <input type="checkbox" onclick="showPassword()" class="form-input-styled" data-fouc>
                            Tampilkan Password
                        </label>
                    </div>

                    <!-- <a href="<?= base_url('auth/forgot') ?>" class="ml-auto">Lupa Password?</a> -->
                </div>

                <div class="form-group">
                    <!-- <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button> -->
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>

                <!-- <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">or sign in with</span>
                </div>

                <div class="form-group text-center">
                    <button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>
                    <button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button>
                    <button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button>
                    <button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button>
                </div> -->

                <!-- <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">Develop: IT Primaya Hospital Karawang</span>
                </div> -->

                <!-- <div class="form-group">
                    <a href="auth/opsi" class="btn btn-light btn-block">Daftar</a>
                </div> -->

                <!-- <span class="form-text text-center text-muted">&copy; <?= date('Y'); ?>. <a href="<?= base_url('/') ?>">Pijetin</a> by <a href="<?= base_url('/') ?>">Kelompok 2 | RPL</a></span> -->

                <!-- <span>TO DO : MENAMBAHKAN JIKA PEMIJAT SUDAH DI PESAN, MAKA DI DASHBOARD PELANGGAN AKAN HILANG! </span> -->
            </div>
        </div>
    </form>
    <!-- /login form -->
    <script>
        function showPassword() {
            var x = document.getElementById("inputPW");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</div>