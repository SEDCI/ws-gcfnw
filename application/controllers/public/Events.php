<?php
class Events extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function showIndex()
	{
		$data['title'] = 'Events';
		$data['events_selected'] = 'nav-selected';

		$this->load->view('header', $data);
		$this->load->view('events');
		$this->load->view('footer');
	}
}
