<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	function forgotPassword()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required');

			if ($this->form_validation->run() == TRUE) {
				$email  = $this->input->post('email');
				$validateEmail = $this->M_login->validateEmail($email);
				if ($validateEmail != false) {
					$row = $validateEmail;
					$id_users = $row->id_users;

					$string = time() . $id_users . $email;
					$hash_string = password_hash($string, PASSWORD_BCRYPT);
					$currentDate = date('Y-m-d H:i');
					$hash_expiry = date('Y-m-d H:i', strtotime($currentDate . ' + 1 days'));
					$data = array(
						'hash_key' => $hash_string,
						'hash_expiry' => $hash_expiry,
					);

					// $resetLink = base_url() . 'reset/password?hash=' . $hash_string;
					// <a href="" class="btn btn-primary btn-sm">Reset Password!</a>
					$message = '<p>Link Reset Password disini: <a href="' . base_url() . 'auth/reset?hash=' . $hash_string . '" style="text-decoration:none"><button>Reset Password</button></a></p>
                				<p><b>Akses Link Reset Password sampai:</b> ' . $hash_expiry . ' </p>';
					$subject = "Link Reset Password - Pijetin";
					$sentStatus = $this->sendEmail($email, $subject, $message);
					if ($sentStatus == true) {
						$this->M_login->updatePasswordhash($data, $email);
						$this->session->set_flashdata('success', 'Silahkan Check Email Anda!');
						$this->session->set_flashdata('pesan', "
                        <script>
                        Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Link Reset Password berhasil terkirim!',
                                })
                        </script>
                        ");
						redirect('auth/forgot');
					} else {
						$this->session->set_flashdata('error', 'Gagal Kirim Email!');
						$this->session->set_flashdata('pesan', "
                        <script>
                        Swal.fire({
                                icon: 'error',
                                title: 'Ooppss...!',
                                text: 'Gagal Kirim Email!',
                                })
                        </script>
                        ");
						redirect('auth/forgot');
					}
				} else {
					$this->session->set_flashdata('error', 'Email tidak ditemukan!');
					$this->session->set_flashdata('pesan', "
					<script>
					Swal.fire({
							icon: 'error',
							title: 'Ooppss...!',
							text: 'Email tidak ditemukan!',
							})
					</script>
					");
					redirect('auth/forgot');
				}
			} else {
				// $this->load->view('forgot_password');
				redirect('auth/forgot');
			}
		} else {
			redirect('auth/forgot');
			// $this->load->view('forgot_password');
		}
	}

	/*user this email sending code */

	public function sendEmail($email, $subject, $message)
	{
		/*This email configuration for sending email by Google Email(Gmail Acccount) from localhost */
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',

			'smtp_port' => 465,
			'smtp_user' => 'pijetiin@gmail.com',  //gmail id
			'smtp_pass' => 'rahasia12345',   //gmail password

			'mailtype' => 'html',
			// 'charset' => 'iso-8859-1',
			// 'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('noreply');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}

	function resetPassword()
	{
		if ($this->input->get('hash')) {
			$hash = $this->input->get('hash');
			$this->data['hash'] = $hash;
			$getHashDetails = $this->M_login->getHahsDetails($hash);
			if ($getHashDetails != false) {
				$hash_expiry = $getHashDetails->hash_expiry;
				$currentDate = date('Y-m-d H:i');
				if ($currentDate < $hash_expiry) {
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						// $this->form_validation->set_rules('currentPassword','Current Password','required');
						$this->form_validation->set_rules('password', 'New Password', 'required');
						$this->form_validation->set_rules('cpassword', 'Confirm New Password', 'required|matches[password]');
						if ($this->form_validation->run() == TRUE) {
							// $currentPassword = sha1($this->input->post('currentPassword'));
							$newPassword = $this->input->post('password');

							$validateHashString = $this->M_login->validateHashString($hash);
							if ($validateHashString != false) {
								$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
								$data = array(
									'password' => $newPassword,
									'hash_key' => null,
									'hash_expiry' => null
								);
								$this->M_login->updateNewPassword($data, $hash);
								$this->session->set_flashdata('success', 'Password Berhasil di Reset. Silahkan Login!');
								$this->session->set_flashdata('pesan', "
								<script>
								Swal.fire({
										icon: 'success',
										title: 'Berhasil!',
										text: 'Password berhasil di Reset!',
										})
								</script>
								");
								redirect('/');
							} else {
								$this->session->set_flashdata('error', 'Token Error! Kirim ulang.');
								$this->session->set_flashdata('pesan', "
								<script>
								Swal.fire({
										icon: 'error',
										title: 'Ooppss...!',
										text: 'Email tidak ditemukan!',
										})
								</script>
								");
								redirect('auth/forgot');
							}
						} else {
							redirect('auth/forgot');
							// $this->load->view('reset_password', $this->data);
						}
					} else {
						redirect('auth/forgot');
						// $this->load->view('reset_password', $this->data);
					}
				} else {
					$this->session->set_flashdata('error', 'Link sudah tidak berlaku. Silahkan kirim ulang reset password terbaru!');
					redirect('auth/forgot');
					// redirect(base_url('login/forgotPassword'));
				}
			} else {
				// echo 'invalid link';
				$this->session->set_flashdata('error', 'Link tidak valid!');
				exit;
			}
		} else {
			redirect('auth/forgot');
			// redirect(base_url('login/forgotPassword'));
		}
	}
}
