<?php
class Gallery extends CI_Controller
{
	private $gallery_selected = array('title' => 'Gallery', 'gallery_selected' => 'nav-selected');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
	}

	public function showIndex()
	{
		$data['albumsperline'] = 4;
		$data['albums'] = $this->gallery_model->getAlbums();
		$data['albums_count'] = count($data['albums']);

		$data = array_merge($data, $this->gallery_selected);

		$this->load->view('public/header', $data);
		$this->load->view('public/gallery');
	}

	public function showAlbum($slug)
	{
		$data = $this->gallery_selected;

		$album_options = array(
			'where' => array(
				'slug' => $slug
			)
		);

		$data['album'] = $this->gallery_model->getAlbum($album_options);
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

		$this->load->view('public/header', $data);
		$this->load->view('public/viewalbum');
	}

	public function showHealth()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/health');
	}

	public function showLove()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/love');
	}

	public function showMusic()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/music');
	}

	public function showDecember()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/december');
	}

	public function showTraining()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/training');
	}

	public function showMatters()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/matters');
	}

	public function showFellowship()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/fellowship');
	}
}
