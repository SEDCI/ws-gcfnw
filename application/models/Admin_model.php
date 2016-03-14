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
}