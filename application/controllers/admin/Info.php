<?php
class Info extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('loadview');
		$this->load->library('form_validation');
		$this->load->model('info_model');
	}

	public function setData()
	{
		$data['title'] = 'Information';
		$data['actlnk_info'] = ' class="gcf-active"';
		$data['infomsg'] = $this->session->flashdata('infomsg');

		$data['info'] = $this->info_model->getInfo();
		$data['worship_services'] = $this->info_model->getWorshipservices();

		return $data;
	}

	public function viewInfo()
	{
		$data = $this->setData();

		load_view_admin('info/viewinfo', $data, 'pages_nav');
	}

	public function editInfo()
	{
		$data = $this->setData();

		if ($this->input->post()) {
			$this->form_validation->set_rules('titletxt', 'Text', 'trim|max_length[200]|alpha_numeric_spaces');
			$this->form_validation->set_rules('hdrtxt1', 'Header Text 1', 'trim|max_length[50]|alpha_numeric_spaces');
			$this->form_validation->set_rules('hdrtxt2', 'Header Text 2', 'trim|max_length[50]|alpha_numeric_spaces');
			$this->form_validation->set_rules('hdrsubtxt', 'Header Sub-Text', 'trim|max_length[100]');
			$this->form_validation->set_rules('mssn', 'Mission', 'trim|required|max_length[500]');
			$this->form_validation->set_rules('vsn', 'Vision', 'trim|required|max_length[500]');
			$this->form_validation->set_rules('wsheader', 'Worship Services Header', 'trim|max_length[1000]');
			$this->form_validation->set_rules('abouttxt', 'Text', 'trim|max_length[1000]');
			$this->form_validation->set_rules('corevalues', 'Core Values', 'trim|max_length[500]');
			$this->form_validation->set_rules('pastoral', 'Pastoral Team', 'trim|max_length[500]');
			$this->form_validation->set_rules('elders', 'Board of Elders', 'trim|max_length[500]');
			$this->form_validation->set_rules('deacons', 'Board of Deacons', 'trim|max_length[500]');

			$wsdescription = $this->input->post('wsdescription');

			foreach ($wsdescription as $k => $v) {
				$this->form_validation->set_rules('wsdescription['.$k.']', 'Description', 'trim|max_length[50]');
				$this->form_validation->set_rules('wsschedule['.$k.']', 'Schedule', 'trim|max_length[100]');
			}

			//$this->form_validation->set_rules('wsdescription[]', 'Description', 'trim|max_length[50]');
			//$this->form_validation->set_rules('wsschedule[]', 'Schedule', 'trim|max_length[100]');

			if ($this->form_validation->run() === true) {
				$this->info_model->saveInfo();
				$this->info_model->saveWorshipservices();

				redirect('admin/pages/info');
			}
		}

		load_view_admin('info/editinfo', $data, 'pages_nav');
	}
}
