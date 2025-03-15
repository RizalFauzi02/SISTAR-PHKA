<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Farmasi extends CI_Controller
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
        $this->data['title'] = 'Farmasi';
        $this->data['menuFarmasi'] = [
            'Dashboard'     => '',
            'Status'       => 'active',
            'PasienPulang'       => ''
        ];

        $this->data['dropdownFarmasi'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkFarmasi'] = [
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

        $this->template->load('template/default/template', 'farmasi/status_farmasi', $this->data);
    }

    public function kirim_whatsapp()
    {
        // Ambil data user yang sedang login
        $user_id = $this->session->userdata('id_user'); // Pastikan session user sudah diset
        $username = $this->session->userdata('username'); // Pastikan session user sudah diset
        $is_role = $this->session->userdata('is_role'); // Pastikan session user sudah diset
        $nomor = $this->input->post('no_whatsapp');
        $pesan = $this->input->post('pesan_status');

        // Simpan log ke database dengan user_id
        $this->M_superadmin->simpan_log_WhatsApp($nomor, $pesan, $user_id, $username, $is_role);

        // Kirim response ke AJAX
        echo "success";
    }
}
