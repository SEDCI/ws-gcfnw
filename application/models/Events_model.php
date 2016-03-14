<?php
class Events_model extends CI_Model
{
	protected $table = 'events';

	public function __construct()
	{
		$this->load->database();
	}

	public function getAllevents()
	{
		$this->db->order_by('event_date', 'DESC');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}

	public function getEvent($event_id)
	{
		$this->db->where(array('id' => $event_id));
		$result = $this->db->get($this->table);
		return $result->row_array();
	}

	public function saveEvent($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function updateEvent($event_id, $data)
	{
		$this->db->update($this->table, $data, array('id' => $event_id));
	}

	public function deleteEvent($event_id)
	{
		$this->db->delete($this->table, array('id' => $event_id));
	}
}
