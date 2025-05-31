<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_config_model extends CI_Model
{
    public function is_maintenance_mode()
    {
        $query = $this->db->get('site_config');
        $row = $query->row();
        return $row && $row->maintenance_mode == 1;
    }
}
