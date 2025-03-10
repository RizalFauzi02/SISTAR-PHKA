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
            'PasienPulang'       => 'active'
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
        $this->data['profile'] = $this->M_superadmin->getProfile($session)->row_array();
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
            'PasienPulang'       => ''
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
        $this->data['profile'] = $this->M_superadmin->getProfile($session)->row_array();
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
        $this->form_validation->set_rules('no_whatsapp_pasien', 'No WhatsApp', 'required|regex_match[/^628[0-9]{8,}$/]', [
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
            redirect('Users/admin');
        } else {
            $data['nama_pasien']   = $this->input->post('nama_pasien');
            $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
            $data['no_whatsapp']   = $this->input->post('no_whatsapp_pasien');
            $data['created_at']    = date('Y-m-d H:i:s');

            $this->M_pasien->insertPasien($data);
            $this->session->set_flashdata('pesan', "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Anda Berhasil Mendaftar.'
                    });
                </script>
            ");
            redirect('Users/admin');
        }
    }
}
