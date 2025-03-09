			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?= $title; ?></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><?= $title; ?></h5>
						<div class="header-elements">
							<button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#userModal">
								Tambah
							</button>
						</div>
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Username</th>
								<th>Status Akun</th>
								<th>Role Akun</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($user as $u) : ?>
								<tr>
									<td><?= htmlspecialchars($u['username']) ?></td>
									<td>
										<?php if ($u['is_active'] == 1) : ?>
											<span class="badge badge-success">Aktif</span>
										<?php else : ?>
											<span class="badge badge-danger">Tidak Aktif</span>
										<?php endif; ?>
									</td>
									<td>
										<?php
										$roles = [
											1 => 'Superadmin',
											2 => 'Admin',
											3 => 'Perawat',
											4 => 'Farmasi'
										];
										echo $roles[$u['is_role']] ?? 'Tidak Diketahui';
										?>
									</td>
									<td class="text-center">
										<div class="list-icons">
											<div class="dropdown">
												<a href="#" class="list-icons-item" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<!-- <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editModal<?= $u['id_user'] ?>">
														Edit
													</a> -->
													<a href="#" class="dropdown-item" onclick="deleteAkun(<?= $u['id_user'] ?>)">
														Hapus
													</a>
													<?php if ($u['is_active'] == 0) : ?>
														<a href="#" class="dropdown-item" onclick="ubahStatusAkun(<?= $u['id_user'] ?>, 1)">
															<span class="badge badge-success">Aktifkan</span>
														</a>
													<?php else : ?>
														<a href="#" class="dropdown-item" onclick="ubahStatusAkun(<?= $u['id_user'] ?>, 0)">
															<span class="badge badge-danger">Nonaktifkan</span>
														</a>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<!-- Modal Edit -->
								<div class="modal fade" id="editModal<?= $u['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $u['id_user'] ?>" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="editModalLabel<?= $u['id_user'] ?>">Edit User</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form>
													<div class="form-group">
														<label for="username">Username</label>
														<input type="text" class="form-control" id="username" value="<?= htmlspecialchars($u['username']) ?>">
													</div>
													<div class="form-group">
														<label for="role">Role</label>
														<select class="form-control" id="role">
															<option value="1" <?= $u['is_role'] == 1 ? 'selected' : '' ?>>Superadmin</option>
															<option value="2" <?= $u['is_role'] == 2 ? 'selected' : '' ?>>Admin</option>
															<option value="3" <?= $u['is_role'] == 3 ? 'selected' : '' ?>>Perawat</option>
															<option value="4" <?= $u['is_role'] == 4 ? 'selected' : '' ?>>Farmasi</option>
														</select>
													</div>
													<button type="submit" class="btn btn-primary">Simpan</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

				<!-- Modal -->
				<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalTitle">Tambah Akun</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form id="formTambahAkun">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
									</div>
									<div class="form-group">
										<label for="is_active">Status Akun</label>
										<select class="form-control" id="is_active" name="is_active">
											<option selected disabled>-- Status Akun --</option>
											<option value="1">Aktif</option>
											<option value="0">Nonaktifkan</option>
										</select>
									</div>
									<div class="form-group">
										<label for="is_role">Role Akun</label>
										<select class="form-control" id="is_role" name="is_role">
											<option selected disabled>-- Role --</option>
											<option value="1">Superadmin</option>
											<option value="2">Admin</option>
											<option value="3">Perawat</option>
											<option value="4">Farmasi</option>
										</select>
									</div>
									<button type="submit" class="btn btn-success">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /content area -->

			<script>
				// ===================== TAMBAH AKUN ========================
				$(document).ready(function() {
					$("#formTambahAkun").submit(function(e) {
						e.preventDefault();

						$.ajax({
							url: "<?= base_url('users/superadmin/ProsesTambahAkun'); ?>",
							type: "POST",
							data: $(this).serialize(),
							dataType: "json",
							success: function(response) {
								if (response.status == "success") {
									Swal.fire({
										title: "Berhasil!",
										text: response.message,
										icon: "success",
										showConfirmButton: true
									}).then(() => {
										location.reload();
									});

									$("#userModal").modal("hide");
									$("#formTambahAkun")[0].reset();
								} else {
									Swal.fire({
										title: "Gagal!",
										text: response.message,
										icon: "error",
										confirmButtonText: "OK"
									});
								}
							},
							error: function() {
								Swal.fire({
									title: "Terjadi Kesalahan!",
									text: "Silakan coba lagi.",
									icon: "error",
									confirmButtonText: "OK"
								});
							}
						});
					});
				});

				// ================ UPDATE IS_ACTIVE =====================
				function ubahStatusAkun(id, status) {
					let pesan = status == 1 ? "Aktifkan akun ini?" : "Nonaktifkan akun ini?";
					let pesanSukses = status == 1 ? "Akun berhasil diaktifkan!" : "Akun berhasil dinonaktifkan!";

					Swal.fire({
						title: "Konfirmasi",
						text: pesan,
						showCancelButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "Simpan",
						cancelButtonText: "Batal"
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								url: "<?= base_url('users/superadmin/update_isActive'); ?>",
								type: "POST",
								data: {
									id_user: id,
									is_active: status
								},
								dataType: "json",
								success: function(response) {
									if (response.status == "success") {
										Swal.fire({
											title: "Berhasil!",
											text: pesanSukses,
											icon: "success",
											showConfirmButton: true
										}).then(() => {
											location.reload();
										});
									} else {
										Swal.fire({
											title: "Gagal!",
											text: response.message,
											icon: "error",
											confirmButtonText: "OK"
										});
									}
								},
								error: function() {
									Swal.fire({
										title: "Terjadi Kesalahan!",
										text: "Silakan coba lagi.",
										icon: "error",
										confirmButtonText: "OK"
									});
								}
							});
						}
					});
				}

				// ======================= DELETE AKUN ======================
				function deleteAkun(id) {
					Swal.fire({
						title: "Konfirmasi",
						text: "Apakah Anda yakin ingin menghapus akun ini?",
						showCancelButton: true,
						confirmButtonColor: "#d33",
						cancelButtonColor: "#3085d6",
						confirmButtonText: "Hapus",
						cancelButtonText: "Batal"
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								url: "<?= base_url('users/superadmin/deleteAkun'); ?>",
								type: "POST",
								data: {
									id_user: id
								},
								dataType: "json",
								success: function(response) {
									if (response.status == "success") {
										Swal.fire({
											title: "Berhasil!",
											text: "Akun telah dihapus.",
											icon: "success",
											showConfirmButton: true
										}).then(() => {
											location.reload(); // Reload halaman setelah sukses
										});
									} else {
										Swal.fire({
											title: "Gagal!",
											text: response.message,
											icon: "error",
											confirmButtonText: "OK"
										});
									}
								},
								error: function() {
									Swal.fire({
										title: "Terjadi Kesalahan!",
										text: "Silakan coba lagi.",
										icon: "error",
										confirmButtonText: "OK"
									});
								}
							});
						}
					});
				}
			</script>