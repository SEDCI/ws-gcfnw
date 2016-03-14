<?php
class Members extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('members_model');
	}

	public function application()
	{
		if ($this->form_validation->run('member_data') === true) {
			$this->members_model->saveForm();
			//$this->emailSignupnotif();
			redirect('signup/success');
		}

		$data['title'] = 'Sign Up';

		$data['months'] = array(
			' ' => 'Month',
			'1' => 'January',
			'2' => 'February',
			'3' => 'March',
			'4' => 'April',
			'5' => 'May',
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
		);

		load_view_public('header', $data);
		load_view_public('application');
		load_view_public('footer');
	}

	public function checkDate()
	{
		$month = (trim($this->input->post('bdmonth')) == '') ? 0 : $this->input->post('bdmonth');
		$day = (trim($this->input->post('bdday')) == '') ? 0 : $this->input->post('bdday');
		$year = (trim($this->input->post('bdyear')) == '') ? 0 : $this->input->post('bdyear');

		return checkdate($month, $day, $year);
	}

	public function emailSignupnotif()
	{
		$this->email->from('signup@gcf.org.ph', 'GCF Application Page');
		$this->email->to('rocky.borlaza@southeasterndatacenter.com');
		$this->email->subject('New Application for Membership');
		$this->email->message("There's a new application for membership via website.\nAttached herewith is the application form for reviewing.\n\n- GCF Website");
	}

	public function showSuccess()
	{
		$data['title'] = 'Application Submitted';

		load_view_public('header', $data);
		load_view_public('signup_success');
		load_view_public('footer');
	}

	public function showApplications()
	{
		$data['title'] = 'Applications for Membership';

		$criteria = array('status' => 'N');

		$data['applicationslist'] = $this->members_model->getApplicationslist($criteria);

		load_view_admin('applications', $data);
	}
}
