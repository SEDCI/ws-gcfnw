<?php
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		//$this->load->helper('url');

		/*print_r($this->router->uri->segments[1]);
		exit;*/

		/*if ($this->router->uri->segments[1] == 'admin' && !in_array($this->router->uri->segments[2], array('login', 'auth'))) {
			if (!$this->session->userdata('adminuser'))	{
				redirect('admin/login');
			}
		}*/

		if ($this->router->uri->segments[1] == 'admin') {
			if (!isset($this->router->uri->segments[2]) || (!in_array($this->router->uri->segments[2], array('login', 'auth')) && !$this->session->userdata('adminuser'))) {
				redirect('admin/login');
			}
		}

	}
}
