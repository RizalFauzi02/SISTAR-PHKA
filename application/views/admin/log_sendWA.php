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
					<table id="logTable" class="table datatable-basic">
						<thead>
							<tr>
								<!-- MENGGUNAKAN JS DATATABLE -->
							</tr>
						</thead>
						<tbody>
							<!-- MENGGUNAKAN JS DATATABLE -->
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
			</div>
			<!-- /content area -->

			<script>
				$(document).ready(function() {
					if ($.fn.DataTable.isDataTable("#logTable")) {
						$('#logTable').DataTable().destroy();
					}

					let table = $('#logTable').DataTable({
						"processing": true,
						"serverSide": false,
						"destroy": true,
						"ajax": {
							"url": "<?= base_url('users/superadmin/get_log_WhatsApp') ?>",
							"type": "GET",
							"dataSrc": function(json) {
								return json.data;
							}
						},
						"order": [
							[0, "desc"]
						],
						"columns": [{
								"title": "Tanggal Kirim WA",
								"data": "tgl_kirim"
							},
							{
								"title": "Nama Pasien",
								"data": "nama_pasien"
							},
							{
								"title": "Kamar",
								"data": "kamar"
							},
							{
								"title": "Nomor WA Pasien",
								"data": "nomor_pasien"
							},
							{
								"title": "Pesan Status",
								"data": "nama_status"
							},
							{
								"title": "Pengirim Pesan",
								"data": "username_pengirim"
							}
						],
						"columnDefs": [{
								"width": "100px",
								"targets": 0
							}, // Tanggal Kirim
							{
								"width": "250px",
								"targets": 1
							}, // Nama Pasien
							{
								"width": "50px",
								"targets": 2
							}, // Kamar
							{
								"width": "50px",
								"targets": 3
							}, // Nomor WA Pasien
							{
								"width": "150px",
								"targets": 4
							}, // Pesan Status
							{
								"width": "110px",
								"targets": 5
							}, // Tanggal Input
						],
						"autoWidth": false // Nonaktifkan agar ukuran yang diatur bisa diterapkan
					});
				});

				// setInterval(function() {
				// 	location.reload();
				// }, 10000);
			</script>