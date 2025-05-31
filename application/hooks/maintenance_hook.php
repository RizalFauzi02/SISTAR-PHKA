<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance_hook
{
    function check_maintenance()
    {
        $CI = &get_instance();
        $CI->load->model('Site_config_model');
        $CI->load->helper('url');

        // Cek jika maintenance mode aktif
        if ($CI->Site_config_model->is_maintenance_mode()) {
            $current_uri = uri_string();

            // Ambil role user dari session (1 = admin)
            $user_role = $CI->session->userdata('is_role');

            // Jika bukan halaman maintenance & bukan admin
            if ($current_uri !== 'maintenance' && $user_role != 1) {
                $CI->session->sess_destroy();
                redirect('maintenance');
            }
        }
    }
}
