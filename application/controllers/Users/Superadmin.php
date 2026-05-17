<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('M_superadmin');
        $this->load->model('M_pasien');
        if ($this->session->has_userdata('is_Loggin') != true) {
            redirect('/');
        }
    }

    public function index()
    {
        // Default
        $this->data['title'] = 'Superadmin';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => 'active',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['total_pasien'] = $this->M_superadmin->get_total_pasien();

        $this->template->load('template/default/template', 'superadmin/index', $this->data);
    }

    public function status_pelayanan()
    {
        // Default
        $this->data['title'] = 'Status Pelayanan';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => 'active',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
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
        // $this->data['status'] = $this->M_superadmin->getStatusByRole($is_role);
        $this->data['status'] = $this->M_superadmin->get_all_status();

        $this->template->load('template/default/template', 'superadmin/status', $this->data);
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
        $this->data['title'] = 'Superadmin';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => 'active',
            'MtcMode'  => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['log_WA'] = $this->M_superadmin->get_log_WhatsApp();

        $this->template->load('template/default/template', 'superadmin/log_sendWA', $this->data);
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


    public function m_status()
    {
        // Default
        $this->data['title'] = 'Master Status Pelayanan';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => 'active',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['user'] = $this->M_superadmin->get_all_users();
        $this->data['status'] = $this->M_superadmin->get_all_status();

        // Loop untuk mendapatkan pengguna terkait setiap status
        foreach ($this->data['status'] as &$status) {
            $status['selected_users'] = array_column($this->M_superadmin->get_users_by_status($status['id_status']), 'id_user');
        }

        $this->template->load('template/default/template', 'superadmin/m_status', $this->data);
    }

    public function updateStatus()
    {
        $id_status = $this->input->post('id_status');
        $jaminan = $this->input->post('jaminan');

        if ($jaminan === "hapus") {
            $jaminan = NULL;
        }

        $status_data = [
            'nama_status'  => $this->input->post('nama_status'),
            'pesan_status' => $this->input->post('pesan_status'),
            'jaminan'      => $jaminan
        ];

        $user_ids = $this->input->post('id_user');

        if ($this->M_superadmin->update_status($id_status, $status_data, $user_ids)) {
            $this->session->set_flashdata('success', 'Berhasil Update Status!');
        } else {
            $this->session->set_flashdata('error', 'Gagal Update Status!');
        }

        redirect('users/superadmin/m_status');
    }


    public function deleteStatus($id_status)
    {
        ob_start();
        // Hapus status dari tabel status_user
        $this->M_superadmin->delete_status_user($id_status);

        // Hapus status dari tabel m_status
        $this->M_superadmin->delete_status($id_status);

        $this->session->set_flashdata('success', 'Berhasil Hapus Status!');

        redirect('users/superadmin/m_status');
    }

    public function m_user()
    {
        // Default
        $this->data['title'] = 'Master User';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'      => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => 'active',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['user'] = $this->M_superadmin->get_all_users();
        // var_dump($this->data['user']);
        // die;

        $this->template->load('template/default/template', 'superadmin/m_user', $this->data);
    }

    public function ProsesTambahAkun()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('is_active', 'Status Akun', 'required');
        $this->form_validation->set_rules('is_role', 'Role Akun', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $username = $this->input->post('username', TRUE);

            // Cek apakah username sudah ada di database
            if ($this->M_superadmin->check_username_exists($username)) {
                echo json_encode(['status' => 'error', 'message' => 'Username sudah digunakan!!']);
                return; // Menghentikan proses lebih lanjut
            }

            $data = [
                'username'   => $username,
                'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active'  => $this->input->post('is_active'),
                'is_role'    => $this->input->post('is_role'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $insert = $this->M_superadmin->insert_akun($data);

            if ($insert) {
                echo json_encode(['status' => 'success', 'message' => 'Akun berhasil ditambahkan']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan akun']);
            }
        }
    }

    public function update_isActive()
    {
        $id_user = $this->input->post('id_user');
        $is_active = $this->input->post('is_active');
        $updated = date('Y-m-d H:i:s');

        if ($id_user == NULL || $is_active === NULL) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak valid!']);
            return;
        }

        $update = $this->M_superadmin->update_isActive($id_user, $is_active, $updated);

        if ($update) {
            echo json_encode(['status' => 'success', 'message' => 'Status akun berhasil diperbarui!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengubah status akun!']);
        }
    }

    public function deleteAkun()
    {
        $id_user = $this->input->post('id_user');

        if ($id_user == NULL) {
            echo json_encode(['status' => 'error', 'message' => 'ID tidak valid!']);
            return;
        }

        $hapus = $this->M_superadmin->delete_user($id_user);

        if ($hapus) {
            echo json_encode(['status' => 'success', 'message' => 'Akun berhasil dihapus!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus akun!']);
        }
    }

    public function update_user()
    {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $is_role = $this->input->post('is_role');
        $password = $this->input->post('password');

        // Cek apakah username sudah digunakan oleh user lain
        if ($this->M_superadmin->check_username_exists($username, $id_user)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan');
            redirect('users/superadmin/m_user');
            return;
        }

        $update = $this->M_superadmin->update_user($id_user, $username, $is_role, $password);

        // Cek apakah update berhasil
        if ($update) {
            // Jika yang di-edit adalah user yang sedang login dan ada perubahan username atau password
            if ($_SESSION['id_user'] == $id_user && ($username != $this->session->userdata('username') || !empty($password))) {
                $this->session->sess_destroy();
                $this->session->set_flashdata('success', 'Akun sudah diperbarui. Silahkan login ulang.');
                redirect('auth/logout');
                return;
            }
            $this->session->set_flashdata('success', 'Berhasil memperbarui user.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data user');
        }

        redirect('users/superadmin/m_user');
    }


    public function prosesAddMasterStatus()
    {
        // Aturan Validasi
        $this->form_validation->set_rules('nama_status', 'Nama Status', 'trim|required');
        $this->form_validation->set_rules('pesan_status', 'Pesan Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            // Simpan error dalam session flashdata
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('error', "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '" . validation_errors() . "'
                });
            </script>
        ");
            redirect('users/superadmin/m_status');
        } else {
            $data = [
                'nama_status'    => $this->input->post('nama_status'),
                'pesan_status'   => $this->input->post('pesan_status'),
                'jaminan'        => $this->input->post('jaminan'),
                'created_at'     => date('Y-m-d H:i:s')
            ];

            $users = $this->input->post('id_user'); // Ambil array user

            $this->M_superadmin->insertStatus($data, $users); // Kirim ke model

            $this->session->set_flashdata('success', 'Berhasil menambahkan Status!');

            redirect('users/superadmin/m_status');
        }
    }

    public function add_pasien()
    {
        // Default
        $this->data['title'] = 'Input Pasien Ranap';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => 'active',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['pasien'] = $this->M_superadmin->get_all_pasien();

        $this->template->load('template/default/template', 'superadmin/pasien_pulang', $this->data);
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
            redirect('users/superadmin/add_pasien');
        } else {
            $no_whatsapp = $this->input->post('no_whatsapp');
            $izinkan_double = $this->input->post('izinkan_double');

            // Cek apakah nomor WhatsApp sudah terdaftar
            // $cek_pasien = $this->M_superadmin->cekNomorWhatsApp($no_whatsapp);
            // if ($cek_pasien) {
            //     $this->session->set_flashdata('error', 'Pasien dengan nomor WhatsApp ini sudah terdaftar!');
            //     redirect('users/superadmin/add_pasien');
            // }

            // Jika checkbox tidak diceklis (tidak izinkan double nomor)
            if (!$izinkan_double) {
                $cek_pasien = $this->M_superadmin->cekNomorWhatsApp($no_whatsapp);
                if ($cek_pasien) {
                    $this->session->set_flashdata('error', 'Pasien dengan nomor WhatsApp ini sudah terdaftar!');
                    redirect('users/superadmin/add_pasien');
                }
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
            redirect('users/superadmin/add_pasien');
        }
    }


    public function get_pasien_by_id()
    {
        $id_pasien = $this->input->post('id_pasien');

        if ($id_pasien) {
            $this->load->model('M_pasien');
            $pasien = $this->M_pasien->get_pasien_by_id($id_pasien);

            if ($pasien) {
                echo json_encode($pasien);
            } else {
                echo json_encode(['error' => 'Data tidak ditemukan']);
            }
        } else {
            echo json_encode(['error' => 'ID Pasien tidak valid']);
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

        redirect('users/superadmin/add_pasien');
    }

    public function deletePasien($id_pasien)
    {
        if ($this->M_superadmin->delete_pasien($id_pasien)) {
            $this->session->set_flashdata('success', 'Data pasien berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data pasien.');
        }

        redirect('users/superadmin/add_pasien');
    }

    public function m_del_log_WA()
    {
        // Default
        $this->data['title'] = 'Hapus History Log WhatsApp';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        // MENU DATA MASTER
        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => 'active',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'superadmin/m_del_log_wa', $this->data);
    }

    public function delete_log_wa_all()
    {
        $this->M_superadmin->delete_log_wa_all();
        $this->session->set_flashdata('success', 'Semua log berhasil dihapus.');
        redirect('users/superadmin/m_del_log_WA');
    }

    public function delete_log_wa_by_date()
    {
        $dari = DateTime::createFromFormat('d/m/Y', $this->input->get('dari'))->format('Y-m-d');
        $sampai = DateTime::createFromFormat('d/m/Y', $this->input->get('sampai'))->format('Y-m-d');

        if ($dari && $sampai) {
            $this->M_superadmin->delete_log_wa_by_date($dari, $sampai);
            $this->session->set_flashdata('success', 'Log berhasil dihapus berdasarkan rentang tanggal.');
        } else {
            $this->session->set_flashdata('error', 'Tanggal tidak valid.');
        }
        redirect('users/superadmin/m_del_log_WA');
    }

    public function m_del_dat_pasien()
    {
        // Default
        $this->data['title'] = 'Hapus Data Pasien';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        // MENU DATA MASTER
        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => 'active'
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'superadmin/m_del_dat_pasien', $this->data);
    }

    public function delete_dat_pasien_all()
    {
        $this->M_superadmin->delete_dat_pasien_all();
        $this->session->set_flashdata('success', 'Semua log berhasil dihapus.');
        redirect('users/superadmin/m_del_dat_pasien');
    }

    public function delete_dat_pasien_by_date()
    {
        $dari = DateTime::createFromFormat('d/m/Y', $this->input->get('dari'))->format('Y-m-d');
        $sampai = DateTime::createFromFormat('d/m/Y', $this->input->get('sampai'))->format('Y-m-d');

        if ($dari && $sampai) {
            $this->M_superadmin->delete_dat_pasien_by_date($dari, $sampai);
            $this->session->set_flashdata('success', 'Log berhasil dihapus berdasarkan rentang tanggal.');
        } else {
            $this->session->set_flashdata('error', 'Tanggal tidak valid.');
        }
        redirect('users/superadmin/m_del_dat_pasien');
    }

    // ============= LAPORAN =============
    public function m_lap_pasien()
    {
        // Default
        $this->data['title'] = 'Tarik Laporan Data Pasien by Excel';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        // MENU DATA MASTER
        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => 'active',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'superadmin/m_lap_pasien', $this->data);
    }

    public function m_lap_log_wa()
    {
        // Default
        $this->data['title'] = 'Tarik Laporan Log WhatsApp by Excel';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        // MENU DATA MASTER
        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => 'active',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'superadmin/m_lap_log_wa', $this->data);
    }

    // ========================== LAPORAN ==================================
    public function export_lap_pasien_all()
    {
        $data = $this->M_superadmin->get_all_pasien_lap();
        $this->_export_all_data_pasien($data, 'Semua_Data_Pasien');
    }

    public function export_lap_log_all()
    {
        $data = $this->M_superadmin->get_log_WhatsApp();
        $this->_export_all_data_log_wa($data, 'Semua_History_Pengiriman');
    }

    // ==================================================== START FUNCTION EXPORT EXCEL ====================================================
    public function export_lap_pasien_by_date()
    {
        $start_date_input = $this->input->get('dari_tanggal');
        $end_date_input = $this->input->get('sampai_tanggal');
        // var_dump($start_date_input);
        // var_dump($start_date_input);
        // die;
        if (!$start_date_input || !$end_date_input) {
            $this->session->set_flashdata('error', 'Invalid date range.');
            redirect('users/superadmin/m_lap_pasien');
            return;
        }

        // Konversi format
        // $start_date = DateTime::createFromFormat('m/d/Y', $start_date_input)->format('Y-m-d');
        // $end_date = DateTime::createFromFormat('m/d/Y', $end_date_input)->format('Y-m-d');

        // Model Query
        $data = $this->M_superadmin->get_pasien_by_date($start_date_input, $end_date_input);

        // Debug hasil data
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        if (empty($data)) {
            $this->session->set_flashdata('error', 'No data available for the selected date range.');
            redirect('users/superadmin/m_lap_pasien');
            return;
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $spreadsheet->getProperties()->setCreator('SIAP-PHKA')
            ->setTitle('Export Data Pasien PHKA')
            ->setDescription('Data Pasien dari ' . $start_date_input . ' sampai ' . $end_date_input);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Pasien')
            ->setCellValue('C1', 'Tanggal Lahir')
            ->setCellValue('D1', 'No WhatsApp')
            ->setCellValue('E1', 'Ruangan')
            ->setCellValue('F1', 'Jaminan')
            ->setCellValue('G1', 'Tanggal Input');

        $row = 2;
        $no = 1;
        foreach ($data as $datPasien) {
            $sheet->setCellValue('A' . $row, $no++)
                ->setCellValue('B' . $row, $datPasien['nama_pasien'])
                ->setCellValue('C' . $row, date('d-m-Y', strtotime($datPasien['tanggal_lahir'])))
                ->setCellValueExplicit('D' . $row, $datPasien['no_whatsapp'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValue('E' . $row, $datPasien['kamar'])
                ->setCellValue('F' . $row, $datPasien['jaminan'])
                ->setCellValue('G' . $row, date('d-m-Y H:i:s', strtotime($datPasien['created_at'])));
            $row++;
        }

        $filename = 'Data Pasien_' . date('d-m-Y', strtotime($start_date_input)) . ' sampai ' . date('d-m-Y', strtotime($end_date_input)) . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    private function _export_all_data_pasien($data, $filename = 'Data_Pasien')
    {
        $spreadsheet = $this->excel->createSpreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Pasien');
        $sheet->setCellValue('C1', 'Tanggal Lahir');
        $sheet->setCellValue('D1', 'No WhatsApp');
        $sheet->setCellValue('E1', 'Ruangan');
        $sheet->setCellValue('F1', 'Jaminan');
        $sheet->setCellValue('G1', 'Tanggal Input');

        $row = 2;
        $no = 1;
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $d->nama_pasien);
            $sheet->setCellValue('C' . $row, date('d-m-Y', strtotime($d->tanggal_lahir)));
            $sheet->setCellValueExplicit('D' . $row, $d->no_whatsapp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('E' . $row, $d->kamar);
            $sheet->setCellValue('F' . $row, $d->jaminan);
            $sheet->setCellValue('G' . $row, date('d-m-Y H:i:s', strtotime($d->created_at)));
            $row++;
        }

        // Set nama file
        $filename .= '_' . date('d-m-Y') . '.xlsx';

        // Set header untuk download
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = $this->excel->createWriter($spreadsheet);
        $writer->save('php://output');
    }

    public function export_lap_log_WA_by_date()
    {
        $start_date_input = $this->input->get('dari_tanggal');
        $end_date_input = $this->input->get('sampai_tanggal');

        // print_r($start_date_input);
        // print_r($end_date_input);

        // Tambahkan waktu untuk rentang penuh dalam satu hari
        $start_datetime = $start_date_input . ' 00:00:00';
        $end_datetime   = $end_date_input . ' 23:59:59';

        if (!$start_datetime || !$end_datetime) {
            $this->session->set_flashdata('error', 'Invalid date range.');
            redirect('users/superadmin/m_lap_log_wa');
            return;
        }

        // Model Query
        $data = $this->M_superadmin->get_log_by_date($start_datetime, $end_datetime);

        // Debug hasil data
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        if (empty($data)) {
            $this->session->set_flashdata('error', 'No data available for the selected date range.');
            redirect('users/superadmin/m_lap_log_wa');
            return;
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $spreadsheet->getProperties()->setCreator('SIAP-PHKA')
            ->setTitle('Export Data Log Send WhatsApp PHKA')
            ->setDescription('Data Log Send WhatsApp dari ' . $start_datetime . ' sampai ' . $end_datetime);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Tanggal Kirim')
            ->setCellValue('C1', 'Nama Pasien')
            ->setCellValue('D1', 'Ruangan')
            ->setCellValue('E1', 'Jaminan')
            ->setCellValue('F1', 'Nomor WhatsApp')
            ->setCellValue('G1', 'Pesan Status')
            ->setCellValue('H1', 'Pengirim Pesan')
            ->setCellValue('I1', 'Pesan Status');

        $row = 2;
        $no = 1;
        foreach ($data as $datLog) {
            $sheet->setCellValue('A' . $row, $no++)
                ->setCellValue('B' . $row, date('d-m-Y H:i:s', strtotime($datLog['tgl_kirim'])))
                ->setCellValue('C' . $row, $datLog['nama_pasien'])
                ->setCellValue('D' . $row, $datLog['kamar'])
                ->setCellValue('E' . $row, $datLog['jaminan'])
                ->setCellValueExplicit('F' . $row, $datLog['nomor_pasien'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValue('G' . $row, $datLog['nama_status'])
                ->setCellValue('H' . $row, $datLog['username_pengirim'])
                ->setCellValue('I' . $row, $datLog['pesan_whatsapp']);
            $row++;
        }

        $filename = 'Data Log WhatsApp_' . date('d-m-Y', strtotime($start_datetime)) . ' sampai ' . date('d-m-Y', strtotime($end_datetime)) . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    private function _export_all_data_log_wa($data, $filename = 'History_Pengiriman')
    {
        $spreadsheet = $this->excel->createSpreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Kirim');
        $sheet->setCellValue('C1', 'Nama Pasien');
        $sheet->setCellValue('D1', 'Ruangan');
        $sheet->setCellValue('E1', 'Nomor WhatsApp');
        $sheet->setCellValue('F1', 'Pesan Status');
        $sheet->setCellValue('G1', 'Pengirim Pesan');
        $sheet->setCellValue('H1', 'Pesan Status');

        $row = 2;
        $no = 1;
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, date('d-m-Y H:i:s', strtotime($d['tgl_kirim'])));
            $sheet->setCellValue('C' . $row, $d['nama_pasien']);
            $sheet->setCellValue('D' . $row, $d['kamar']);
            $sheet->setCellValueExplicit('E' . $row, $d['nomor_pasien'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('F' . $row, $d['nama_status']);
            $sheet->setCellValue('G' . $row, $d['username_pengirim']);
            $sheet->setCellValue('H' . $row, $d['pesan_whatsapp']);
            $row++;
        }

        // Set nama file
        $filename .= '_' . date('d-m-Y') . '.xlsx';

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = $this->excel->createWriter($spreadsheet);
        $writer->save('php://output');
    }

    // ==================================================== END FUNCTION EXPORT EXCEL ====================================================

    // ========================== END LAPORAN ==============================

    // END LAPORAN


    public function status_pesan_Ultramsg()
    {
        // Default
        $this->data['title'] = 'Log Whatsapp API Whatsapp';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => 'active'
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $status = $this->input->get('status');
        $this->data['data_pesan'] = $this->M_superadmin->get_status_pesan(100, $status);
        $this->data['filter_status'] = $status;
        $this->template->load('template/default/template', 'superadmin/log_UltraMsg', $this->data);
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

    public function maintenance()
    {
        // Default
        $this->data['title'] = 'Maintenance Mode';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => '',
            'MtcMode'  => 'active'
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
        ];
        $this->data['linkSuperAdmin'] = [
            // LINK ACTIVE
            'linkStatusPelayanan' => '',
            'linkUser' => '',
            'LinkLogUltraMsg' => ''
        ];

        // MENU SUBMENU DELETE
        $this->data['dropdownSuperAdminSubMenu'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminSubMenu'] = [
            // LINK ACTIVE
            'linkDelLogWA' => '',
            'linkDelDatPasien' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownSuperAdminLaporan'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkSuperAdminLap'] = [
            // LINK ACTIVE
            'linkLapPasien' => '',
            'linkLapLog' => '',
            'linkLapUser' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['site_config'] = $this->M_superadmin->getSiteConfig();

        $this->template->load('template/default/template', 'superadmin/v_maintenance', $this->data);
    }

    public function prosesMaintenance()
    {
        $password = $this->input->post('confirm_password');

        // ambil data user login
        $user = $this->db
            ->where('id_user', $this->session->userdata('id_user'))
            ->get('tbl_user')
            ->row_array();
        // ambil data site config
        $site_config = $this->db
            ->get('site_config')
            ->row_array();

        // cek password plain text
        if ($password != $site_config['pass_config']) {

            echo "
            <script>
                alert('Password salah!');
                window.history.back();
            </script>
        ";

            exit;
        }

        // status maintenance
        $maintenance = $this->input->post('maintenance_mode') ? 1 : 0;

        // update database
        $this->db->update('site_config', [
            'maintenance_mode' => $maintenance
        ]);

        echo "
        <script>
            alert('Status maintenance berhasil diupdate!');
            window.location.href = '" . base_url('users/superadmin/maintenance') . "';
        </script>
    ";
    }
}
