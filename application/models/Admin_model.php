<?php
class Admin_model extends CI_Model
{
	protected $admin_table = 'admin';

	public function __construct()
	{
		$this->load->database();
	}

	public function checkAdmin($criteria)
	{
		$result = $this->db->get_where($this->admin_table, $criteria);
		return $result->num_rows();
	}

	public function updateAdmin($data, $options)
	{
		if (array_key_exists('where', $options)) {
			$this->db->where($options['where']);
		}

		return $this->db->update($this->admin_table, $data);
	}
}