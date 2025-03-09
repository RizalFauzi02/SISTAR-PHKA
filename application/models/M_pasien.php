<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pasien extends CI_Model
{
    public $table = 'm_pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function insertPasien($data)
    {
        $this->db->insert('m_pasien', $data);
    }

    public function getPasien()
    {
        return $this->db->get('m_pasien')->result_array();
    }

    public function get_pasien_by_id($id)
    {
        return $this->db->get_where('m_pasien', ['id_pasien' => $id])->row_array();
    }
}
