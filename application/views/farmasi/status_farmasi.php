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
                <div class="col-md-4">
                    <!-- TAMBAHIN card-collapsed di samping CARD -->
                    <div class="card">
                        <div class=" card-header header-elements-inline d-flex justify-content-center w-100">
                            <h5 class="card-title">Status Pelayanan Pasien</h5>
                        </div>

                        <div class="card-body">
                            <form action="<?= base_url('users/farmasi/kirim_whatsapp'); ?>" method="POST">
                                <input type="hidden" id="id_status" name="id_status">
                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2">Data Pasien</span>
                                </div>
                                <!-- Tambahkan ini di dalam form -->
                                <div class="form-group">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <select class="form-control select-search" id="nama_pasien" name="nama_pasien">
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
                                        <?php
                                        $jaminan = strtoupper($s['jaminan'] ?? 'NULL');
                                        $hide = ($jaminan === 'JKN' || $jaminan === 'NON JKN') ? 'style="display: none;"' : '';
                                        ?>
                                        <div class="text-center mt-2 status-btn-container"
                                            data-jaminan="<?= htmlspecialchars($s['jaminan'] ?? 'NULL'); ?>" <?= $hide; ?>>
                                            <button type="button"
                                                class="btn btn-primary btn-status"
                                                data-id="<?= $s['id_status']; ?>"
                                                data-jaminan="<?= htmlspecialchars($s['jaminan'] ?? 'NULL'); ?>"
                                                data-pesan="<?= htmlspecialchars($s['pesan_status']); ?>">
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
            $(document).ready(function() {
                $(".status-btn-container").hide();
                $(".status-btn-container[data-jaminan='NULL']").show();

                var selectedIdStatus = null;

                // Event saat select jaminan berubah
                $("#jaminan").change(function() {
                    var selectedJaminan = $(this).val();

                    $(".status-btn-container").hide();
                    $(".status-btn-container[data-jaminan='NULL']").show();

                    if (selectedJaminan === "JKN" || selectedJaminan === "NON JKN") {
                        $(".status-btn-container[data-jaminan='" + selectedJaminan + "']:first").show();
                    }
                });

                // Event saat tombol status diklik untuk menyimpan id_status ke input form
                $(".btn-status").click(function() {
                    selectedIdStatus = $(this).data("id");
                    // Simpan ID Status ke dalam input form dengan id #id_status
                    $("#id_status").val(selectedIdStatus);
                });
            });

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
                var button = this;
                var noWhatsApp = document.getElementById('no_whatsapp').value.trim();
                var pesan = document.getElementById('pesan_status').value.trim();
                var idPasien = document.getElementById('nama_pasien').value.trim(); // Ambil ID pasien, bukan nama pasien
                var idStatus = document.getElementById('id_status').value.trim();

                if (noWhatsApp === "" || pesan === "" || idPasien === "" || idStatus === "") {
                    Swal.fire({
                        title: 'Oops...',
                        text: 'ID Pasien, Nomor WhatsApp, dan Pesan tidak boleh kosong!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Salin teks ke clipboard
                navigator.clipboard.writeText(pesan).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Tersalin!',
                        text: 'Pesan berhasil disalin ke clipboard.',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    noWhatsApp = noWhatsApp.replace(/^0/, "62");
                    var encodedPesan = encodeURIComponent(pesan);
                    var urlUserInput = "https://wa.me/" + noWhatsApp + "?text=" + encodedPesan;

                    // Disable tombol untuk mencegah spam klik
                    button.disabled = true;
                    button.innerText = "Sedang Mengirim...";

                    // Kirim data ke database
                    fetch("<?= base_url('users/farmasi/kirim_whatsapp') ?>", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: `no_whatsapp=${encodeURIComponent(noWhatsApp)}&pesan_status=${encodeURIComponent(pesan)}&nama_pasien=${encodeURIComponent(idPasien)}&id_status=${encodeURIComponent(idStatus)}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: data.message,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });

                                setTimeout(() => {
                                    window.open(urlUserInput, '_blank');
                                }, 1500);
                            } else {
                                throw new Error(data.message);
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: error.message || 'Terjadi kesalahan!',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            });
                        })
                        .finally(() => {
                            button.disabled = false;
                            button.innerText = "Kirim WhatsApp";
                        });
                }).catch(err => {
                    console.error('Gagal menyalin teks: ', err);
                });
            });

            // SCRIPT UNTUK CHATBOT OTOMATIS DIBAWAH INI:
            $(document).ready(function() {
                let pesanDariButton = "";

                $(document).on("click", ".btn-status", function() {
                    let pesanStatus = $(this).data("pesan");
                    let namaPasienSelect = document.getElementById("nama_pasien");
                    let tanggalLahirInput = document.getElementById("tanggal_lahir");

                    if (!namaPasienSelect || !tanggalLahirInput) {
                        console.error("Elemen Nama Pasien atau Tanggal Lahir tidak ditemukan!");
                        return;
                    }

                    let namaPasien = namaPasienSelect.options[namaPasienSelect.selectedIndex]?.text || "";
                    let tanggalLahir = tanggalLahirInput.value || "";

                    if (namaPasien === "-- Pilih Pasien --" || namaPasien === "") {
                        Swal.fire({
                            title: "Oops...",
                            text: "Silakan pilih pasien terlebih dahulu!",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        });
                        return;
                    }

                    if (tanggalLahir) {
                        let parts = tanggalLahir.split("-");
                        tanggalLahir = `${parts[2]}/${parts[1]}/${parts[0]}`;
                    }

                    pesanDariButton = `Nama: *${namaPasien}*\nTanggal Lahir: *${tanggalLahir}*\n\n${pesanStatus}`;
                    updatePesan();
                });

                $("#ucapan").change(function() {
                    updatePesan();
                });

                $("#nama_pasien").change(function() {
                    pesanDariButton = "";
                    $("#ucapan").val("").trigger("change");

                    setTimeout(() => {
                        $("#pesan_status").val("").trigger("input");
                    }, 0);
                });

                function updatePesan() {
                    let ucapan = $("#ucapan").val();
                    let teksUcapan = ucapan ? `*Selamat ${ucapan} Bapak/Ibu,*\n\n` : "";
                    let pesanFinal = teksUcapan + pesanDariButton;
                    $("#pesan_status").val(pesanFinal);
                }
            });

            // DATATABLE JS
            let table = $('#logTable').DataTable({
                "processing": true,
                "serverSide": false,
                "destroy": true,
                "ajax": {
                    "url": "<?= base_url('users/farmasi/get_pasien') ?>",
                    "type": "GET",
                    "dataSrc": function(json) {
                        return json.data;
                    }
                },
                "order": [
                    [5, "desc"]
                ],
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
                            return (data === "30/11/-0001 00:00:00" || data === null || data === "") ? "" : data;
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
        </script>



        <!-- /content area -->