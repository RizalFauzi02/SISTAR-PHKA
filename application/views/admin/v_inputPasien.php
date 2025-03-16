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
                    <form action="<?= base_url('Users/admin/prosesAddPasien'); ?>" method="POST" onsubmit="return validateWhatsApp()">
                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Data Pasien</span>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group mt-3">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_whatsapp">No Whatsapp Pasien:</label>
                            <input type="number" name="no_whatsapp" class="form-control" placeholder="6285956xxxxxx">
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

                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor WhatsApp</th>
                            <th>Tanggal Input</th>
                            <th>Tanggal Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pasien)) : ?>
                            <?php foreach ($pasien as $p) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($p['nama_pasien']); ?></td>
                                    <td><?= htmlspecialchars(date('d/m/Y', strtotime($p['tanggal_lahir']))); ?></td>
                                    <td><?= htmlspecialchars($p['no_whatsapp']); ?></td>
                                    <td><?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($p['created_at']))); ?></td>
                                    <td>
                                        <?= !empty($p['updated_at']) && $p['updated_at'] !== '0000-00-00 00:00:00'
                                            ? htmlspecialchars(date('d/m/Y H:i:s', strtotime($p['updated_at'])))
                                            : ''; ?>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data pasien.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        $(".alert").fadeOut("slow");
    }, 2000);

    function validateWhatsApp() {
        var no_wa = document.getElementById("no_whatsapp").value;

        if (!no_wa.startsWith("628")) {
            alert("Nomor WhatsApp harus dimulai dengan 628!");
            return false; // Mencegah form dikirim
        }
        return true; // Lanjutkan submit jika valid
    }
</script>
<!-- /content area -->