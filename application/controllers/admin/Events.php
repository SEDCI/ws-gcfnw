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

		load_view_admin('events/eventslist', $data, 'pages_nav');
	}

	public function viewEvent($event_id)
	{
		$data['title'] = 'Events';
		$data['actlnk_events'] = ' class="gcf-active"';
		$data['event_id'] = $event_id;

		$data['event'] = $this->events_model->getEvent($event_id);

		load_view_admin('events/eventview', $data, 'pages_nav');
	}

	public function addEvent()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('wmverse', 'Verse', 'trim|required');
		$this->form_validation->set_rules('wmmessage', 'Message', 'trim|required');

		if ($this->input->post()) {
			if ($this->form_validation->run() === true) {
				$upload_error = array();
				$ppt_filename = '';
				$ios_filename = '';
				$pdf_filename = '';

				$config['upload_path'] = './files/weeklymessage/';
				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;

				if ($_FILES['wmfileppt']['name'] != '' && $_FILES['wmfileppt']['size'] > 0) {
					$config['allowed_types'] = 'ppt|pptx';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('wmfileppt')) {
						$upload_error['ppt'] = $this->upload->display_errors();
					} else {
						$ppt_filename = $this->upload->data('file_name');
					}
				}

				if ($_FILES['wmfileios']['name'] != '' && $_FILES['wmfileios']['size'] > 0) {
					$config['allowed_types'] = 'ppt';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('wmfileios')) {
						$upload_error['ios'] = $this->upload->display_errors();
					} else {
						$ios_filename = $this->upload->data('file_name');
					}
				}

				if ($_FILES['wmfilepdf']['name'] != '' && $_FILES['wmfilepdf']['size'] > 0) {
					$config['allowed_types'] = 'pdf';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('wmfilepdf')) {
						$upload_error['pdf'] = $this->upload->display_errors();
					} else {
						$pdf_filename = $this->upload->data('file_name');
					}
				}

				if (empty($upload_error)) {
					$message_data = array(
						'verse' => $this->input->post('wmverse'),
						'content' => $this->input->post('wmmessage'),
						'ppt_file' => $ppt_filename,
						'ios_file' => $ios_filename,
						'pdf_file' => $pdf_filename,
						'date_added' => date('Y-m-d H:i:s')
					);

					$this->events_model->saveMessage($message_data);
		
					$this->session->set_flashdata('pagemsg', '<div class="alert alert-success">A message has been successfully added.</div>');

					redirect('admin/pages/weeklymessage');
				} else {
					$data['pagemsg'] = '<div class="alert alert-danger">'.implode($upload_error).'</div>';
				}
			} else {
				$data['pagemsg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Event';
		$data['actlnk_events'] = ' class="gcf-active"';

		load_view_admin('events/eventsform', $data, 'pages_nav');
	}

	public function editMessage($message_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$data['message'] = $this->events_model->getMessage($message_id);

		if ($this->input->post()) {
			$this->form_validation->set_rules('wmverse', 'Verse', 'trim|required');
			$this->form_validation->set_rules('wmmessage', 'Message', 'trim|required');

			if ($this->form_validation->run() === true) {
				$upload_error = array();
				$ppt_filename = $data['message']['ppt_file'];
				$ios_filename = $data['message']['ios_file'];
				$pdf_filename = $data['message']['pdf_file'];

				$config['upload_path'] = './files/weeklymessage/';
				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;


				/**
				 * Upload/Remove Powerpoint
				 *
				 */
				if (isset($_FILES['wmfileppt'])) {
					if ($_FILES['wmfileppt']['name'] != '' && $_FILES['wmfileppt']['size'] > 0) {
						$config['allowed_types'] = 'ppt';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('wmfileppt')) {
							$upload_error['ppt'] = $this->upload->display_errors();
						} else {
							$ppt_filename = $this->upload->data('file_name');
						}
					} else {
						unlink($config['upload_path'].$ppt_filename);
						$ppt_filename = '';
					}
				}

				/**
				 * Upload/Remove iOS Presentation
				 *
				 */
				if (isset($_FILES['wmfileios'])) {
					if ($_FILES['wmfileios']['name'] != '' && $_FILES['wmfileios']['size'] > 0) {
						$config['allowed_types'] = 'pdf';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('wmfileios')) {
							$upload_error['ios'] = $this->upload->display_errors();
						} else {
							$ios_filename = $this->upload->data('file_name');
						}
					} else {
						unlink($config['upload_path'].$ios_filename);
						$ios_filename = '';
					}
				}

				/**
				 * Upload/Remove PDF
				 *
				 */
				if (isset($_FILES['wmfilepdf'])) {
					if ($_FILES['wmfilepdf']['name'] != '' && $_FILES['wmfilepdf']['size'] > 0) {
						$config['allowed_types'] = 'pdf';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('wmfilepdf')) {
							$upload_error['pdf'] = $this->upload->display_errors();
						} else {
							$pdf_filename = $this->upload->data('file_name');
						}
					} else {
						unlink($config['upload_path'].$pdf_filename);
						$pdf_filename = '';
					}
				}

				if (empty($upload_error)) {
					$message_data = array(
						'verse' => $this->input->post('wmverse'),
						'content' => $this->input->post('wmmessage'),
						'ppt_file' => $ppt_filename,
						'ios_file' => $ios_filename,
						'pdf_file' => $pdf_filename
					);

					$this->events_model->updateMessage($message_id, $message_data);
		
					$this->session->set_flashdata('pagemsg', '<div class="alert alert-success">A message has been successfully updated.</div>');

					redirect('admin/pages/weeklymessage');
				} else {
					$data['pagemsg'] = '<div class="alert alert-danger">'.implode($upload_error).'</div>';
				}
			} else {
				$data['pagemsg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Weekly Message';
		$data['actlnk_events'] = ' class="gcf-active"';
		$data['wmid'] = $message_id;

		load_view_admin('events/weeklymessageedit', $data, 'pages_nav');
	}

	public function removeMessage($message_id)
	{
		$message_data = $this->events_model->getMessage($message_id);

		$this->events_model->deleteMessage($message_id);

		if (!empty($message_data['ppt_file'])) {
			unlink('./files/weeklymessage/'.$message_data['ppt_file']);
		}

		if (!empty($message_data['ios_file'])) {
			unlink('./files/weeklymessage/'.$message_data['ios_file']);
		}

		if (!empty($message_data['pdf_file'])) {
			unlink('./files/weeklymessage/'.$message_data['pdf_file']);
		}

		redirect('admin/pages/weeklymessage');
	}

	public function showComments($message_id)
	{
		$this->events_model->getAllcomments($message_id);
	}

	public function removeComment($comment_id)
	{
		$this->events_model->deleteComment($comment_id, $this->session->userdata('adminuser'));
	}

	public function emailNotif($recipient, $subject, $message)
	{
		$this->email->from('no-reply@gcfnw.org', 'GCF-no-reply');
		$this->email->to($recipient);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}
}
