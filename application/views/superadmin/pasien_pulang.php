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

       <?php if ($this->session->flashdata('pesan_sukses')) : ?>
           <script>
               Swal.fire({
                   icon: 'success',
                   title: 'Berhasil!',
                   text: "<?= $this->session->flashdata('pesan_sukses'); ?>"
               });
           </script>
       <?php endif; ?>

       <?php if ($this->session->flashdata('pesan_error')) : ?>
           <script>
               Swal.fire({
                   icon: 'error',
                   title: 'Gagal!',
                   text: "<?= $this->session->flashdata('pesan_error'); ?>"
               });
           </script>
       <?php endif; ?>
       <!-- Content area -->
       <div class="content">
           <div class="row">
               <!-- Card Form Input -->
               <div class="col-md-4">
                   <div class="card">
                       <div class="card-header text-center">
                           <h5 class="card-title mb-0"> <?= $title; ?> </h5>
                       </div>
                       <?php if ($this->session->flashdata('error')) : ?>
                           <div class="alert alert-danger">
                               <?= $this->session->flashdata('error'); ?>
                           </div>
                       <?php endif; ?>
                       <div class="card-body">
                           <form action="<?= base_url('Users/superadmin/prosesAddPasien'); ?>" method="POST" onsubmit="return validateWhatsApp()">
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
                                   <th>Date Input</th>
                                   <th class="text-center">Actions</th>
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
                                           <td class="text-center">
                                               <div class="list-icons">
                                                   <div class="dropdown">
                                                       <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                           <i class="icon-menu9"></i>
                                                       </a>

                                                       <div class="dropdown-menu dropdown-menu-right">
                                                           <a href="<?= base_url('Users/superadmin/editPasien/' . $p['id_pasien']); ?>" class="dropdown-item">Edit</a>
                                                           <a href="<?= base_url('Users/superadmin/deletePasien/' . $p['id_pasien']); ?>" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a>
                                                       </div>
                                                   </div>
                                               </div>
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