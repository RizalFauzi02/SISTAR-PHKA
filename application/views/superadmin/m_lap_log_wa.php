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
													Tarik Semua Log WhatsApp
												</button>
											</div>
										</div>

										<form action="<?php echo site_url('users/superadmin/export_lap_log_WA_by_date'); ?>" method="get">
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
									window.location.href = "<?= base_url('users/superadmin/export_lap_log_all') ?>";
								});
							</script>