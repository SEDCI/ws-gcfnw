<?php
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('users_model');
		$this->load->model('verification_model');
	}

	public function showLogin()
	{
		$data['title'] = 'Log In';
		$data['validation_errors'] = $this->session->flashdata('validation_errors');

		load_view_public('header', $data);
		load_view_public('login');
		load_view_public('footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('useremail', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('userpass', 'Password', 'trim|required');

		if ($this->form_validation->run() === true) {
			$criteria = array(
				'email' => $this->input->post('useremail'),
				'password' => password_hash($this->input->post('userpass'), PASSWORD_BCRYPT, array('salt' => GCF_SALT)),
				'a.status' => 'A',
				'b.status' => 'A'
			);

			$user = $this->users_model->getUser($criteria);

			if (!empty($user)) {
				$userdata = array(
					'memberid' => $user['m_personal_id'],
					'memberuser' => $this->input->post('useremail'),
					'membershipid' => $user['membership_id'],
					'firstname' => $user['first_name'],
					'middlename' => $user['middle_name'],
					'lastname' => $user['last_name'],
					'level' => $user['level']
				);

				$this->session->set_userdata($userdata);

				redirect();
			}
		}

		$this->session->set_flashdata('validation_errors', '<div class="alert alert-danger">Invalid E-mail or Password.</div>');
		redirect('login');
	}

	public function logout()
	{
		if ($this->session->userdata('adminuser') == '') {
			$this->session->sess_destroy();
		} else {
			$userdata = array(
				'memberuser',
				'membershipid',
				'firstname',
				'middlename',
				'lastname'
			);

			$this->session->unset_userdata($userdata);
		}

		redirect();
	}

	public function showVerification($verification_key)
	{
		$verification_data = $this->verification_model->getVerificationdata($verification_key);

		if (!$verification_data) {
			show_404();
		}

		$data['title'] = 'Verify Account';
		$data['validation_errors'] = $this->session->flashdata('validation_errors');
		$data['email'] = $verification_data['email'];
		$data['verification_key'] = $verification_key;

		load_view_public('header', $data);
		load_view_public('verifyaccount');
		load_view_public('footer');
	}

	public function verifyAccount()
	{
		$verification_key = $this->input->post('vkey');

		$this->form_validation->set_rules('nuserpass', 'New Password', 'trim|required|min_length[8]|matches[cnuserpass]');
		$this->form_validation->set_rules('cnuserpass', 'Confirm New Password', 'trim|required');

		if ($this->form_validation->run() === true) {
			$verification_data = $this->verification_model->getVerificationdata($verification_key);

			if ($verification_data) {
				$user_data = array(
					'password' => password_hash($this->input->post('nuserpass'), PASSWORD_BCRYPT, array('salt' => GCF_SALT)),
					'verification_date' => date('Y-m-d H:i:s')
				);

				$this->users_model->updateUser($user_data, array('m_personal_id' => $verification_data['m_personal_id']));

				$this->verification_model->updateVerificationstatus($verification_key);

				$this->session->set_flashdata('verifysuccess', 'true');
				redirect('verifyaccount/success');
			}
		}

		$this->session->set_flashdata('validation_errors', '<div class="alert alert-danger">'.validation_errors().'</div>');
		redirect('verifyaccount/'.$verification_key);
	}

	public function showVerificationsuccess()
	{
		if ($this->session->flashdata('verifysuccess') == 'true') {
			$data['title'] = 'Verify Account';

			load_view_public('header', $data);
			load_view_public('verifysuccess');
			load_view_public('footer');
		} else {
			redirect();
		}
	}}
