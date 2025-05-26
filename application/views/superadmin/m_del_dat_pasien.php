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
							    <div class="col-md-5">
							        <div class="card">
							            <div class="card-header header-elements-inline">
							                <h5 class="card-title"><?= $title; ?></h5>
							                <div class="header-elements">
							                    <button type="button" class="btn btn-warning mr-3" onclick="confirmDeleteAll()">
							                        Delete Semua Data Pasien
							                    </button>
							                </div>
							            </div>

							            <div class="card-body">
							                <div class="row">
							                    <div class="col-md-6">
							                        <div class="form-group">
							                            <label>Dari Tanggal:</label>
							                            <div class="input-group">
							                                <span class="input-group-prepend">
							                                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
							                                </span>
							                                <input type="text" class="form-control daterange-single" id="dari_tanggal" name="dari_tanggal" required>
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
							                                <input type="text" class="form-control daterange-single" id="sampai_tanggal" name="sampai_tanggal" required>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							                <div class="d-flex justify-content-end">
							                    <button type="button" class="btn btn-danger" onclick="confirmDeleteByDate()">
							                        Delete
							                    </button>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
							<!-- /daterange picker -->
							<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
							<script>
							    $(document).ready(function() {
							        $('.daterange-single').daterangepicker({
							            singleDatePicker: true,
							            startDate: moment(),
							            locale: {
							                format: 'DD/MM/YYYY'
							            }
							        });
							    });

							    // DELETE LOG WA
							    function confirmDeleteAll() {
							        Swal.fire({
							            title: 'Apakah Anda yakin akan mengahapus semua Data Pasien?',
							            html: "<b>Semua history Data Pasien akan dihapus!</b> Dan tidak akan dapat dikembalikan lagi.",
							            showCancelButton: true,
							            confirmButtonColor: '#d33',
							            cancelButtonColor: '#3085d6',
							            confirmButtonText: 'Delete Semua',
							            cancelButtonText: 'Batal',
							            preConfirm: () => {
							                window.location.href = "<?= base_url('users/superadmin/delete_dat_pasien_all') ?>";
							            }
							        });
							    }

							    function confirmDeleteByDate() {
							        let dari = document.getElementById("dari_tanggal").value;
							        let sampai = document.getElementById("sampai_tanggal").value;

							        Swal.fire({
							            title: 'Hapus berdasarkan tanggal?',
							            html: `Data dari <b>${dari}</b> sampai <b>${sampai}</b> akan dihapus! <i><b>Dan tidak akan dapat dikembalikan lagi.</i></b>`,
							            showCancelButton: true,
							            confirmButtonColor: '#d33',
							            cancelButtonColor: '#3085d6',
							            confirmButtonText: 'Delete',
							            cancelButtonText: 'Batal',
							            preConfirm: () => {
							                window.location.href = "<?= base_url('users/superadmin/delete_dat_pasien_by_date') ?>?dari=" + dari + "&sampai=" + sampai;
							            }
							        });
							    }
							</script>