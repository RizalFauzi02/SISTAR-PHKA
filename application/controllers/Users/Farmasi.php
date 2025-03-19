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
            'PasienPulang'       => '',
            'log_WA'        => ''
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
        $this->data['pasien'] = $this->M_superadmin->get_all_pasien();

        $this->template->load('template/default/template', 'farmasi/status_farmasi', $this->data);
    }

    public function kirim_whatsapp()
    {
        $user_id = $this->session->userdata('id_user');
        $username = $this->session->userdata('username');
        $id_status = $this->input->post('id_status');
        $id_pasien = $this->input->post('nama_pasien');
        $nomor = $this->input->post('no_whatsapp');
        $pesan = $this->input->post('pesan_status');

        // Validasi input agar tidak kosong
        if (empty($id_pasien) || empty($nomor) || empty($pesan)) {
            echo json_encode(['status' => 'error', 'message' => 'Nama Pasien, Nomor WhatsApp, dan Pesan tidak boleh kosong!']);
            return;
        }

        // Simpan log ke database dengan user_id
        $insert_log = $this->M_superadmin->simpan_log_WhatsApp($nomor, $pesan, $user_id, $username, $id_pasien, $id_status);

        if ($insert_log) {
            echo json_encode(['status' => 'success', 'message' => 'Pesan WA berhasil dikirim dan log tersimpan.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan log WhatsApp.']);
        }
    }

    public function log_SendWhatsApp()
    {
        // Default
        $this->data['title'] = 'Farmasi';
        $this->data['menuFarmasi'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => 'active'
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
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['log_WA'] = $this->M_superadmin->get_log_WhatsApp();

        $this->template->load('template/default/template', 'farmasi/log_sendWA', $this->data);
    }
}
