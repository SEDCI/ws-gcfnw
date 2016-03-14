<?php
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}

	public function showLogin()
	{
		$data['title'] = 'Login';
		$data['validation_errors'] = $this->session->flashdata('validation_errors');
		$this->unsetSession();

		load_view_admin('auth/login', $data, '', false);
	}

	public function login()
	{
		$this->form_validation->set_rules('adminuser', 'Username', 'trim|required|alpha_numeric|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('adminpass', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() === true):
			$criteria = array(
				'username' => $this->input->post('adminuser'),
				'password' => password_hash($this->input->post('adminpass'), PASSWORD_BCRYPT, array('salt' => GCF_SALT))
			);

			$admin = $this->admin_model->checkAdmin($criteria);

			if ($admin > 0):
				$this->session->set_userdata('adminuser', $this->input->post('adminuser'));
				redirect('admin/dashboard');
			endif;
		endif;

		$this->session->set_flashdata('validation_errors', '<div class="alert alert-danger">Invalid Username or Password.</div>');
		redirect('admin/login');
	}

	public function logout()
	{
		$this->unsetSession();
		redirect('admin/login');
	}

	public function unsetSession()
	{
		if ($this->session->userdata('memberuser') == '') {
			$this->session->sess_destroy();
		} else {
			$this->session->unset_userdata('adminuser');
		}
	}
}
