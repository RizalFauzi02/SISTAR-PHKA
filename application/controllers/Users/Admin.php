<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->data['title'] = 'Input Pasien Ranap';
        $this->data['menuAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => 'active',
            'log_WA'        => '',
            'status_pesan' => ''
        ];

        $this->data['dropdownAdmin'] = [
            'nav' => '',
            'style' => '',
        ];
        $this->data['linkAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['pasien'] = $this->M_superadmin->get_all_pasien();

        $this->template->load('template/default/template', 'admin/v_inputPasien', $this->data);
    }

    public function status_admin()
    {
        // Default
        $this->data['title'] = 'Status Pelayanan';
        $this->data['menuAdmin'] = [
            'Dashboard'     => '',
            'Status'       => 'active',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'status_pesan' => ''
        ];

        $this->data['dropdownAdmin'] = [
            'nav' => '',
            'style' => '',
        ];
        $this->data['linkAdmin'] = [
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

        $this->template->load('template/default/template', 'admin/status_admin', $this->data);
    }

    public function prosesAddPasien()
    {
        // Aturan Validasi
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_whatsapp', 'No WhatsApp', 'required|regex_match[/^628[0-9]{8,}$/]', [
            'required' => 'No WhatsApp wajib diisi!',
            'regex_match' => 'No WhatsApp harus diawali dengan 628 !!!'
        ]);

        if ($this->form_validation->run() == false) {
            // Simpan error dalam session flashdata
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('pesan', "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '" . validation_errors() . "'
                    });
                </script>
            ");
            redirect('users/admin');
        } else {
            $no_whatsapp = $this->input->post('no_whatsapp');

            // Cek apakah nomor WhatsApp sudah terdaftar
            $cek_pasien = $this->M_superadmin->cekNomorWhatsApp($no_whatsapp);
            if ($cek_pasien) {
                $this->session->set_flashdata('error', 'Pasien dengan nomor WhatsApp ini sudah terdaftar!');
                redirect('users/admin');
            }

            // Data yang akan disimpan
            $data = [
                'nama_pasien'   => $this->input->post('nama_pasien'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jaminan'       => $this->input->post('jaminan'),
                'no_whatsapp'   => $no_whatsapp,
                'created_at'    => date('Y-m-d H:i:s')
            ];

            // Simpan ke database
            $this->M_pasien->insertPasien($data);
            $this->session->set_flashdata('success', 'Data pasien berhasil ditambahkan!');
            redirect('users/admin');
        }
    }

    public function editPasien()
    {
        $id_pasien = $this->input->post('id_pasien');

        // Ambil data dari input form
        $data = [
            'nama_pasien'   => $this->input->post('nama_pasien'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'no_whatsapp'   => $this->input->post('no_whatsapp'),
            'kamar'   => $this->input->post('kamar')
        ];

        // Hapus field yang kosong agar tidak memperbarui dengan NULL
        $data = array_filter($data, function ($value) {
            return !empty($value);
        });

        // Cek jika ada perubahan data
        if (!empty($data)) {
            if ($this->M_superadmin->update_pasien($id_pasien, $data)) {
                $this->session->set_flashdata('success', 'Data pasien berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data pasien.');
            }
        } else {
            $this->session->set_flashdata('info', 'Tidak ada perubahan data.');
        }

        redirect('users/admin');
    }

    // ================================= BUTTON KIRIM WHATSAPP ==========================================

    // -------------------------------- KIRIM PESAN OTOMATIS --------------------------------
    public function kirim_whatsapp_otomatis()
    {
        // Ambil data user yang sedang login
        $user_id = $this->session->userdata('id_user'); // Pastikan session user sudah diset
        $username = $this->session->userdata('username'); // Pastikan session user sudah diset

        $id_status = $this->input->post('id_status');
        $id_pasien = $this->input->post('nama_pasien');
        $nomor = $this->input->post('no_whatsapp');
        $pesan = $this->input->post('pesan_status');

        $response = $this->M_superadmin->kirim_pesan_otomatis($nomor, $pesan);

        if (isset($response['sent']) && $response['sent'] == true) {
            $status = "Sukses";
            $this->session->set_flashdata('swal_success', 'Pesan berhasil dikirim!');
        } else {
            $status = "Gagal";
            $this->session->set_flashdata('swal_error', 'Gagal mengirim pesan! ' . json_encode($response));
        }

        // Simpan log ke database dengan user_id
        $this->M_superadmin->simpan_log_WhatsApp($nomor, $pesan, $user_id, $username, $id_pasien, $id_status);

        redirect($_SERVER['HTTP_REFERER']);
    }
    // -------------------------------- KIRIM PESAN OTOMATIS --------------------------------

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
        $this->data['title'] = 'Admin';
        $this->data['menuAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => 'active',
            'status_pesan' => ''
        ];

        $this->data['dropdownAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkAdmin'] = [
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

        $this->template->load('template/default/template', 'admin/log_sendWA', $this->data);
    }

    // public function get_pasien()
    // {
    //     header('Content-Type: application/json');

    //     $logs = $this->M_superadmin->get_pasien();

    //     if (!$logs) {
    //         echo json_encode(["data" => []]);
    //         return;
    //     }

    //     // Ubah dari array biasa ke format JSON yang benar
    //     $data = [];
    //     foreach ($logs as $log) {
    //         $data[] = [
    //             "nama_pasien"     => htmlspecialchars($log['nama_pasien']),
    //             "tanggal_lahir"   => date('d/m/Y', strtotime($log['tanggal_lahir'])),
    //             "no_whatsapp"     => htmlspecialchars($log['no_whatsapp']),
    //             "kamar"           => htmlspecialchars($log['kamar'] ?? ""), // Pastikan tidak null
    //             "created_at"      => date('d/m/Y H:i:s', strtotime($log['created_at'])),
    //             "updated_at"      => date('d/m/Y H:i:s', strtotime($log['updated_at'])),
    //             "id_pasien"       => $log['id_pasien']
    //         ];
    //     }

    //     echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    // }

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
                "jaminan"           => htmlspecialchars($log['jaminan'] ?? ""), // Pastikan tidak null
                "kamar"           => htmlspecialchars($log['kamar'] ?? ""), // Pastikan tidak null
                "created_at"      => date('d/m/Y H:i:s', strtotime($log['created_at'])),
                "updated_at"      => date('d/m/Y H:i:s', strtotime($log['updated_at'])),
                "id_pasien"       => $log['id_pasien']
            ];
        }

        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }
    public function status_pengiriman_pesan()
    {
        // Default
        $this->data['title'] = 'Status Pengiriman Whatsapp';
        $this->data['menuAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'status_pesan' => 'active'
        ];

        $this->data['dropdownAdmin'] = [
            'nav' => '',
            'style' => '',
        ];
        $this->data['linkAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $status = $this->input->get('status');
        $this->data['data_pesan'] = $this->M_superadmin->get_status_pesan(100, $status);
        $this->data['filter_status'] = $status;
        $this->template->load('template/default/template', 'admin/log_UltraMsg', $this->data);
    }

    public function get_log_pesan_ajax()
    {
        $status = $this->input->get('status');
        $data_pesan = $this->M_superadmin->get_status_pesan(100, $status);

        // Jika butuh sorting di PHP:
        usort($data_pesan, function ($a, $b) {
            return ($b['sent_at'] ?? 0) - ($a['sent_at'] ?? 0);
        });

        $output = ['data' => $data_pesan];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }
}
