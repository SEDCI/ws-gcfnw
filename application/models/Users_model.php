<?php
class Users_model extends CI_Model
{
	protected $users_table = 'users';

	public function __construct()
	{
		$this->load->database();
	}

	public function getUser($criteria)
	{
		$this->db->join('m_personal b', 'a.m_personal_id = b.id');
		$this->db->select('b.membership_id, b.first_name, b.last_name');
		$this->db->where($criteria);

		return $this->db->get($this->users_table.' a', $criteria)->row_array();
	}

	public function saveUser($data)
	{
		return $this->db->insert($this->users_table, $data);
	}

	public function updateUser($data, $criteria)
	{
		return $this->db->update($this->users_table, $data, $criteria);
	}
}