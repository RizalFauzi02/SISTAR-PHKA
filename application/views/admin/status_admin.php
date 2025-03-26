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
                        <div class="alert alert-danger alert-dismissible" id="alert" style="display: none;"></div>

                        <form action="<?= base_url('users/admin/kirim_whatsapp'); ?>" method="POST">
                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">Data Pasien</span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="id_status" name="id_status">
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
                                <label for="jaminan">Jaminan</label>
                                <select class="form-control select-search" id="jaminan" name="jaminan">
                                    <option value="" disabled selected>-- Pilih Jaminan --</option>
                                    <!-- ADA DI PROSES JS get_pasien -->
                                </select>
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
                                    ?>
                                    <div class="text-center mt-2 status-btn-container"
                                        data-jaminan="<?= htmlspecialchars($jaminan); ?>"
                                        style="display: <?= ($jaminan === 'NULL') ? 'block' : 'none'; ?>;">
                                        <button type="button"
                                            class="btn btn-primary btn-status"
                                            data-id="<?= $s['id_status']; ?>"
                                            data-jaminan="<?= htmlspecialchars($jaminan); ?>"
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

                $(".btn-status").click(function() {
                    selectedIdStatus = $(this).data("id");
                    $("#id_status").val(selectedIdStatus);
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

                                    var jaminanSelect = $('#jaminan');
                                    jaminanSelect.empty();
                                    jaminanSelect.append('<option value="" disabled selected>-- Pilih Jaminan --</option>');

                                    if (data.jaminan) {
                                        var jaminanList = data.jaminan.split(',');
                                        jaminanList.forEach(function(jaminan) {
                                            jaminanSelect.append('<option value="' + jaminan.trim() + '">' + jaminan.trim() + '</option>');
                                        });
                                    }

                                    jaminanSelect.append('<option value="batal">-- Batalkan Pilihan --</option>');

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
                        $('#jaminan').empty().append('<option value="" disabled selected>-- Pilih Jaminan --</option>');
                    }
                });
            });

            // SCRIPT UNTUK CHAT DENGAN REDIRECT WA.ME
            document.getElementById('kirimWa').addEventListener('click', function() {
                var button = this;
                var noWhatsApp = document.getElementById('no_whatsapp').value.trim();
                var pesan = document.getElementById('pesan_status').value.trim();
                var idPasien = document.getElementById('nama_pasien').value.trim();
                var idStatus = document.getElementById('id_status').value.trim();

                if (noWhatsApp === "" || pesan === "" || idPasien === "" || idStatus === "") {
                    Swal.fire({
                        title: 'Oops...',
                        text: 'ID Status, ID Pasien, Nomor WhatsApp, dan Pesan tidak boleh kosong!',
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
                    fetch("<?= base_url('users/admin/kirim_whatsapp') ?>", {
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
                $('.btn-status').click(function() {
                    var pesan = $(this).data('pesan'); // Ambil pesan dari atribut data
                    $('#pesan_status').val(pesan); // Masukkan pesan ke textarea
                });
            });

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
                    $("#jaminan").val("").trigger("change");

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

            // $(document).ready(function() {
            //     $(".status-btn-container").hide();
            //     $(".status-btn-container[data-jaminan='NULL']").show();

            //     var selectedIdStatus = null;

            //     // Event saat select jaminan berubah
            //     $("#jaminan").change(function() {
            //         var selectedJaminan = $(this).val();

            //         $(".status-btn-container").hide(); // Sembunyikan semua tombol status

            //         // Logika untuk "Cancel"
            //         if (selectedJaminan === "cancel") {
            //             $(".status-btn-container").hide();
            //             $(".status-btn-container[data-jaminan='NULL']").show();
            //             $(this).val("");
            //             $("#jaminan option[value='']").prop("selected", true);
            //         }

            //         // Tampilkan tombol sesuai dengan jaminan yang dipilih
            //         if (selectedJaminan === "JKN" || selectedJaminan === "NON JKN") {
            //             $(".status-btn-container[data-jaminan='" + selectedJaminan + "']:first").show();
            //         }
            //     });

            //     // Event saat select nama pasien berubah -> Pastikan jaminan NULL tetap muncul
            //     $("#nama_pasien").change(function() {
            //         $(".status-btn-container").hide();
            //         $(".status-btn-container[data-jaminan='NULL']").show();
            //     });

            //     $(".btn-status").click(function() {
            //         selectedIdStatus = $(this).data("id");
            //         $("#id_status").val(selectedIdStatus);
            //     });
            // });

            // $(document).ready(function() {
            //     $(".status-btn-container").hide();
            //     $(".status-btn-container[data-jaminan='NULL']").show();

            //     // Event saat select jaminan berubah
            //     $("#jaminan").change(function() {
            //         var selectedJaminan = $(this).val();

            //         // Sembunyikan semua tombol status terlebih dahulu
            //         $(".status-btn-container").hide();

            //         if (!selectedJaminan || selectedJaminan === "batal") {
            //             // Jika batal dipilih, tampilkan kembali tombol dengan jaminan NULL
            //             $(".status-btn-container[data-jaminan='NULL']").show();
            //             $(this).val(""); // Reset pilihan
            //         } else {
            //             // Tampilkan hanya status yang sesuai dengan jaminan yang dipilih
            //             $(".status-btn-container[data-jaminan='" + selectedJaminan + "']").show();
            //         }
            //     });

            //     $("#nama_pasien").change(function() {
            //         $(".status-btn-container").hide();
            //         $(".status-btn-container[data-jaminan='NULL']").show();

            //         $("#jaminan").val("").trigger("change");
            //     });

            //     // Event saat tombol status diklik
            //     $(document).on("click", ".btn-status", function() {
            //         var selectedIdStatus = $(this).data("id");
            //         $("#id_status").val(selectedIdStatus);
            //     });
            // });

            $(document).ready(function() {
                $(".status-btn-container").hide();
                $(".status-btn-container[data-jaminan='NULL']").show();

                // Event saat select jaminan berubah
                $("#jaminan").change(function() {
                    var selectedJaminan = $(this).val();
                    var $matchingStatus = $(".status-btn-container[data-jaminan='" + selectedJaminan + "']");
                    var $nullStatusContainer = $(".status-btn-container[data-jaminan='NULL']");

                    $(".status-btn-container").hide();
                    $nullStatusContainer.find(".status-message").remove();

                    if (!selectedJaminan || selectedJaminan === "batal") {
                        // **Jika batal dipilih, tampilkan kembali NULL tanpa pesan error**
                        $nullStatusContainer.show();
                        $(this).val(""); // Reset pilihan
                    } else if ($matchingStatus.length > 0) {
                        // **Jika status ditemukan, tampilkan tombol yang sesuai**
                        $matchingStatus.show();
                    } else {
                        $(".status-btn-container").hide();
                        $("#alert").html("").hide();

                        // Tambahkan pesan error ke dalam div #alert
                        $("#alert").html(`
                            Status dengan jaminan <span class="font-weight-semibold">[ ${selectedJaminan} ] tidak tersedia</span> . Silahkan Hubungi Mutu.
                        `).show();

                        setTimeout(function() {
                            $("#alert").fadeOut("slow");
                        }, 5000);
                    }
                });

                // Event saat select nama pasien berubah
                $("#nama_pasien").change(function() {
                    $(".status-btn-container").hide();
                    $(".status-btn-container[data-jaminan='NULL']").show().find(".status-message").remove();
                    $("#jaminan").val("").trigger("change");
                });

                // Event saat tombol status diklik
                $(document).on("click", ".btn-status", function() {
                    var selectedIdStatus = $(this).data("id");
                    $("#id_status").val(selectedIdStatus);
                });
            });
        </script>



        <!-- /content area -->