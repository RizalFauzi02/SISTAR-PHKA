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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Status Kirim Pesan WhatsApp (UltraMsg API)</h5>
                </div>

                <div class="card-body">
                    <form id="filterForm" class="form-inline mb-3">
                        <label for="status" class="mr-2">Filter Status:</label>
                        <select name="status" id="status" class="form-control mr-2">
                            <option value="">-- Semua --</option>
                            <option value="sent" <?= ($filter_status == 'sent') ? 'selected' : ''; ?>>Sent</option>
                            <option value="invalid" <?= ($filter_status == 'invalid') ? 'selected' : ''; ?>>Invalid</option>
                            <option value="queue" <?= ($filter_status == 'queue') ? 'selected' : ''; ?>>Queue</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </form>



                    <table id="logNewTable" class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>Nomor WA Pasien</th>
                                <th>Pesan</th>
                                <th>Status</th>
                                <th>Pesan Dibuat</th>
                                <th>Pesan Terkirim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ASASA -->
                        </tbody>
                    </table>
                    <!-- Modal Preview Pesan -->
                    <div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="modalPesanLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalPesanLabel">Detail Pesan WhatsApp</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="modalPesanBody">
                                    <!-- Isi pesan akan dimasukkan di sini -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function formatTanggalWaktu(timestamp) {
        if (!timestamp || isNaN(timestamp)) return "-";
        const date = new Date(parseInt(timestamp) * 1000);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // bulan mulai dari 0
        const year = date.getFullYear();
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
    }


    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable("#logNewTable")) {
            $('#logNewTable').DataTable().destroy();
        }

        const table = $('#logNewTable').DataTable({
            "processing": true,
            language: {
                processing: "Loading..."
            },
            "serverSide": false,
            "destroy": true,
            "ajax": {
                "url": "<?= base_url('users/superadmin/get_log_pesan_ajax') ?>",
                "type": "GET",
                "dataSrc": "data",
                "data": function(d) {
                    d.status = $('#status').val(); // ambil dari dropdown filter
                }
            },
            "columns": [{
                    "data": "to",
                    "render": function(data) {
                        return data ? data.replace("@c.us", "") : "-";
                    },
                    "defaultContent": "-"
                },
                {
                    "data": "body",
                    "render": function(data, type, row) {
                        let preview = data ? data.substring(0, 100) + '...' : '(tidak ada isi)';
                        return `<a href="#" class="preview-modal" data-id="${row.id}" data-body="${data ? data.replace(/"/g, '&quot;') : ''}">
                        ${preview}
                    </a>`;
                    },
                    "defaultContent": "-"
                },
                {
                    "data": "status",
                    "render": function(data) {
                        let badge = 'info';
                        if (data === 'sent') badge = 'success';
                        else if (data === 'invalid') badge = 'danger';
                        else if (data === 'queue') badge = 'warning';
                        return `<span class="badge badge-${badge}">${data}</span>`;
                    },
                    "defaultContent": "-"
                },
                {
                    "data": "created_at",
                    "render": function(data) {
                        return formatTanggalWaktu(data);
                    },
                    "defaultContent": "-"
                },
                {
                    "data": "sent_at",
                    "render": function(data) {
                        return formatTanggalWaktu(data);
                    },
                    "defaultContent": "-"
                },
                {
                    "data": null,
                    "render": function() {
                        return '';
                    }
                }
            ],
            "order": [
                [3, "desc"]
            ],
            "autoWidth": false,
            "drawCallback": function(settings) {
                $('.preview-modal').off('click').on('click', function(e) {
                    e.preventDefault();
                    const id = $(this).data('id');
                    const body = $(this).data('body') || '(tidak ada isi)';
                    $('#modalPesanBody').html(body.replace(/\n/g, '<br>'));
                    $('#modalPesan').modal('show');
                });
            }
        });
    });
    $('#filterForm').on('submit', function(e) {
        e.preventDefault();
        $('#logNewTable').DataTable().ajax.reload(); // reload dengan parameter filter baru
    });
</script>
<!-- /content area -->