<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
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
        $this->data['title'] = 'Superadmin';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => 'active',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => ''
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
            'linkUser' => ''
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
            'log_WA'        => ''
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

        $this->template->load('template/default/template', 'superadmin/status', $this->data);
    }

    // ================================= BUTTON KIRIM WHATSAPP ==========================================

    // public function kirim_whatsapp()
    // {
    //     // Ambil data user yang sedang login
    //     $user_id = $this->session->userdata('id_user'); // Pastikan session user sudah diset
    //     $username = $this->session->userdata('username'); // Pastikan session user sudah diset
    //     $is_role = $this->session->userdata('is_role'); // Pastikan session user sudah diset
    //     $nomor = $this->input->post('no_whatsapp');
    //     $pesan = $this->input->post('pesan_status');

    //     $response = $this->M_superadmin->kirim_pesan($nomor, $pesan);

    //     if (isset($response['sent']) && $response['sent'] == true) {
    //         $status = "Sukses";
    //         $this->session->set_flashdata('swal_success', 'Pesan berhasil dikirim!');
    //     } else {
    //         $status = "Gagal";
    //         $this->session->set_flashdata('swal_error', 'Gagal mengirim pesan! ' . json_encode($response));
    //     }

    //     // Simpan log ke database dengan user_id
    //     $this->M_superadmin->simpan_log_WhatsApp($nomor, $pesan, $status, $response, $user_id, $username, $is_role);

    //     redirect($_SERVER['HTTP_REFERER']);
    // }

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
            'log_WA'        => 'active'
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
            'linkUser' => ''
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
                "kamar"           => htmlspecialchars($log['kamar'] ?? ""), // Pastikan tidak null
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
            'log_WA'        => ''
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
            'linkUser' => ''
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

        redirect('Users/superadmin/m_status');
    }


    public function deleteStatus($id_status)
    {
        ob_start();
        // Hapus status dari tabel status_user
        $this->M_superadmin->delete_status_user($id_status);

        // Hapus status dari tabel m_status
        $this->M_superadmin->delete_status($id_status);

        $this->session->set_flashdata('success', 'Berhasil Hapus Status!');

        redirect('Users/superadmin/m_status');
    }

    public function m_user()
    {
        // Default
        $this->data['title'] = 'Master User';
        $this->data['menuSuperAdmin'] = [
            'Dashboard'     => '',
            'Status'       => '',
            'PasienPulang'       => '',
            'log_WA'        => ''
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
            'linkUser' => 'active'
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
            redirect('Users/superadmin/m_status');
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

            redirect('Users/superadmin/m_status');
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
            'log_WA'        => ''
        ];

        $this->data['dropdownSuperAdmin'] = [
            'nav' => '',
            'style' => '',
        ];
        $this->data['linkSuperAdmin'] = [
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
            redirect('Users/superadmin/add_pasien');
        } else {
            $no_whatsapp = $this->input->post('no_whatsapp');

            // Cek apakah nomor WhatsApp sudah terdaftar
            $cek_pasien = $this->M_superadmin->cekNomorWhatsApp($no_whatsapp);
            if ($cek_pasien) {
                $this->session->set_flashdata('error', 'Pasien dengan nomor WhatsApp ini sudah terdaftar!');
                redirect('Users/superadmin/add_pasien');
            }

            // Data yang akan disimpan
            $data = [
                'nama_pasien'   => $this->input->post('nama_pasien'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'no_whatsapp'   => $no_whatsapp,
                'created_at'    => date('Y-m-d H:i:s')
            ];

            // Simpan ke database
            $this->M_pasien->insertPasien($data);
            $this->session->set_flashdata('success', 'Data pasien berhasil ditambahkan!');
            redirect('Users/superadmin/add_pasien');
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

        redirect('Users/superadmin/add_pasien');
    }

    public function deletePasien($id_pasien)
    {
        if ($this->M_superadmin->delete_pasien($id_pasien)) {
            $this->session->set_flashdata('success', 'Data pasien berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data pasien.');
        }

        redirect('Users/superadmin/add_pasien');
    }
}
