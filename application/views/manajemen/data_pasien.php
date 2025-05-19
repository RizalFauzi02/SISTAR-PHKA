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
        <!-- Card Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title"><?= $title; ?></h5>
                    <button type="button" id="btnExportAll" class="btn btn-primary">
                        Export Excel
                    </button>
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
                    </thead>
                    <tbody>
                        <!-- MENGGUNAKAN JS DATATABLE -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    // EXPORT EXCEL
    $('#btnExportAll').on('click', function() {
        window.location.href = "<?= base_url('users/superadmin/export_lap_pasien_all') ?>";
    });

    // ================== PROSES MEMUNCULKAN DATA PASIEN DENGAN DATATABLE ==================================
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
                "url": "<?= base_url('users/manajemen/get_pasien') ?>",
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
                }
            ],
            "columnDefs": [{
                    "width": "250px",
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
</script>
<!-- /content area -->