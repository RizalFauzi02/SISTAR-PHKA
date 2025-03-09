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
      icon: 'warning',
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
        // CUSTOM FILE INPUT
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
         });
        // END CUSTOM FILE INPUT
        
      // AJAX UPDATE USER - ADMIN
      $('.btn-modal-admin').click(function () {
          const id_users = $(this).data('idu');
          alert
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
              id_users: id_users
            },
            url: "http://localhost/epkbm2/Admin/auadmin",
            success: function(data) {
              $.each(data,function(id_users, namalengkap, username, password, email, gambar, akses, isActive, created_at, updated_at){
                  $('input[name=idusers]').val(data.id_users);
                  $('input[name=namalengkapadmin]').val(data.namalengkap);
                  $('input[name=emailadmin]').val(data.email);
                  $('input[name=usernameadmin]').val(data.username);
                  });
                }
            });
      });
      // AJAX UPDATE USER - SISWA
      $('.btn-modal-siswa').click(function () {
          const id_users = $(this).data('idu');
          alert
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
              id_users: id_users
            },
            url: "http://localhost/epkbm2/Admin/ausiswa",
            success: function(data) {
              $.each(data,function(id_users, namalengkap, username, password, email, gambar, akses, isActive, created_at, updated_at){
                  $('input[name=idusers]').val(data.id_users);
                  $('input[name=namalengkapsiswa]').val(data.namalengkap);
                  $('input[name=emailsiswa]').val(data.email);
                  $('input[name=usernamesiswa]').val(data.username);
                  });
                }
            });
      });
      // AJAX UPDATE MASTER - GURU
      $('.btn-modal-guru').click(function () {
          const id_guru = $(this).data('idu');
          alert
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
              id_guru: id_guru
            },
            url: "http://localhost/epkbm2/Master/auguru",
            success: function(data) {
              $.each(data,function(id_guru, nuptk, nama_guru, jk_guru){
                  $('input[name=idguru]').val(data.id_guru);
                  $('input[name=nuptk]').val(data.nuptk);
                  $('input[name=namaguru]').val(data.nama_guru);
                  $('select[name=jkguru]').val(data.jk_guru);
                  });
                }
            });
      });
      // AJAX UPDATE MAPEL
      $('.btn-modal-mapel').click(function () {
          const kd_mapel = $(this).data('idu');
          alert
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
              kd_mapel: kd_mapel
            },
            url: "http://localhost/epkbm2/Mapel/aumapel",
            success: function(data) {
              $.each(data,function(kd_mapel, nama_mapel){
                  $('input[name=kdmapel]').val(data.kd_mapel);
                  $('input[name=namamapel]').val(data.nama_mapel);
                  });
                }
            });
      });
      // AJAX UPDATE RUANGAN
      $('.btn-modal-ruangan').click(function () {
          const kd_ruangan = $(this).data('idu');
          alert
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
              kd_ruangan: kd_ruangan
            },
            url: "http://localhost/epkbm2/Ruangan/auruangan",
            success: function(data) {
              $.each(data,function(kd_ruangan, nama_ruangan){
                  $('input[name=kdruangan]').val(data.kd_ruangan);
                  $('input[name=namaruangan]').val(data.nama_ruangan);
                  });
                }
            });
      });
      // AJAX UPDATE PROGRAM
      $('.btn-modal-program').click(function () {
          const kd_program = $(this).data('idu');
          alert
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
              kd_program: kd_program
            },
            url: "http://localhost/epkbm2/Master/auprogram",
            success: function(data) {
              $.each(data,function(kd_program, nama_program){
                  $('input[name=kdprogram]').val(data.kd_program);
                  $('input[name=namaprogram]').val(data.nama_program);
                  });
                }
            });
      });
      
    // LOAD DATA BY NIK, DI SISWA FORM
    $(document).on('click', '#select', function(){
        var nik = $(this).data('nik');
        var namalengkap = $(this).data('namalengkap');
        var tempat_lahir = $(this).data('tempat');
        var tanggal_lahir = $(this).data('tanggal');
        var jk = $(this).data('jeniskelamin');
        var nama_program = $(this).data('program');
        var kd_program = $(this).data('kdprogram');

            $('#nik').val(nik);
            $('#namasiswa').val(namalengkap);
            $('#tempat').val(tempat_lahir);
            $('#tanggal').val(tanggal_lahir);
            $('#kelamin').val(jk);
            $('#program').val(nama_program);
            $('#kdprogram').val(kd_program);
    });
});
