<?php
class Requests extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function showIndex()
	{
		$data['title'] = 'Prayer Requests';
		$data['requests_selected'] = 'nav-selected';

		$this->load->view('header', $data);
		$this->load->view('request');
		$this->load->view('footer');
	}
}
