<?php
class Home_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getInfo()
	{
		$fields = array(
			'title',
			'header_text1',
			'header_text2',
			'header_subtext',
			'mission',
			'vision',
			'worship_services'
		);

		$this->db->select($fields);
		$result = $this->db->get('info');
		return $result->row_array();
	}

	public function getWorshipservices()
	{
		$fields = array(
			'id',
			'title',
			'description',
			'schedule'
		);

		$this->db->select($fields);
		$this->db->order_by('id');
		$result = $this->db->get('worship_services');
		return $result->result_array();
	}

	public function saveInfo()
	{
		$data = array(
			'title' => $this->input->post('titletxt'),
			'header_text1' => $this->input->post('hdrtxt1'),
			'header_text2' => $this->input->post('hdrtxt2'),
			'header_subtext' => $this->input->post('hdrsubtxt'),
			'mission' => $this->input->post('mssn'),
			'vision' => $this->input->post('vsn'),
			'worship_services' => $this->input->post('wsheader')
		);

		$this->db->update('info', $data);
	}

	public function saveWorshipservices()
	{
		$description = $this->input->post('wsdescription');
		$schedule = $this->input->post('wsschedule');
		$id = $this->input->post('wsid');

		foreach ($description as $k => $v) {
			$data = array(
				'description' => $description[$k],
				'schedule' => str_replace("\r\n", '<br>', $schedule[$k])
			);

			$this->db->update('worship_services', $data, array('id' => $id[$k]));
		}
	}
}
