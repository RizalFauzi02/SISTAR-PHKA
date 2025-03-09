$(document).ready(function() {
    // tombol hapus
      $('.btn-hapus').on('click', function(e) {
    
        // menghentikan link ketika klik "delete"
        e.preventDefault();
    
        // mengambil link setelah di klik "OK"
        const href = $(this).attr('href');
    
        Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: "Data akan dihapus dan tidak dapat kembalikan!",
        //   icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        })
      });

      $('.btn-approve').on('click', function(e) {
    
        // menghentikan link ketika klik "delete"
        e.preventDefault();
    
        // mengambil link setelah di klik "OK"
        const href = $(this).attr('href');
    
        Swal.fire({
          title: 'Terima Pendaftaran?',
          text: "Akun Pemijat akan aktif ketika di Approve atau disetujui!",
        //   icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'APPROVE'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        })
      });

      $('.btn-reject').on('click', function(e) {
    
        // menghentikan link ketika klik "delete"
        e.preventDefault();
    
        // mengambil link setelah di klik "OK"
        const href = $(this).attr('href');
    
        Swal.fire({
          title: 'Tolak Pendaftaran?',
          text: "Tolak Pendaftaran pemijat. Dan akan dikirimkan Email!",
        //   icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'REJECT'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        })
      });

      $('.btn-nonaktif').on('click', function(e) {
    
        // menghentikan link ketika klik "delete"
        e.preventDefault();
    
        // mengambil link setelah di klik "OK"
        const href = $(this).attr('href');
    
        Swal.fire({
          title: 'Nonaktifkan Akun?',
          text: "Akun tidak dapat digunakan oleh user!",
        //   icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'NONAKTIF'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        })
      });

      $('.btn-aktifAcc').on('click', function(e) {
    
        // menghentikan link ketika klik "delete"
        e.preventDefault();
    
        // mengambil link setelah di klik "OK"
        const href = $(this).attr('href');
    
        Swal.fire({
          title: 'Aktifkan Akun?',
          text: "Akun aktif dapat digunakan oleh user.",
        //   icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'AKTIFKAN'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        })
      });
});