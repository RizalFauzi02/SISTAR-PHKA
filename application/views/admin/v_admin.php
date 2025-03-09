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
    </div>
</div>
<!-- /page header -->

<?= $this->session->flashdata('pesan'); ?>
<!-- Content area -->
<div class="content">
    <div class="row">
        <!-- Tambahkan div row -->
        <div class="col-md-6 col-12">
            <!-- Ubah col-md-4 menjadi col-md-6 -->
            <div class="card">
                <div class="card-header header-elements-inline d-flex justify-content-center w-100">
                    <h5 class="card-title">Input Pasien Pulang</h5>
                </div>
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <form action="<?= base_url('Users/admin/prosesAddPasien'); ?>" method="POST" onsubmit="return validateWhatsApp()">
                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Data Pasien</span>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group mt-3">
                            <label>Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>No Whatsapp Pasien:</label>
                            <input type="number" name="no_whatsapp_pasien" id="no_whatsapp_pasien" class="form-control" placeholder="6285956xxxxxx">
                            <p>*Penulisan nomor WhatsApp: <b>6285956xxxxxx</b></p>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <div class="col-md-6 col-12">
            <!-- Ubah col-md-4 menjadi col-md-6 -->
            <div class="card">
                <div class="card-header header-elements-inline d-flex justify-content-center w-100">
                    <h5 class="card-title">Status Pelayanan Pasien</h5>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('users/admin/changepassword'); ?>" method="POST">
                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">Data Pasien</span>
                        </div>

                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <select class="form-control select-search" id="nama_pasien">
                                <option value="">Pilih Pasien</option>
                                <?php foreach ($pasien as $p) : ?>
                                    <option value="<?= $p['id_pasien']; ?>"><?= $p['nama_pasien']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label>Tanggal Lahir:</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>No Whatsapp Pasien:</label>
                            <input type="number" id="no_whatsapp" name="no_whatsapp" class="form-control" readonly>
                        </div>

                        <?php foreach ($status as $s) : ?>
                            <div class="text-center mt-2">
                                <button type="button" class="btn btn-primary btn-status" data-pesan="<?= htmlspecialchars($s['pesan_status']); ?>">
                                    <?= $s['nama_status']; ?>
                                </button>
                            </div>
                        <?php endforeach; ?>

                        <div class="form-group text-center text-muted content-divider mt-2">
                            <span class="px-2">Pesan WhatsApp</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea">Pesan</label>
                            <textarea class="form-control" id="exampleTextarea" rows="5" readonly></textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Kirim WhatsApp</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Tutup row -->
</div>
<script>
    function validateWhatsApp() {
        var no_wa = document.getElementById("no_whatsapp_pasien").value;

        if (!no_wa.startsWith("628")) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Nomor WhatsApp harus dimulai dengan 628 !!!'
            });
            return false;
        }
        return true;
    }


    $(document).ready(function() {
        $('.select-search').select2({
            placeholder: "Pilih Pasien",
            allowClear: true
        });
    });

    $(document).ready(function() {
        $('#nama_pasien').change(function() {
            var id_pasien = $(this).val();

            if (id_pasien) {
                $.ajax({
                    url: "<?= base_url('users/superadmin/get_pasien_by_id'); ?>",
                    type: "POST",
                    data: {
                        id_pasien: id_pasien
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data) {
                            $('#tanggal_lahir').val(data.tanggal_lahir);
                            $('#no_whatsapp').val(data.no_whatsapp);
                        } else {
                            alert('Data tidak ditemukan!');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                });
            } else {
                $('#tanggal_lahir').val('');
                $('#no_whatsapp').val('');
            }
        });
    });

    $(document).ready(function() {
        $('.btn-status').click(function() {
            var pesan = $(this).data('pesan');
            $('#exampleTextarea').val(pesan);
        });
    });
</script>
<!-- /content area -->