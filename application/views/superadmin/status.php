<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?= $title; ?></span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <h5>Layanan Pengaduan SIAP-PHKA Hubungi : <br><a href="https://wa.link/4ia9bz" target="_blank">Divisi Mutu PHKA</a></h5>
    </div>
</div>
<!-- /page header -->

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

                <form id="formWA" action="<?= base_url('auth/logout'); ?>" method="POST">
                    <!-- <form id="formWA" action="<?= base_url('users/superadmin/kirim_whatsapp_otomatis'); ?>" method="POST"> -->
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

                    <!-- <?php if (!empty($status)) { ?>
                        <?php foreach ($status as $s) { ?>
                            <div class="text-center mt-2 status-btn-container">
                                <button type="button"
                                    class="btn btn-primary btn-status"
                                    data-id="<?= $s['id_status']; ?>"
                                    data-pesan="<?= htmlspecialchars($s['pesan_status']); ?>">
                                    <?= $s['nama_status']; ?>
                                </button>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="text-center mt-2">
                            <p class="text-muted">Belum ada status tersedia.</p>
                        </div>
                    <?php } ?> -->

                    <?php if (!empty($status)) : ?>
                        <?php $no = 1; ?>
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
                                    <?= htmlspecialchars($s['nama_status']); ?>
                                    <?php if (!empty($s['pengguna_status'])) : ?>
                                        <b>[<?= htmlspecialchars($s['pengguna_status']); ?>]</b>
                                    <?php endif; ?>
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
                        <button type="submit" class="btn btn-info" id="kirimWa">Kirim WhatsApp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // DISABLE BUTTON KIRIM WA KETIKA SEDANG DALAM PROSES PENGIRIMAN
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("formWA");
        const btn = document.getElementById("kirimWa");

        form.addEventListener("submit", function() {
            btn.disabled = true;
            btn.innerHTML = `<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Mengirim...`;
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

        // $(".btn-status").click(function() {
        //     selectedIdStatus = $(this).data("id");
        //     $("#id_status").val(selectedIdStatus);
        // });
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

    // ===== SCRIPT JAMINAN =======
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