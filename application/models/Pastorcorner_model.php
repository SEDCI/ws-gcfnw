<?php
class Pastorcorner_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getMessage()
	{
		$result = $this->db->get('pastors_heart');
		return $result->row_array();
	}

	public function saveMessage($data, $criteria)
	{
		return $this->db->update('pastors_heart', $data, $criteria);
	}

	public function getPrayerrequests($options = '')
	{
		if (array_key_exists('where', $options)) {
			$this->db->where($options['where']);
		}

		if (array_key_exists('order', $options)) {
			$this->db->order_by($options['order']);
		}

		$this->db->select('a.message, a.date_added, b.first_name, b.last_name, b.email_address');
		$this->db->join('m_personal b', 'a.m_personal_id = b.id');
		$result = $this->db->get('prayer_request a');
		return $result->result_array();
	}

	public function savePrayerrequests($data)
	{
		return $this->db->insert('prayer_request', $data);
	}
}
