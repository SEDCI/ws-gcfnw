<?php
class Weeklymessage_model extends CI_Model
{
	protected $table = 'weekly_message';

	public function __construct()
	{
		$this->load->database();
	}

/*	public function getAllmessages()
	{
		$this->db->order_by('date_added', 'DESC');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}*/

	public function getAllmessages()
	{
		$this->db->select('a.*, COUNT(b.id) AS comments_count');
		//$this->db->join($this->table.'_comments b', 'a.id=b.weekly_message_id', 'left');
		$this->db->join('(SELECT id, weekly_message_id FROM '.$this->table.'_comments WHERE status = "A") b', 'a.id=b.weekly_message_id', 'left');
		//$this->db->where('b.status = "A"');
		$this->db->group_by('a.id');
		$this->db->order_by('date_added', 'DESC');
		$result = $this->db->get($this->table.' a');
		return $result->result_array();
	}

	public function getMessage($message_id)
	{
		$this->db->where(array('id' => $message_id));
		$result = $this->db->get($this->table);
		return $result->row_array();
	}

	public function getLatestmessage()
	{
		$this->db->order_by('date_added', 'DESC');
		$this->db->limit(1);
		$result = $this->db->get($this->table);
		return $result->row_array();
	}

	public function saveMessage($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function updateMessage($message_id, $data)
	{
		$this->db->update($this->table, $data, array('id' => $message_id));
	}

	public function deleteMessage($message_id)
	{
		$this->db->delete($this->table, array('id' => $message_id));
	}

	public function getAllcomments($message_id, $status = 'A')
	{
		$criteria['weekly_message_id'] = $message_id;
		$criteria['a.status'] = $status;

		$this->db->where($criteria);
		$this->db->join('m_personal b', 'a.email_address=b.email_address');
		$this->db->select('a.*, b.last_name, b.first_name');
		$this->db->order_by('date_commented', 'ASC');
		$result = $this->db->get($this->table.'_comments a');
		return $result->result_array();
	}

	public function saveComment($data)
	{
		$this->db->insert($this->table.'_comments', $data);
	}

	public function deleteComment($comment_id, $removed_by)
	{
		//$this->db->delete($this->table.'_comments', array('id' => $comment_id));
		$this->db->update($this->table.'_comments', array('status' => 'R', 'removed_by' => $removed_by), array('id' => $comment_id));
	}
}
