							<!-- Page header -->
							<div class="page-header page-header-light">
								<div class="page-header-content header-elements-md-inline">
									<div class="page-title d-flex">
										<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?= $title; ?></span></h4>
										<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
									</div>
									<h5>Layanan Pengaduan SIAP-PHKA Hubungi : <br><a href="https://wa.link/4ia9bz" target="_blank">Divisi Mutu PHKA</a></h5>
									<?php if ($this->session->flashdata('success')): ?>
										<script>
											Swal.fire({
												icon: 'success',
												title: 'Berhasil!',
												text: '<?= $this->session->flashdata('success') ?>',
												confirmButtonColor: '#3085d6'
											});
										</script>
									<?php endif; ?>

									<?php if ($this->session->flashdata('error')): ?>
										<script>
											Swal.fire({
												icon: 'error',
												title: 'Gagal!',
												text: '<?= $this->session->flashdata('error') ?>',
												confirmButtonColor: '#d33'
											});
										</script>
									<?php endif; ?>
								</div>
							</div>
							<!-- /page header -->
							<!-- Content area -->
							<div class="content">
								<!-- Daterange picker -->
								<div class="col-md-6">
									<div class="card">
										<div class="card-header header-elements-inline">
											<h5 class="card-title"><?= $title; ?></h5>
											<div class="header-elements">
												<button type="button" id="btnExportAll" class="btn btn-primary mr-3">
													Tarik Semua Data Pasien
												</button>
											</div>
										</div>

										<form action="<?php echo site_url('users/superadmin/export_lap_pasien_by_date'); ?>" method="get">
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Dari Tanggal:</label>
															<div class="input-group">
																<span class="input-group-prepend">
																	<span class="input-group-text"><i class="icon-calendar22"></i></span>
																</span>
																<input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal" required>
																<!-- <input type="date" class="form-control daterange-single" id="dari_tanggal" name="dari_tanggal" required> -->
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Sampai Tanggal:</label>
															<div class="input-group">
																<span class="input-group-prepend">
																	<span class="input-group-text"><i class="icon-calendar22"></i></span>
																</span>
																<input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal" required>
															</div>
														</div>
													</div>
												</div>
												<div class="d-flex justify-content-end">
													<button type="submit" id="btnExportTanggal" class="btn btn-primary">
														Tarik Laporan by Tanggal
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<script>
								$('#btnExportAll').on('click', function() {
									window.location.href = "<?= base_url('users/superadmin/export_lap_pasien_all') ?>";
								});

								$('#btnExportTanggal').on('click', function() {
									const dari = $('#dari_tanggal').val();
									const sampai = $('#sampai_tanggal').val();

									if (!dari || !sampai) {
										alert('Tanggal tidak boleh kosong!');
										return;
									}

									const form = $('<form>', {
										action: "<?= base_url('users/superadmin/export_lap_pasien_by_date') ?>",
										method: 'POST'
									}).append($('<input>', {
										type: 'hidden',
										name: 'dari_tanggal',
										value: dari
									})).append($('<input>', {
										type: 'hidden',
										name: 'sampai_tanggal',
										value: sampai
									}));

									$('body').append(form);
									form.submit();
								});
							</script>