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
           <div class="col-md-4">
               <div class="card">
                   <div class=" card-header header-elements-inline d-flex justify-content-center w-100">
                       <h5 class="card-title">Input Pasien Pulang</h5>
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
                               <label>Tanggal Lahir:</label>
                               <input type="date" name="tanggal_lahir" class="form-control">
                           </div>

                           <div class="form-group">
                               <label>No Whatsapp Pasien:</label>
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