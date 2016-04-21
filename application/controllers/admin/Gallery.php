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
		$this->load->library('image_lib');
		$this->load->model('gallery_model');
	}

	public function showGallery()
	{
		$data['title'] = 'Gallery';
		$data['actlnk_gallery'] = ' class="gcf-active"';
		$data['gallerymsg'] = $this->session->flashdata('gallerymsg');

		$data['albumsperline'] = 4;
		$data['albums'] = $this->gallery_model->getAlbums();
		$data['albums_count'] = count($data['albums']);

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
				$album_code = md5(md5($slug.GCF_SALT.date('FjYHis')));

				$album_data = array(
					'title' => $this->input->post('albumtitle'),
					'album_code' => $album_code,
					'description' => $this->input->post('albumdesc'),
					'slug' => $slug,
					'date_added' => date('Y-m-d H:i:s'),
					'added_by' => $this->session->userdata('adminuser')
				);

				$this->gallery_model->saveAlbum($album_data);

				mkdir(GALLERY_PATH.$album_code);

				$this->session->set_flashdata('gallerymsg', 'Album successfully created.');

				redirect('admin/pages/gallery/view/'.$album_code);
			}
		}

		load_view_admin('gallery/addalbum', $data, 'pages_nav');
	}

	public function viewAlbum($album_code)
	{
		$album_options = array(
			'where' => array(
				'album_code' => $album_code
			)
		);

		$data['album'] = $this->gallery_model->getAlbum($album_options);

		if (!empty($data['album'])) {
			$data['actlnk_gallery'] = ' class="gcf-active"';
			$data['gallerymsg'] = $this->session->flashdata('gallerymsg');

			$data['title'] = $data['album']['title'];

			$options = array(
				'where' => array(
					'album_id' => $data['album']['id']
				),
				'order' => 'date_added DESC'
			);

			$data['photos'] = $this->gallery_model->getPhotos($options);
			$data['photos_count'] = count($data['photos']);

			$data['picsperline'] = 4;

			load_view_admin('gallery/viewphotos', $data, 'pages_nav');
		} else {
			redirect('admin/pages/gallery');
		}
	}

	public function editAlbum($album_code)
	{
		$return = array('success' => 'true');
		$do_update = false;

		if ($this->input->post() && !empty($album_code)) {
			$album_data = array();

			$album_options = array(
				'where' => array('album_code' => $album_code),
				'fields' => 'title'
			);

			$album = $this->gallery_model->getAlbum($album_options);

			if ($this->input->post('atitle') != '' && $this->input->post('atitle') != $album['title']) {
				$this->form_validation->set_rules('atitle', 'Title', 'trim|required|max_length[150]|is_unique[albums.title]');
				$album_data['title'] = $this->input->post('atitle');
				$album_data['slug'] = url_title($this->input->post('atitle'));
				$do_update = true;
			}

			if ($this->input->post('adesc') != '') {
				$this->form_validation->set_rules('adesc', 'Description', 'trim|max_length[1000]');
				$album_data['description'] = $this->input->post('adesc');
				$do_update = true;
			}

			if ($do_update) {
				if ($this->form_validation->run() === true) {
					$album_data['date_updated'] = date('Y-m-d H:i:s');
					$album_data['updated_by'] = $this->session->userdata('adminuser');

					$options = array(
						'where' => array('album_code' => $album_code)
					);

					$this->gallery_model->updateAlbum($album_data, $options);
				} else {
					$return = array('success' => 'false', 'error_msg' => strip_tags(validation_errors()));
				}
			}
		}

		echo json_encode($return);
	}

	public function removeAlbum($album_code)
	{
		$criteria = array('album_code' => $album_code);

		$this->gallery_model->deleteAlbum($criteria);

		$this->removeAlbumdir('./'.GALLERY_PATH.$album_code);

		$this->session->set_flashdata('gallerymsg', '<div class="alert alert-success">An album has been successfully deleted.</div>');

		redirect('admin/pages/gallery');
	}

	public function removeAlbumdir($dir)
	{
		if (is_dir($dir)) {
			$objects = scandir($dir);

			foreach ($objects as $object) {
				if ($object != '.' && $object != '..') {
					if (is_dir($object)) {
						$this->removeAlbumdir($dir.'/'.$object);
					} else {
						unlink($dir.'/'.$object);
					}
				}
			}

			rmdir($dir);
		}
	}

	public function uploadPhotos($album_code)
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

				$config['upload_path'] = './'.GALLERY_PATH.$album_code.'/';
				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;

				$upload_error = array();

				$album_options = array(
					'where' => array(
						'album_code' => $album_code
					),
					'fields' => 'id'
				);

				$album_id = $this->gallery_model->getAlbum($album_options);

				$albumpic = $_FILES['albumpic'];

				foreach ($albumpic['name'] as $k => $v) {
					if ($albumpic['size'][$k] > 0 && in_array($albumpic['type'][$k], $imgtypes)) {
						$file['name'] = $v;
						$file['tmp_name'] = $albumpic['tmp_name'][$k];

						$upload_data = $this->uploadPhoto($file, $config);

						if ($upload_data['success']) {
							$this->gallery_model->savePhoto($album_id['id'], $upload_data['file_name']);

							$sourcefile = GALLERY_PATH.$album_code.'/'.$upload_data['file_name'];
							$destinationfile = GALLERY_PATH.$album_code.'/thumb'.$upload_data['file_name'];

							$this->generateThumbnail($sourcefile, $destinationfile);

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

	public function generateThumbnail($sourcefile, $destinationfile)
	{
		$image_properties = getimagesize($sourcefile);
		$image_width = $image_properties[0];
		$image_height = $image_properties[1];

		$img_config['image_library'] = 'gd2';
		$img_config['maintain_ratio'] = false;
		//$img_config['width'] = 300;
		//$img_config['height'] = 200;
		$img_config['width'] = 600;
		$img_config['height'] = 400;

		/*$ratio = $img_config['height'] / $image_height;
		$new_width = $image_width * $ratio;

		if ($new_width > $img_config['width']) {
			$img_config['x_axis'] = ($image_width / 2) - ($img_config['width'] * $ratio);
		}*/

		$img_config['x_axis'] = ($image_width / 2) - ($img_config['width'] / 2);
		$img_config['y_axis'] = ($image_height / 2) - ($img_config['height'] / 2);

		$img_config['source_image'] = $sourcefile;
		$img_config['new_image'] = $destinationfile;

		$this->image_lib->initialize($img_config);
		$this->image_lib->crop();
	}

	public function removePhoto($album_code, $id)
	{
		$photo = $this->gallery_model->getPhoto($id);

		$album_options = array(
			'where' => array(
				'album_code' => $album_code
			),
			'fields' => 'id'
		);

		$album = $this->gallery_model->getAlbum($album_options);

		if ($this->gallery_model->deletePhoto($album['id'], $photo['id'])) {
			unlink('./'.GALLERY_PATH.$album_code.'/'.$photo['filename']);
			unlink('./'.GALLERY_PATH.$album_code.'/thumb'.$photo['filename']);
		}

		redirect('admin/pages/gallery/view/'.$album_code);
	}
}
