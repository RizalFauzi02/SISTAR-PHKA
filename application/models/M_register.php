<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_register extends CI_Model
{
    public $table = 'tbl_user';
    public $id = 'id_users';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // Insert user baru
    function insertUser($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
}
