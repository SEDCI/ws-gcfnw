<?php
class Applicants extends MY_Controller
{
	private $ministries = array(
		'1' => 'Praise and Worship',
		'2' => 'Ushering',
		'3' => 'Sunday School Teacher',
		'4' => 'Sound Tech / Projectionist'
	);

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->helper('password');
		$this->load->library('email');
		$this->load->model('applicants_model');
	}

	public function showApplications()
	{
		$data['title'] = 'Applications for Membership';
		$data['actlnk_applications'] = ' class="gcf-active"';
		$data['appmsg'] = $this->session->flashdata('appmsg');

		$criteria = array('status' => 'N');

		$data['applicationslist'] = $this->applicants_model->getApplicationslist($criteria);

		load_view_admin('members/applicationslist', $data, 'members_nav');
	}

	public function viewApplication($registration_id)
	{
		$data['title'] = 'Applicant Information';
		$data['actlnk_applications'] = ' class="gcf-active"';
		$data['registration_id'] = $registration_id;

		$registration_id = explode('-', $registration_id);

		$criteria = array('registration_code' => $registration_id[0], 'registration_number' => intval($registration_id[1]));

		$data['applicantinfo'] = $this->applicants_model->getApplicantinfo($criteria);

		$data['applicantinfo']['personal']['date_received'] = date('Y-m-d', strtotime($data['applicantinfo']['personal']['date_received']));

		$civil_status = $data['applicantinfo']['personal']['civil_status'];

		switch ($civil_status) {
			case 'S':
				$civil_status = 'Single';
				break;
			case 'M':
				$civil_status = 'Married';
				break;
			default:
				$civil_status = $data['applicantinfo']['personal']['civil_status_others'];
		}

		$data['applicantinfo']['personal']['civil_status'] = $civil_status;

		$data['applicantinfo']['personal']['ministry_involvement'] = $this->getMinistriesStrings($data['applicantinfo']['personal']['ministry_involvement']);

		load_view_admin('members/applicantinfo', $data, 'members_nav');
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

	public function approveApplication($registration_id)
	{
		$this->load->model('users_model');
		$this->load->model('members_model');

		$registration_id = explode('-', $registration_id);
		$criteria = array('registration_code' => $registration_id[0], 'registration_number' => intval($registration_id[1]));

		$fields = array('id', 'email_address', 'first_name', 'last_name');
		$personal = $this->applicants_model->getPersonal($criteria, $fields);

		$last_membership_id = $this->members_model->getNextmembershipid();

		if (!empty($last_membership_id)) {
			$last_membership_id = explode('-', $last_membership_id);
			$membership_id = $last_membership_id[0].'-'.str_pad(intval($last_membership_id[1]) + 1, 5, '0', STR_PAD_LEFT);
		} else {
			$membership_id = 'RM'.date('Ym').'-00001';
		}

		//$password = random_password();

		$user_data = array(
			'm_personal_id' => $personal['id'],
			'email' => $personal['email_address'],
			//'password' => password_hash($password, PASSWORD_BCRYPT, array('salt' => GCF_SALT)),
			'registered_date' => date('Y-m-d H:i:s'),
			'registered_by' => 'SYSTEM',
			'verification_date' => '0000-00-00 00:00:00'
		);

		$this->users_model->saveUser($user_data);

		$verification_key = md5(md5(GCF_SALT.$personal['id'].GCF_SALT.date('Y-m-d H:i:s')));

		$verification_data = array(
			'verification_key' => $verification_key,
			'm_personal_id' => $personal['id'],
			'date_generated' => date('Y-m-d H:i:s'),
			'status' => 'U'
		);

		$this->db->insert('user_verification', $verification_data);

		$membership_data = array(
			'membership_id' => $membership_id,
			'status' => 'A'
		);

		$this->applicants_model->updatePersonal($membership_data, $criteria);

		$email_message = 'Dear '.$personal['first_name'].' '.$personal['last_name'].",\n\nCongratulations! Your application has now been approved.\n\nKindly verify your account by going to the link below:\n\n".base_url('verifyaccount/'.$verification_key)."\n\n\nThank you for joining us! God Bless!";

		$this->emailApprovalnotif($personal['email_address'], $email_message);

		$this->session->set_flashdata('appmsg', '<div class="alert alert-success">An application has been approved.</div>');

		redirect('admin/applications');
	}

	public function rejectApplication($registration_id)
	{
		$registration_id = explode('-', $registration_id);

		$criteria = array('registration_code' => $registration_id[0], 'registration_number' => intval($registration_id[1]));

		$this->applicants_model->updateStatus('R', $criteria);

		$this->session->set_flashdata('appmsg', '<div class="alert alert-success">An application has been rejected.</div>');

		redirect('admin/applications');
	}

	public function emailApprovalnotif($recipient, $message)
	{
		$this->email->from('no-reply@gcfnw.org', 'GCF-no-reply');
		$this->email->to($recipient);
		$this->email->subject('Application Approval');
		$this->email->message($message);
		$this->email->send();
	}
}
