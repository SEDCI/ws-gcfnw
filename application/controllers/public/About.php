<?php
class About extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function showIndex()
	{
		$data['title'] = 'About Greenhills Christian Fellowship';
		$data['about_selected'] = 'nav-selected';

		$this->load->view('header', $data);
		$this->load->view('about');
		$this->load->view('footer');
	}
}
