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
		$data['title'] = 'Know Christ and Make Him Known';

		load_view_public('header', $data);

		if ($this->session->userdata('memberuser') != '')
		{
			$this->load->view('corner');
		}

		load_view_public('index');
	}

	public function showEvents($from = '', $to = '')
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
		$data['title'] = 'About Greenhills Christian Fellowship';
		$data['about_selected'] = 'nav-selected';

		load_view_public('header', $data);
		load_view_public('about');
		load_view_public('footer');
	}

	public function showDevotion()
	{
		$data['title'] = 'Daily Devotion';
		$data['devotion_selected'] = 'nav-selected';

		load_view_public('header', $data);
		load_view_public('devotion');
	}
}
