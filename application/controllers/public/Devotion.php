<?php
class Devotion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function showIndex()
	{
		$data['title'] = 'Daily Devotion';
		$data['devotion_selected'] = 'nav-selected';

		$this->load->view('header', $data);
		$this->load->view('devotion');
	}
}
