<?php
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function showIndex()
	{
		$data['title'] = 'Know Christ and Make Him Known';

		$this->load->view('header', $data);

		if ($this->session->userdata('memberuser') != '')
		{
			$this->load->view('corner');
		}

		$this->load->view('index');
	}
}
