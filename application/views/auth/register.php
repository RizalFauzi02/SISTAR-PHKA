<div class="content d-flex justify-content-center align-items-center">
    <?= $this->session->flashdata('pesan'); ?>
    <!-- Registration form -->
    <form action="<?= base_url('auth/submitRegister'); ?>" method="POST" class="flex-fill">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <h3 class="mb-0"><?= $title; ?></h3>
                            <span class="d-block text-muted">Silahkan isi dibawah ini</span>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <!-- <input type="password" class="form-control" placeholder="Repeat password">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div> -->
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="password" name="password1" id="pw1" class="form-control" placeholder="Password" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="password" name="password2" id="pw2" class="form-control" placeholder="Ulangi Password" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="showPassword()" class="form-input-styled" data-fouc>
                                    Tampilkan Password
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button type="reset" class="btn btn-light">Reset</button>
                            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b> Daftar</button>
                        </div>
                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Sudah punya akun?</span>
                        </div>
                        <a href="<?= base_url('/'); ?>" class="btn btn-light btn-block">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /registration form -->
    <script>
        function showPassword() {
            var x = document.getElementById("pw1");
            var y = document.getElementById("pw2");

            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>
</div>