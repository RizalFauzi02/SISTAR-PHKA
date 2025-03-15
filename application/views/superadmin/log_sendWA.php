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
					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Username Pengirim</th>
								<th>Role Akun Pengirim</th>
								<th>Nomor WA Pasien</th>
								<th>Tanggal Kirim WA</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($log_WA as $log) : ?>
								<tr>
									<td><?= htmlspecialchars($log['username_pengirim']); ?></td>
									<td> <?php
											if ($log['is_role'] == 1) {
												echo "Superadmin";
											} elseif ($log['is_role'] == 2) {
												echo "Administrasi";
											} elseif ($log['is_role'] == 3) {
												echo "Perawat";
											} elseif ($log['is_role'] == 4) {
												echo "Farmasi";
											} else {
												echo "Tidak Diketahui";
											}
											?></td>
									<td><?= htmlspecialchars($log['nomor_pasien']); ?></td>
									<td><?= date('d/m/Y H:i:s', strtotime($log['tgl_kirim'])); ?></td>
									<td></td>
									<td></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
			</div>
			<!-- /content area -->