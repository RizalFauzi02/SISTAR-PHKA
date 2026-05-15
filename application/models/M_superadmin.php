<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_superadmin extends CI_Model
{

    private $instance_id = "instance113372"; // Ganti dengan INSTANCE_ID UltraMsg Anda
    private $api_token = "y5pyygjgtuegum21"; // Ganti dengan API TOKEN UltraMsg Anda

    public function kirim_pesan_otomatis($nomor, $pesan)
    {
        $api_url = "https://api.ultramsg.com/" . $this->instance_id . "/messages/chat";

        $data = [
            'token' => $this->api_token,
            'to'    => $nomor,
            'body'  => $pesan
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    // Fungsi untuk mengambil status pesan dari UltraMsg

    public function get_status_pesan($limit = 20, $status = '')
    {
        $api_url = "https://api.ultramsg.com/" . $this->instance_id . "/messages?token=" . $this->api_token . "&limit=" . $limit;

        if (!empty($status)) {
            $api_url .= "&status=" . urlencode($status);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        // Perhatikan bahwa data pesan ada di kunci 'messages'
        return $result['messages'] ?? [];
    }




    // Fungsi untuk menyimpan log WhatsApp
    public function simpan_log_WhatsApp($nomor, $pesan, $user_id, $username, $id_pasien, $id_status)
    {
        date_default_timezone_set('Asia/Jakarta'); // Set timezone ke WIB

        $data = [
            'nomor_pasien'       => $nomor,
            'pesan_whatsapp'     => $pesan,
            'username_pengirim'  => $username,
            'id_user'            => $user_id,
            'id_pasien'          => $id_pasien,
            'id_status'          => $id_status,
            'tgl_kirim'          => date('Y-m-d H:i:s'), // Tambahkan waktu kirim sesuai WIB
        ];

        $insert = $this->db->insert('log_sendwhatsapp', $data);

        if (!$insert) {
            log_message('error', 'Gagal insert ke database: ' . json_encode($this->db->error()));
            return false;
        }
        return true;
    }


    // Fungsi untuk mengupdate kamar pasien
    public function update_kamar($id_pasien, $kamar)
    {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->update('m_pasien', ['kamar' => $kamar]);
    }

    public function get_log_WhatsApp()
    {
        return $this->db->select('log_sendwhatsapp.*, m_pasien.nama_pasien, m_pasien.tanggal_lahir, m_pasien.kamar, m_status.nama_status')
            ->from('log_sendwhatsapp')
            ->join('m_pasien', 'm_pasien.id_pasien = log_sendwhatsapp.id_pasien', 'inner')
            ->join('m_status', 'm_status.id_status = log_sendwhatsapp.id_status', 'inner')
            ->order_by('log_sendwhatsapp.tgl_kirim', 'DESC')
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
        $this->db->select('id_pasien, nama_pasien, tanggal_lahir, jaminan, no_whatsapp, created_at, updated_at');
        $this->db->from('m_pasien');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pasien()
    {
        return $this->db->select('m_pasien.*') // Ambil semua field dari tabel m_pasien
            ->from('m_pasien')
            ->order_by('m_pasien.created_at', 'DESC') // Urutkan berdasarkan created_at terbaru
            ->get()
            ->result_array();
    }

    public function get_pasien_nullKamar()
    {
        return $this->db->select('m_pasien.*')
            ->from('m_pasien')
            ->group_start()                       // buka grup kondisi
            ->where('m_pasien.kamar IS NULL') // kondisi null
            ->or_where('m_pasien.kamar', '')  // kondisi string kosong
            ->group_end()                         // tutup grup kondisi
            ->order_by('m_pasien.created_at', 'DESC')
            ->get()
            ->result_array();
    }


    public function get_total_pasien()
    {
        return $this->db->count_all('m_pasien');
    }

    public function get_total_log()
    {
        return $this->db->count_all('log_sendwhatsapp');
    }

    public function update_user($id_user, $username, $is_role, $password = null)
    {
        $data = [
            'username' => $username,
            'is_role' => $is_role,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->db->where('id_user', $id_user);
        return $this->db->update('tbl_user', $data);
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
        $this->db->select('m_status.nama_status, m_status.id_status, m_status.pesan_status, m_status.jaminan, tbl_user.username');
        $this->db->from('m_status');
        $this->db->join('status_user', 'status_user.id_status = m_status.id_status');
        $this->db->join('tbl_user', 'tbl_user.id_user = status_user.id_user');
        $this->db->where('tbl_user.is_role', $role); // Sesuaikan dengan role
        return $this->db->get()->result_array();
    }

    public function getStatusByUsername($username)
    {
        $this->db->select('m_status.nama_status, m_status.id_status, m_status.pesan_status, tbl_user.username');
        $this->db->from('m_status');
        $this->db->join('status_user', 'status_user.id_status = m_status.id_status');
        $this->db->join('tbl_user', 'tbl_user.id_user = status_user.id_user');
        $this->db->where('tbl_user.username', $username); // Menggunakan username sebagai filter
        return $this->db->get()->result_array();
    }

    public function get_all_status()
    {
        $this->db->select('m_status.id_status, m_status.nama_status, m_status.pesan_status, m_status.jaminan, GROUP_CONCAT(tbl_user.username SEPARATOR ", ") as pengguna_status');
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

    public function update_pasien($id_pasien, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->db->where('id_pasien', $id_pasien);
        return $this->db->update('m_pasien', $data);
    }

    public function delete_pasien($id)
    {
        $this->db->where('id_pasien', $id);
        return $this->db->delete('m_pasien');
    }

    public function cekNomorWhatsApp($no_whatsapp)
    {
        return $this->db->get_where('m_pasien', ['no_whatsapp' => $no_whatsapp])->row_array();
    }

    public function check_username_exists($username, $exclude_user_id = NULL)
    {
        // Membuat query untuk memeriksa apakah username sudah ada
        $this->db->where('username', $username);

        // Jika ada user yang ingin dikecualikan (misalnya saat update user), tambahkan kondisi untuk mengecualikan ID tersebut
        if ($exclude_user_id) {
            $this->db->where('id_user !=', $exclude_user_id);
        }

        $query = $this->db->get('tbl_user'); // Ganti 'users' dengan nama tabel yang sesuai
        if ($query->num_rows() > 0) {
            return true; // Username sudah ada
        }
        return false; // Username belum ada
    }

    public function delete_log_wa_all()
    {
        $this->db->empty_table('log_sendwhatsapp');
    }

    public function delete_log_wa_by_date($dari, $sampai)
    {
        $from = date('Y-m-d', strtotime($dari));
        $to = date('Y-m-d', strtotime($sampai));

        $this->db->where('DATE(tgl_kirim) >=', $from);
        $this->db->where('DATE(tgl_kirim) <=', $to);
        $this->db->delete('log_sendwhatsapp');
    }

    public function delete_dat_pasien_all()
    {
        $this->db->empty_table('m_pasien');
    }

    public function delete_dat_pasien_by_date($dari, $sampai)
    {
        $from = date('Y-m-d', strtotime($dari));
        $to = date('Y-m-d', strtotime($sampai));

        $this->db->where('DATE(created_at) >=', $from);
        $this->db->where('DATE(created_at) <=', $to);
        $this->db->delete('m_pasien');
    }

    // laporan
    public function get_all_pasien_lap()
    {
        return $this->db->get('m_pasien')->result();
    }

    public function get_pasien_by_date($start_date, $end_date)
    {
        $this->db->select('*');
        $this->db->from('m_pasien');
        $this->db->where('DATE(created_at) >=', $start_date);
        $this->db->where('DATE(created_at) <=', $end_date);
        return $this->db->get()->result_array();
    }

    public function get_log_by_date($start_datetime, $end_datetime)
    {
        return $this->db->select('log_sendwhatsapp.*, m_pasien.nama_pasien, m_pasien.tanggal_lahir, m_pasien.kamar, m_pasien.jaminan, m_status.nama_status')
            ->from('log_sendwhatsapp')
            ->join('m_pasien', 'm_pasien.id_pasien = log_sendwhatsapp.id_pasien', 'inner')
            ->join('m_status', 'm_status.id_status = log_sendwhatsapp.id_status', 'inner')
            ->where('DATE(log_sendwhatsapp.tgl_kirim) >=', $start_datetime)
            ->where('DATE(log_sendwhatsapp.tgl_kirim) <=', $end_datetime)
            ->order_by('log_sendwhatsapp.tgl_kirim', 'DESC')
            ->get()
            ->result_array();
    }

    public function getSiteConfig()
    {
        return $this->db->get('site_config')->row_array();
    }

    public function updateMaintenance($data)
    {
        return $this->db->update('site_config', $data);
    }

    // end
}
