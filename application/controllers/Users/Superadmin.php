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
        $status_data = [
            'nama_status'  => $this->input->post('nama_status'),
            'pesan_status' => $this->input->post('pesan_status')
        ];
        $user_ids = $this->input->post('id_user');

        if ($this->M_superadmin->update_status($id_status, $status_data, $user_ids)) {
            $this->session->set_flashdata('pesan_sukses', 'Berhasil Update Status!');
        } else {
            $this->session->set_flashdata('pesan_error', 'Gagal Update Status!');
        }

        redirect('Users/superadmin/m_status');
    }

    public function deleteStatus($id_status)
    {
        // Hapus status dari tabel status_user
        $this->M_superadmin->delete_status_user($id_status);

        // Hapus status dari tabel m_status
        $this->M_superadmin->delete_status($id_status);

        $this->session->set_flashdata('pesan_berhasil', 'Berhasil Hapus Status!');
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
            $data = [
                'username'   => $this->input->post('username', TRUE),
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

    public function prosesAddMasterStatus()
    {
        // Aturan Validasi
        $this->form_validation->set_rules('nama_status', 'Nama Status', 'trim|required');
        $this->form_validation->set_rules('pesan_status', 'Pesan Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            // Simpan error dalam session flashdata
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('pesan_error', "
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
                'created_at'     => date('Y-m-d H:i:s')
            ];

            $users = $this->input->post('id_user'); // Ambil array user

            $this->M_superadmin->insertStatus($data, $users); // Kirim ke model

            $this->session->set_flashdata('pesan_sukses', 'Berhasil menambahkan Status!');

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
            $this->session->set_flashdata('pesan_error', "
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
            $data['nama_pasien']   = $this->input->post('nama_pasien');
            $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
            $data['no_whatsapp']   = $this->input->post('no_whatsapp');
            $data['created_at']    = date('Y-m-d H:i:s');

            $this->M_pasien->insertPasien($data);
            $this->session->set_flashdata('pesan_sukses', "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Anda Berhasil Mendaftar.'
                    });
                </script>
            ");
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
}
