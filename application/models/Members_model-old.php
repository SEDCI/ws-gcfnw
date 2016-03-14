<?php
class Members_model extends CI_Model
{
	protected $personal_table = 'm_personal';

	public function __construct()
	{
		$this->load->database();
	}

	public function saveForm($data)
	{
		$table = array_shift($data);

		if ($this->db->insert($table, $data)) {
			return $this->db->insert_id();
		}

		return false;
	}

	public function getLastapplication()
	{
		$criteria = array('registration_code' => 'AM'.date('Ym'));
		$this->db->select('registration_number');
		$this->db->where($criteria);
		$this->db->order_by('registration_number', 'DESC');
		$this->db->limit(1, 0);
		$result = $this->db->get($this->personal_table);
		return $result->row_array();
	}
}
