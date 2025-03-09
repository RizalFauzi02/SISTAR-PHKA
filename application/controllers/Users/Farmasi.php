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
        $this->data['profile'] = $this->M_superadmin->getProfile($session)->row_array();
        // WAJIB ADA

        $this->data['pasien'] = $this->M_pasien->getPasien();

        // Ambil role user berdasarkan id_user
        $is_role = $this->M_superadmin->getUserRole($id_user);

        // Ambil status berdasarkan role user
        $this->data['status'] = $this->M_superadmin->getStatusByRole($is_role);

        $this->template->load('template/default/template', 'superadmin/status', $this->data);
    }
}
