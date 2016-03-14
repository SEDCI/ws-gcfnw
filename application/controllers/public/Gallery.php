<?php
class Gallery extends CI_Controller
{
	private $gallery_selected = array('title' => 'Gallery', 'gallery_selected' => 'nav-selected');

	public function __construct()
	{
		parent::__construct();
	}

	public function showIndex()
	{
		$this->load->view('public/header', $this->gallery_selected);
		$this->load->view('public/gallery');
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
