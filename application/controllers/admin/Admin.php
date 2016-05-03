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

	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['actlnk_changepass'] = ' class="gcf-active"';
		$data['adminmsg'] = '';

		$this->form_validation->set_rules('opass', 'Current Password', 'trim|required|callback_checkOldPassword');
		$this->form_validation->set_rules('npass', 'New Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'trim|required|matches[npass]');

		if ($this->input->post()) {
			if ($this->form_validation->run() == true) {
				$admin_data['password'] = password_hash($this->input->post('npass'), PASSWORD_BCRYPT, array('salt' => GCF_SALT));

				$options = array(
					'where' => array('username' => $this->session->userdata('adminuser'))
				);

				$this->admin_model->updateAdmin($admin_data, $options);

				//$this->session->set_flashdata('adminmsg', '<div class="alert alert-success">You have successfully changed your password.</div>');
				$data['adminmsg'] = '<div class="alert alert-success">You have successfully changed your password.</div>';
			} else {
				$data['adminmsg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		load_view_admin('changepass', $data, 'admin_nav');
	}

	public function checkOldPassword($opass)
	{
		$criteria = array(
			'username' => $this->session->userdata('adminuser'),
			'password' => password_hash($opass, PASSWORD_BCRYPT, array('salt' => GCF_SALT))
		);

		$admin = $this->admin_model->checkAdmin($criteria);

		if ($admin > 0):
			return true;
		endif;

		$this->form_validation->set_message('checkOldPassword', 'The %s field is invalid.');
		return false;
	}
}
