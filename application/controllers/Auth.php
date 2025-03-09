<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_register');
        // if (count($this->db->get_where('users', ['akses' => 1])->result()) == 0) {
        //     redirect('reg');
        // }
    }

    // VIEWS
    public function index()
    {
        $this->data['title'] = 'Login';
        $this->template->load('template/auth/template', 'auth/login', $this->data);
    }

    public function register()
    {
        $this->data['title'] = 'Regsiter';
        $this->template->load('template/auth/template', 'auth/register', $this->data);
    }

    // PROSES
    public function ProsesLogin()
    {
        $this->data['username'] = $this->input->post('username');
        $this->data['password'] = $this->input->post('password');

        $getUser = $this->M_login->getUser($this->data['username']);

        // kondisi ketika login

        if (count($getUser) == 1) {
            if (password_verify($this->data['password'], $getUser[0]->password)) {

                $dataSession = array(
                    "id_user"  => $getUser[0]->id_user,
                    "username"  => $getUser[0]->username,
                    "is_role"   => $getUser[0]->is_role,
                    "is_active"   => $getUser[0]->is_active,
                    "is_Loggin" => true
                    // true = 1
                );
                $this->session->set_userdata($dataSession);

                if ($getUser[0]->is_active == 1) {
                    if ($getUser[0]->is_role == 1) {
                        redirect('users/superadmin');
                    } elseif ($getUser[0]->is_role == 2) {
                        redirect('users/admin');
                    } elseif ($getUser[0]->is_role == 3) {
                        redirect('users/perawat');
                    } elseif ($getUser[0]->is_role == 4) {
                        redirect('users/farmasi');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Akun Belum Aktif. Silahkan hubungi administrator!');
                    $this->session->set_flashdata('pesan', "
                    <script>
                       Swal.fire({
                            icon: 'error',
                            title: 'Oops..!',
                            text: 'Akun Belum Aktif. Silahkan hubungi administrator!',
                            })
                    </script>
                    ");
                    redirect('/');
                }
            } else {
                $data['title'] = 'Login';
                $this->session->set_flashdata('pesan', "
                <script>
                   Swal.fire({
                        icon: 'error',
                        title: 'Oops..!',
                        text: 'Password Salah!',
                        })
                </script>
                ");
                redirect('/');
            }
        } elseif (count($getUser) == 0) {
            $data['title'] = 'Login';
            $this->session->set_flashdata('pesan', "
            <script>
               Swal.fire({
                    icon: 'error',
                    title: 'Oops..!',
                    text: 'Akun Tidak ditemukan!',
                    })
            </script>
            ");
            redirect('/');
        } else {
            $this->session->set_flashdata('pesan', "
            <script>
               Swal.fire({
                    icon: 'error',
                    title: 'Oops..!',
                    text: 'Username Tidak ditemukan!',
                    })
            </script>
            ");
            redirect('/');
        }
    }

    public function submitRegister()
    {
        // Rules
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_user.username]', [
            'is_unique' => 'Username Sudah digunakan!'
        ]);

        if ($this->form_validation->run() == false) {
            redirect('auth/register');
        } else {
            $data['username']       = $this->input->post('username');
            $password               = $this->input->post('password1');
            $password2              = $this->input->post('password2');
            $data['is_role']        = 1; //1 > SUPERADMIN | 2 > ADMIN | 3 > PERAWAT | 4 > FARMASI 
            $data['is_active']      = 0;
            $data['created_at']     = date('Y-m-d H:i:s');

            // validasi
            if ($password == $password2) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
                $this->M_register->insertUser($data);
                $this->session->set_flashdata('pesan', "
                    <script>
                    Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Anda Berhasil Mendaftar.',
                            })
                    </script>
                    ");
                redirect('/');
            } else {
                $this->session->set_flashdata('pesan', "
                    <script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Ooppss...!',
                            text: 'Password tidak sama!',
                            })
                    </script>
                    ");
                redirect('auth/register');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('id_users');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('is_role');
        $this->session->unset_userdata('is_Loggin');
        redirect('/');
    }
}
