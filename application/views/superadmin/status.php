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
            <div class="col-md-4">
                <!-- TAMBAHIN card-collapsed di samping CARD -->
                <div class="card">
                    <div class=" card-header header-elements-inline d-flex justify-content-center w-100">
                        <h5 class="card-title">Status Pelayanan Pasien</h5>
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('users/superadmin/kirim_whatsapp'); ?>" method="POST">
                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">Data Pasien</span>
                            </div>
                            <!-- Tambahkan ini di dalam form -->
                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien</label>
                                <select class="form-control select-search" id="nama_pasien">
                                    <option value="" disabled selected>-- Pilih Pasien --</option>
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

                            <div class="form-group">
                                <label for="ucapan">Ucapan</label>
                                <select class="form-control select-search" id="ucapan">
                                    <option value="" disabled selected>-- Pilih Ucapan --</option>
                                    <option value="Pagi">Pagi</option>
                                    <option value="Siang">Siang</option>
                                    <option value="Sore">Sore</option>
                                    <option value="Malam">Malam</option>
                                </select>
                            </div>

                            <!-- Looping status dengan event onclick -->
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
                                <textarea class="form-control" id="exampleTextarea" name="pesan_status" rows="5" readonly></textarea>
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Kirim WhatsApp</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            <?php if ($this->session->flashdata('swal_success')) : ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '<?= $this->session->flashdata('swal_success') ?>',
                    showConfirmButton: false,
                    timer: 2500
                });
            <?php endif; ?>

            <?php if ($this->session->flashdata('swal_error')) : ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '<?= $this->session->flashdata('swal_error') ?>',
                    showConfirmButton: true
                });
            <?php endif; ?>


            $(document).ready(function() {
                $('.select-search').select2({
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
                    var pesan = $(this).data('pesan'); // Ambil pesan dari atribut data
                    $('#exampleTextarea').val(pesan); // Masukkan pesan ke textarea
                });
            });

            $(document).ready(function() {
                let pesanDariButton = ""; // Simpan pesan dari tombol status

                // Event saat tombol status diklik
                $(".btn-status").click(function() {
                    pesanDariButton = $(this).data("pesan"); // Ambil data pesan dari tombol yang diklik
                    updatePesan();
                });

                // Event saat dropdown "Ucapan" berubah
                $("#ucapan").change(function() {
                    updatePesan();
                });

                // Fungsi untuk memperbarui textarea
                function updatePesan() {
                    let ucapan = $("#ucapan").val(); // Ambil nilai ucapan
                    let teksUcapan = ucapan ? "Selamat " + ucapan + " Bapak/Ibu,\n\n" : ""; // Format ucapan
                    let pesanFinal = teksUcapan + pesanDariButton + "\n\n_[ ini adalah pesan otomatis ]_";

                    $("#exampleTextarea").val(pesanFinal);
                }
            });
        </script>



        <!-- /content area -->