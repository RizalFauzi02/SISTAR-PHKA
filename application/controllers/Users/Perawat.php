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
            'PasienPulang'       => '',
            'log_WA'        => ''
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
        $this->data['status'] = $this->M_superadmin->getStatusByUsername($session);
        $this->data['pasien'] = $this->M_superadmin->get_all_pasien();

        $this->template->load('template/default/template', 'perawat/status_perawat', $this->data);
    }

    public function kirim_whatsapp()
    {
        $id_status = $this->input->post('id_status');
        $no_whatsapp = $this->input->post('no_whatsapp');
        $pesan_status = $this->input->post('pesan_status');
        $id_pasien = $this->input->post('nama_pasien');
        $kamar = $this->input->post('kamar');

        // Ambil informasi pengguna dari sesi
        $user_id = $this->session->userdata('id_user');
        $username = $this->session->userdata('username');

        if (empty($no_whatsapp) || empty($pesan_status) || empty($id_pasien) || empty($kamar)) {
            echo json_encode(['status' => 'error', 'message' => 'Pastikan no Whatsapp, pesan, nama pasien, dan kamar sudah terisi...!!!']);
            return;
        }

        // Simpan log WhatsApp
        $insert_log = $this->M_superadmin->simpan_log_WhatsApp($no_whatsapp, $pesan_status, $user_id, $username, $id_pasien, $id_status);

        // Update data kamar pasien
        $update_kamar = $this->M_superadmin->update_kamar($id_pasien, $kamar);

        if ($insert_log && $update_kamar) {
            echo json_encode(['status' => 'success', 'message' => 'Pesan WA berhasil dikirim dan kamar pasien diperbarui.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan log atau memperbarui kamar pasien.']);
        }
    }

    public function log_SendWhatsApp()
    {
        // Default
        $this->data['title'] = 'Perawat';
        $this->data['menuPerawat'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => 'active'
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
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['log_WA'] = $this->M_superadmin->get_log_WhatsApp();

        $this->template->load('template/default/template', 'perawat/log_sendWA', $this->data);
    }

    public function get_pasien()
    {
        header('Content-Type: application/json');

        $logs = $this->M_superadmin->get_pasien();

        if (!$logs) {
            echo json_encode(["data" => []]);
            return;
        }

        // Ubah dari array biasa ke format JSON yang benar
        $data = [];
        foreach ($logs as $log) {
            $data[] = [
                "nama_pasien"     => htmlspecialchars($log['nama_pasien']),
                "tanggal_lahir"   => date('d/m/Y', strtotime($log['tanggal_lahir'])),
                "no_whatsapp"     => htmlspecialchars($log['no_whatsapp']),
                "kamar"           => htmlspecialchars($log['kamar'] ?? ""), // Pastikan tidak null
                "created_at"      => date('d/m/Y H:i:s', strtotime($log['created_at'])),
                "updated_at"      => date('d/m/Y H:i:s', strtotime($log['updated_at'])),
                "id_pasien"       => $log['id_pasien']
            ];
        }

        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }
}
