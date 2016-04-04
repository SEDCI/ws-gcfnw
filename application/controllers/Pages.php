<?php
class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
	}

	public function showIndex()
	{
		$this->load->model('info_model');

		$data = $this->info_model->getInfo();
		$data['ws'] = $this->info_model->getWorshipservices();

		$data['title'] = $data['title_bar'];

		load_view_public('header', $data);

		if ($this->session->userdata('memberuser') != '')
		{
			$this->load->view('corner');
		}

		load_view_public('index');
	}

	public function showEvents()
	{
		$data['title'] = 'Events';
		$data['events_selected'] = 'nav-selected';

		load_view_public('header', $data);
		load_view_public('events');
		load_view_public('footer');
	}

	public function showRequests()
	{
		$data['title'] = 'Prayer Requests';
		$data['requests_selected'] = 'nav-selected';

		load_view_public('header', $data);
		load_view_public('request');
		load_view_public('footer');
	}

	public function showAbout()
	{
		$this->load->model('info_model');

		$data = $this->info_model->getInfo();

		$data['title'] = 'About Greenhills Christian Fellowship';
		$data['about_selected'] = 'nav-selected';

		load_view_public('header', $data);
		load_view_public('about');
		load_view_public('footer');
	}

	public function showDevotion()
	{
		$this->load->helper('form');
		$this->load->model('weeklymessage_model');

		$data['title'] = 'Weekly Message';
		$data['devotion_selected'] = 'nav-selected';

		$wmessage = $this->weeklymessage_model->getLatestmessage();
		$wmcomments = $this->weeklymessage_model->getAllcomments($wmessage['id']);

		$data['message'] = $wmessage;
		$data['comments'] = $wmcomments;

		load_view_public('header', $data);
		load_view_public('devotion');
	}

	public function postWMcomment()
	{
		if ($this->session->userdata('memberuser') == '') {
			redirect();
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('comment', 'Comment', 'trim|required|max_length[500]');

		if ($this->form_validation->run() === true) {
			$this->load->model('weeklymessage_model');

			$message = $this->weeklymessage_model->getLatestmessage();
			
			$comment_data = array(
				'weekly_message_id' => $message['id'],
				'membership_id' => $this->session->userdata('membershipid'),
				'email_address' => $this->session->userdata('memberuser'),
				'comment' => $this->input->post('comment'),
				'date_commented' => date('Y-m-d H:i:s'),
				'status' => 'A',
				'approved_by' => 'SYSTEM',
				'removed_by' => ''
			);

			$this->weeklymessage_model->saveComment($comment_data);
		}

		redirect('devotion');
	}

	public function sendMessage()
	{
		if(empty($_POST['name']) ||
			empty($_POST['email']) ||
			empty($_POST['phone']) ||
			empty($_POST['message']) ||
			!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				echo "No arguments Provided!";
				return false;
		}

		$name = $_POST['name'];
		$email_address = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];

		$to = 'admin@gcfnw.org';
		$email_subject = "Website Contact Form:  $name";
		$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
		$headers = "From: no-reply@gcfnw.org\n";
		$headers .= "Reply-To: $email_address";
		mail($to,$email_subject,$email_body,$headers);
		return true;
	}
}
