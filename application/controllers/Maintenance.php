<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Maintenance';
        $this->load->view('maintenance_view', $data);
    }
}
