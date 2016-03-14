<?php
class Applicant extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('applicants_model');
	}

	public function application()
	{
		if ($this->form_validation->run('member_data') === true) {
			$this->applicants_model->saveForm();
			$this->emailSignupnotif();
			redirect('signup/success');
		}

		$data['title'] = 'Sign Up';
		$data['ocivil_disable'] = ($this->input->post('civilstatus') != 'O') ? 'disabled="disabled"' : '';

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

		$data['cnt_children'] = count($this->input->post('cname[]'));
		$data['cnt_edh'] = count($this->input->post('hnameschool[]'));
		$data['cnt_edc'] = count($this->input->post('cnameschool[]'));
		$data['cnt_edg'] = count($this->input->post('gnameschool[]'));
		$data['cnt_edp'] = count($this->input->post('pnameschool[]'));

		load_view_public('header', $data);
		load_view_public('application');
		load_view_public('footer');
	}

	public function checkEmail()
	{
		$num = $this->db->get_where('m_personal', array('email_address' => $this->input->post('emailaddress'), 'membership_id !=' => $this->input->post('memberid')))->num_rows();
		return ($num > 0) ? false : true;
	}

	public function checkBirthdate()
	{
		$month = (trim($this->input->post('bdmonth')) == '') ? 0 : $this->input->post('bdmonth');
		$day = (trim($this->input->post('bdday')) == '') ? 0 : $this->input->post('bdday');
		$year = (trim($this->input->post('bdyear')) == '') ? 0 : $this->input->post('bdyear');

		return checkdate($month, $day, $year);
	}

	public function checkSpousebirthdate()
	{
		$month = (trim($this->input->post('sbdmonth')) == '') ? 0 : $this->input->post('sbdmonth');
		$day = (trim($this->input->post('sbdday')) == '') ? 0 : $this->input->post('sbdday');
		$year = (trim($this->input->post('sbdyear')) == '') ? 0 : $this->input->post('sbdyear');

		return ($month == 0 && $day == 0 && $year == 0) ? true : checkdate($month, $day, $year);
	}

	public function checkMarrieddate()
	{
		$month = (trim($this->input->post('dmmonth')) == '') ? 0 : $this->input->post('dmmonth');
		$day = (trim($this->input->post('dmday')) == '') ? 0 : $this->input->post('dmday');
		$year = (trim($this->input->post('dmyear')) == '') ? 0 : $this->input->post('dmyear');

		return ($month == 0 && $day == 0 && $year == 0) ? true : checkdate($month, $day, $year);
	}

	public function checkOthercivilstatus()
	{
		if (trim($this->input->post('civilstatus')) == 'O') {
			return (!empty(trim($this->input->post('ocivilstatus')))) ? true : false;
		}
	}

	public function emailSignupnotif()
	{
		$this->email->from('signup@gcfnw.org', 'GCF Application Page');
		$this->email->to('rocky.borlaza@southeasterndatacenter.com');
		$this->email->subject('New Application for Membership');
		$this->email->message("There's a new application for membership via website.\nAttached herewith is the application form for reviewing.\n\n- GCF Website");
		$this->email->send();
	}

	public function showSuccess()
	{
		$data['title'] = 'Application Submitted';

		load_view_public('header', $data);
		load_view_public('signup_success');
		load_view_public('footer');
	}
}
