<?php
class Gallery_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}	

	public function getAlbums()
	{
		$this->db->select('a.*, (SELECT COUNT(*) FROM photos WHERE album_id = a.id) AS total_photos, (SELECT filename FROM photos WHERE album_id = a.id ORDER BY date_added DESC LIMIT 1) AS album_cover');
		//$this->db->join('photos b', 'a.id = b.album_id', 'LEFT');
		$this->db->order_by('updated_by DESC');
		$result = $this->db->get('albums a');

		return $result->result_array();
	}

	public function getAlbum($options)
	{
		if (array_key_exists('fields', $options)) {
			$this->db->select($options['fields']);
		}

		if (array_key_exists('where', $options)) {
			$this->db->where($options['where']);
		}

		$result = $this->db->get('albums');

		return $result->row_array();
	}

	public function saveAlbum($data)
	{
		return $this->db->insert('albums', $data);
	}

	public function updateAlbum($data, $options)
	{
		if (array_key_exists('where', $options)) {
			$this->db->where($options['where']);
		}

		return $this->db->update('albums', $data);
	}

	public function deleteAlbum($criteria)
	{
		return $this->db->delete('albums', $criteria);
	}

	public function getPhotos($options)
	{
		if (array_key_exists('where', $options)) {
			$this->db->where($options['where']);
		}

		if (array_key_exists('order', $options)) {
			$this->db->order_by($options['order']);
		}

		$result = $this->db->get('photos');

		return $result->result_array();
	}

	public function getPhoto($id)
	{
		$this->db->where(array('id' => $id));
		$result = $this->db->get('photos');

		return $result->row_array();
	}

	public function savePhoto($album_id, $filename)
	{
		$data = array(
			'album_id' => $album_id,
			'filename' => $filename,
			'date_added' => date('Y-m-d H:i:s'),
			'added_by' => $this->session->userdata('adminuser')
		);

		$this->db->insert('photos', $data);
	}

	public function deletePhoto($album_id, $id)
	{
		$where = array(
			'id' => $id,
			'album_id' => $album_id
		);

		$this->db->where($where);
		return $this->db->delete('photos');
	}
}
