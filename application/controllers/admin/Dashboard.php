<?php
class Dashboard extends MY_Controller
{
	private $dashboard_constants;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->helper('visitcounter');
		$this->load->model('members_model');

		/*$this->dashboard_constants = array(
			'title' => 'Dashboard',
			'adminuser' => $this->session->userdata('adminuser')
		);*/
	}

	public function showIndex()
	{
		$members = $this->members_model->getMemberscount(array('status' => 'A'));
		$applicants = $this->members_model->getMemberscount(array('status' => 'N'));

		$data['title'] = 'Dashboard';
		$data['members_count'] = $members['total_count'];
		$data['applicants_count'] = $applicants['total_count'];
		$data['total_visits'] = get_total_visits();
		$data['today_visits'] = get_today_visits();
		$data['monthly_visits'] = get_monthly_visits();;

		load_view_admin('dashboard/index', $data);
	}
}
