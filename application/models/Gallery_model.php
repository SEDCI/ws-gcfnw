<?php
class Gallery_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}	

	public function getAlbums()
	{
		$this->db->order_by('updated_by DESC');
		$result = $this->db->get('albums');

		return $result->result_array();
	}

	public function getAlbum($slug, $fields = '')
	{
		if (!empty($fields)) {
			$this->db->select($fields);
		}

		$this->db->where(array('slug' => $slug));
		$result = $this->db->get('albums');

		return $result->row_array();
	}

	public function getPhotos($album_id)
	{
		$this->db->where(array('album_id' => $album_id));
		$result = $this->db->get('photos');

		return $result->result_array();
	}

	public function saveAlbum($data)
	{
		return $this->db->insert('albums', $data);
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
		
		/*foreach ($filenames as $filename) {
			$data['filename'] = $filename;
			$this->db->insert('photos', $data);
		}*/
	}
}
