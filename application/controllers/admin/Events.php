<?php
class Events extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->library('email');
		$this->load->model('events_model');
	}

	public function showList()
	{
		$data['title'] = 'Events';
		$data['actlnk_events'] = ' class="gcf-active"';
		$data['pagemsg'] = $this->session->flashdata('pagemsg');

		$data['allevents'] = $this->events_model->getAllevents();

		load_view_admin('events/listevents', $data, 'pages_nav');
	}

	public function viewEvent($id)
	{
		$data['title'] = 'Events';
		$data['actlnk_events'] = ' class="gcf-active"';
		$data['id'] = $id;

		$data['event'] = $this->events_model->getEvent($id);

		load_view_admin('events/viewevent', $data, 'pages_nav');
	}

	public function addEvent()
	{
		$this->load->helper('form');

		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->load->library('upload');

			$this->form_validation->set_rules('eventcontent', 'Content', 'trim|required|max_length[500]');

			if ($this->form_validation->run() === true) {
				$upload_error = array();
				$video_filename = '';
				$photo_filename = '';

				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;

				if ($_FILES['eventvideo']['name'] != '' && $_FILES['eventvideo']['size'] > 0) {
					$config['upload_path'] = './'.EVENTFILES_PATH.'v/';
					$config['allowed_types'] = 'mp4|ogg';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('eventvideo')) {
						$data['upload_error']['eventvideo'] = $this->upload->display_errors('<span class="form-error">- ', '</span>');
					} else {
						$video_filename = $this->upload->data('file_name');
					}
				}

				if ($_FILES['eventphoto']['name'] != '' && $_FILES['eventphoto']['size'] > 0) {
					$config['upload_path'] = './'.EVENTFILES_PATH.'p/';
					$config['allowed_types'] = 'jpg|png|gif';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('eventphoto')) {
						$data['upload_error']['eventphoto'] = $this->upload->display_errors('<span class="form-error">- ', '</span>');
					} else {
						$photo_filename = $this->upload->data('file_name');
					}
				}

				if (empty($data['upload_error'])) {
					$event_data = array(
						'event_date' => $this->input->post('eventdate'),
						'event_content' => $this->input->post('eventcontent'),
						'event_video' => $video_filename,
						'event_photo' => $photo_filename,
						'date_added' => date('Y-m-d H:i:s'),
						'added_by' => $this->session->userdata('adminuser')
					);

					$this->events_model->saveEvent($event_data);
		
					$this->session->set_flashdata('pagemsg', '<div class="alert alert-success">An event has been successfully added.</div>');

					redirect('admin/pages/events');
				} else {
					$data['pagemsg'] = '<div class="alert alert-danger">'.implode($upload_error).'</div>';
				}
			} else {
				$data['pagemsg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Event';
		$data['actlnk_events'] = ' class="gcf-active"';

		load_view_admin('events/addevent', $data, 'pages_nav');
	}

	public function editEvent($id)
	{
		$this->load->helper('form');

		$data['event'] = $this->events_model->getEvent($id);

		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->load->library('upload');

			$this->form_validation->set_rules('eventcontent', 'Content', 'trim|required|max_length[500]');

			if ($this->form_validation->run() === true) {
				$upload_error = array();
				$photo_filename = $data['event']['event_photo'];
				$video_filename = $data['event']['event_video'];

				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;

				if (isset($_FILES['eventphoto'])) {
					if ($_FILES['eventphoto']['name'] != '' && $_FILES['eventphoto']['size'] > 0) {
						$config['upload_path'] = './'.EVENTFILES_PATH.'p/';
						$config['allowed_types'] = 'jpg|png|gif';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('eventphoto')) {
							$data['upload_error']['eventphoto'] = $this->upload->display_errors('<span class="form-error">- ', '</span>');
						} else {
							unlink(EVENTFILES_PATH.'p/'.$photo_filename);
							$photo_filename = $this->upload->data('file_name');
						}
					}
				}

				if (isset($_FILES['eventvideo'])) {
					if ($_FILES['eventvideo']['name'] != '' && $_FILES['eventvideo']['size'] > 0) {
						$config['upload_path'] = './'.EVENTFILES_PATH.'v/';
						$config['allowed_types'] = 'mp4|ogg';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('eventvideo')) {
							$data['upload_error']['eventvideo'] = $this->upload->display_errors('<span class="form-error">- ', '</span>');
						} else {
							unlink(EVENTFILES_PATH.'v/'.$video_filename);
							$video_filename = $this->upload->data('file_name');
						}
					}
				}

				if (empty($data['upload_error'])) {
					$event_data = array(
						'event_date' => $this->input->post('eventdate'),
						'event_content' => $this->input->post('eventcontent'),
						'event_video' => $video_filename,
						'event_photo' => $photo_filename,
						'date_updated' => date('Y-m-d H:i:s'),
						'updated_by' => $this->session->userdata('adminuser')
					);

					$this->events_model->updateEvent($id, $event_data);
		
					$this->session->set_flashdata('pagemsg', '<div class="alert alert-success">An event has been successfully updated.</div>');

					redirect('admin/pages/events');
				}
			} else {
				$data['pagemsg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Event';
		$data['actlnk_events'] = ' class="gcf-active"';
		$data['id'] = $id;

		load_view_admin('events/editevent', $data, 'pages_nav');
	}

	public function removeEvent($id)
	{
		$event_data = $this->events_model->getEvent($id);

		$this->events_model->deleteEvent($id);

		if (!empty($event_data['event_photo'])) {
			unlink(EVENTFILES_PATH.'p/'.$event_data['event_photo']);
		}

		if (!empty($event_data['event_video'])) {
			unlink(EVENTFILES_PATH.'v/'.$event_data['event_video']);
		}

		$this->session->set_flashdata('pagemsg', '<div class="alert alert-success">An event has been successfully deleted.</div>');

		redirect('admin/pages/events');
	}

	public function removeFile()
	{
		$return['success'] = 'false';

		if ($id = $this->input->post('eid')) {
			$event_data = $this->events_model->getEvent($id);
			$eventfile = './'.EVENTFILES_PATH;

			if ($this->input->post('ephoto') == '1') {
				$data = array('event_photo' => '');
				$eventfile .= 'p/'.$event_data['event_photo'];
			}

			if ($this->input->post('evideo') == '1') {
				$data = array('event_video' => '');
				$eventfile .= 'v/'.$event_data['event_video'];
			}
				
			$this->events_model->updateEvent($id, $data);
			unlink($eventfile);
			$return['success'] = 'true';
		}

		echo json_encode($return);
	}
}
