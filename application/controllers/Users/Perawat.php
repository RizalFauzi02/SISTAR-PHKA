<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_superadmin');
        $this->load->model('M_pasien');
        if ($this->session->has_userdata('is_Loggin') != true) {
            redirect('/');
        }
    }

    public function index()
    {
        // Default
        $this->data['title'] = 'Perawat';
        $this->data['menuPerawat'] = [
            'Dashboard'     => '',
            'Status'       => 'active',
            'PasienPulang'       => ''
        ];

        $this->data['dropdownPerawat'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkPerawat'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['pasien'] = $this->M_pasien->getPasien();

        // Ambil role user berdasarkan id_user
        $is_role = $this->M_superadmin->getUserRole($id_user);

        // Ambil status berdasarkan role user
        $this->data['status'] = $this->M_superadmin->getStatusByRole($is_role);

        $this->template->load('template/default/template', 'perawat/status_perawat', $this->data);
    }

    public function kirim_whatsapp()
    {
        header('Content-Type: application/json'); // Pastikan response dalam format JSON

        // Ambil data dari request
        $nomor = $this->input->post('no_whatsapp');
        $pesan = $this->input->post('pesan_status');

        // Validasi input
        if (empty($nomor) || empty($pesan)) {
            echo json_encode(['status' => 'error', 'message' => 'Nomor atau pesan tidak boleh kosong']);
            return;
        }

        // Ambil data user yang sedang login
        $user_id = $this->session->userdata('id_user');
        $username = $this->session->userdata('username');
        $is_role = $this->session->userdata('is_role');

        // Simpan ke database
        $this->load->model('M_superadmin');
        $simpan = $this->M_superadmin->simpan_log_WhatsApp($nomor, $pesan, $user_id, $username, $is_role);

        // Cek apakah penyimpanan berhasil
        if ($simpan) {
            echo json_encode(['status' => 'success', 'message' => 'Pesan berhasil disimpan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data ke database']);
        }
    }
}
