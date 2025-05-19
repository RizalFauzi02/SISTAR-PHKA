<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen extends CI_Controller
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
        $this->data['title'] = 'Manajemen';
        $this->data['menuManajemen'] = [
            'Dashboard'     => 'active',
            'data_pasien'        => '',
            'log_WA'        => ''
        ];

        $this->data['dropdownManajemen'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['total_pasien'] = $this->M_superadmin->get_total_pasien();
        $this->data['total_log'] = $this->M_superadmin->get_total_log();

        $this->template->load('template/default/template', 'manajemen/index', $this->data);
    }

    public function data_pasien()
    {
        // Default
        $this->data['title'] = 'Data Pasien';
        $this->data['menuManajemen'] = [
            'Dashboard'     => '',
            'data_pasien'        => 'active',
            'log_WA'        => ''
        ];

        $this->data['dropdownManajemen'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'manajemen/data_pasien', $this->data);
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
                "kamar"           => htmlspecialchars($log['kamar'] ?? ""),
                "jaminan"           => htmlspecialchars($log['jaminan'] ?? ""),
                "created_at"      => date('d/m/Y H:i:s', strtotime($log['created_at'])),
                "updated_at"      => date('d/m/Y H:i:s', strtotime($log['updated_at'])),
                "id_pasien"       => $log['id_pasien']
            ];
        }

        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }

    public function log_SendWhatsApp()
    {
        // Default
        $this->data['title'] = 'History Pengiriman WhatsApp SIAP';
        $this->data['menuManajemen'] = [
            'Dashboard'     => '',
            'data_pasien'        => '',
            'log_WA'        => 'active'
        ];

        $this->data['dropdownManajemen'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'manajemen/log_sendWA', $this->data);
    }

    public function get_log_WhatsApp()
    {
        header('Content-Type: application/json');

        $this->load->model('M_superadmin');
        $logs = $this->M_superadmin->get_log_WhatsApp();

        if (!$logs) {
            echo json_encode(["data" => []]);
            return;
        }

        // Ubah dari array biasa ke format JSON yang benar
        $data = [];
        foreach ($logs as $log) {
            $data[] = [
                "tgl_kirim" => date('d/m/Y H:i:s', strtotime($log['tgl_kirim'])),
                "nama_pasien" => htmlspecialchars($log['nama_pasien']),
                "kamar" => htmlspecialchars($log['kamar'] ?? ""), // Pastikan tidak null
                "nomor_pasien" => htmlspecialchars($log['nomor_pasien']),
                "username_pengirim" => htmlspecialchars($log['username_pengirim']),
                "nama_status" => htmlspecialchars($log['nama_status'])
            ];
        }

        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }
}
