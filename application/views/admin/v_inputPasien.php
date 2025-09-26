<style>
    p {
        font-size: 12px;
        color: red;
        margin-top: 3px;
        margin-bottom: 15px;
        text-align: left;
    }
</style>
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
                    <form action="<?= base_url('users/admin/prosesAddPasien'); ?>" method="POST" onsubmit="return validateWhatsApp()">
                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Data Pasien</span>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group mt-3">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jaminan">Jaminan</label>
                            <select class="form-control select-search" id="jaminan" name="jaminan" required>
                                <option value="" disabled selected>-- Pilih Jaminan --</option>
                                <option value="UMUM">UMUM</option>
                                <option value="ASURANSI">ASURANSI</option>
                                <option value="BPJS TK">BPJS TK</option>
                                <option value="BPJS COB">BPJS COB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_whatsapp">No Whatsapp Pasien:</label>
                            <input type="number" name="no_whatsapp" class="form-control" placeholder="6285956xxxxxx" required>
                            <p>*Penulisan nomor WhatsApp: <b>6285956xxxxxx</b></p>
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
                    <h5 class="card-title">Data Pasien</h5>
                </div>

                <table id="logTable" class="table datatable-basic">
                    <thead>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir</th>
                        <th>Nomor WhatsApp</th>
                        <th>Ruangan</th>
                        <th>Jaminan</th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Edit</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <!-- MENGGUNAKAN JS DATATABLE -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Pasien -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('users/admin/editPasien'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_pasien" id="edit_id">
                    <div class="form-group">
                        <label for="edit_nama">Nama Pasien</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama_pasien">
                    </div>
                    <div class="form-group">
                        <label for="edit_tanggal">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="edit_tanggal" name="tanggal_lahir">
                    </div>
                    <div class="form-group">
                        <label for="edit_whatsapp">No WhatsApp</label>
                        <input type="text" class="form-control" id="edit_whatsapp" name="no_whatsapp">
                        <p>*Penulisan nomor WhatsApp: <b>6285956xxxxxx</b></p>
                    </div>
                    <div class="form-group">
                        <label for="jaminan">Jaminan</label>
                        <select class="form-control select-search" id="jaminan_edit" name="jaminan">
                            <option value="" disabled selected>-- Pilih Jaminan --</option>
                            <option value="UMUM">UMUM</option>
                            <option value="ASURANSI">ASURANSI</option>
                            <option value="BPJS TK">BPJS TK</option>
                            <option value="BPJS COB">BPJS COB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kamar">Ruangan</label>
                        <select class="form-control select-search" id="kamar" name="kamar">
                            <option value="" disabled selected>-- Pilih Kamar --</option>
                            <option value="NICU/PICU">NICU/PICU</option>
                            <option value="VK">VK</option>
                            <option value="ICU/HCU">ICU/HCU</option>
                            <option value="SAPPHIRE">SAPPHIRE</option>
                            <option value="EMERALD">EMERALD</option>
                            <option value="RUBBY">RUBBY</option>
                            <option value="DIAMOND">DIAMOND</option>
                            <option value="TOPAZ">TOPAZ</option>
                            <option value="CRYSTAL">CRYSTAL</option>
                            <option value="ENDOSCOPY">ENDOSCOPY</option>
                            <option value="UKB">UKB</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // ================== PROSES MEMUNCULKAN DATA PASIEN DENGAN DATATABLE ==================================
    function formatTanggal(tanggal) {
        let parts = tanggal.split("/");
        if (parts.length === 3) {
            return `${parts[2]}-${parts[1]}-${parts[0]}`;
        }
        return tanggal;
    }

    // Saat tombol edit diklik
    $(document).on("click", ".edit-btn", function() {
        let id = $(this).data("id");
        let nama = $(this).data("nama");
        let tanggal = $(this).data("tanggal");
        let whatsapp = $(this).data("whatsapp");
        let kamar = $(this).data("kamar");
        let jaminan = $(this).data("jaminan");

        let tanggalFormatted = formatTanggal(tanggal); // Konversi tanggal

        // Masukkan data ke dalam modal
        $("#edit_id").val(id);
        $("#edit_nama").val(nama);
        $("#edit_tanggal").val(tanggalFormatted);
        $("#edit_whatsapp").val(whatsapp);

        // Pastikan dropdown sudah terisi sebelum memilih opsi
        setTimeout(function() {
            $("#kamar").val(kamar).trigger("change");
            $("#jaminan_edit").val(jaminan).trigger("change");
        }, 300); // Delay untuk memastikan opsi sudah tersedia

        // Tampilkan modal
        $("#editModal").modal("show");
    });

    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable("#logTable")) {
            $('#logTable').DataTable().destroy();
        }

        // Inisialisasi ulang DataTable
        let table = $('#logTable').DataTable({
            "processing": true,
            "serverSide": false,
            "destroy": true,
            "ajax": {
                "url": "<?= base_url('users/admin/get_pasien') ?>",
                "type": "GET",
                "dataSrc": function(json) {
                    return json.data;
                }
            },
            "order": [
                [5, "desc"]
            ], // Urutkan berdasarkan "Tanggal Input" (created_at)
            "columns": [{
                    "data": "nama_pasien"
                },
                {
                    "data": "tanggal_lahir"
                },
                {
                    "data": "no_whatsapp"
                },
                {
                    "data": "kamar"
                },
                {
                    "data": "jaminan"
                },
                {
                    "data": "created_at",
                    "type": "date",
                    "render": function(data, type, row) {
                        if (!data || data === "30/11/-0001 00:00:00") return "";
                        let parts = data.split(" ");
                        let dateParts = parts[0].split("/");
                        return `${dateParts[2]}-${dateParts[1]}-${dateParts[0]} ${parts[1]}`;
                    }
                },
                {
                    "data": "updated_at",
                    "render": function(data, type, row) {
                        return (data === "30/11/-0001 00:00:00" || !data) ? "" : data;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item edit-btn"
                                data-id="${row.id_pasien}"
                                data-nama="${row.nama_pasien}"
                                data-tanggal="${row.tanggal_lahir}"
                                data-whatsapp="${row.no_whatsapp}"
                                data-jaminan="${row.jaminan}"
                                data-kamar="${row.kamar}"
                                data-toggle="modal" data-target="#editModal">Edit</a>
                            </div>
                        </div>
                    </td>`;
                    }
                }
            ],
            "columnDefs": [{
                    "width": "200px",
                    "targets": 0
                }, // Nama Pasien
                {
                    "width": "150px",
                    "targets": 1
                }, // Tanggal Lahir
                {
                    "width": "180px",
                    "targets": 2
                }, // Nomor WhatsApp
                {
                    "width": "120px",
                    "targets": 3
                }, // Ruangan
                {
                    "width": "150px",
                    "targets": 4
                }, // Jaminan
                {
                    "width": "180px",
                    "targets": 5
                }, // Tanggal Input
                {
                    "width": "180px",
                    "targets": 6
                } // Tanggal Edit
            ],
            "autoWidth": false // Nonaktifkan agar ukuran yang diatur bisa diterapkan
        });
    });
    //    ================================== END ======================================


    setTimeout(function() {
        $(".alert").fadeOut("slow");
    }, 2000);

    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var whatsapp = $(this).data('whatsapp');

            $('#edit_id').val(id);
            $('#edit_nama').val(nama);
            $('#edit_tanggal').val(tanggal);
            $('#edit_whatsapp').val(whatsapp);
        });
    });

    function validateWhatsApp() {
        var no_wa = document.getElementById("no_whatsapp").value;

        if (!no_wa.startsWith("628")) {
            alert("Nomor WhatsApp harus dimulai dengan 628!");
            return false; // Mencegah form dikirim
        }
        return true; // Lanjutkan submit jika valid
    }

    $(document).ready(function() {
        // Inisialisasi select2 saat halaman dimuat
        $(".select-search").select2({
            dropdownParent: $("#editModal") // Pastikan dropdown muncul dalam modal
        });
    });

    $(document).ready(function() {
        // Inisialisasi select2 tanpa modal
        $(".select-search").select2();
    });
</script>
<!-- /content area -->