<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_superadmin extends CI_Model
{

    // private $instance_id = ""; // Ganti dengan INSTANCE_ID UltraMsg Anda
    // private $api_token = ""; // Ganti dengan API TOKEN UltraMsg Anda

    // public function kirim_pesan($nomor, $pesan)
    // {
    //     $api_url = "https://api.ultramsg.com/" . $this->instance_id . "/messages/chat";

    //     $data = [
    //         'token' => $this->api_token,
    //         'to'    => $nomor,
    //         'body'  => $pesan
    //     ];

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $api_url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     return json_decode($response, true);
    // }

    public function simpan_log_WhatsApp($nomor, $pesan, $user_id, $username, $is_role)
    {
        $data = [
            'nomor_pasien' => $nomor,
            'pesan_whatsapp' => $pesan,
            'username_pengirim' => $username,
            'id_user' => $user_id,
            'is_role' => $is_role,
        ];
        $insert = $this->db->insert('log_sendwhatsapp', $data);

        if (!$insert) {
            log_message('error', 'Gagal insert ke database: ' . json_encode($this->db->error()));
            return false;
        }
        return true;
    }

    public function get_log_WhatsApp()
    {
        return $this->db->select('*')
            ->from('log_sendwhatsapp')
            ->order_by('tgl_kirim', 'DESC')
            ->get()
            ->result_array();
    }

    function getuser($session)
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
        $this->db->from('m_pasien');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function insertStatus($data, $users)
    {
        $this->db->insert('m_status', $data);
        $status_id = $this->db->insert_id();

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

    public function get_all_status()
    {
        $this->db->select('m_status.id_status, m_status.nama_status, m_status.pesan_status, GROUP_CONCAT(tbl_user.username SEPARATOR ", ") as pengguna_status');
        $this->db->from('status_user');
        $this->db->join('m_status', 'status_user.id_status = m_status.id_status');
        $this->db->join('tbl_user', 'status_user.id_user = tbl_user.id_user');
        $this->db->group_by('m_status.id_status');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_users_by_status($id_status)
    {
        $this->db->select('status_user.id_user, tbl_user.username');
        $this->db->from('status_user');
        $this->db->join('tbl_user', 'tbl_user.id_user = status_user.id_user', 'left');
        $this->db->where('status_user.id_status', $id_status);
        return $this->db->get()->result_array();
    }

    // Update status berdasarkan ID
    public function update_status($id_status, $status_data, $user_ids)
    {
        // Update tabel m_status
        $this->db->where('id_status', $id_status);
        $this->db->update('m_status', $status_data);

        // Hapus semua pengguna terkait sebelumnya
        $this->db->where('id_status', $id_status);
        $this->db->delete('status_user');

        // Tambahkan pengguna baru yang dipilih
        foreach ($user_ids as $id_user) {
            $this->db->insert('status_user', ['id_status' => $id_status, 'id_user' => $id_user]);
        }

        return true;
    }

    public function delete_status_user($id_status)
    {
        $this->db->where('id_status', $id_status);
        $this->db->delete('status_user');
    }

    public function delete_status($id_status)
    {
        $this->db->where('id_status', $id_status);
        $this->db->delete('m_status');
    }
}
