<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_superadmin extends CI_Model
{
    function getProfile($session)
    {
        $data = $this->db->query("SELECT * 
                                    FROM tbl_user
                                    WHERE username = '$session'");
        return $data;
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }

    public function get_all_pasien()
    {
        $this->db->select('id_pasien, nama_pasien, tanggal_lahir, no_whatsapp, created_at');
        $this->db->from('m_pasien'); // Pastikan tabel ini benar
        $query = $this->db->get();
        return $query->result_array(); // Pastikan menggunakan result_array()
    }


    public function insertStatus($data, $users)
    {
        // Simpan status ke tabel m_status
        $this->db->insert('m_status', $data);
        $status_id = $this->db->insert_id(); // Ambil ID status yang baru disimpan

        // Simpan hubungan status dengan banyak user (many-to-many)
        if (!empty($users)) {
            foreach ($users as $user_id) {
                $this->db->insert('status_user', [
                    'id_status' => $status_id,
                    'id_user' => $user_id
                ]);
            }
        }

        return $status_id;
    }

    public function insert_akun($data)
    {
        return $this->db->insert('tbl_user', $data);
    }

    public function update_isActive($id_user, $is_active, $updated)
    {
        $this->db->set('is_active', $is_active);
        $this->db->set('updated_at', $updated);
        $this->db->where('id_user', $id_user);
        return $this->db->update('tbl_user');
    }

    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->delete('tbl_user');
    }

    public function getUserRole($id_user)
    {
        $this->db->select('is_role');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        $result = $query->row_array();

        return $result ? $result['is_role'] : null; // Kembalikan role user atau NULL jika tidak ditemukan
    }

    public function getStatusByRole($role)
    {
        $this->db->select('m_status.nama_status, m_status.pesan_status, tbl_user.username');
        $this->db->from('m_status');
        $this->db->join('status_user', 'status_user.id_status = m_status.id_status');
        $this->db->join('tbl_user', 'tbl_user.id_user = status_user.id_user');
        $this->db->where('tbl_user.is_role', $role); // Sesuaikan dengan role
        return $this->db->get()->result_array();
    }
}
