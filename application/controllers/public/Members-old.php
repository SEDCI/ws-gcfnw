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
			// /**
			// * Personal Information
			// */
			// $last_application = $this->members_model->getLastapplication();
			// $registration_number = (count($last_application) > 0) ? $last_application['registration_number'] + 1 : 1;

			// $personal_info = array(
			// 	'table' => 'm_personal',
			// 	'registration_code' => 'AM'.date('Ym'),
			// 	'registration_number' => $registration_number,
			// 	'last_name' => $this->input->post('lastname'),
			// 	'first_name' => $this->input->post('firstname'),
			// 	'middle_name' => $this->input->post('middlename'),
			// 	'nick_name' => $this->input->post('nickname'),
			// 	'home_address' => $this->input->post('homeaddress'),
			// 	'date_of_birth' => nice_date($this->input->post('bdmonth').'-'.$this->input->post('bdday').'-'.$this->input->post('bdyear'), 'Y-m-d'),
			// 	'place_of_birth' => $this->input->post('placeofbirth'),
			// 	'home_number' => $this->input->post('homenumber'),
			// 	'cellphone' => $this->input->post('cellphone'),
			// 	'email_address' => $this->input->post('emailaddress'),
			// 	'company_office' => $this->input->post('companyoffice'),
			// 	'occupation' => $this->input->post('occupation'),
			// 	'office_number' => $this->input->post('officenumber'),
			// 	'fax' => $this->input->post('fax'),
			// 	'office_email' => $this->input->post('officeemail'),
			// 	'civil_status' => $this->input->post('civilstatus'),
			// 	'civil_status_others' => $this->input->post('ocivilstatus'),
			// 	'date_first_visit' => $this->input->post('datefirstvisit'),
			// 	'invited_by' => $this->input->post('invitedby'),
			// 	's_last_name' => $this->input->post('slastname'),
			// 	's_first_name' => $this->input->post('sfirstname'),
			// 	's_middle_name' => $this->input->post('smiddlename'),
			// 	's_nick_name' => $this->input->post('snickname'),
			// 	'date_married' => nice_date($this->input->post('dmmonth').'-'.$this->input->post('dmday').'-'.$this->input->post('dmyear'), 'Y-m-d'),
			// 	's_birthdate' => nice_date($this->input->post('sbdmonth').'-'.$this->input->post('sbdday').'-'.$this->input->post('sbdyear'), 'Y-m-d'),
			// 	'father_name' => $this->input->post('fathername'),
			// 	'father_age' => $this->input->post('fatherage'),
			// 	'mother_name' => $this->input->post('mothername'),
			// 	'mother_age' => $this->input->post('motherage'),
			// 	'date_received' => $this->input->post('datereceived'),
			// 	'application_type' => $this->input->post('applicationtype'),
			// 	'status' => 'N'
			// );

			// $m_personal_id = $this->members_model->saveForm($personal_info);

			// /**
			// * Children
			// */
			// $cname = $this->input->post('cname');
			// $cbirthday = $this->input->post('cbirthday');

			// for ($c = 0; $c < count($cname); $c++) {
			// 	$children = array(
			// 		'table' => 'm_children',
			// 		'm_personal_id' => $m_personal_id,
			// 		'name' => $cname[$c],
			// 		'birthdate' => nice_date($cbirthday[$c])
			// 	);

			// 	$this->members_model->saveForm($children);
			// }

			// /**
			// * Educational Background
			// */
			// $school_levels_array = array('h', 'c', 'g', 'p');

			// foreach ($school_levels_array as $school_level) {
			// 	$nameschool = $this->input->post($school_level.'nameschool');
			// 	$course = $this->input->post($school_level.'course');
			// 	$incyears = $this->input->post($school_level.'incyears');

			// 	for ($s = 0; $s < count($nameschool); $s++) {
			// 		$education = array(
			// 			'table' => 'm_education',
			// 			'm_personal_id' => $m_personal_id,
			// 			'level' => $school_level,
			// 			'school_name' => $nameschool[$s],
			// 			'course' => $course[$s],
			// 			'inclusive_years' => $incyears[$s]
			// 		);

			// 		$this->members_model->saveForm($education);
			// 	}
			// }

			// /**
			// * Religious Background
			// */
			// $religious = array(
			// 	'table' => 'm_religious',
			// 	'm_personal_id' => $m_personal_id,
			// 	'bg1_when' => nice_date($this->input->post('rel1when')),
			// 	'bg1_where' => $this->input->post('rel1where'),
			// 	'bg1_whom' => $this->input->post('rel1whom'),
			// 	'bg2_yesno' => $this->input->post('rel2yesno'),
			// 	'bg2_when' => nice_date($this->input->post('rel2when')),
			// 	'bg2_where' => $this->input->post('rel2where'),
			// 	'bg2_minister' => $this->input->post('rel2minister'),
			// 	'bg3_church' => $this->input->post('rel3church'),
			// 	'bg3_years' => $this->input->post('rel3years'),
			// 	'bg3_pastor' => $this->input->post('rel3pastor'),
			// 	'bg3_address' => $this->input->post('rel3address'),
			// 	'bg3_telno' => $this->input->post('rel3telno'),
			// 	'bg3_positions' => $this->input->post('rel3positions'),
			// 	'bg4_reasons' => $this->input->post('rel4reasons'),
			// 	'bg5_yesno' => $this->input->post('rel5yesno'),
			// 	'bg5_question' => $this->input->post('rel5question')
			// );

			// $this->members_model->saveForm($religious);

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
}
