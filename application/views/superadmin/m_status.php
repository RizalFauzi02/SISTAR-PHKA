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
        <div class="col-md-4">
            <div class="card">
                <div class=" card-header header-elements-inline d-flex justify-content-center w-100">
                    <h5 class="card-title">Master Status Pelayanan</h5>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('users/superadmin/prosesAddMasterStatus'); ?>" method="POST">
                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Master Status Pelayanan</span>
                        </div>
                        <div class="form-group">
                            <label for="nama_status">Nama Status</label>
                            <input type="text" name="nama_status" class="form-control" autocomplete="off" placeholder="Nama Button Status" required>
                        </div>

                        <div class="form-group">
                            <label for="id_user">Pengguna Status</label>
                            <select class="form-control select-search" id="id_user" name="id_user[]" multiple required>
                                <option value="">Pilih Pengguna</option>
                                <?php foreach ($user as $us) : ?>
                                    <option value="<?= $us['id_user']; ?>"><?= $us['username']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jaminan">Jaminan</label>
                            <select class="form-control select-search" id="jaminan" name="jaminan">
                                <option value="" disabled selected>-- Pilih Jaminan --</option>
                                <option value="UMUM">UMUM</option>
                                <option value="ASURANSI">ASURANSI</option>
                                <option value="BPJS TK">BPJS TK</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea">Pesan Status</label>
                            <textarea class="form-control" name="pesan_status" id="exampleTextarea" rows="8" placeholder="Tulis Pesan disini...." required></textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card Table -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Status Pelayanan</h5>
                </div>

                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>Nama Status</th>
                            <th>Pengguna Status</th>
                            <th>Pesan Status</th>
                            <th>Jaminan</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($status)) : ?>
                            <?php foreach ($status as $status) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($status['nama_status']); ?></td>
                                    <td><?= htmlspecialchars($status['pengguna_status']); ?></td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalPesan<?= $status['id_status']; ?>">
                                            <?= htmlspecialchars(mb_strimwidth($status['pesan_status'], 0, 30, "...")); ?>
                                        </a>
                                    </td>
                                    <td><?= htmlspecialchars($status['jaminan'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-bs-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $status['id_status']; ?>">Edit</a>
                                                    <a href="#" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $status['id_status']; ?>">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                                <!-- Modal Pesan Status -->
                                <div class="modal fade" id="modalPesan<?= $status['id_status']; ?>" tabindex="-1" aria-labelledby="modalPesanLabel<?= $status['id_status']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalPesanLabel<?= $status['id_status']; ?>">Detail Pesan Status</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <?= nl2br(htmlspecialchars($status['pesan_status'])); ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Pesan -->

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit<?= $status['id_status']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= base_url('users/superadmin/updateStatus'); ?>" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Status</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_status" value="<?= $status['id_status']; ?>">

                                                    <div class="mb-3">
                                                        <label>Nama Status</label>
                                                        <input type="text" class="form-control" name="nama_status" value="<?= htmlspecialchars($status['nama_status']); ?>" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Pilih Pengguna</label>
                                                        <select class="form-control select-search" id="id_user" name="id_user[]" multiple required>
                                                            <?php foreach ($user as $us) : ?>
                                                                <option value="<?= $us['id_user']; ?>" <?= in_array($us['id_user'], $status['selected_users']) ? 'selected' : ''; ?>>
                                                                    <?= $us['username']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Jaminan</label>
                                                        <select class="form-control select-search" id="jaminan" name="jaminan">
                                                            <option value="" disabled <?= (!isset($status['jaminan']) || empty($status['jaminan']) || !in_array($status['jaminan'], ['UMUM', 'ASURANSI', 'BPJS TK'])) ? 'selected' : ''; ?>>
                                                                -- Pilih Jaminan --
                                                            </option>
                                                            <option value="UMUM" <?= (isset($status['jaminan']) && $status['jaminan'] == 'UMUM') ? 'selected' : ''; ?>>UMUM</option>
                                                            <option value="ASURANSI" <?= (isset($status['jaminan']) && $status['jaminan'] == 'ASURANSI') ? 'selected' : ''; ?>>ASURANSI</option>
                                                            <option value="BPJS TK" <?= (isset($status['jaminan']) && $status['jaminan'] === 'BPJS TK') ? 'selected' : ''; ?>>BPJS TK</option>
                                                        </select>
                                                    </div>


                                                    <div class="mb-3">
                                                        <label>Pesan Status</label>
                                                        <textarea class="form-control" name="pesan_status" rows="8"><?= htmlspecialchars($status['pesan_status']); ?></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Edit -->




                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalDelete<?= $status['id_status']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= base_url('users/superadmin/deleteStatus/' . $status['id_status']); ?>" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus Status Pelayanan: <br><strong><?= htmlspecialchars($status['nama_status']); ?></strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Hapus -->

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(function() {
        $(".alert").fadeOut("slow");
    }, 2000);
    $(document).ready(function() {
        $('.select-search').select2({
            allowClear: true
        });
    });
    $(document).ready(function() {
        $('#id_user').select2({
            placeholder: "-- Pilih Pengguna --",
            allowClear: true
        });
    });
</script>
<!-- /content area -->