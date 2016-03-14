<?php
class Members extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->helper('password');
		$this->load->library('email');
		$this->load->model('members_model');
	}

	public function showMembers()
	{
		$data['title'] = 'Members';
		$data['actlnk_members'] = ' class="gcf-active"';
		$data['memmsg'] = $this->session->flashdata('memmsg');

		$criteria = array('status' => 'A');

		$data['memberslist'] = $this->members_model->getMemberslist($criteria);

		load_view_admin('members/memberslist', $data, 'members_nav');
	}

	public function viewMember($membership_id)
	{
		$data['title'] = 'Member Information';
		$data['actlnk_members'] = ' class="gcf-active"';
		$data['membership_id'] = $membership_id;

		$criteria = array('membership_id' => $membership_id);

		$data['memberinfo'] = $this->members_model->getMemberinfo($criteria);

		$civil_status = $data['memberinfo']['personal']['civil_status'];

		switch ($civil_status) {
			case 'S':
				$civil_status = 'Single';
				break;
			case 'M':
				$civil_status = 'Married';
				break;
			default:
				$civil_status = $data['memberinfo']['personal']['civil_status_others'];
		}

		$data['memberinfo']['personal']['civil_status'] = $civil_status;

		load_view_admin('members/memberinfo', $data, 'members_nav');
	}

	public function addMember()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		if ($this->form_validation->run('member_data') === true) {
			$verification_key = $this->members_model->saveMember();

			$email_message = 'Dear '.$this->input->post('firstname').' '.$this->input->post('lastname').",\n\nYou have been added as a member of the Greenhills Christian Fellowship - Northwest.\n\nTo verify your account, please go to the link below:\n\n".base_url('verifyaccount/'.$verification_key)."\n\n\nThank you! God Bless!";

			$this->emailNotif($this->input->post('emailaddress'), 'Membership Verification', $email_message);

			$this->session->set_flashdata('memmsg', '<div class="alert alert-success">A member has been successfully added.</div>');

			redirect('admin/members');
		}

		$data['title'] = 'Add Member';
		$data['actlnk_members'] = ' class="gcf-active"';
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

		load_view_admin('members/membersform', $data, 'members_nav');
	}

	public function editMember($membership_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		if ($this->form_validation->run('member_data') === true) {
			$this->members_model->updateMember();

			$this->session->set_flashdata('memmsg', '<div class="alert alert-success">A member has been successfully updated.</div>');

			redirect('admin/members');
		}

		$data['title'] = 'Edit Member';
		$data['actlnk_members'] = ' class="gcf-active"';
		$data['membership_id'] = $membership_id;

		$criteria = array('membership_id' => $membership_id);

		$data['memberinfo'] = $this->members_model->getMemberinfo($criteria);

		$data['ocivil_disable'] = ($data['memberinfo']['personal']['civil_status'] != 'O') ? 'disabled="disabled"' : '';

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

		load_view_admin('members/editmember', $data, 'members_nav');
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

	public function removeMember($membership_id)
	{
		$this->members_model->archiveMember(array('membership_id' => $membership_id));
		$this->session->set_flashdata('memmsg', '<div class="alert alert-success">A member has been successfully deleted.</div>');
		redirect('admin/members');
	}

	public function emailNotif($recipient, $subject, $message)
	{
		$this->email->from('no-reply@gcfnw.org', 'GCF-no-reply');
		$this->email->to($recipient);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}
}
