<?php
class Gallery extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('loadview');
		$this->load->helper('date');
		$this->load->library('form_validation');
		$this->load->model('gallery_model');
	}

	public function showGallery()
	{
		$data['title'] = 'Gallery';
		$data['actlnk_gallery'] = ' class="gcf-active"';
		$data['gallerymsg'] = $this->session->flashdata('gallerymsg');

		$data['albumsperline'] = 4;
		$data['albums'] = $this->gallery_model->getAlbums();

		load_view_admin('gallery/viewalbums', $data, 'pages_nav');
	}

	public function addAlbum()
	{
		$data['title'] = 'New Album';
		$data['actlnk_gallery'] = ' class="gcf-active"';
		$data['gallerymsg'] = $this->session->flashdata('gallerymsg');

		if ($this->input->post()) {
			$this->form_validation->set_rules('albumtitle', 'Title', 'trim|required|max_length[150]|is_unique[albums.title]');
			$this->form_validation->set_rules('albumdesc', 'Description', 'trim|max_length[1000]');

			if ($this->form_validation->run() === true) {
				$slug = url_title($this->input->post('albumtitle'));
				$album_data = array(
					'title' => $this->input->post('albumtitle'),
					'description' => $this->input->post('albumdesc'),
					'slug' => $slug,
					'date_added' => date('Y-m-d H:i:s'),
					'added_by' => $this->session->userdata('adminuser')
				);

				$this->gallery_model->saveAlbum($album_data);

				mkdir('img/gallery/'.$slug);

				$this->session->set_flashdata('gallerymsg', 'Album successfully created.');

				redirect('admin/pages/gallery/view/'.$slug);
			}
		}

		load_view_admin('gallery/addalbum', $data, 'pages_nav');
	}

	public function viewAlbum($slug)
	{
		$data['actlnk_gallery'] = ' class="gcf-active"';
		$data['gallerymsg'] = $this->session->flashdata('gallerymsg');

		$data['album'] = $this->gallery_model->getAlbum($slug);
		$data['title'] = $data['album']['title'];

		$data['photos'] = $this->gallery_model->getPhotos($data['album']['id']);
		$data['photos_count'] = count($data['photos']);

		$data['picsperline'] = 4;

		load_view_admin('gallery/viewphotos', $data, 'pages_nav');
	}

	public function uploadPhotos($slug)
	{
		if ($this->input->post()) {
			$upload_ctr = 0;

			if (isset($_FILES['albumpic'])) {
				$imgtypes = array(
					'image/jpeg',
					'image/png',
					'image/gif',
					'image/bmp'
				);

				$config['upload_path'] = './img/gallery/'.$slug.'/';
				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;

				//$upload_data = array();
				$upload_error = array();

				$album_id = $this->gallery_model->getAlbum($slug, 'id');

				$albumpic = $_FILES['albumpic'];

				foreach ($albumpic['name'] as $k => $v) {
					if ($albumpic['size'][$k] > 0 && in_array($albumpic['type'][$k], $imgtypes)) {
						$file['name'] = $v;
						$file['tmp_name'] = $albumpic['tmp_name'][$k];

						$upload_data = $this->uploadPhoto($file, $config);

						if ($upload_data['success']) {
							$this->gallery_model->savePhoto($album_id['id'], $upload_data['file_name']);
							$upload_ctr++;
						}
					} else {
						$upload_error[] = $v.' - Invalid file.';
					}
				}

				$return = array(
					'status_code' => '200',
					'uploaded' => $upload_ctr,
					'failed' => $upload_error
				);
			}
		} else {
			$return = array(
				'status_code' => '405'
			);
		}

		echo json_encode($return);
	}

	public function uploadPhoto($file, $config)
	{
		$arr_filename = explode('.', $file['name']);
		$file_extension = end($arr_filename);

		$upload_data = array(
			'success' => false
		);

		if ($config['file_ext_tolower']) {
			$file_extension = strtolower($file_extension);
		}

		if ($config['encrypt_name']) {
			$encrypted_file_name = md5($file['name'].date('YmdHis')).'.'.$file_extension;
		}

		$file_name = $config['upload_path'].$encrypted_file_name;

		if (move_uploaded_file($file['tmp_name'], $file_name)) {
			$upload_data = array(
				'success' => true,
				'file_name' => $encrypted_file_name
			);
		}

		return $upload_data;
	}
}
