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
                        <form action="<?= base_url('users/admin/kirim_whatsapp'); ?>" method="POST">
                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">Data Pasien</span>
                            </div>
                            <!-- Tambahkan ini di dalam form -->
                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien</label>
                                <select class="form-control select-search" id="nama_pasien">
                                    <?php if (!empty($pasien)) : ?>
                                        <option value="" disabled selected>-- Pilih Pasien --</option>
                                        <?php foreach ($pasien as $p) : ?>
                                            <option value="<?= $p['id_pasien']; ?>"><?= $p['nama_pasien']; ?></option>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <option value="" disabled selected>Tidak ada pasien tersedia</option>
                                    <?php endif; ?>
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

                            <?php if (!empty($status)) : ?>
                                <?php foreach ($status as $s) : ?>
                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary btn-status" data-pesan="<?= htmlspecialchars($s['pesan_status']); ?>">
                                            <?= $s['nama_status']; ?>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="text-center mt-2">
                                    <p class="text-muted">Belum ada status tersedia.</p>
                                </div>
                            <?php endif; ?>


                            <div class="form-group text-center text-muted content-divider mt-2">
                                <span class="px-2">Pesan WhatsApp</span>
                            </div>

                            <div class="form-group">
                                <label for="pesan_status">Pesan</label>
                                <textarea class="form-control" id="pesan_status" name="pesan_status" rows="5" readonly></textarea>
                            </div>


                            <div class="text-right">
                                <button type="button" class="btn btn-info" id="kirimWa">Kirim WhatsApp</button>
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

            // SCRIPT UNTUK CHAT DENGAN REDIRECT WA.ME
            document.getElementById('kirimWa').addEventListener('click', function() {
                var button = this; // Simpan referensi tombol
                var noWhatsApp = document.getElementById('no_whatsapp').value.trim();
                var pesan = document.getElementById('pesan_status').value.trim();

                if (noWhatsApp === "" || pesan === "") {
                    Swal.fire({
                        title: "Oops...",
                        text: "Nomor WhatsApp atau pesan tidak boleh kosong!",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    });
                    return;
                }

                // Ubah 0 di awal menjadi 62 (kode negara Indonesia)
                noWhatsApp = noWhatsApp.replace(/^0/, "62");

                // Encode pesan agar sesuai format URL
                var encodedPesan = encodeURIComponent(pesan);

                // Buat URL WhatsApp dari input user
                var urlUserInput = "https://wa.me/" + noWhatsApp + "?text=" + encodedPesan;

                // Tampilkan loading
                Swal.fire({
                    title: "Mengirim...",
                    text: "Mohon tunggu sebentar..!",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Disable tombol untuk mencegah spam klik
                button.disabled = true;
                button.innerText = "Sedang Mengirim...";

                // Kirim data ke database menggunakan fetch()
                fetch("<?= base_url('users/admin/kirim_whatsapp') ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `no_whatsapp=${encodeURIComponent(noWhatsApp)}&pesan_status=${encodeURIComponent(pesan)}`
                    })
                    .then(response => response.text()) // Ubah response ke text
                    .then(data => {
                        // Notifikasi berhasil
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: "Pesan berhasil dikirim dan disimpan ke database!",
                            confirmButtonColor: "#28a745",
                            confirmButtonText: "OK"
                        }).then(() => {
                            // Buka WhatsApp di tab baru setelah user menekan "OK"
                            window.open(urlUserInput, '_blank');
                        });

                        // Kembalikan tombol ke kondisi awal
                        button.disabled = false;
                        button.innerText = "Kirim WhatsApp";
                    })
                    .catch(error => {
                        console.error("Error:", error);

                        Swal.fire({
                            icon: "error",
                            title: "Oops!",
                            text: "Terjadi kesalahan saat menyimpan data ke database!",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "OK"
                        });

                        // Kembalikan tombol ke kondisi awal jika gagal
                        button.disabled = false;
                        button.innerText = "Kirim WhatsApp";
                    });
            });


            // SCRIPT UNTUK CHATBOT OTOMATIS DIBAWAH INI:
            $(document).ready(function() {
                $('.btn-status').click(function() {
                    var pesan = $(this).data('pesan'); // Ambil pesan dari atribut data
                    $('#pesan_status').val(pesan); // Masukkan pesan ke textarea
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
                    let teksUcapan = ucapan ? "*Selamat " + ucapan + " Bapak/Ibu,*\n\n" : ""; // Format ucapan
                    //let pesanFinal = teksUcapan + pesanDariButton + "\n\n_[ ini adalah pesan otomatis ]_";
                    let pesanFinal = teksUcapan + pesanDariButton;

                    $("#pesan_status").val(pesanFinal);
                }
            });
        </script>



        <!-- /content area -->