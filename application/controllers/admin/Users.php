<?php
class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->helper('password');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('users_model');
	}

	public function showUsers()
	{
		$data['title'] = 'Users';
		$data['actlnk_users'] = ' class="gcf-active"';
		$data['usermsg'] = $this->session->flashdata('usermsg');

		$criteria = array(
			//'a.status !=' => 'R',
			'b.status !=' => 'D'
		);

		$data['userslist'] = $this->users_model->getUsers($criteria);

		load_view_admin('users/userslist', $data, 'accounts_nav');
	}

	public function viewUser($id)
	{
		$data['title'] = 'User Information';
		$data['actlnk_users'] = ' class="gcf-active"';
		$data['id'] = $id;

		$criteria = array(
			'a.id' => $id,
			'a.status !=' => 'R'
		);

		$data['user'] = $this->users_model->getUser($criteria);

		$data['user']['level'] = ($data['user']['level'] == 1) ? 'Pastor' : 'Member';

		$data['user']['status'] = ($data['user']['status'] == 'A') ? 'Active' : 'Inactive';

		load_view_admin('users/userview', $data, 'accounts_nav');
	}

	public function editUser($id)
	{
		$data['title'] = 'Edit User';
		$data['actlnk_users'] = ' class="gcf-active"';
		$data['id'] = $id;

		$criteria = array(
			'a.id' => $id,
			'a.status !=' => 'R'
		);

		$data['user'] = $this->users_model->getUser($criteria);

		if ($this->input->post()) {
			$this->form_validation->set_rules('ulvl', 'Level', 'trim|required|max_length[1]|numeric');
			$this->form_validation->set_rules('ustat', 'Status', 'trim|max_length[1]');

			if ($this->form_validation->run() === true) {
				$user_data = array(
					'level' => $this->input->post('ulvl'),
					'status' => ($this->input->post('ustat')) ? 'A' : 'I'
				);

				$this->users_model->updateUser($user_data, array('id' => $id));

				$this->session->set_flashdata('usermsg', '<div class="alert alert-success">A user has been successfully updated.</div>');

				redirect('admin/users');
			}
		}

		load_view_admin('users/useredit', $data, 'accounts_nav');
	}

	public function getMinistriesStrings($ids)
	{
		if (!empty($ids)) {
			$ids = explode(',', $ids);

			foreach ($ids as $id) {
				$ministries[] = $this->ministries[$id];
			}

			return implode(', ', $ministries);
		}

		return '';
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

		$data['memberinfo']['personal']['date_received'] = date('Y-m-d', strtotime($data['memberinfo']['personal']['date_received']));

		$data['ocivil_disable'] = ($data['memberinfo']['personal']['civil_status'] != 'O') ? 'disabled="disabled"' : '';

		$data['ministries'] = $this->ministries;

		$data['ministry_involvement'] = explode(',', $data['memberinfo']['personal']['ministry_involvement']);

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
