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
                       <h5 class="card-title">Master Status Pelayanan</h5>
                   </div>
                   <?php if ($this->session->flashdata('error')) : ?>
                       <div class="alert alert-danger">
                           <?= $this->session->flashdata('error'); ?>
                       </div>
                   <?php endif; ?>

                   <div class="card-body">
                       <form action="<?= base_url('Users/superadmin/prosesAddMasterStatus'); ?>" method="POST">
                           <div class="form-group text-center text-muted content-divider">
                               <span class="px-2">Master Status Pelayanan</span>
                           </div>
                           <div class="form-group">
                               <label for="nama_status">Nama Status</label>
                               <input type="text" name="nama_status" class="form-control" autocomplete="off">
                           </div>

                           <div class="form-group">
                               <label for="id_user">Pengguna Status</label>
                               <select class="form-control select-search" id="id_user" name="id_user[]" multiple required>
                                   <option value="">Pilih Pengguna</option>
                                   <?php foreach ($user as $us) : ?>
                                       <option value="<?= $us['id_user']; ?>"><?= $us['username']; ?></option>
                                   <?php endforeach; ?>
                               </select>
                           </div>

                           <div class="form-group">
                               <label for="exampleTextarea">Pesan Status</label>
                               <textarea class="form-control" name="pesan_status" id="exampleTextarea" rows="8" placeholder="Tulis Pesan disini...."></textarea>
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
           $(document).ready(function() {
               $('.select-search').select2({
                   placeholder: "Pilih Pengguna",
                   allowClear: true
               });
           });
       </script>
       <!-- /content area -->